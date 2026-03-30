@extends('layouts.app')

@section('content')

<h2 class="text-xl font-semibold mb-4">Add Dog

    <a href="{{ route('dogs.index') }}"
    class="bg-gray-300 px-4 py-2 rounded">
        < Back
    </a>
</h2>

<form action="{{ route('dogs.store') }}" method="POST" class="bg-white p-6 rounded-xl shadow space-y-4">
    @csrf

    <input type="text" name="name" placeholder="Dog Name" class="w-full border p-2 rounded">

    <input type="text" name="location_name" placeholder="Location" class="w-full border p-2 rounded">

    <input type="text" name="temperament" placeholder="Temperament" class="w-full border p-2 rounded">

    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Save
    </button>

    <!-- Gender -->
    <select name="gender" class="border rounded-lg px-3 py-2">
        <option value="">Select Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>

    <!-- Color -->
    <input type="text" name="color"
        placeholder="Color"
        class="border rounded-lg px-3 py-2">
    </form>
   

@endsection


