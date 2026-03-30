@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">

    <!-- Dog Name -->
    <h2 class="text-2xl font-bold mb-4">
        {{ $dog->name }}
    </h2>

    <!-- Details -->
    <div class="text-gray-700 space-y-1 mb-4">

        <p><strong>Location:</strong> {{ $dog->location->name }}</p>

        <p><strong>Temperament:</strong> {{ $dog->temperament }}</p>

        <p><strong>Gender:</strong> {{ $dog->gender }}</p>

        <p><strong>Color:</strong> {{ $dog->color }}</p>

    </div>

    <!-- Actions -->
    <div class="flex gap-3 mt-4">

        <a href="{{ route('dogs.edit', $dog) }}"
           class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
            Edit
        </a>

        <a href="{{ route('dogs.index') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Back
        </a>

    </div>

</div>

@endsection