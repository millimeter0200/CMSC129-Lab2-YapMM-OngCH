<h1>Add Dog</h1>

<form action="{{ route('dogs.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Dog Name">

    <input 
        type="text" 
        name="location_name" 
        placeholder="Enter location"
    >

    <input type="text" name="temperament" placeholder="Temperament">

    <button type="submit">Save</button>
</form>