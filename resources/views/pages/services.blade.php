@extends('layouts.dashboard')

@section('title', 'Services')

@section('content')
    <div id="dashboardContent" class="text-white">
        <h1 class="mb-4">Services Management</h1>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addServicesModal">
            Add Services +
        </button>

        <!-- Modal -->
        <div class="modal fade text-dark" id="addServicesModal" tabindex="-1" aria-labelledby="addServicesModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addServicesModalLabel">Add New Services</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form for adding a service -->
                        <form action="{{ route('services.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name_services" class="form-label">Services Name</label>
                                <input type="text" class="form-control" id="name_services" name="name_services" required>
                            </div>
                            <div class="mb-3">
                                <label for="branch_id" class="form-label">Branch</label>
                                <select class="form-control" id="branch_id" name="branch_id" required>
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                           
                           
                            <button type="submit" class="btn btn-success">Add Services</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- Display Services Data -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">List of Services</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Services Name</th>
                                        <th scope="col">Branch</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $service->name_services }}</td>
                                            <td>{{ $service->branch->name }}</td>
                                            <td>
                                                <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this service?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection