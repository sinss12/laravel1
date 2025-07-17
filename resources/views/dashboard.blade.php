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
                            <li><div>Firewalls(3)</div><div>4(100%)</div></li>
                            <li><div>Ports(12)</div><div>12(100%)</div></li>
                            <li><div>Servers(233)</div><div>2(100%)</div></li>
                            <li><div>Firewalls(3)</div><div>7(100%)</div></li>
                            <li><div>Firewalls(3)</div><div>6(70%)</div></li>
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
                <div class="d-flex justify-content-between mb-2"><div>Uptime</div><div class="text-muted">195 Days</div></div>
                <div class="d-flex justify-content-between mb-2"><div>First Seen</div><div class="text-muted">23 Sep 2019</div></div>
                <div class="d-flex justify-content-between mb-2"><div>Collected</div><div class="text-muted">23 Sep 2019</div></div>
                <div class="d-flex justify-content-between mb-3"><div>Memory</div><div class="text-muted">168.3GB</div></div>
                <div class="progress progress-md">
                    <div class="progress-bar bg-success" style="width: 50%"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-3 d-flex grid-margin stretch-card">
        <div class="card w-100">
            <div class="card-body">
                <h4 class="card-title mb-3">Employee Sales</h4>
                <div class="d-flex justify-content-between mb-2"><div>Connor Chandler</div><div>$4,909</div></div>
                <div class="d-flex justify-content-between mb-2"><div>Russell Floyd</div><div>$857</div></div>
                <div class="d-flex justify-content-between mb-2"><div>Douglas White</div><div>$612</div></div>
                <div class="d-flex justify-content-between mb-2"><div>Alta Fletcher</div><div>$233</div></div>
                <div class="d-flex justify-content-between"><div>Leonard Gutierrez</div><div>$35</div></div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 d-flex grid-margin stretch-card">
        <div class="card w-100">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="card-title">Sales Analytics</h4>
                    <button class="btn btn-sm btn-light">Month</button>
                </div>
                <div class="d-md-flex mb-4">
                    <div class="mr-md-5"><h5>Online</h5><h2 class="text-primary font-weight-bold">23,342</h2></div>
                    <div class="mr-md-5"><h5>Offline</h5><h2 class="text-secondary font-weight-bold">13,221</h2></div>
                    <div><h5>Marketing</h5><h2 class="text-warning font-weight-bold">1,542</h2></div>
                </div>
                <canvas id="salesanalyticChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-xl-3 d-flex grid-margin stretch-card">
        <div class="card w-100">
            <div class="card-body">
                <h4 class="card-title mb-3">Earnings</h4>
                <div class="text-info mb-1">Total Earning</div>
                <h2 class="font-weight-bold">$287,493</h2>
                <div>+1.4% Since Last Month</div>
                <hr>
                <div class="text-info mb-1">Total Earning</div>
                <h2 class="font-weight-bold">$87,493</h2>
                <div>+5.43% Since Last Month</div>
                <canvas id="barChartStacked" class="mt-3"></canvas>
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
@endpush
