<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    public function index()
    {
        $gejalas = Gejala::paginate(7);

        return view('admin.gejala.index', compact('gejalas'));
    }

    public function create()
    {
        return view('admin.gejala.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:gejalas,kode',
            'nama' => 'required',
            'bobot' => 'nullable|numeric',
        ]);

        Gejala::create($request->all());

        return redirect()->route('admin.gejala.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Gejala $gejala)
    {
        return view('admin.gejala.edit', compact('gejala'));
    }

    public function update(Request $request, Gejala $gejala)
    {
        $request->validate([
            'kode' => 'required|unique:gejalas,kode,'.$gejala->id,
            'nama' => 'required',
            'bobot' => 'nullable|numeric',
        ]);

        $gejala->update($request->all());

        return redirect()->route('admin.gejala.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Gejala $gejala)
    {
        $gejala->delete();

        return redirect()->route('admin.gejala.index')->with('success', 'Data berhasil dihapus');
    }
}
