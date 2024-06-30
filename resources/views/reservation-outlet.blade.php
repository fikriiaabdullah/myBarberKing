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
            <h3>Step 1/3 - Choose outlet</h3>
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4" role="alert">
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
            @endif
            <form class="flex flex-col" action="{{ route('reservation.service.barberman') }}" method="GET">
                @csrf
                <div class="mb-4">
                    <input type="hidden" name="outlet" id="selectedOutlet">
                    <div class="outlet-selection">
                        @foreach($outlet as $outlet_item)
                            <div class="outlet-box" data-name="{{$outlet_item->id}}">
                                <div class="flex flex-col">
                                    <h6 class="font-semibold">{{$outlet_item->name}}</h6>
                                    <p>{{$outlet_item->address}}</p>
                                </div>
                                <img src="{{asset($outlet_item->photo_path)}}">
                            </div>
                        @endforeach
                    </div>
                    <style>
                        .outlet-selection {
                            display: flex;
                            flex-wrap: wrap;
                            gap: 16px;
                        }

                        .outlet-box {
                            border: 1px solid #ccc;
                            max-width: 500px;
                            border-radius: 8px;
                            padding: 16px;
                            display: flex;
                            flex-direction: row;
                            gap: 7px;
                            text-align: left;
                            cursor: pointer;
                            transition: transform 0.3s, box-shadow 0.3s;
                        }

                        .outlet-box img {
                            max-width: 200px;
                            height: auto;
                            /* border-radius: 50%; */
                            clip-path: xywh(0 5px 100% 75% round 15% 0);
                        }

                        .outlet-box:hover {
                            transform: scale(1.05);
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                        }

                        .outlet-box.selected {
                            border-color: #007bff;
                            background-color: #e9f7ff;
                        }
                    </style>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const outletBoxes = document.querySelectorAll('.outlet-box');
                            const selectedOutletInput = document.getElementById('selectedOutlet');

                            outletBoxes.forEach(box => {
                                box.addEventListener('click', function () {
                                    // Remove the 'selected' class from all boxes
                                    outletBoxes.forEach(box => box.classList.remove('selected'));

                                    // Add the 'selected' class to the clicked box
                                    this.classList.add('selected');

                                    // Update the hidden input   with the selected outlet's name
                                    selectedOutletInput.value = this.dataset.name;
                                });
                            });
                        });
                    </script>
                </div>

                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Next</button>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/jplugins.js') }}"></script>
    <script src="{{ asset('assets/js/init.js') }}"></script>
</body>

</html>