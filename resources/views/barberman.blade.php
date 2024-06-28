@extends('layouts.app')

@section('title', 'Barberman')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-semibold mb-4">Barberman Page</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($barbermen as $barberman)
                <div class="col-span-4 border p-4 rounded-md shadow-md">
                    <h3 class="font-semibold">{{ $barberman->user->name }}</h3>
                    <p>Outlet: {{ $barberman->outlet->name }}</p>
                    <p>{{ $barberman->outlet->address }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
