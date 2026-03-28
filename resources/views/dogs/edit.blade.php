<h1>Edit Dog</h1>

<form action="{{ route('dogs.update', $dog) }}" method="POST">
    @csrf
    @method('PUT')

    <input 
        type="text" 
        name="name" 
        value="{{ $dog->name }}"
        placeholder="Dog Name"
    >

    <input 
        type="text" 
        name="location_name" 
        value="{{ $dog->location->name }}"
    >

    <input 
        type="text" 
        name="temperament" 
        value="{{ $dog->temperament }}"
        placeholder="Temperament"
    >

    <button type="submit">Update</button>
</form>