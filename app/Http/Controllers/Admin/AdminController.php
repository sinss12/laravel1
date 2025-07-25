<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $visitorData = Visitor::select(DB::raw('DATE(visited_at) as visit_date'), DB::raw('count(*) as total_visits'))
            ->groupBy('visit_date')
            ->orderBy('visit_date', 'asc')
            ->get();
        $visitorLabels = $visitorData->pluck('visit_date');
        $visitorCounts = $visitorData->pluck('total_visits');

        return view('dashboard', compact(  'visitorLabels', 'visitorCounts'));
    }
}
