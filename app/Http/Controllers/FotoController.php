<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FotoController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $file = $request->file('foto');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('public/foto', $namaFile);

        // Simpan ke database jika diperlukan, contoh:
        // Foto::create(['path' => $namaFile]);

        return back()->with('success', 'Foto berhasil diupload!');
    }
}
