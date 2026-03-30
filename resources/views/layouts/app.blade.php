<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPV Dog Tracker</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Pixel Font Import (Google Fonts Example) -->
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-blue-100 to-yellow-100 min-h-screen" style="font-family: 'Press Start 2P', cursive;">

    <!-- HEADER -->
    <div class="bg-white shadow-md px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800">
            🐶 UPV Dog Tracker
        </h1>

        <div class="flex gap-3">
            <a href="{{ route('dogs.index') }}"
               class="bg-gray-200 px-4 py-2 rounded-lg hover:bg-gray-300 transition">
                Home
            </a>

            <a href="{{ route('dogs.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition shadow">
                + Add Dog
            </a>

            <a href="{{ route('dogs.trashed') }}"
               class="bg-yellow-400 px-4 py-2 rounded-lg hover:bg-yellow-500 transition shadow">
                Trash
            </a>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="max-w-5xl mx-auto p-6">
        @yield('content')
    </div>

</body>
</html>
