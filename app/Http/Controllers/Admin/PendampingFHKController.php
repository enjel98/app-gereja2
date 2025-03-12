<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PendampingFHK;
use Illuminate\Http\Request;

class PendampingFHKController extends Controller
{
    public function index()
    {
        $pendampingfhk = PendampingFHK::paginate(10);
        return view('admin.pendamping-fhk.index', compact('pendampingfhk'));
    }

    public function tambah()
    {
        return view('admin.pendamping-fhk.tambah');
    }

    public function prosesTambah(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'sometimes|string',
            'tanggal' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $pendampingfhk = new PendampingFHK();
        $pendampingfhk->judul = $request->judul;
        $pendampingfhk->deskripsi = $request->deskripsi ?? '-';
        $pendampingfhk->tanggal = $request->tanggal;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/pendamping-fhk', $filename); // Simpan ke storage
            $pendampingfhk->file_pendampingfhk = $filename;
        }
        $pendampingfhk->save();

        return redirect()->route('pendamping-fhk.index')->with('success', 'Data Pendamping FHK berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pendampingfhk = PendampingFHK::findOrFail($id);
        return view('admin.pendamping-fhk.edit', compact('pendampingfhk'));
    }

    public function prosesUbah(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'sometimes|string',
            'tanggal' => 'required|date'
        ]);

        $pendampingfhk = PendampingFHK::findOrFail($id);
        $pendampingfhk->judul = $request->judul;
        $pendampingfhk->deskripsi = $request->deskripsi ?? '-';
        $pendampingfhk->tanggal = $request->tanggal;
        $pendampingfhk->save();

        return redirect()->route('pendamping-fhk.index')->with('success', 'Data Pendamping FHK berhasil diubah!');
    }

    public function delete($id)
    {
        $pendampingfhk = PendampingFHK::find($id);

        if (!$pendampingfhk) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan!'], 404);
        }

        $pendampingfhk->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus!']);
    }
}
