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

        // SEARCH
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'ilike', "%$search%")
                ->orWhere('gender', 'ilike', "%$search%")
                ->orWhere('color', 'ilike', "%$search%")
                ->orWhere('temperament', 'ilike', "%$search%")
                ->orWhereHas('location', function ($loc) use ($search) {
                    $loc->where('name', 'ilike', "%$search%");
                });
            });
        }

        // FILTER: location
        if ($request->filled('location')) {
            $query->where('location_id', $request->location);
        }

        // FILTER: temperament
        if ($request->filled('temperament')) {
            $query->where('temperament', $request->temperament);
        }

        // PAGINATION 
        $dogs = $query->paginate(10);

        // Keep filters when paginating
        $dogs->appends($request->all());

        return view('dogs.index', [
            'dogs' => $dogs,
            'locations' => Location::pluck('name', 'id'),
            'temperaments' => Dog::select('temperament')->distinct()->pluck('temperament')
        ]);
    }

    public function create()
    {
        return view('dogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string',
            'color' => 'required|string|max:255',
            'location_name' => 'required|string',
            'temperament' => 'required|string',
        ]);

        // find or create location
        $location = Location::firstOrCreate([
            'name' => $request->location_name
        ]);

        Dog::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'color' => $request->color,
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
            'name' => 'required|string|max:255',
            'gender' => 'required|string',
            'color' => 'required|string|max:255',
            'location_name' => 'required|string',
            'temperament' => 'required|string',
        ]);

        // find or create location
        $location = Location::firstOrCreate([
            'name' => $request->location_name
        ]);

        $dog->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'color' => $request->color,
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