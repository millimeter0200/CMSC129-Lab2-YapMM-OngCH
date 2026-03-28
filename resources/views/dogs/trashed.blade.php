<h1>Trashed Dogs</h1>

<a href="{{ route('dogs.index') }}">Back to List</a>

<ul>
@foreach($dogs as $dog)
    <li>
        {{ $dog->name }} - {{ $dog->location->name }}

        <form action="{{ route('dogs.restore', $dog->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('PATCH')
            <button type="submit">Restore</button>
        </form>

        <form action="{{ route('dogs.forceDelete', $dog->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Permanently</button>
        </form>
    </li>
@endforeach
</ul>