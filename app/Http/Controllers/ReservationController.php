<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Layanan;
use App\Models\Barberman;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function Reservation()
    {
        $reservation = Reservation::with('layanan', 'barberman')->latest()->get();
        $layanan = Layanan::all();
        $barbermen = Barberman::with('user')->get();
        $outlet = Outlet::all();

        return view('reservation', compact('reservation', 'layanan', 'barbermen', 'outlet'));

    }
    public function show()
    {
        $reservation = Reservation::all(); // Adjust this according to your actual retrieval logic

        return view('reservation-show', [
            'reservation' => $reservation,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'service_time' => 'required|date',
            'layanan' => 'required|exists:layanan,id',
            'barberman' => 'required|exists:barberman,id',
            'outlet' => 'required|exists:outlet,id',
        ]);

        $reservation = Reservation::create([
            'name' => $request->name,
            'service_time' => $request->service_time,
            'layanan_id' => $request->layanan,
            'barberman_id' => $request->barberman,
            'outlet_id' => $request->outlet,
        ]);

        return redirect()->back()->with('success', 'Reservation created successfully!');
    }
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservation')->with('success', 'Reservation deleted successfully.');
    }
}
