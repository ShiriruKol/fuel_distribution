<?php

namespace App\Http\Controllers;

use App\Models\Fuel;
use App\Models\TypeFuel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuelController extends Controller
{
    public function fuels()
    {
        $fuels = Fuel::all();

        return view('fuel.fuels', compact('fuels'));
    }
}
