<?php

namespace App\Http\Controllers;

use App\Models\TypeFuel;
use Illuminate\Http\Request;

class TypeFuelController extends Controller
{
    public function fuels()
    {
        $types = TypeFuel::all();
        //dd($types);

        return view('type-fuel.type-fuels', compact('types'));
    }
}
