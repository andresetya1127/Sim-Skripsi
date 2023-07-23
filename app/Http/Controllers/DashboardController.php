<?php

namespace App\Http\Controllers;

use App\Models\trx_buku;
use App\Models\trx_skripsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function home()
    {
        $skripsi_ti = trx_skripsi::where('program_studi', '55201')->count();
        $skripsi_si = trx_skripsi::where('program_studi', '57201')->count();
        $buku = trx_buku::count('dokumen');
        return view('pages.home', [
            'page_title' => 'Dashboard',
            'skripsi_ti' => $skripsi_ti,
            'skripsi_si' => $skripsi_si,
            'buku' => $buku
        ]);
    }

    public function chartColumn()
    {
        $data_tema = DB::table('trx_skripsis')
            ->select(DB::raw('tema as tema'), DB::raw('COUNT(*) as jumlah_data'))
            ->groupBy(DB::raw('tema'))
            ->get();

        $data_ti = DB::table('trx_skripsis')
            ->select(DB::raw('tema as tema'), DB::raw('COUNT(*) as jumlah_data'))
            ->groupBy(DB::raw('tema'))
            ->where('program_studi', '55201')
            ->get();

        $data_si = DB::table('trx_skripsis')
            ->select(DB::raw('tema as tema'), DB::raw('COUNT(*) as jumlah_data'))
            ->groupBy(DB::raw('tema'))
            ->where('program_studi', '57201')
            ->get();


        return response()->json(['data_tema' => $data_tema, 'data_si' => $data_si, 'data_ti' => $data_ti]);
    }
}
