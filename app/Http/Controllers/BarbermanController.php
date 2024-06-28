<?php

namespace App\Http\Controllers;

use App\Models\Barberman;
use Illuminate\Http\Request;

class BarbermanController extends Controller
{
    public function index()
    {
        $barbermen = Barberman::with(['user' => function($query) {
            $query->where('role', 'barberman');
        }, 'outlet'])->get();

        // Filtering out any records where the related user is null
        $barbermen = $barbermen->filter(function($barberman) {
            return $barberman->user !== null;
        });


        return view('barberman', compact('barbermen'));
    }
}
