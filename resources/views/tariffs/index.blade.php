@extends('layouts.app')
@section('breadcrumbs')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Building Management', 'url' => route('buildings.index')],
            ['label' => 'Tariff Editor']
        ]
    ])
@endsection
@section('content')
<div class="container">
    <h2 class="mt-4">Tariff Editor</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Building Type</th>
                <th>Rate for First 200 kWh (RM)</th>
                <th>Rate Above 200 kWh (RM)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tariffs as $tariff)
                <tr>
                    <td>{{ $tariff->building_type }}</td>
                    <td>{{ $tariff->rate_for_first_200_kwh }}</td>
                    <td>{{ $tariff->rate_above_200_kwh }}</td>
                    <td>
                        <a href="{{ route('tariffs.edit', $tariff->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('buildings.index') }}" class="btn btn-secondary mt-3">Back to Building List</a>
</div>
@endsection
