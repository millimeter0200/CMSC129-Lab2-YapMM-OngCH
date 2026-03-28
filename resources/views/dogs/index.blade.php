<h1>UPV Dog Tracker</h1>

<a href="{{ route('dogs.create') }}">Add Dog</a>
<a href="{{ route('dogs.trashed') }}">View Trash</a>
<br><br>

<h3>Search & Filter</h3>

<form method="GET" action="{{ route('dogs.index') }}">
    
    <!-- 🔍 Search -->
    <input 
        type="text" 
        name="search" 
        placeholder="Search by name"
        value="{{ request('search') }}"
    >

    <!-- 🧭 Location Filter -->
    <select name="location">
        <option value="">All Locations</option>
        @foreach($locations as $loc)
            <option value="{{ $loc }}" 
                {{ request('location') == $loc ? 'selected' : '' }}>
                {{ $loc }}
            </option>
        @endforeach
    </select>

    <!-- 🎭 Temperament Filter -->
    <select name="temperament">
        <option value="">All Temperaments</option>
        @foreach($temperaments as $temp)
            <option value="{{ $temp }}" 
                {{ request('temperament') == $temp ? 'selected' : '' }}>
                {{ $temp }}
            </option>
        @endforeach
    </select>

    <button type="submit">Apply</button>
</form>

<br>

<ul>
@foreach($dogs as $dog)
    <li>
        {{ $dog->name }} - {{ $dog->location->name }} ({{ $dog->temperament }})
        <a href="{{ route('dogs.edit', $dog) }}">Edit</a>
        <form action="{{ route('dogs.destroy', $dog) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
@endforeach
</ul>