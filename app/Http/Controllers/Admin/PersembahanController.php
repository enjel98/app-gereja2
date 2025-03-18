<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Persembahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;



class PersembahanController extends Controller
{
    public function index()
    {
      $persembahans = Persembahan::paginate(5);
        return view('admin.persembahan.index', compact('persembahans'));
    }

    public function tambah()
    {
        return view('admin.persembahan.tambah');
    }

    public function prosesTambah(Request $request)
        {
            $validated = $request->validate([
                'deskripsi' => 'required',
                'sidang' => 'required',
                'tanggal' => 'required|date',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'is_featured' => 'required|boolean'

            ]);
            DB::beginTransaction();
            try {
                $path = $request->file('gambar')->store('public');
                $gambar = basename($path);

                $persembahans = new Persembahan();
                $persembahans->deskripsi = $request->deskripsi;
                $persembahans->sidang = $request->sidang;
                $persembahans->tanggal = $request->tanggal;
                $persembahans->gambar = $gambar;
                $persembahans->is_featured = $request->has('is_featured') ? $request->input('is_featured') : 0;

                $persembahans->save();
                DB::commit();
                return redirect()->route('persembahan.index')->with('success', 'Berhasil tambah Persembahan Layanan');
            } catch (\Exception $e) {
                DB::rollback();
                Session::flash('message', ['Gagal Persembahan Layanan', 'error']);
            }
            return redirect()->route('persembahan.index');
        }


    public function edit($id)
    {
        $persembahans = Persembahan::find($id);
        if ($persembahans === null) {
            abort(404);
        }

        return view('admin.persembahan.edit', compact('persembahans'));
    }

    public function prosesUbah(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:persembahans,id',
            'deskripsi' => 'required',
            'sidang' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_featured' => 'required|boolean'
        ]);

        DB::beginTransaction();
        try {
            $persembahans = Persembahan::findOrFail($request->id);
            $persembahans->deskripsi = $request->deskripsi;
            $persembahans->sidang = $request->sidang;
            $persembahans->tanggal = $request->tanggal;
            $persembahans->is_featured = $request->has('is_featured') ? $request->input('is_featured') : 0;


            // Jika ada file gambar baru diupload
            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika ada
                if ($persembahans->gambar) {
                    Storage::delete('public/' . $persembahans->gambar);
                }

                // Simpan gambar baru
                $path = $request->file('gambar')->store('public');
                $gambar = basename($path);
                $persembahans->gambar = $gambar;
            }

            $persembahans->save();
            DB::commit();

            return redirect()->route('persembahan.index')->with('success', 'Berhasil mengubah Persembahan Layanan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('persembahan.index')->with('error', 'Gagal mengubah Persembahan Layanan');
        }

    }
    public function delete($id)
    {
        $persembahans = Persembahan::find($id);

        if (!$persembahans) {
            return response()->json(['success' => false, 'message' => 'Data Menghapus Data!'], 404);
        }

        $persembahans->delete();

        return response()->json(['success' => true, 'message' => 'Data Berhasil Dihapus!']);
    }


    public function toggleFeatured($id)
    {
        try {
            $persembahans = Persembahan::findOrFail($id);
            $persembahans->is_featured = !$persembahans->is_featured; // Toggle status
            $persembahans->save();

            return response()->json(['success' => true, 'is_featured' => $persembahans->is_featured]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal mengubah status.'], 500);
        }
    }

}




