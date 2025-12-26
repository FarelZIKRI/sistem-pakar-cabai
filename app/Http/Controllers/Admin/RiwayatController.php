<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Konsultasi;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayats = Konsultasi::with('penyakit')->orderBy('created_at', 'desc')->paginate(7);
        return view('admin.riwayat.index', compact('riwayats'));
    }

    public function show(Konsultasi $riwayat)
    {
        return view('admin.riwayat.show', compact('riwayat'));
    }

    public function destroy(Konsultasi $riwayat)
    {
        $riwayat->delete();
        return redirect()->route('admin.riwayat.index')->with('success', 'Data riwayat berhasil dihapus');
    }
}
