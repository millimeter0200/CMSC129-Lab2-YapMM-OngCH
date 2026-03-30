@extends('layouts.app')

@section('content')

<h2 class="text-xl font-semibold mb-4">Edit Dog
    <a href="{{ route('dogs.index') }}"
    class="bg-gray-300 px-4 py-2 rounded">
        < Back
    </a>
</h2>

<form action="{{ route('dogs.update', $dog) }}" method="POST" class="bg-white p-6 rounded-xl shadow space-y-4">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $dog->name }}" class="w-full border p-2 rounded">

    <input type="text" name="location_name" value="{{ $dog->location->name }}" class="w-full border p-2 rounded">

    <input type="text" name="temperament" value="{{ $dog->temperament }}" class="w-full border p-2 rounded">

    <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
        Update
    </button>

</form>

@endsection
