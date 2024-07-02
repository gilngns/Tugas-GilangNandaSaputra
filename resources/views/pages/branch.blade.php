@extends('layouts.dashboard')

@section('title', 'Branch')

@section('content')
    <div id="dashboardContent" class="text-white">
        <h1 class="mb-4">Branch Management</h1>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addBranchModal">
            Add Branch +
        </button>

        <!-- Modal -->
        <div class="modal fade text-dark" id="addBranchModal" tabindex="-1" aria-labelledby="addBranchModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addBranchModalLabel">Add New Branch</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form for adding a branch -->
                        <form action="{{ route('branch.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="branchName" class="form-label">Branch Name</label>
                                <input type="text" class="form-control" id="branchName" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="branchAddress" class="form-label">Branch Address</label>
                                <input type="text" class="form-control" id="branchAddress" name="location" required>
                            </div>
                            <div class="mb-3">
                                <label for="openingTime" class="form-label">Opening Time</label>
                                <input type="time" class="form-control" id="openingTime" name="opening_time" required>
                            </div>
                            <div class="mb-3">
                                <label for="closingTime" class="form-label">Closing Time</label>
                                <input type="time" class="form-control" id="closingTime" name="closing_time" required>
                            </div>
                            <button type="submit" class="btn btn-success">Add Branch</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- Display Branch Data -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">List of Branches</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Branch Name</th>
                                        <th scope="col">Branch Address</th>
                                        <th scope="col">Opening Time</th>
                                        <th scope="col">Closing Time</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($branch as $branches)
                                        <tr>
                                            <td>{{ $branches->name }}</td>
                                            <td>{{ $branches->location }}</td>
                                            <td>{{ $branches->opening_time }}</td>
                                            <td>{{ $branches->closing_time }}</td>
                                            <td>
                                                <form action="{{ route('branch.destroy', $branches->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this branch?')">Delete</button>
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