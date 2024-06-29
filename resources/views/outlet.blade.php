@extends('layouts.app_dashboard')

@section('title', 'Outlet')

@section('content')
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4" role="alert">
                <p class="text-sm">{{ session('success') }}</p>
            </div>
        @endif
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-semibold mb-4">Outlet Page</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($outlet as $item)
                <div class="col-span-4 border p-4 rounded-md shadow-md flex justify-between items-center">
                    <div>
                        <h3 class="font-semibold">{{ $item->name }}</h3>
                        <p>Location : {{ $item->address }}</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('outlet.edit', $item->id) }}" class="text-blue-500 hover:text-blue-700 mr-8">
                            <img src="{{ asset('assets/img/svg/edit-1479-svgrepo-com.svg') }}" alt="Edit" class="w-6 h-6">
                        </a>
                        <form action="{{ route('outlet.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 mr-5">
                                <img src="{{ asset('assets/img/svg/delete-svgrepo-com.svg') }}" alt="Delete" class="w-6 h-6">
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="flex justify-between items-center mb-2 mt-8">
        <a href="{{ route('outlet.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Tambah Outlet</a>
    </div>
@endsection
