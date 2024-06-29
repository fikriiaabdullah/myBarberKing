<!-- resources/views/users/edit.blade.php -->

@extends('layouts.app_dashboard')

@section('title', 'Edit Profile')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-semibold mb-4">Edit Profile</h2>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4" role="alert">
                <p class="text-sm">{{ session('success') }}</p>
            </div>
        @endif

        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4 text-center">
                <img src="{{ asset($user->photo_path) }}" alt="{{ $user->name }}" class="w-25 h-25 object-cover-full mx-auto mb-4">
                <label for="photo" class="block text-sm font-medium text-gray-700">Change Photo</label>
                <div class="relative mt-1">
                    <input type="file" id="photo" name="photo" class="hidden">
                    <label for="photo" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 cursor-pointer">
                        <i data-feather="camera" class="absolute top-1/2 transform -translate-y-1/2 right-3 text-gray-400 transition-colors duration-300" style="color: gray;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='gray'"></i>
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" id="phone" name="phone" value="{{ $user->phone }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            </div>

            <div class="flex justify-between mt-4">
                <button type="submit" class="ml-4 bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Save Changes</button>
                <a href="{{ route('dashboard-' . Auth::user()->role) }}" class="ml-4 bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-md text-center hover:no-underline">Back to Dashboard</a>
            </div>
        </form>
    </div>
@endsection
