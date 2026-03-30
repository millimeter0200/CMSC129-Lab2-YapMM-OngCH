@extends('layouts.app')

@section('content')

<h2 class="text-xl font-semibold mb-4">Trashed Dogs</h2>

<div class="grid gap-4">
@foreach($dogs as $dog)
    <div class="bg-white p-4 rounded-xl shadow flex justify-between items-center">

        <p>{{ $dog->name }} - {{ $dog->location->name }}</p>

        <div class="flex gap-2">

            <form action="{{ route('dogs.restore', $dog->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                    Restore
                </button>
            </form>

            <form action="{{ route('dogs.forceDelete', $dog->id) }}" method="POST"
                onsubmit="return confirm('This will permanently delete the dog. Continue?')">
                @csrf
                @method('DELETE')
                <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                    Delete Permanently
                </button>
            </form>

        </div>

    </div>
@endforeach
</div>

@endsection

