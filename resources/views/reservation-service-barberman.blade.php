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
            <h3>Step 2/3 - Choose service & barberman</h3>
            <form class="flex flex-col" action="{{ route('reservation') }}" method="GET">
                @csrf
                <div style="position: absolute; left: -9999px;">
                    <input type="text" name="outlet" value="{{$outlet}}">
                </div>
                <div class="mb-4 w-full">
                    <label for="layanan" class="text-sm font-medium text-gray-700">Layanan</label>
                    <select name="layanan" id="layanan"
                        class="mt-1 p-2 w-full bg-gray-100 shadow-sm sm:text-sm border-gray-100 rounded-md" required>
                        @foreach($layanan as $service)
                            <option class="mt-1 p-2 w-full bg-gray-100 shadow-sm sm:text-sm border-gray-100 rounded-md"
                                value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4 w-full">
                    <label for="service_time" class="text-sm font-medium text-gray-700">Service Time</label>
                    <input type="datetime-local" name="service_time" id="service_time"
                        class="mt-1 p-2 w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="barberman" class="block text-sm font-medium text-gray-700">Barberman</label>
                    <input type="hidden" name="barberman" id="selectedBarberman">
                    <div class="barberman-selection">
                        @foreach($barbermen as $barberman)
                            <div class="barberman-box" data-name="{{$barberman->id}}">
                                <p>{{$barberman->user->name}}</p>
                                <img src="{{asset($barberman->user->photo_path)}}">
                            </div>
                        @endforeach
                    </div>
                    <style>
                        .barberman-selection {
                            display: flex;
                            flex-wrap: wrap;
                            gap: 16px;
                        }

                        .barberman-box {
                            border: 1px solid #ccc;
                            border-radius: 8px;
                            padding: 16px;
                            display: flex;
                            flex-direction: row;
                            gap: 7px;
                            text-align: center;
                            cursor: pointer;
                            transition: transform 0.3s, box-shadow 0.3s;
                        }

                        .barberman-box img {
                            max-width: 100px;
                            height: auto;
                            /* border-radius: 50%; */
                            clip-path: circle();
                            margin-bottom: 8px;
                        }

                        .barberman-box:hover {
                            transform: scale(1.05);
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                        }

                        .barberman-box.selected {
                            border-color: #007bff;
                            background-color: #e9f7ff;
                        }
                    </style>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const barbermanBoxes = document.querySelectorAll('.barberman-box');
                            const selectedBarbermanInput = document.getElementById('selectedBarberman');

                            barbermanBoxes.forEach(box => {
                                box.addEventListener('click', function () {
                                    // Remove the 'selected' class from all boxes
                                    barbermanBoxes.forEach(box => box.classList.remove('selected'));

                                    // Add the 'selected' class to the clicked box
                                    this.classList.add('selected');

                                    // Update the hidden input   with the selected barberman's name
                                    selectedBarbermanInput.value = this.dataset.name;
                                });
                            });
                        });
                    </script>
                </div>

                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">NEXT</button>
            </form>
        </div>

        <div class="mt-10">
            <h1 class="text-2xl font-semibold mb-4">Reservations List</h1>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Service Time</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Layanan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Barberman</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservation as $reservation_item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation_item->time }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation_item->layanan->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation_item->barberman->user->name }}</td>
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
