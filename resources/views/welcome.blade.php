<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPV Dog Tracker</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>

<body class="m-0 p-0 overflow-hidden">

    <div class="relative w-screen h-screen">

        <!-- Background (now includes title) -->
        <img src="{{ asset('images/welcome-bg.png') }}"
             class="absolute top-0 left-0 w-full h-full object-cover"
             style="image-rendering: pixelated;">

        <!-- Start Button -->

            <a href="{{ route('dogs.index') }}"
                style="
                    position: absolute;
                    top: 270px;
                    left: 50%;
                    transform: translateX(-50%);
                    z-index: 999;
                ">

                <img src="{{ asset('images/start-button.png') }}"
                    style="width: 300px; image-rendering: pixelated;">
            </a>

    </div>

</body>
</html>