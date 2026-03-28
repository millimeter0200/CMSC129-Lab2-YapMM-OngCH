<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\Location;
use Illuminate\Http\Request;

class DogController extends Controller
{
    public function index(Request $request)
    {
        $query = Dog::with('location');

        // 🔍 Search by name
        if ($request->search) {
            $query->where('name', 'ILIKE', '%' . $request->search . '%');
        }

        // 🧭 Filter by location
        if ($request->location) {
            $query->whereHas('location', function ($q) use ($request) {
                $q->where('name', $request->location);
            });
        }

        // 🎭 Filter by temperament
        if ($request->temperament) {
            $query->where('temperament', $request->temperament);
        }

        $dogs = $query->latest()->get();

        // get all unique values for filters
        $locations = Location::pluck('name');
        $temperaments = Dog::select('temperament')->distinct()->pluck('temperament');

        return view('dogs.index', compact('dogs', 'locations', 'temperaments'));
    }

    public function create()
    {
        return view('dogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location_name' => 'required',
            'temperament' => 'required',
        ]);

        // find or create location
        $location = Location::firstOrCreate([
            'name' => $request->location_name
        ]);

        Dog::create([
            'name' => $request->name,
            'location_id' => $location->id,
            'temperament' => $request->temperament,
        ]);

        return redirect()->route('dogs.index')->with('success', 'Dog added!');
    }

    public function show(Dog $dog)
    {
        return view('dogs.show', compact('dog'));
    }

    public function edit(Dog $dog)
    {
        return view('dogs.edit', compact('dog'));
    }

    public function update(Request $request, Dog $dog)
    {
        $request->validate([
            'name' => 'required',
            'location_name' => 'required',
            'temperament' => 'required',
        ]);

        // find or create location
        $location = Location::firstOrCreate([
            'name' => $request->location_name
        ]);

        $dog->update([
            'name' => $request->name,
            'location_id' => $location->id,
            'temperament' => $request->temperament,
        ]);

        return redirect()->route('dogs.index')->with('success', 'Dog updated!');
    }

    public function destroy(Dog $dog)
    {
        $dog->delete();
        return redirect()->route('dogs.index')->with('success', 'Dog deleted!');
    }
    public function trashed()
    {
        $dogs = Dog::onlyTrashed()->with('location')->get();
        return view('dogs.trashed', compact('dogs'));
    }

    public function restore($id)
    {
        $dog = Dog::onlyTrashed()->findOrFail($id);
        $dog->restore();

        return redirect()->route('dogs.trashed')->with('success', 'Dog restored!');
    }

    public function forceDelete($id)
    {
        $dog = Dog::onlyTrashed()->findOrFail($id);
        $dog->forceDelete();

        return redirect()->route('dogs.trashed')->with('success', 'Dog permanently deleted!');
    }
}