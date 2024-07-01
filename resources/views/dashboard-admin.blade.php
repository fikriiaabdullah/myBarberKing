@extends('layouts.app_dashboard')

@section('notifications')
    @foreach ($notificationData as $notification)
        <a href="#" class="list-group-item">
            <div class="row g-0 align-items-center">
                <div class="col-2">
                    <i class="text-warning" data-feather="bell"></i>
                </div>
                <div class="col-10">
                    <div class="text-dark">New user</div>
                    <div class="text-muted small mt-1">{{$notification}} is pending approval</div>
                    <div class="text-muted small mt-1">2h ago</div>
                </div>
            </div>
        </a>
    @endforeach
@endsection

@section('content')
<h1 class="h3 mb-3"><strong>Admin</strong> Dashboard</h1>

<div class="row">
    <div class="col-12">
        <div class="d-flex flex-row flex-wrap justify-content-between">
            <div class="p-2 flex-fill">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0 ">
                                <h5 class="card-title"  style="font-size: 1rem;">Barberman</h5>
                            </div>
                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="users"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3" style="font-size: 1.5rem; color: #020202; font-weight: bold;">{{ $barbermenCount }}</h1>
                        <div class="mb-0">
                            <span class="text-danger" style="font-size: 1rem;"><i class="mdi mdi-arrow-bottom-right"></i> Making </span>
                            <span class="text-muted">Since last week</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-2 flex-fill">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title"  style="font-size: 1rem;">Outlet</h5>
                            </div>
                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="home"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3" style="font-size: 1.5rem; color: #020202; font-weight: bold;">{{ $outletCount }}</h1>
                        <div class="mb-0">
                            <span class="text-success"><i class="mdi mdi-arrow-bottom-right"></i> Making </span>
                            <span class="text-muted">Since last week</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-2 flex-fill">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title"  style="font-size: 1rem;">Layanan</h5>
                            </div>
                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="tool"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3" style="font-size: 1.5rem; color: #020202; font-weight: bold;">{{ $layananCount }}</h1>
                        <div class="mb-0">
                            <span class="text-danger"><i class="mdi mdi-arrow-bottom-right"></i> Making </span>
                            <span class="text-muted">Since last week</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-2 flex-fill">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title"  style="font-size: 1rem;">Reservation</h5>
                            </div>
                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="file-text"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3" style="font-size: 1.5rem; color: #020202; font-weight: bold;">{{ $reservationCount }}</h1>
                        <div class="mb-0">
                            <span class="text-danger"><i class="mdi mdi-arrow-bottom-right"></i> Making </span>
                            <span class="text-muted">Since last week</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">Calendar</h5>
                </div>
                <div class="card-body d-flex">
                    <div class="align-self-center w-100">
                        <div class="chart">
                            <div id="datetimepicker-dashboard"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">Real-Time</h5>
                </div>
                <div class="card-body px-4">
                    <div id="world_map" style="height:350px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
