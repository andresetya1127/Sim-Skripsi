<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\registrasi_mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.login', [
            'page_title' => 'SIM-SKRIPSI | Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('root');
        }
        return back()->with([
            'authError' => 'Username Dan Password Tidak Ditemukan!',
        ]);
    }


    public function register(Request $request)
    {
        $mahasiswa = registrasi_mahasiswa::with('mahasiswa')
            ->where('nim', $request->nim)
            ->whereRelation('mahasiswa', 'nama_mahasiswa', $request->nama)
            ->whereRelation('mahasiswa', 'nama_ibu_kandung', $request->ibu_kandung)
            ->first();

        if ($mahasiswa == false) {
            return redirect()->back()->with(['error' => 'Data Tidak Ditemukan !']);
        }
        return view('pages.detail_user_register', [
            'page_title' => 'Register',
            'mahasiswa' => $mahasiswa
        ]);
    }

    public function generateUser(Request $request)
    {
        try {
            DB::beginTransaction();

            $user = new User();
            $user->name = $request->nim;
            $user->role = 'Mahasiswa';
            $user->password = $request->nim;
            $user->save();
            DB::commit();
            return redirect()->route('auth.index')->with(['success' => 'Berhasil Registrasi Silahkan Login!']);
        } catch (\Exception $e) {
            // return redirect()->route('auth.index')->with(['error' => 'Registrasi Gagal!']);
            dd($e);
            DB::rollback();
        };
    }

    public function log_out()
    {
        Auth::logout();
        session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('root');
    }
}
