<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function index()
    {
        $outlet = Outlet::all();
        return view('outlet', compact('outlet'));
    }
    public function create()
    {
        return view('outlet-create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        Outlet::create($request->all());

        return redirect()->route('outlet')->with('success', 'Outlet created successfully.');
    }
    public function edit(Outlet $outlet)
    {
        return view('outlet-edit', compact('outlet'));
    }

    public function update(Request $request, Outlet $outlet)
    {
        // Validation if needed
        $outlet->update($request->only(['name', 'address']));

        return redirect()->route('outlet')->with('success', 'Outlet updated successfully.');
    }

    public function destroy(Outlet $outlet)
    {
        $outlet->delete();
        return redirect()->route('outlet')->with('success', 'Outlet deleted successfully.');
    }

}
