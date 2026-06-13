<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::with('country')->orderBy('name')->get();

        return view('cities.index', compact('cities'));
    }

    public function create()
    {
        return view('cities.create', ['countries' => $this->countryOptions()]);
    }

    public function store(Request $request)
    {
        City::create($this->validateData($request));

        return redirect()->route('cities.index')->with('status', 'City created.');
    }

    public function edit(City $city)
    {
        return view('cities.edit', ['city' => $city, 'countries' => $this->countryOptions()]);
    }

    public function update(Request $request, City $city)
    {
        $city->update($this->validateData($request));

        return redirect()->route('cities.index')->with('status', 'City updated.');
    }

    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('cities.index')->with('status', 'City deleted.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'country_id' => ['required', 'exists:countries,id'],
            'name' => ['required', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:255'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
        ]);
    }

    private function countryOptions()
    {
        return Country::orderBy('name')->get(['id', 'name']);
    }
}
