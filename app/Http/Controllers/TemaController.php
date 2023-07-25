<?php

namespace App\Http\Controllers;

use App\Models\DataTema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class TemaController extends Controller
{
    public function saveTema(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tema' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        } else {
            $DataTema = new DataTema();

            $DataTema->id_tema = Str::uuid()->toString();
            $DataTema->tema = $request->tema;
            $DataTema->save();

            return response()->json(['success' => $request->tema . ' Berhasil Disimpan.']);
        }
    }

    public function tableTema()
    {
        $tema = DataTema::latest()->get();

        return DataTables::of($tema)
            ->addIndexColumn()
            ->addColumn('aksi', function ($tema) {
                return view('template.component.actionTable')->with([
                    'tema' => $tema
                ]);
            })->make(true);
    }

    // Hapus tema
    public function deleteTema($id)
    {
        DataTema::find($id)->delete();
        return response()->json(['success' => 'Tema Berhasil Di hapus!']);
    }
}
