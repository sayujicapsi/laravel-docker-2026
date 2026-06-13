<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::orderBy('name')->get();

        return view('countries.index', compact('countries'));
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        Country::create($data);

        return redirect()->route('countries.index')->with('status', 'Country created.');
    }

    public function edit(Country $country)
    {
        return view('countries.edit', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        $data = $this->validateData($request, $country);

        $country->update($data);

        return redirect()->route('countries.index')->with('status', 'Country updated.');
    }

    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('countries.index')->with('status', 'Country deleted.');
    }

    private function validateData(Request $request, ?Country $country = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('countries', 'name')->ignore($country?->id)],
            'code' => ['required', 'string', 'size:2', Rule::unique('countries', 'code')->ignore($country?->id)],
            'capital' => ['nullable', 'string', 'max:255'],
            'currency' => ['nullable', 'string', 'max:255'],
        ]);
    }
}
