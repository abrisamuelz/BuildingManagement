@extends('layouts.app')

@section('breadcrumbs')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Building Management', 'url' => route('buildings.index')],
            ['label' => 'Building List', 'url' => route('buildings.index')],
            ['label' => 'Building Details']
        ]
    ])
@endsection

@section('content')
<div class="container">
    <div class="d-flex align-items-center justify-content-between mt-4">
        <h2>Building Details</h2>
        <a href="{{ route('buildings.index') }}" class="btn btn-outline-secondary">Back to Building List</a>
    </div>

    <div class="card shadow-sm mt-4">
        <div class="card-header text-white bg-primary">
            <h5 class="mb-0">Details for {{ ucwords(strtolower($building->customer_name)) }}</h5>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <p class="card-text"><strong>Customer Name:</strong> {{ ucwords(strtolower($building->customer_name)) }}</p>
                </div>
                <div class="col-md-6">
                    <p class="card-text"><strong>Building Type:</strong> {{ $building->building_type }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <p class="card-text"><strong>Month:</strong> {{ $building->month }}</p>
                </div>
                <div class="col-md-6">
                    <p class="card-text"><strong>Usability (kWh):</strong> {{ $building->usage_kwh }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p class="card-text"><strong>State:</strong> {{ $building->state }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-4">
        <a href="{{ route('buildings.edit', $building->id) }}" class="btn btn-warning me-2">Edit</a>
        <form action="{{ route('buildings.destroy', $building->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this building?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
@endsection
