<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index()
    {
        $prodis = Prodi::get();
        return view('siswa.index', [
            'prodis' => $prodis,
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'nim'       => 'required|unique:siswas',
            'name'      => 'required',
            'prodi'     => 'required|integer',
            'password'  => 'required',
        ]);
        $siswa = new Siswa();
        $siswa->nim = $request->nim;
        $siswa->name = $request->name;
        $siswa->prodi_id = $request->prodi;
        $siswa->password = Hash::make($request->password);
        $cek = $siswa->save();
        if ($cek) {
            return redirect()->back()->with('success', 'Register Berhasil!');
        } else {
            return redirect()->back()->with('error', 'Register Gagal!');
        }
    }
}
