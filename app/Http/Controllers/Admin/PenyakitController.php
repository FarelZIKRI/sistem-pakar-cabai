<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenyakitController extends Controller
{
    public function index()
    {
        $penyakits = Penyakit::paginate(7);

        return view('admin.penyakit.index', compact('penyakits'));
    }

    public function create()
    {
        return view('admin.penyakit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:penyakits,kode',
            'nama' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('penyakit', 'public');
        }

        Penyakit::create($data);

        return redirect()->route('admin.penyakit.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Penyakit $penyakit)
    {
        return view('admin.penyakit.edit', compact('penyakit'));
    }

    public function update(Request $request, Penyakit $penyakit)
    {
        $request->validate([
            'kode' => 'required|unique:penyakits,kode,'.$penyakit->id,
            'nama' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($penyakit->gambar) {
                Storage::disk('public')->delete($penyakit->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('penyakit', 'public');
        }

        $penyakit->update($data);

        return redirect()->route('admin.penyakit.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Penyakit $penyakit)
    {
        if ($penyakit->gambar) {
            Storage::disk('public')->delete($penyakit->gambar);
        }
        $penyakit->delete();

        return redirect()->route('admin.penyakit.index')->with('success', 'Data berhasil dihapus');
    }
}
