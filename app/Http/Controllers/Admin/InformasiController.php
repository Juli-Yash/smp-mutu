<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InformasiSekolah;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = InformasiSekolah::all();
        return view('admin.informasi.index', compact('informasi'));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'profil' => 'required|string',
            'visi_misi' => 'required|string',
            'fasilitas' => 'required|string',
        ]);
    
        InformasiSekolah::create([
            'profil' => $request->profil,
            'visi_misi' => $request->visi_misi,
            'fasilitas' => $request->fasilitas,
        ]);
    
        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil disimpan.');
    }    

    public function edit($id)
    {
        $informasi = InformasiSekolah::findOrFail($id);
        return view('admin.informasi.edit', compact('informasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'profil' => 'required',
            'visi_misi' => 'required',
            'fasilitas' => 'required',
        ]);

        $informasi = InformasiSekolah::findOrFail($id);
        $informasi->update($request->all());

        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $informasi = InformasiSekolah::findOrFail($id);
        $informasi->delete();

        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil dihapus.');
    }
}