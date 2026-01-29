<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Rule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function index()
    {
        $rules = Rule::with(['penyakit', 'gejala'])->paginate(7);

        return view('admin.rule.index', compact('rules'));
    }

    public function create()
    {
        $penyakits = Penyakit::all();
        $gejalas = Gejala::all();

        return view('admin.rule.create', compact('penyakits', 'gejalas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penyakit_id' => 'required|exists:penyakits,id',
            'gejala_id' => 'required|exists:gejalas,id',
            'cf_pakar' => 'required|numeric|between:0,1',
        ]);

        // Check if rule already exists
        $exists = Rule::where('penyakit_id', $request->penyakit_id)
            ->where('gejala_id', $request->gejala_id)
            ->exists();

        if ($exists) {
            return back()->withErrors(['msg' => 'Aturan untuk kombinasi Penyakit dan Gejala ini sudah ada.']);
        }

        Rule::create($request->all());

        return redirect()->route('admin.rule.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Rule $rule)
    {
        $penyakits = Penyakit::all();
        $gejalas = Gejala::all();

        return view('admin.rule.edit', compact('rule', 'penyakits', 'gejalas'));
    }

    public function update(Request $request, Rule $rule)
    {
        $request->validate([
            'penyakit_id' => 'required|exists:penyakits,id',
            'gejala_id' => 'required|exists:gejalas,id',
            'cf_pakar' => 'required|numeric|between:0,1',
        ]);

        // Check if unique constraint is violated (excluding itself)
        $exists = Rule::where('penyakit_id', $request->penyakit_id)
            ->where('gejala_id', $request->gejala_id)
            ->where('id', '!=', $rule->id)
            ->exists();

        if ($exists) {
            return back()->withErrors(['msg' => 'Aturan untuk kombinasi Penyakit dan Gejala ini sudah ada.']);
        }

        $rule->update($request->all());

        return redirect()->route('admin.rule.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Rule $rule)
    {
        $rule->delete();

        return redirect()->route('admin.rule.index')->with('success', 'Data berhasil dihapus');
    }
}
