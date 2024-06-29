@extends('layouts.app_dashboard')

@section('title', 'Edit Barberman')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-semibold mb-4">Edit Barberman</h2>

        <form method="POST" action="{{ route('barberman.update', $barberman->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Barberman</label>
                <input type="text" id="name" name="name" value="{{ $barberman->user->name ?? 'N/A' }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" disabled>
            </div>

            <div class="mb-4">
                <label for="outlet" class="block text-sm font-medium text-gray-700">Outlet</label>
                <select id="outlet" name="outlet_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                    @foreach($outlets as $outlet)
                        <option value="{{ $outlet->id }}" {{ $outlet->id == $barberman->outlet_id ? 'selected' : '' }}>{{ $outlet->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end mt-4">
                <a href="{{ route('barberman') }}" class="mr-4 bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-md">Cancel</a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Update Barberman</button>
            </div>
        </form>
    </div>
@endsection
