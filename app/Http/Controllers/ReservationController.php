<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Layanan;
use App\Models\Barberman;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

        $reservation = Reservation::select('time', 'layanan_id', 'barberman_id')->where('outlet_id', $request->outlet)->get();
        $barbermanReserved = $reservation[0]->barberman_id;
        for($i = 1; $i<count($reservation); $i++){
            $item = $reservation[$i];
            $barbermanReserved = $barbermanReserved . ',' . $item->barberman_id;
        }
        Log::info($barbermanReserved);

        //checking further
        $isLegal = true;
        $validation_isBarbermanReserved = validator::make($request->all(),[
            'barberman' => ['in:' . $barbermanReserved]
        ]);

        if(!$validation_isBarbermanReserved->fails()){
            foreach($reservation as $item){
                $startTime = Carbon::parse($item->time);
                $endTime = (clone $startTime)->addMinutes(20);
                Log::info('checking A: ' . $startTime);
                $validator1 = validator::make($request->all(),[
                    'service_time' => ['before:' . $startTime->subMinutes(20)]
                ]);

                if($validator1->fails()){
                    Log::info('Test A Failed, trying B: ' . $endTime);
                    $validator2 = validator::make($request->all(), [
                        'service_time' => ['after:' . $endTime]
                    ]);

                    if($validator2->fails()){
                        $isLegal = false;
                        break;
                    }
                }else{
                    break;
                }
            }
        }

        if($isLegal){
            $layanan = $request->layanan;
            $barbermen = $request->barberman;
            $outlet = $request->outlet;
            $service_time = $request->service_time;
            return view('reservation', compact('layanan', 'barbermen', 'outlet', 'service_time'));
        }else{
            $reservation = Reservation::select('time', 'layanan_id', 'barberman_id')->where('outlet_id', $request->outlet)->get();
            $layanan = Layanan::all();
            $barbermen = Barberman::where('outlet_id', $request->outlet)->get();
            $outlet = $request->outlet;
            return view('reservation-service-barberman', compact('outlet', 'layanan', 'barbermen', 'reservation'));
        }
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

        $reservation = Reservation::select('time', 'layanan_id', 'barberman_id')->where('outlet_id', $request->outlet)->get();
        $layanan = Layanan::all();
        $barbermen = Barberman::where('outlet_id', $request->outlet)->get();
        $outlet = $request->outlet;

        return view('reservation-service-barberman', compact('outlet', 'layanan', 'barbermen', 'reservation'));
    }
    public function show()
    {
        $barberman = Barberman::where('user_id', Auth::id())->first();
        $reservation = Reservation::where('barberman_id', $barberman->id)->get(); // Adjust this according to your actual retrieval logic

        return view('reservation-show', [
            'reservation' => $reservation,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'service_time' => 'required|date_format:Y-m-d\TH:i',
            'layanan' => 'required|exists:layanan,id',
            'barberman' => 'required|exists:barberman,id',
            'outlet' => 'required|exists:outlet,id',
            'phone' => 'required|regex:/^[0-9]+$/'
        ]);

        Reservation::create([
            'name' => $request->name,
            'time' => $request->service_time,
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
