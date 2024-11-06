<?php

namespace App\Http\Controllers;

use App\Models\Tariff;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index(Request $request)
    {
        $query = Building::query();

        // Search by Building Type
        if ($request->filled('building_type')) {
            $query->where('building_type', $request->building_type);
        }

        // Search by State
        if ($request->filled('state')) {
            $query->where('state', $request->state);
        }

        // Sorting
        if ($request->filled('sort_by')) {
            $sortBy = $request->sort_by;
            $sortDirection = $request->filled('sort_direction') && $request->sort_direction === 'desc' ? 'desc' : 'asc';

            $query->orderBy($sortBy, $sortDirection);
        }

        $buildings = $query->get();

        return view('buildings.index', compact('buildings'));
    }


    public function create()
    {
        return view('buildings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string',
            'building_type' => 'required|in:Commercial,Residential',
            'month' => 'required|string',
            'usage_kwh' => 'required|integer',
            'state' => 'required|string',
        ]);

        Building::create($request->all());

        return redirect()->route('buildings.index')
            ->with('success', 'Building added successfully.');
    }

    public function show(Building $building)
    {
        return view('buildings.show', compact('building'));
    }

    public function edit(Building $building)
    {
        return view('buildings.edit', compact('building'));
    }

    public function update(Request $request, Building $building)
    {
        $request->validate([
            'customer_name' => 'required|string',
            'building_type' => 'required|in:Commercial,Residential',
            'month' => 'required|string',
            'usage_kwh' => 'required|integer',
            'state' => 'required|string',
        ]);

        $building->update($request->all());

        return redirect()->route('buildings.index')
            ->with('success', 'Building updated successfully.');
    }

    public function destroy(Building $building)
    {
        $building->delete();
        return redirect()->route('buildings.index')
            ->with('success', 'Building deleted successfully.');
    }

    public function report()
    {
        $buildings = Building::all();

        // Calculate the bill for each building
        $buildings->each(function ($building) {
            $building->bill = $this->calculateBill($building->building_type, $building->usage_kwh);
        });

        return view('buildings.report', compact('buildings'));
    }


    private function calculateBill($buildingType, $usageKwh)
    {
        $tariff = Tariff::where('building_type', $buildingType)->first();

        if (!$tariff) {
            return 0; // Return 0 if no tariff is set for the building type
        }

        $bill = 0;

        if ($usageKwh <= 200) {
            $bill = $usageKwh * $tariff->rate_for_first_200_kwh;
        } else {
            $bill = (200 * $tariff->rate_for_first_200_kwh) + (($usageKwh - 200) * $tariff->rate_above_200_kwh);
        }

        return round($bill, 2); // Round to 2 decimal places
    }
}
