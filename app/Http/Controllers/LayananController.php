<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();
        return view('layanan', compact('layanan'));
    }
    public function create()
    {
        return view('layanan-create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        Layanan::create($request->all());

        return redirect()->route('layanan')->with('success', 'Layanan created successfully.');
    }
    public function edit(Layanan $layanan)
    {
        return view('layanan-edit', compact('layanan'));
    }

    public function update(Request $request, Layanan $layanan)
    {
        // Validation if needed
        $layanan->update($request->only(['name', 'price']));

        return redirect()->route('layanan')->with('success', 'Layanan updated successfully.');
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();
        return redirect()->route('layanan')->with('success', 'Layanan deleted successfully.');
    }
}
