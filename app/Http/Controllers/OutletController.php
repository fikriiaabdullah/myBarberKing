<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        Outlet::create([
            'name' => $request->name,
            'address' => $request->address,
            'photo_path' => 'storage/outletPictures/default_house.jpg'
        ]);

        return redirect()->route('outlet')->with('success', 'Outlet created successfully.');
    }
    public function edit(Outlet $outlet)
    {
        return view('outlet-edit', compact('outlet'));
    }

    public function update(Request $request, Outlet $outlet)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Update the outlet with validated data
        $outlet->update($validatedData);

        // Handle the file upload if a photo is provided
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');

            // Generate a unique filename
            $fileName = time() . '_' . $photo->getClientOriginalName();

            // Store the file in the 'public/outletPictures' directory
            $filePath = $photo->storeAs('outletPictures', $fileName, 'public');

            // Optionally, delete the old photo if it exists
            if ($outlet->photo_path) {
                Storage::disk('public')->delete(str_replace('storage/', '', $outlet->photo_path));
            }

            // Update the outlet's photo_path
            $outlet->photo_path = 'storage/' . $filePath;
        }

        // Save the changes
        $outlet->save();

        // Redirect back to the outlet route with a success message
        return redirect()->route('outlet')->with('success', 'Outlet updated successfully.');
    }


    public function destroy(Outlet $outlet)
    {
        $outlet->delete();
        return redirect()->route('outlet')->with('success', 'Outlet deleted successfully.');
    }

}
