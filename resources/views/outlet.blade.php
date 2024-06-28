@extends('layouts.app')

@section('title', 'Outlet')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-semibold mb-4">Outlet Page</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($outlet as $item)
                <div class="col-span-4 border p-4 rounded-md shadow-md">
                    <h3 class="font-semibold">{{ $item->name }}</h3>
                    <p>Location : {{ $item->address }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
