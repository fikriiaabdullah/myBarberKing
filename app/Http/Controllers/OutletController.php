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
}
