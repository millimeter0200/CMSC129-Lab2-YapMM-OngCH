@extends('layouts.app')

@section('content')

<h2 class="text-xl font-semibold mb-4">Edit Dog</h2>

<form action="{{ route('dogs.update', $dog) }}" method="POST" class="bg-white p-6 rounded-xl shadow space-y-4">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $dog->name }}" class="w-full border p-2 rounded">

    <input type="text" name="location_name" value="{{ $dog->location->name }}" class="w-full border p-2 rounded">

    <input type="text" name="temperament" value="{{ $dog->temperament }}" class="w-full border p-2 rounded">

    <div class="flex gap-3">

        <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Update
        </button>

        <a href="{{ route('dogs.index') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Back
        </a>

    </div>

</form>

@endsection
