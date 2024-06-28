<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Baru</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 py-10">
    <div class="max-w-md mx-auto bg-white p-8 rounded shadow-lg">
        <h2 class="text-2xl font-bold mb-4 text-center">Reservasi Baru</h2>
        <form  class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="name" name="name" required>
            </div>
            <div>
                <label for="time" class="block text-sm font-medium text-gray-700">Waktu</label>
                <input type="datetime-local" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="time" name="time" required>
            </div>
            <div>
                <label for="layanan_id" class="block text-sm font-medium text-gray-700">Layanan</label>
                <select class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="layanan_id" name="layanan_id" required>
                    <option value="1">Layanan 1</option>
                    <option value="2">Layanan 2</option>
                    <!-- Tambahkan opsi layanan lainnya sesuai kebutuhan -->
                </select>
            </div>
            <div>
                <label for="barberman_id" class="block text-sm font-medium text-gray-700">Barberman</label>
                <select class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="barberman_id" name="barberman_id" required>
                    <option value="1">Barberman 1</option>
                    <option value="2">Barberman 2</option>
                    <!-- Tambahkan opsi barberman lainnya sesuai kebutuhan -->
                </select>
            </div>
            <div>
                <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Reservasi
                </button>
            </div>
        </form>
    </div>

    <!-- Tailwind CSS (Jika Anda ingin menambahkan lebih banyak styling) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.js"></script> -->
</body>

</html>
