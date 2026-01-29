<?php

namespace App\Services;

use App\Models\Rule;

class CertaintyFactorService
{
    /**
     * Menghitung Certainty Factor untuk gejala yang dipilih oleh user.
     *
     * @param  array  $userGejalas  Array of [gejala_id => cf_user]
     * @return array Penyakit yang diberi peringkat berdasarkan nilai CF
     */
    public function calculate(array $userGejalas)
    {
        // Dapatkan semua aturan terkait gejala yang dipilih.
        $gejalaIds = array_keys($userGejalas);
        $rules = Rule::whereIn('gejala_id', $gejalaIds)->get()->groupBy('penyakit_id');

        $results = [];

        foreach ($rules as $penyakitId => $penyakitRules) {
            $cfCombine = 0;
            $cfOld = 0;

            foreach ($penyakitRules as $index => $rule) {
                $cfPakar = $rule->cf_pakar;
                $cfUser = $userGejalas[$rule->gejala_id] ?? 0;

                // CF(H,E) = CFpakar * CFuser
                $cfHe = $cfPakar * $cfUser;

                // Menghitung CFcombine
                if ($index === 0) {
                    $cfOld = $cfHe;
                } else {
                    // CFcombine = CFold + CFhe * (1 - CFold)
                    $cfOld = $cfOld + $cfHe * (1 - $cfOld);
                }
            }

            $results[] = [
                'penyakit' => $penyakitRules->first()->penyakit,
                'cf_value' => $cfOld,
                'percentage' => round($cfOld * 100, 2),
            ];
        }

        // Mengurutkan berdasarkan nilai CF
        usort($results, function ($a, $b) {
            return $b['cf_value'] <=> $a['cf_value'];
        });

        return $results;
    }
}
