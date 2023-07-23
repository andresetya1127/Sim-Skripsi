<?php

namespace App\Http\Controllers;

use App\Models\DataDosen;
use App\Models\trx_mahasiswa;
use App\Models\trx_skripsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SkripsiController extends Controller
{
    // index
    public function index(Request $request)
    {
        $countSkripsi = trx_skripsi::count();
        $nextlimit = $request->nextLimit;
        $filter = trx_skripsi::select('tema', DB::raw('COUNT(*) as total'))->groupBy('tema')->get();

        if ($nextlimit) {
            $loadAction = 'enable';
            if ($nextlimit >= $countSkripsi) {
                $loadAction = 'disable';
            }
            $data_skripsi = trx_skripsi::latest()->limit($nextlimit)->get();
            $views =  view('template.component.card.card_hover', [
                'page_title' => 'Data Skripsi',
                'data' => $data_skripsi,
                'filters' => $filter,
            ])->render();
            return response()->json(['view' => $views, 'nextLimit' => $nextlimit, 'loadAction' => $loadAction]);
        }
        $data_skripsi = trx_skripsi::latest()->limit(6)->get();

        return view('pages.skripsi_index', [
            'page_title' => 'Data Skripsi',
            'data' => $data_skripsi,
            'filters' => $filter,
            'countSkripsi' => $countSkripsi
        ]);
    }

    // detail Skripsi
    public function detailSkripsi($id)
    {

        $data_skripsi = trx_skripsi::find($id);
        return view('pages.detail_skripsi', [
            'page_title' => $data_skripsi->judul,
            'data' => $data_skripsi
        ]);
    }

    // cari data skripsi
    public function search_skripsi(Request $request)
    {

        $query = trx_skripsi::query();
        $input_search = strtolower($request->input('input-search'));

        if ($request->input('input-search') == null || $request->input('input-search') == []) {
            $query->latest()->limit(6);
            $loadAction = '';
        } else {
            $query->whereRaw('LOWER(judul) LIKE ?', '%' . $input_search . '%')
                ->orWhereRaw('LOWER(keyword) LIKE ?', '%' . $input_search . '%')
                ->orWhereRaw('LOWER(nim) LIKE ?', '%' . $input_search . '%')
                ->latest();
            $loadAction = 'disable';
        }

        $data = $query->get();

        $views = view('template.component.card.card_hover', [
            'data' => $data
        ])->render();
        return response()->json(['success' => 'Berhasil', 'html' => $views, 'loadAction' => $loadAction]);
    }
    // cari data skripsi berdasarkan tema
    public function search_tema(Request $request)
    {

        $query = trx_skripsi::query();
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            $query->where(function ($query) use ($keyword) {
                foreach ($keyword as $key) {
                    $query->orWhere('tema', 'LIKE', '%' . $key . '%');
                }
            });
            $loadAction = 'disable';
        } else {
            $query->latest()->limit(6);
            $loadAction = '';
        }
        $data = $query->get();
        $views = view('template.component.card.card_hover', [
            'data' => $data
        ])->render();
        return response()->json(['success' => 'Berhasil', 'html' => $views, 'loadAction' => $loadAction]);
    }

    public function SkripsiByKeyword($keyword)
    {
        $filter = trx_skripsi::select('tema', DB::raw('COUNT(*) as total'))->groupBy('tema')->get();

        $data_skripsi = trx_skripsi::latest()
            ->where('keyword', 'LIKE', '%' . $keyword . '%')
            ->get();
        return view('pages.skripsi_index', [
            'page_title' => 'Data Skripsi',
            'data' => $data_skripsi,
            'filters' => $filter,
        ]);
    }
    // kelola skripsi
    public function manageSkripsi()
    {

        $skripsi = trx_skripsi::latest()->get();
        return view('pages.manage_skripsi', [
            'page_title' => 'Kelola Skripsi',

        ]);
    }

    // dataTable Skripsi
    public function tableSkripsi()
    {
        $skripsi = trx_skripsi::latest()->get();

        return DataTables::of($skripsi)
            ->addIndexColumn()
            ->addColumn('aksi', function ($skripsi) {
                return view('template.component.actionTable')->with([
                    'skripsi' => $skripsi
                ]);
            })->make(true);
    }

    // menampilkan view tambah Skripsi
    public function addSkripsi()
    {
        $trx_mhs = trx_mahasiswa::select('nim')->get();
        $dosen = DataDosen::select('id_dosen', 'nama_dosen')->get();
        return view('pages.add_skripsi', [
            'page_title' => 'Tambah Skripsi',
            'trx_mhs' => $trx_mhs,
            'dosen' => $dosen
        ]);
    }

    // tambah skripsi
    public function saveSkripsi(Request $request)
    {
        $cover = $request->file('uploadImage');
        $dokumen = $request->file('uploadFile');
        $skripsi = new trx_skripsi();

        $validator = Validator::make($request->all(), [
            'uploadImage' => 'required|file|mimes:png,jpg,jpeg|unique:trx_skripsis,cover',
            'uploadFile' => 'required|file|mimes:pdf|unique:trx_skripsis,dokumen',
            'nim' => 'required|min:10|max:10',
            'nama' => 'required',
            'prodi' => 'required',
            'tema' => 'required',
            'judul' => 'required|min:10|unique:trx_skripsis,judul',
            'tahun' => 'required|date_format:Y',
            'dosen_1' => 'required',
            'dosen_2' => 'required',
            'abstract' => 'required|min:100',
            'keyword' => 'required|min:2',
            'refrensi' => 'required|min:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        if (!empty($cover)) {
            $coverName = uniqid() . '_' . str_replace(' ', '', $cover->getClientOriginalName());
            $cover->store('cover/', $coverName);

            $skripsi->cover = $coverName;
        } elseif ($cover == null) {
            $skripsi->cover = 'default_cover.jpg';
        }

        $fileSkripsiName =  uniqid() . '_' . str_replace(' ', '', $dokumen->getClientOriginalName());
        $dokumen->store('document/', $fileSkripsiName);
        $skripsi->id_skripsi = Str::uuid()->toString();
        $skripsi->judul = $request->judul;
        $skripsi->dokumen = $fileSkripsiName;
        $skripsi->nim = $request->nim;
        $skripsi->nama = $request->nama;
        $skripsi->program_studi = $request->prodi;
        $skripsi->tema = $request->tema;
        $skripsi->tahun = $request->tahun;
        $skripsi->dosen_1 = $request->dosen_1;
        $skripsi->dosen_2 = $request->dosen_2;
        $skripsi->abstract = $request->abstract;
        $skripsi->keyword = $request->keyword;
        $skripsi->refrensi = $request->refrensi;
        $skripsi->save();

        return response()->json(['success' => 'Skripsi Berhasil Disimpan.'], 200);
    }

    // Menampilkan View edit skripsi
    public function editSkripsi($id)
    {
        $skripsi = trx_skripsi::find($id);
        $trx_mhs = trx_mahasiswa::select('nim')->get();
        $dosen = DataDosen::select('id_dosen', 'nama_dosen')->get();

        return view('pages.edit_skripsi', [
            'page_title' => 'Edit Skripsi',
            'data' => $skripsi,
            'trx_mhs' => $trx_mhs,
            'dosen' => $dosen
        ]);
    }

    // update skripsi
    public function updateSkripsi(Request $request, $id)
    {
        $cover = $request->file('uploadImage');
        $dokumen = $request->file('uploadFile');

        $skripsi =  trx_skripsi::find($id);

        $validator = Validator::make($request->all(), [
            'uploadImage' => 'file|mimes:png,jpg,jpeg|unique:trx_skripsis,cover',
            'uploadFile' => 'file|mimes:pdf|unique:trx_skripsis,dokumen',
            'tema' => 'required',
            'judul' => 'required|min:10',
            'tahun' => 'required|date_format:Y',
            'dosen_1' => 'required',
            'dosen_2' => 'required',
            'abstract' => 'required|min:100',
            'keyword' => 'required|min:2',
            'refrensi' => 'required|min:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($cover) {
            File::delete('cover/' . $skripsi->cover);
            $coverName = uniqid() . '_' . str_replace(' ', '', $cover->getClientOriginalName());
            $cover->store('cover/', $coverName);


            $skripsi->cover = $coverName;
        }
        if ($dokumen) {

            File::delete('document/' . $skripsi->dokumen);
            $fileSkripsiName =  uniqid() . '_' . str_replace(' ', '', $dokumen->getClientOriginalName());
            $dokumen->store('document/', $fileSkripsiName);


            $skripsi->dokumen = $fileSkripsiName;
        }

        $skripsi->judul = $request->judul;
        $skripsi->tahun = $request->tahun;
        $skripsi->dosen_1 = $request->dosen_1;
        $skripsi->dosen_2 = $request->dosen_2;
        $skripsi->abstract = $request->abstract;
        $skripsi->keyword = $request->keyword;
        $skripsi->refrensi = $request->refrensi;
        $skripsi->save();

        return response()->json(['success' => 'Skripsi Berhasil Diubah.'], 200);
    }

    // Hapus Skripsi
    public function deleteSkripsi($id)
    {
        $skripsi = trx_skripsi::find($id);
        $pathFile = 'document/' . $skripsi->dokumen;
        $pathCover = 'cover/' . $skripsi->cover;

        if (!File::exists($pathFile)) {
            $skripsi->delete();
            return response()->json(['success' => 'Data Berhasil Di hapus!']);
        } else {
            File::delete($pathFile);
            File::delete($pathCover);
            $skripsi->delete();
            return response()->json(['success' => 'Data Berhasil Di hapus!']);
        }
    }

    public function downloadFile($file)
    {
        if (!File::exists('document/' . $file)) {
            return abort('404');
        }

        return response()->download('document/' . $file, $file);
    }
}
