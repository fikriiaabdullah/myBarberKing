<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Layanan;
use App\Models\Barberman;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    public function Reservation(Request $request)
    {
        $request->validate([
            'service_time' => 'required|date',
            'layanan' => 'required|exists:layanan,id',
            'barberman' => 'required|exists:barberman,id',
            'outlet' => 'required|exists:outlet,id',
        ]);

        $reservation = Reservation::with('layanan', 'barberman')->latest()->get();
        $layanan = $request->layanan;
        $barbermen = $request->barberman;
        $outlet = $request->outlet;
        $service_time = $request->service_time;
        Log::info($outlet);

        return view('reservation', compact('layanan', 'barbermen', 'outlet', 'service_time'));
    }

    public function chooseOutlet()
    {
        $outlet = Outlet::all();

        return view('reservation-outlet', compact('outlet'));
    }
    public function chooseServiceBarberman(Request $request)
    {
        $request->validate([
            'outlet' => 'required|exists:outlet,id'
        ]);

        $reservation = Reservation::with('layanan', 'barberman')->latest()->get();
        $layanan = Layanan::all();
        $barbermen = Barberman::where('outlet_id', $request->outlet)->get();
        $outlet = $request->outlet;

        return view('reservation-service-barberman', compact('outlet', 'layanan', 'barbermen', 'reservation'));
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
            'phone' => 'required|regex:/^[0-9]+$/'
        ]);

        $reservation = Reservation::create([
            'name' => $request->name,
            'service_time' => $request->service_time,
            'layanan_id' => $request->layanan,
            'barberman_id' => $request->barberman,
            'outlet_id' => $request->outlet,
            'phone_number' => $request->phone
        ]);

        return redirect()->route('reservation.outlet')->with('success', 'Reservation created successfully!');
    }
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservation.show')->with('success', 'Reservation deleted successfully.');
    }
}
