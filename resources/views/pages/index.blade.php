@extends('layouts.dashboard')

@section('title', 'BranchDashboard')

@section('content')
<div id="dashboardContent" class="text-white">
    <h1 class="mb-4">Hi Welcome, {{ Auth::user()->name }}</h1>
    @if(Auth::user()->peran == 'Admin')
    <div class="row mt-5">
        
        <!-- Reservations Card -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <i class="fa fa-calendar-check-o fa-5x me-3"></i>
                    <div>
                        <h5 class="card-title">Reservations</h5>
                        <p class="card-text">You Have {{ App\Models\Reservation::count() }} Reservation.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customers Card -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <i class="fa fa-cog fa-5x me-3"></i>
                    <div>
                        <h5 class="card-title">Services</h5>
                        <p class="card-text">You Have {{ App\Models\Services::count() }} Services</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sales Card -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <i class="fa fa-map-marker fa-5x me-3"></i>
                    <div>
                        <h5 class="card-title">Branch</h5>
                        <p class="card-text">You Have {{ App\Models\Branch::count() }} Branch</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection