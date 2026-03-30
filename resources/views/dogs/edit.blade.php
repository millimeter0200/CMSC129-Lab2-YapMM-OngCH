@extends('layouts.app')

@section('content')

<h2 class="text-xl font-semibold mb-4">Edit Dog</h2>

<form action="{{ route('dogs.update', $dog) }}" method="POST"
      class="bg-white p-6 rounded-xl shadow space-y-4">
    @csrf
    @method('PUT')

    <!-- Dog Name -->
    <input type="text" name="name"
        value="{{ old('name', $dog->name) }}"
        class="w-full border p-2 rounded @error('name') border-red-500 @enderror">

    @error('name')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror


    <!-- Location -->
    <input type="text" name="location_name"
        value="{{ old('location_name', $dog->location->name) }}"
        class="w-full border p-2 rounded @error('location_name') border-red-500 @enderror">

    @error('location_name')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror


    <!-- Temperament -->
    <input type="text" name="temperament"
        value="{{ old('temperament', $dog->temperament) }}"
        class="w-full border p-2 rounded @error('temperament') border-red-500 @enderror">

    @error('temperament')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror


    <!-- Gender -->
    <select name="gender"
        class="w-full border p-2 rounded @error('gender') border-red-500 @enderror">
        <option value="">Select Gender</option>
        <option value="Male"
            {{ old('gender', $dog->gender) == 'Male' ? 'selected' : '' }}>
            Male
        </option>
        <option value="Female"
            {{ old('gender', $dog->gender) == 'Female' ? 'selected' : '' }}>
            Female
        </option>
    </select>

    @error('gender')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror


    <!-- Color -->
    <input type="text" name="color"
        value="{{ old('color', $dog->color) }}"
        class="w-full border p-2 rounded @error('color') border-red-500 @enderror">

    @error('color')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror


    <!-- Buttons -->
    <div class="flex gap-3 pt-2">

        <button type="submit"
            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Update
        </button>

        <a href="{{ route('dogs.index') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Back
        </a>

    </div>

</form>

@endsection