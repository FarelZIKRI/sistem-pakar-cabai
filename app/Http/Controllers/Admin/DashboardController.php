<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\Konsultasi;
use App\Models\Penyakit;
use App\Models\Rule;

class DashboardController extends Controller
{
    public function index()
    {
        $penyakit_count = Penyakit::count();
        $gejala_count = Gejala::count();
        $rule_count = Rule::count();
        $konsultasi_count = Konsultasi::count();

        // Data Pie Chart: Penyakit yang sering muncul
        $penyakit_pie = Konsultasi::selectRaw('penyakit_terpilih_id, count(*) as total')
            ->whereNotNull('penyakit_terpilih_id')
            ->with('penyakit')
            ->groupBy('penyakit_terpilih_id')
            ->get();

        $pie_labels = $penyakit_pie->map(fn ($item) => $item->penyakit->nama ?? 'Lainnya')->toArray();
        $pie_data = $penyakit_pie->pluck('total')->toArray();

        // Data Bar Chart: Konsultasi per Bulan (Tahun Ini)
        $monthly_stats = Konsultasi::selectRaw('MONTH(created_at) as month, count(*) as total')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'];
        $bar_data = array_fill(0, 12, 0); // Init 0 for all months

        foreach ($monthly_stats as $stat) {
            $bar_data[$stat->month - 1] = $stat->total;
        }

        return view('admin.dashboard', compact(
            'penyakit_count',
            'gejala_count',
            'rule_count',
            'konsultasi_count',
            'pie_labels',
            'pie_data',
            'months',
            'bar_data'
        ));
    }
}
