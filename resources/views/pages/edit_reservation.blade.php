@extends('layouts.dashboard')

@section('title', 'Edit Reservation')

@section('content')
    <div id="dashboardContent" class="text-white">
        <h1 class="mb-4">Edit Reservation</h1>
       
        <form action="{{ route('reservation.update', $reservation->id) }}" method="POST" id="editReservationForm">
            @csrf
            @method('PUT') <!-- Pastikan menggunakan metode PUT untuk pembaruan -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $reservation->name }}" required>
            </div>
            <div class="mb-3">
                <label for="service_id" class="form-label">Service</label>
                <select class="form-select" id="service_id" name="service_id">
                    <option value="" disabled>Select Service</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}" {{ $service->id == $reservation->service_id ? 'selected' : '' }}>
                            {{ $service->name_services }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="branch_id" class="form-label">Branch</label>
                <select class="form-select" id="branch_id" name="branch_id">
                    <option value="" disabled>Select Branch</option>
                    @foreach ($branches as $branch)
                        <option value="{{ $branch->id }}" {{ $branch->id == $reservation->branch_id ? 'selected' : '' }}>
                            {{ $branch->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="start_time" class="form-label">Start Time</label>
                <input type="datetime-local" class="form-control" id="start_time" name="start_time" value="{{ $reservation->start_time }}" required>
            </div>
            <div class="mb-3">
                <label for="end_time" class="form-label">End Time</label>
                <input type="datetime-local" class="form-control" id="end_time" name="end_time" value="{{ $reservation->end_time }}" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="process" {{ $reservation->status == 'process' ? 'selected' : '' }}>Process</option>
                    <option value="finish" {{ $reservation->status == 'finish' ? 'selected' : '' }}>Finish</option>
                    <option value="cancel" {{ $reservation->status == 'cancel' ? 'selected' : '' }}>Cancel</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-success">Update Reservation</button>
        </form>
    </div>
@endsection