<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\FHK;
use Illuminate\Http\Request;

class FHKController extends Controller
{
    public function index()
    {
        $fhk = FHK::paginate(10);
        return view('admin.fhk.index', compact('fhk'));
    }

    public function tambah()
    {
        return view('admin.fhk.tambah');
    }

    public function prosesTambah(Request $request)
    {
        $fhk = new FHK();
        $fhk->judul_fhk = $request->judul_fhk;
        $fhk->tema_fhk = $request->tema_fhk;
        $fhk->bacaan_alkitab = $request->bacaan_alkitab;
        $fhk->tanggal_khotbah = $request->tanggal_khotbah;
        if ($request->hasFile('file_fhk')) {
            $file = $request->file('file_fhk');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/fhk', $filename); // Simpan ke storage
            $fhk->file_fhk = $filename;
        }
        $fhk->save();

        return redirect()->route('fhk.index')->with('success', 'Data FHK berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $fhk = FHK::findOrFail($id);
        return view('admin.fhk.edit', compact('fhk'));
    }

    public function prosesUbah(Request $request, $id)
    {
        $fhk = FHK::findOrFail($id);
        $fhk->judul_fhk = $request->judul_fhk;
        $fhk->tema_fhk = $request->tema_fhk;
        $fhk->bacaan_alkitab = $request->bacaan_alkitab;
        $fhk->tanggal_khotbah = $request->tanggal_khotbah;
        $fhk->save();

        return redirect()->route('fhk.index')->with('success', 'Data FHK berhasil diubah!');
    }

    public function delete($id)
    {
        $fhk = FHK::find($id);

        if (!$fhk) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan!'], 404);
        }

        $fhk->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus!']);
    }

}
