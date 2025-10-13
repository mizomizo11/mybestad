<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('consultations')->get();
        
        $currentMonth = Carbon::now()->startOfMonth();
        $lastMonth = Carbon::now()->subMonth()->startOfMonth();
        $lastMonthEnd = Carbon::now()->subMonth()->endOfMonth();
        
        $reportData = [];
        
        foreach ($doctors as $doctor) {
            $thisMonthCount = Consultation::where('doctor_id', $doctor->id)
                ->where('created_at', '>=', $currentMonth)
                ->count();
            
            $lastMonthCount = Consultation::where('doctor_id', $doctor->id)
                ->whereBetween('created_at', [$lastMonth, $lastMonthEnd])
                ->count();
            
            $totalCount = Consultation::where('doctor_id', $doctor->id)->count();
            
            $reportData[] = [
                'doctor' => $doctor,
                'this_month' => $thisMonthCount,
                'last_month' => $lastMonthCount,
                'total' => $totalCount
            ];
        }
        
        // Get monthly trends for chart (last 12 months)
        $monthlyTrends = [];
        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $monthStart = $month->copy()->startOfMonth();
            $monthEnd = $month->copy()->endOfMonth();
            
            $count = Consultation::whereBetween('created_at', [$monthStart, $monthEnd])
                ->count();
            
            $monthlyTrends[] = [
                'month' => $month->format('M Y'),
                'count' => $count
            ];
        }
        
        return view('admin.reports.index', compact('reportData', 'monthlyTrends'));
    }
}
