@extends('layouts.app')

@section('breadcrumbs')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Building Management', 'url' => route('buildings.index')],
            ['label' => 'Building List'],
        ],
    ])
@endsection

@section('content')
    <div class="container">
        <h2 class="mt-4">Building List</h2>
        <a href="{{ route('buildings.create') }}" class="btn btn-primary my-3">Add New Building</a>

        <!-- Search and Sorting Form -->
        <form method="GET" action="{{ route('buildings.index') }}" class="row g-3 mb-4">
            <div class="col-md-3">
                <label for="building_type" class="form-label">Building Type</label>
                <select class="form-select" id="building_type" name="building_type">
                    <option value="">All</option>
                    <option value="Commercial" {{ request('building_type') == 'Commercial' ? 'selected' : '' }}>Commercial
                    </option>
                    <option value="Residential" {{ request('building_type') == 'Residential' ? 'selected' : '' }}>
                        Residential</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="state" class="form-label">State</label>
                <select class="form-select" id="state" name="state">
                    <option value="">All States</option>
                    @foreach (['Johor', 'Kedah', 'Kelantan', 'Melaka', 'Negeri Sembilan', 'Pahang', 'Perak', 'Perlis', 'Pulau Pinang', 'Sabah', 'Sarawak', 'Selangor', 'Terengganu', 'Kuala Lumpur', 'Labuan', 'Putrajaya'] as $state)
                        <option value="{{ $state }}" {{ request('state') == $state ? 'selected' : '' }}>
                            {{ $state }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label for="sort_by" class="form-label">Sort By</label>
                <select class="form-select" id="sort_by" name="sort_by">
                    <option value="">Select</option>
                    <option value="building_type" {{ request('sort_by') == 'building_type' ? 'selected' : '' }}>Building
                        Type</option>
                    <option value="usage_kwh" {{ request('sort_by') == 'usage_kwh' ? 'selected' : '' }}>Usability (kWh)
                    </option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="sort_direction" class="form-label">Order</label>
                <select class="form-select" id="sort_direction" name="sort_direction">
                    <option value="asc" {{ request('sort_direction') == 'asc' ? 'selected' : '' }}>Ascending</option>
                    <option value="desc" {{ request('sort_direction') == 'desc' ? 'selected' : '' }}>Descending</option>
                </select>
            </div>

            <div class="col-md-12 mt-2">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('buildings.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>

        <!-- Building Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Building Type</th>
                    <th>State</th>
                    <th>Usability (kWh)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buildings as $building)
                    <tr>
                        <td>{{ $building->id }}</td>
                        <td>{{ ucwords(strtolower($building->customer_name)) }}</td>
                        <td>{{ $building->building_type }}</td>
                        <td>{{ $building->state }}</td>
                        <td>{{ $building->usage_kwh }}</td>
                        <td>
                            <a href="{{ route('buildings.show', $building->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('buildings.edit', $building->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('buildings.destroy', $building->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
