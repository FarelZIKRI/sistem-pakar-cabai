<?php

namespace App\Services;

use App\Models\Penyakit;
use App\Models\Rule;

class WeightedProductService
{
    /**
     * Menghitung Weighted Product untuk dukungan keputusan.
     * Si = Product(xij ^ wj)
     * Vi = Si / Sum(Si)
     *
     * @param  array  $userGejalas  Array of [gejala_id => cf_user] (digunakan untuk memicu relevansi)
     * @return array Penyakit yang diberi peringkat berdasarkan nilai WP
     */
    public function calculate(array $userGejalas)
    {
        $gejalaIds = array_keys($userGejalas);
        $rules = Rule::with(['gejala', 'penyakit'])
            ->whereIn('gejala_id', $gejalaIds)
            ->get()
            ->groupBy('penyakit_id');

        $s_values = [];
        $total_s = 0;

        foreach ($rules as $penyakitId => $penyakitRules) {
            $product = 1;

            foreach ($penyakitRules as $rule) {
                // Kriteria Weight (Wj)
                $weight = $rule->gejala->bobot;

                // Nilai Kriteria (Xij)
                $rating = $rule->cf_pakar;

                // Si = Product (Xij ^ Wj)
                if ($rating > 0) {
                    $product *= pow($rating, $weight);
                }
            }

            $s_values[$penyakitId] = [
                'penyakit' => $penyakitRules->first()->penyakit,
                's_score' => $product,
            ];
            $total_s += $product;
        }

        // Menghitung Vector V
        $results = [];
        if ($total_s > 0) {
            foreach ($s_values as $penyakitId => $data) {
                $v_score = $data['s_score'] / $total_s;
                $results[] = [
                    'penyakit' => $data['penyakit'],
                    'wp_value' => $v_score,
                    'percentage' => round($v_score * 100, 2),
                ];
            }
        }

        // Mengurutkan berdasarkan nilai WP
        usort($results, function ($a, $b) {
            return $b['wp_value'] <=> $a['wp_value'];
        });

        return $results;
    }
}
