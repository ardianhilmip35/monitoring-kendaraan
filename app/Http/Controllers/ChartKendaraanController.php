<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Branch;
use App\Models\Lending;
use Illuminate\Http\Request;
use App\Charts\TransportChart;
use App\Models\Transportation;

class ChartKendaraanController extends Controller
{
    public function index(TransportChart $chart){
        return view('chart.index', [
            'pageTitle' => 'Data Statistik',
            'branch' => Branch::all(),
            'transports' => Transportation::all(),
            'drivers' => Driver::all(),
            'lendings' => Lending::all(),

            'chart' => $chart->build(),
            'fuel' => $chart->fuel(),
        ]);
    }
}
