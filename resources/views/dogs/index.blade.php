
@extends('layouts.app')

@section('content')

<h2 class="text-xl font-semibold mb-4 text-gray-700">Search & Filter</h2>

<form method="GET" action="{{ route('dogs.index') }}" class="flex flex-wrap gap-3 mb-6">

    <input type="text" name="search" placeholder="Search by name"
        value="{{ request('search') }}"
        class="border rounded-lg px-3 py-2 w-48">

    <select name="location" class="border rounded-lg px-3 py-2">
        <option value="">All Locations</option>
        @foreach($locations as $loc)
            <option value="{{ $loc }}" {{ request('location') == $loc ? 'selected' : '' }}>
                {{ $loc }}
            </option>
        @endforeach
    </select>

    <select name="temperament" class="border rounded-lg px-3 py-2">
        <option value="">All Temperaments</option>
        @foreach($temperaments as $temp)
            <option value="{{ $temp }}" {{ request('temperament') == $temp ? 'selected' : '' }}>
                {{ $temp }}
            </option>
        @endforeach
    </select>

    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 shadow">
        Apply
    </button>

</form>

<!-- DOG LIST -->
<div class="grid gap-4">
@foreach($dogs as $dog)
    <div class="bg-white p-4 rounded-xl shadow flex justify-between items-center">

        <div>
            <p class="font-bold text-lg">{{ $dog->name }}</p>
            <p class="text-gray-600 text-sm">
                {{ $dog->location->name }} • {{ $dog->temperament }}
            </p>
        </div>

        <div class="flex gap-2">

            <a href="{{ route('dogs.edit', $dog) }}"
               class="bg-gray-200 px-3 py-1 rounded hover:bg-gray-300">
                Edit
            </a>

            <form action="{{ route('dogs.destroy', $dog) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                    Delete
                </button>
            </form>

        </div>

    </div>
@endforeach
</div>

@endsection


