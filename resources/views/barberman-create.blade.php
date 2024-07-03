
@extends('layouts.app_dashboard')

@section('content')
<div class="container mx-auto mt-10">
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-4">Create New Barberman</h1>
        <form action="{{ route('barberman.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
                <select name="user_id" id="user_id" class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="outlet_id" class="block text-sm font-medium text-gray-700">Outlet</label>
                <select name="outlet_id" id="outlet_id" class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                    @foreach ($outlets as $outlet)
                        <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Create Barberman</button>
        </form>
    </div>
</div>
@endsection
