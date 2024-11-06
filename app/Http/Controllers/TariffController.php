<?php

namespace App\Http\Controllers;

use App\Models\Tariff;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    public function index()
    {
        $tariffs = Tariff::all();
        return view('tariffs.index', compact('tariffs'));
    }

    public function edit(Tariff $tariff)
    {
        return view('tariffs.edit', compact('tariff'));
    }

    public function update(Request $request, Tariff $tariff)
    {
        $request->validate([
            'rate_for_first_200_kwh' => 'required|numeric',
            'rate_above_200_kwh' => 'required|numeric',
        ]);

        $tariff->update($request->only('rate_for_first_200_kwh', 'rate_above_200_kwh'));

        return redirect()->route('tariffs.index')
            ->with('success', 'Tariff updated successfully.');
    }
}
