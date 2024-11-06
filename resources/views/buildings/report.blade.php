@extends('layouts.app')

@section('breadcrumbs')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Building Management', 'url' => route('buildings.index')],
            ['label' => 'Bill Report']
        ]
    ])
@endsection

@section('content')
<div class="container">
    <h2 class="mt-4">Building Bill Report</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Building Type</th>
                <th>Usage (kWh)</th>
                <th>Bill (RM)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buildings as $building)
                <tr>
                    <td>{{ $building->id }}</td>
                    <td>{{ ucwords(strtolower($building->customer_name)) }}</td>
                    <td>{{ $building->building_type }}</td>
                    <td>{{ $building->usage_kwh }}</td>
                    <td>{{ $building->bill }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('buildings.index') }}" class="btn btn-secondary mt-3">Back to Building List</a>
</div>
@endsection
