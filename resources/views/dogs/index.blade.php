@extends('layouts.app')

@section('content')

<!-- TITLE + FILTERS -->
<div class="flex items-center gap-6 mb-6">

    <!-- Title -->
    <h2 class="text-2xl md:text-3xl font-semibold text-gray-700 whitespace-nowrap">
        Dog List
    </h2>

    <!-- Filters -->
    <form method="GET" action="{{ route('dogs.index') }}"
          class="flex items-center gap-3 max-w-xl">

        <input type="text" name="search" placeholder="Search"
            value="{{ request('search') }}"
            class="flex-1 border rounded-lg px-3 py-2 h-10 text-xs" style="width: 100px">

        <select name="location" class="border rounded-lg px-3 py-2">
            <option value="">All Locations</option>
            @foreach($locations as $id => $name)
                <option value="{{ $id }}" {{ request('location') == $id ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>

        <select name="temperament" class="flex-1 border rounded-lg px-3 py-2 h-10 text-xs" style="width: 235px">
            <option value="">All Temperaments</option>
            @foreach($temperaments as $temp)
                <option value="{{ $temp }}" {{ request('temperament') == $temp ? 'selected' : '' }}>
                    {{ $temp }}
                </option>
            @endforeach
        </select>

        <button class="bg-blue-500 text-white px-4 h-10 rounded-lg hover:bg-blue-600 shadow">
            Apply
        </button>

    </form>

</div>

<!-- DOG LIST -->
<div class="grid gap-4">
@foreach($dogs as $dog)
    <div class="bg-white p-4 rounded-xl shadow flex justify-between items-center">

        <!-- Dog Info -->
        <div>
            <p class="font-bold text-lg">{{ $dog->name }}</p>
            <div class="text-gray-600 text-sm space-y-1">

                <!-- Location + Temperament -->
                <p>
                    {{ $dog->location->name }} • {{ $dog->temperament }}
                </p>

                <!-- Gender + Color -->
                <p>
                    {{ $dog->gender }} • {{ $dog->color }}
                </p>

            </div>
        </div>

        <!-- Actions -->
        <div class="flex gap-2">

            <a href="{{ route('dogs.edit', $dog) }}"
               class="bg-gray-200 px-3 py-1 rounded hover:bg-gray-300">
                Edit
            </a>

            <form action="{{ route('dogs.destroy', $dog) }}" method="POST"
                onsubmit="return confirm('Are you sure you want to delete this dog?')">
                @csrf
                @method('DELETE')

                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                    Delete
                </button>
            </form>

        </div>

    </div>

    <div class="mt-6 flex justify-center">
        {{ $dogs->links() }}
    </div>
@endforeach
</div>

@endsection