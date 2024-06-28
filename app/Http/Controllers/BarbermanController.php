<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Outlet;
use App\Models\Barberman;
use Illuminate\Http\Request;

class BarbermanController extends Controller
{
    public function index()
    {
        $barbermen = Barberman::with('user')->get(); // Ambil semua barberman beserta data user-nya

        return view('barberman', compact('barbermen'));
    }
    public function create()
    {
        $users = User::where('role', 'barberman')
                    ->orWhere('role', 'karyawan')
                    ->get(['id', 'name']);
        $outlets = Outlet::all();

        return view('barberman-create', compact('users', 'outlets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'outlet_id' => 'required|exists:outlet,id',
        ]);

        // Create the new barberman
        $barberman = Barberman::create([
            'user_id' => $request->user_id,
            'outlet_id' => $request->outlet_id,
        ]);

        // Check if the user's role is 'karyawan' and update it to 'barberman'
        $user = User::find($request->user_id);
        if ($user && $user->role === 'karyawan') {
            $user->update(['role' => 'barberman']);
        }

        return redirect()->route('barberman')->with('success', 'Barberman created successfully!');
    }
    public function edit(Barberman $barbermen)
    {
        return view('barberman-edit', compact('barbermen'));
    }

    public function update(Request $request, Barberman $barbermen)
    {
        // Validation if needed
        $barbermen->update($request->only(['name', 'outlet']));

        return redirect()->route('barberman')->with('success', 'Barberman updated successfully.');
    }

    public function destroy(Barberman $barbermen)
    {
        $barbermen->delete();
        return redirect()->route('barberman')->with('success', 'Barberman deleted successfully.');
    }

}
