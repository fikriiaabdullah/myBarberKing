@extends('layouts.app_dashboard')

@section('title', 'Barberman')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
@endsection

@section('content')
@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4" role="alert">
        <p class="text-sm">{{ session('success') }}</p>
    </div>
@endif
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Import Swal from SweetAlert2
    const Swal = window.Swal;
</script>

<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-semibold mb-4">Barberman Page</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($barbermen as $barberman)
            <div class="col-span-4 border p-4 rounded-md shadow-md flex items-center">
                <div>
                    <img style="max-width: 150px; height: auto; clip-path: circle();" src="{{asset($barberman->user->photo_path)}}">
                </div>
                <div class="flex-grow">
                    <h3 class="font-semibold text-lg">{{ $barberman->user->name }}</h3>
                    <p class="text-gray-500 mb-1">Email : {{ $barberman->user->email }}</p>
                    <p class="text-gray-500 mb-1">Outlet: {{ $barberman->outlet->name }}</p>
                    <p class="text-gray-500 mb-1">Joined: {{ $barberman->created_at->format('d M Y') }}</p>
                </div>
                <div class="flex items-center space-x-2">
                    <a href="{{ route('barberman.edit', $barberman->id) }}" class="text-blue-500 hover:text-blue-700 mr-8">
                        <img src="{{ asset('assets/img/svg/edit-1479-svgrepo-com.svg') }}" alt="Edit" class="w-6 h-6">
                    </a>
                    <form id="delete-form-{{ $barberman->id }}" action="{{ route('barberman.destroy', $barberman->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete({{ $barberman->id }})" class="text-red-500 hover:text-red-700 mr-5">
                            <img src="{{ asset('assets/img/svg/delete-svgrepo-com.svg') }}" alt="Delete" class="w-6 h-6">
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="flex justify-between items-center mb-2 mt-8">
    <a href="{{ route('barberman.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md" style="text-decoration: none;">Add Barberman</a>
</div>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Confirm',
            text: 'Are you sure you want to delete this barberman?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endsection
