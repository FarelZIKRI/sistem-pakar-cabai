<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\Konsultasi;
use App\Services\CertaintyFactorService;
use App\Services\WeightedProductService;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    protected $cfService;
    protected $wpService;

    public function __construct(CertaintyFactorService $cfService, WeightedProductService $wpService)
    {
        $this->cfService = $cfService;
        $this->wpService = $wpService;
    }

    public function index()
    {
        $gejalas = Gejala::all();
        return view('front.konsultasi', compact('gejalas'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'nama_pengguna' => 'required|string|max:100',
            'gejala' => 'required|array|min:1',
            'gejala.*' => 'numeric|between:0,1', // User CF input per symptom
        ]);

        $userGejalas = array_filter($request->gejala, function ($value) {
            return $value > 0; // Filter only selected symptoms (CF > 0)
        });

        if (empty($userGejalas)) {
            return back()->withErrors(['msg' => 'Pilih minimal satu gejala dengan nilai keyakinan.']);
        }

        // 1. Calculate Certainty Factor
        $cfResults = $this->cfService->calculate($userGejalas);

        // 2. Calculate Weighted Product
        $wpResults = $this->wpService->calculate($userGejalas);

        // 3. Determine Final Result (Based on CF highest score)
        $topResult = $cfResults[0] ?? null;

        // 4. Save History
        $konsultasi = Konsultasi::create([
            'nama_pengguna' => $request->nama_pengguna,
            'hasil_cf' => $cfResults,
            'hasil_wp' => $wpResults,
            'penyakit_terpilih_id' => $topResult ? $topResult['penyakit']->id : null,
            'nilai_keyakinan' => $topResult ? $topResult['cf_value'] : 0,
            'input_gejala' => $userGejalas,
        ]);

        return redirect()->route('front.consultation.result', $konsultasi->id);
    }

    public function result(Konsultasi $konsultasi)
    {
        return view('front.hasil', compact('konsultasi'));
    }
}
