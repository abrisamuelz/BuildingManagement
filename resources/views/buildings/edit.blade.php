@extends('layouts.app')
@section('breadcrumbs')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Building Management', 'url' => route('buildings.index')],
            ['label' => 'Building List', 'url' => route('buildings.index')],
            ['label' => 'Edit Building']
        ]
    ])
@endsection
@section('content')
<div class="container">
    <h2 class="mt-4">Edit Building</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('buildings.update', $building->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Customer Name -->
        <div class="mb-3">
            <label for="customer_name" class="form-label">Customer Name</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ old('customer_name', $building->customer_name) }}" required>
        </div>

        <!-- Building Type (Radio Buttons) -->
        <div class="mb-3">
            <label class="form-label">Building Type</label><br>
            <input type="radio" id="commercial" name="building_type" value="Commercial" {{ old('building_type', $building->building_type) == 'Commercial' ? 'checked' : '' }} required>
            <label for="commercial">Commercial</label>
            <input type="radio" id="residential" name="building_type" value="Residential" {{ old('building_type', $building->building_type) == 'Residential' ? 'checked' : '' }} required>
            <label for="residential">Residential</label>
        </div>

        <!-- Month (Dropdown) -->
        <div class="mb-3">
            <label for="month" class="form-label">Month</label>
            <select class="form-select" id="month" name="month" required>
                <option value="" disabled>Select Month</option>
                @foreach(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $month)
                    <option value="{{ $month }}" {{ old('month', $building->month) == $month ? 'selected' : '' }}>{{ $month }}</option>
                @endforeach
            </select>
        </div>

        <!-- Usability (kWh) -->
        <div class="mb-3">
            <label for="usage_kwh" class="form-label">Usability (kWh)</label>
            <input type="number" class="form-control" id="usage_kwh" name="usage_kwh" value="{{ old('usage_kwh', $building->usage_kwh) }}" required>
        </div>

        <!-- State (Dropdown) -->
        <div class="mb-3">
            <label for="state" class="form-label">State</label>
            <select class="form-select" id="state" name="state" required>
                <option value="" disabled>Select State</option>
                @foreach(['Johor', 'Kedah', 'Kelantan', 'Melaka', 'Negeri Sembilan', 'Pahang', 'Perak', 'Perlis', 'Pulau Pinang', 'Sabah', 'Sarawak', 'Selangor', 'Terengganu', 'Kuala Lumpur', 'Labuan', 'Putrajaya'] as $state)
                    <option value="{{ $state }}" {{ old('state', $building->state) == $state ? 'selected' : '' }}>{{ $state }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
