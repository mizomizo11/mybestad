@extends('layouts.admin')

@section('title', 'التقارير الشهرية')

@section('extra-css')
<style>
    .stat-card {
        border-left: 4px solid;
        transition: transform 0.2s;
    }
    .stat-card:hover {
        transform: translateY(-5px);
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <h1 class="mb-4"><i class="fas fa-chart-bar"></i> التقارير الشهرية للاستشارات</h1>
    
    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card stat-card border-primary">
                <div class="card-body">
                    <h5 class="card-title text-primary">
                        <i class="fas fa-calendar-check"></i> استشارات هذا الشهر
                    </h5>
                    <h2 class="mb-0">{{ array_sum(array_column($reportData, 'this_month')) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stat-card border-warning">
                <div class="card-body">
                    <h5 class="card-title text-warning">
                        <i class="fas fa-calendar-minus"></i> استشارات الشهر الماضي
                    </h5>
                    <h2 class="mb-0">{{ array_sum(array_column($reportData, 'last_month')) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stat-card border-success">
                <div class="card-body">
                    <h5 class="card-title text-success">
                        <i class="fas fa-chart-line"></i> إجمالي الاستشارات
                    </h5>
                    <h2 class="mb-0">{{ array_sum(array_column($reportData, 'total')) }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Doctor Consultations Table -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-table"></i> تقرير الأطباء - الاستشارات</h5>
        </div>
        <div class="card-body">
            @if(count($reportData) > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>اسم الطبيب</th>
                                <th class="text-center">استشارات هذا الشهر</th>
                                <th class="text-center">استشارات الشهر الماضي</th>
                                <th class="text-center">إجمالي الاستشارات</th>
                                <th class="text-center">التغيير</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reportData as $data)
                                @php
                                    $change = $data['last_month'] > 0 
                                        ? (($data['this_month'] - $data['last_month']) / $data['last_month']) * 100 
                                        : ($data['this_month'] > 0 ? 100 : 0);
                                @endphp
                                <tr>
                                    <td>
                                        <strong>{{ $data['doctor']->name }}</strong>
                                        @if($data['doctor']->specialization)
                                            <br><small class="text-muted">{{ $data['doctor']->specialization }}</small>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-primary fs-6">{{ $data['this_month'] }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-warning fs-6">{{ $data['last_month'] }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-success fs-6">{{ $data['total'] }}</span>
                                    </td>
                                    <td class="text-center">
                                        @if($change > 0)
                                            <span class="badge bg-success">
                                                <i class="fas fa-arrow-up"></i> {{ number_format($change, 1) }}%
                                            </span>
                                        @elseif($change < 0)
                                            <span class="badge bg-danger">
                                                <i class="fas fa-arrow-down"></i> {{ number_format(abs($change), 1) }}%
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                <i class="fas fa-minus"></i> 0%
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-light">
                            <tr>
                                <th>الإجمالي</th>
                                <th class="text-center">
                                    <span class="badge bg-primary fs-6">{{ array_sum(array_column($reportData, 'this_month')) }}</span>
                                </th>
                                <th class="text-center">
                                    <span class="badge bg-warning fs-6">{{ array_sum(array_column($reportData, 'last_month')) }}</span>
                                </th>
                                <th class="text-center">
                                    <span class="badge bg-success fs-6">{{ array_sum(array_column($reportData, 'total')) }}</span>
                                </th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> لا توجد بيانات متاحة
                </div>
            @endif
        </div>
    </div>

    <!-- Chart Section -->
    <div class="card">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0"><i class="fas fa-chart-line"></i> الاتجاهات الشهرية (آخر 12 شهراً)</h5>
        </div>
        <div class="card-body">
            <canvas id="consultationsChart" style="max-height: 400px;"></canvas>
        </div>
    </div>
</div>
@endsection

@section('extra-js')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

<script>
    // Monthly Trends Chart
    const ctx = document.getElementById('consultationsChart').getContext('2d');
    
    const monthlyData = @json($monthlyTrends);
    const labels = monthlyData.map(item => item.month);
    const data = monthlyData.map(item => item.count);
    
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'عدد الاستشارات',
                data: data,
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'اتجاه الاستشارات الشهرية'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
    
    // Optional: Bar Chart for current comparison
    const ctx2 = document.createElement('canvas');
    const barChartContainer = document.createElement('div');
    barChartContainer.className = 'mt-4';
    barChartContainer.innerHTML = '<h5 class="text-center mb-3">مقارنة الأطباء - هذا الشهر</h5>';
    barChartContainer.appendChild(ctx2);
    
    document.getElementById('consultationsChart').parentElement.appendChild(barChartContainer);
    
    const doctorData = @json($reportData);
    const doctorNames = doctorData.map(item => item.doctor.name);
    const thisMonthData = doctorData.map(item => item.this_month);
    const lastMonthData = doctorData.map(item => item.last_month);
    
    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: doctorNames,
            datasets: [
                {
                    label: 'هذا الشهر',
                    data: thisMonthData,
                    backgroundColor: 'rgba(54, 162, 235, 0.8)',
                },
                {
                    label: 'الشهر الماضي',
                    data: lastMonthData,
                    backgroundColor: 'rgba(255, 206, 86, 0.8)',
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            }
        }
    });
</script>
@endsection
