@extends('layouts.app')
@section('breadcrumbs')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Building Management', 'url' => route('buildings.index')],
            ['label' => 'Tariff Editor', 'url' => route('tariffs.index')],
            ['label' => 'Tariff Details']
        ]
    ])
@endsection
@section('content')
<div class="container">
    <h2 class="mt-4">Building Details</h2>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Customer Name: {{ ucwords(strtolower($building->customer_name)) }}</h5>
            <p class="card-text"><strong>Building Type:</strong> {{ $building->building_type }}</p>
            <p class="card-text"><strong>Month:</strong> {{ $building->month }}</p>
            <p class="card-text"><strong>Usability (kWh):</strong> {{ $building->usage_kwh }}</p>
            <p class="card-text"><strong>State:</strong> {{ $building->state }}</p>
        </div>
    </div>

    <a href="{{ route('buildings.index') }}" class="btn btn-primary mt-3">Back to Building List</a>
</div>
@endsection
