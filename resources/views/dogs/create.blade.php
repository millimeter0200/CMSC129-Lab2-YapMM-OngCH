@extends('layouts.app')

@section('content')

<h2 class="text-xl font-semibold mb-4">Add Dog</h2>

<form action="{{ route('dogs.store') }}" method="POST"
      class="bg-white p-6 rounded-xl shadow space-y-4">
    @csrf

    <!-- Dog Name -->
    <input type="text" name="name" placeholder="Dog Name"
        class="w-full border p-2 rounded">

    <!-- Location -->
    <input type="text" name="location_name" placeholder="Location"
        class="w-full border p-2 rounded">

    <!-- Temperament -->
    <input type="text" name="temperament" placeholder="Temperament"
        class="w-full border p-2 rounded">

    <!-- Gender -->
    <select name="gender"
        class="w-full border p-2 rounded">
        <option value="">Select Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>

    <!-- Color -->
    <input type="text" name="color"
        placeholder="Color"
        class="w-full border p-2 rounded">

    <!-- Buttons -->
    <div class="flex gap-3 pt-2">

        <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Save
        </button>

        <a href="{{ route('dogs.index') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Back
        </a>

    </div>

</form>

@endsection