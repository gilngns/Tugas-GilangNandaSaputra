@extends('layouts.dashboard')

@section('title', 'Reservation')

@section('content')
    <div id="dashboardContent" class="text-white">
        <h1 class="mb-4">Reservation Management</h1>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addReservationModal">
            Add Reservation +
        </button>

        <!-- Modal -->
        <div class="modal fade text-dark" id="addReservationModal" tabindex="-1" aria-labelledby="addReservationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addReservationModalLabel">Add New Reservation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form for adding a reservation -->
                        <form action="{{ route('reservation.store') }}" method="POST" id="reservationForm">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="service" class="form-label">Service</label>
                                <select class="form-select" id="service" name="service_id">
                                    <option value="" selected disabled>Select Service</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name_services }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="branch" class="form-label">Branch</label>
                                <select class="form-select" id="branch" name="branch_id">
                                    <option value="" selected disabled>Select Branch</option>
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="start_time" class="form-label">Start Time</label>
                                <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
                            </div>
                            <div class="mb-3">
                                <label for="end_time" class="form-label">End Time</label>
                                <input type="datetime-local" class="form-control" id="end_time" name="end_time" required>
                            </div>
                            
                            <button type="submit" class="btn btn-success">Submit Reservation</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Table to display reservations -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Service</th>
                        <th>Branch</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        @if(Auth::user()->peran == 'Admin')
                        <th>Status</th>
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->name }}</td>
                            <td>{{ $reservation->service->name_services }}</td>
                            <td>{{ $reservation->branch->name }}</td>
                            <td>{{ $reservation->date }}</td>
                            <td>{{ $reservation->start_time }}</td>
                            <td>{{ $reservation->end_time }}</td>
                            @if(Auth::user()->peran == 'Admin')
                            <td>
                                @if ($reservation->status == 'finish')
                                    <span class="btn btn-success">{{ $reservation->status }}</span>
                                @elseif ($reservation->status == 'process')
                                    <span class="btn btn-primary">{{ $reservation->status }}</span>
                                @elseif ($reservation->status == 'cancel')
                                    <span class="btn btn-danger">{{ $reservation->status }}</span>
                                @else
                                    {{ $reservation->status }}
                                @endif
                            </td>
                            @endif
                            @if(Auth::user()->peran == 'Admin')
                            <td>
                                <a href="{{ route('reservation.edit', $reservation->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection