@extends('layouts.app_dashboard')

@section('title', 'Edit Outlet')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-semibold mb-4">Edit Outlet</h2>

        <form method="POST" action="{{ route('outlet.update', $outlet->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4 text-center">
                <img src="{{ asset($outlet->photo_path  ) }}" alt="{{ $outlet->name }}" class="w-25 h-25 object-cover-full mx-auto mb-4">
                <label for="photo" class="block text-sm font-medium text-gray-700">Change Photo</label>
                <div class="relative mt-1">
                    <input type="file" id="photo" name="photo" class="hidden">
                    <label for="photo" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 cursor-pointer">
                        <i data-feather="camera" class="absolute top-1/2 transform -translate-y-1/2 right-3 text-gray-400 transition-colors duration-300" style="color: gray;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='gray'"></i>
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Outlet</label>
                <input type="text" id="name" name="name" value="{{ $outlet->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                <input type="text" id="address" name="address" value="{{ $outlet->address }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            </div>

            <div class="flex justify-end mt-4">
                <a href="{{ route('outlet') }}" class="mr-4 bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-md" style="text-decoration: none;">Cancel</a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Update Outlet</button>
            </div>
        </form>
    </div>
@endsection
