<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPV Dog Tracker</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-blue-100 to-yellow-100 min-h-screen flex items-center justify-center font-sans">

    <div class="bg-white shadow-xl rounded-2xl p-10 text-center max-w-md">
        <h1 class="text-3xl font-bold text-gray-800 mb-3">
            🐶 UPV Dog Tracker
        </h1>

        <p class="text-gray-600 mb-6">
            Track, manage, and care for campus dogs easily.
        </p>

        <a href="{{ route('dogs.index') }}"
           class="inline-block bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition shadow">
            Enter App →
        </a>
    </div>

</body>
</html>
