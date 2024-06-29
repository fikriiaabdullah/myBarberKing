@extends('layouts.app_dashboard')

@section('title', 'Edit Layanan')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-semibold mb-4">Edit Layanan</h2>

        <form method="POST" action="{{ route('layanan.update', $layanan->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Layanan</label>
                <input type="text" id="name" name="name" value="{{ $layanan->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="text" id="price" name="price" value="{{ $layanan->price }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            </div>

            <div class="flex justify-end mt-4">
                <a href="{{ route('layanan') }}" class="mr-4 bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-md">Cancel</a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Update Layanan</button>
            </div>
        </form>
    </div>
@endsection
