<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Table</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 overflow-x-auto">
    <div class="container mx-auto mt-10">
        <div class="bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold mb-4">Create Reservation</h1>
            <h3>Step 3/3 - Choose service & barberman</h3>
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4"
                    role="alert">
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
            @endif
            <form class="flex flex-col" action="{{ route('reservation.store') }}" method="POST">
                @csrf
                <div style="position: absolute; left: -9999px;">
                    <input type="text" name="outlet" value="{{$outlet}}">
                </div>
                <div style="position: absolute; left: -9999px;">
                    <input type="text" name="layanan" value="{{$layanan}}">
                </div>
                <div style="position: absolute; left: -9999px;">
                    <input type="text" name="barberman" value="{{$barbermen}}">
                </div>
                <div style="position: absolute; left: -9999px;">
                    <input type="datetime-local" name="service_time" value="{{$service_time}}">
                </div>
                <div class="mb-4 w-full">
                    <label for="name" class="text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name"
                        class="mt-1 p-2 w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                        required>
                </div>
                <div class="mb-4 w-full">
                    <label for="phone" class="text-sm font-medium text-gray-700">Phone</label>
                    <input type="tel" name="phone" id="phone"
                        class="mt-1 p-2 w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                        required>
                </div>

                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Create
                    Reservation</button>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/jplugins.js') }}"></script>
    <script src="{{ asset('assets/js/init.js') }}"></script>
</body>

</html>
