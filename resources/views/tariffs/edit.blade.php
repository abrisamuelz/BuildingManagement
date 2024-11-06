@extends('layouts.app')
@section('breadcrumbs')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Building Management', 'url' => route('buildings.index')],
            ['label' => 'Tariff Editor', 'url' => route('tariffs.index')],
            ['label' => 'Edit Tariff']
        ]
    ])
@endsection
@section('content')
<div class="container">
    <h2 class="mt-4">Edit Tariff for {{ $tariff->building_type }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tariffs.update', $tariff->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="rate_for_first_200_kwh" class="form-label">Rate for First 200 kWh (RM)</label>
            <input type="text" class="form-control" id="rate_for_first_200_kwh" name="rate_for_first_200_kwh" value="{{ old('rate_for_first_200_kwh', $tariff->rate_for_first_200_kwh) }}" required>
        </div>

        <div class="mb-3">
            <label for="rate_above_200_kwh" class="form-label">Rate Above 200 kWh (RM)</label>
            <input type="text" class="form-control" id="rate_above_200_kwh" name="rate_above_200_kwh" value="{{ old('rate_above_200_kwh', $tariff->rate_above_200_kwh) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('tariffs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
