<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $countries = $user->countries;
        return view('dashboard', ['countries' => $countries]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'ISO' => 'required|string'
        ]);
        $user = auth()->user();
        Country::create(['name' => $request->name, 'ISO' => $request->ISO, 'user_id' => $user->id]);
        return redirect()->back();
    }

    public function update(Request $request, Country $country)
    {
        $data = $request->validate([
            'name' => 'string',
            'ISO' => 'string'
        ]);
        $country->update($data);
        return redirect()->back();
    }

    public function destroy(Request $request, Country $country)
    {
        $country->delete();
        return redirect()->back();
    }
}
