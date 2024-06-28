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
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4"
                    role="alert">
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
            @endif
            <form action="{{ route('reservation.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name"
                        class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                        required>
                </div>
                <div class="mb-4">
                    <label for="service_time" class="block text-sm font-medium text-gray-700">Service Time</label>
                    <input type="datetime-local" name="service_time" id="service_time"
                        class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                        required>
                </div>
                <div class="mb-4">
                    <label for="layanan" class="block text-sm font-medium text-gray-700">Layanan</label>
                    <select name="layanan" id="layanan"
                        class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                        required>
                        @foreach($layanan as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="barberman" class="block text-sm font-medium text-gray-700">Barberman</label>
                    <select name="barberman" id="barberman"
                        class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                        required>
                        @foreach($barbermen as $barberman)
                            <option value="{{ $barberman->id }}">{{ $barberman->user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="outlet" class="block text-sm font-medium text-gray-700">Outlet</label>
                    <select name="outlet" id="outlet"
                            class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            required>
                        @foreach($outlet as $outlets)
                            <option value="{{ $outlets->id }}">{{ $outlets->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Create
                    Reservation</button>
            </form>
        </div>
        <div class="mt-10">
            <h1 class="text-2xl font-semibold mb-4">Reservations List</h1>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-gray-200">
                        <tr>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service
                                Time</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Layanan</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Barberman</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Outlet</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservation as $reservation)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->service_time }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->layanan->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->barberman->user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->outlet->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/jplugins.js') }}"></script>
    <script src="{{ asset('assets/js/init.js') }}"></script>
</body>

</html>
