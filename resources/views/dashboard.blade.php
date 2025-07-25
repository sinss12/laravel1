@extends('layout.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="row mb-3">
    <div class="col-sm-6">
        <h3 class="mb-0 font-weight-bold">Kenneth Osborne</h3>
        <p>Your last login: 21h ago from New Zealand.</p>
    </div>
    <div class="col-sm-6 d-flex align-items-center justify-content-md-end">
        <div class="dropdown mr-2">
            <button class="btn bg-white btn-sm dropdown-toggle btn-icon-text border" type="button" data-toggle="dropdown">
                <i class="typcn typcn-calendar-outline mr-2"></i> Last 7 days
            </button>
            <div class="dropdown-menu">
                <h6 class="dropdown-header">Select range</h6>
                <a class="dropdown-item" href="#">Last 14 days</a>
                <a class="dropdown-item" href="#">Last 30 days</a>
            </div>
        </div>
        <button class="btn btn-sm bg-white btn-icon-text border mr-2"><i class="typcn typcn-arrow-forward-outline mr-2"></i>Export</button>
        <button class="btn btn-sm bg-white btn-icon-text border"><i class="typcn typcn-info-large-outline mr-2"></i>Info</button>
    </div>
</div>

<div class="row">
    <div class="col-xl-5 d-flex grid-margin stretch-card">
        <div class="card w-100">
            <div class="card-body">
                <h4 class="card-title mb-3">Sessions by Channel</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <div id="circleProgress6" class="progressbar-js-circle rounded p-3"></div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="session-by-channel-legend">
                            <li>
                                <div>Firewalls(3)</div>
                                <div>4(100%)</div>
                            </li>
                            <li>
                                <div>Ports(12)</div>
                                <div>12(100%)</div>
                            </li>
                            <li>
                                <div>Servers(233)</div>
                                <div>2(100%)</div>
                            </li>
                            <li>
                                <div>Firewalls(3)</div>
                                <div>7(100%)</div>
                            </li>
                            <li>
                                <div>Firewalls(3)</div>
                                <div>6(70%)</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 d-flex grid-margin stretch-card">
        <div class="card w-100">
            <div class="card-body">
                <h4 class="card-title mb-3">Events</h4>
                <div class="d-flex justify-content-between mb-4">
                    <div class="small">Critical</div>
                    <div class="text-danger small">Error</div>
                    <div class="text-warning small">Warning</div>
                </div>
                <canvas id="eventChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-xl-4 d-flex grid-margin stretch-card">
        <div class="card w-100">
            <div class="card-body">
                <h4 class="card-title mb-3">Device Stats</h4>
                <div class="d-flex justify-content-between mb-2">
                    <div>Uptime</div>
                    <div class="text-muted">195 Days</div>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <div>First Seen</div>
                    <div class="text-muted">23 Sep 2019</div>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <div>Collected</div>
                    <div class="text-muted">23 Sep 2019</div>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <div>Memory</div>
                    <div class="text-muted">168.3GB</div>
                </div>
                <div class="progress progress-md">
                    <div class="progress-bar bg-success" style="width: 50%"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">


    <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Website Visitors (IP Address)</h4>
                    <canvas id="visitorChart"></canvas>
                </div>
            </div>
        </div>

</div>
</div>



<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com</a> 2020</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard </a>templates from Bootstrapdash.com</span>
    </div>
</footer>
@endsection

@push('scripts')
<script src="{{ url('assets/js/dashboard.js') }}"></script>
<script>
    var VisitorLabels = @json($visitorLabels);
    var visitorCounts = @json($visitorCounts);

    var visitorCtx = document.getElementById('visitorChart').getContext('2d');
    var visitorChart = new Chart(visitorCtx, {
        type: 'bar',
        data: {
                    labels: VisitorLabels, // ✅ sesuai nama variabel yang kamu buat

            datasets: [{
                label: 'Website Visitors',
                data: visitorCounts,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });
</script>
@endpush