<?php

namespace App\Http\Controllers;

use App\Models\Fuel;
use App\Services\Fuels\Service;

class FuelController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function fuels()
    {
        $fuels = $this->service->fuels();

        return view('fuel.fuels', compact('fuels'));
    }

    public function show(Fuel $fuel)
    {
        $types = $this->service->show($fuel);

        return view('fuel.show', compact('fuel', 'types'));
    }

    public function create()
    {
        return view('fuel.create');
    }
    public function store()
    {
        //total_number
        $data = request()->validate([
            'name' => 'required|string',
            'total_number' => 'required|numeric|between:0,1000'
        ]);

        $this->service->store($data);

        return redirect()->route('fuels.index');
    }

    public function confirm(Fuel $fuel)
    {
        return view('fuel.confirm', compact('fuel'));
    }

    public function destroy(Fuel $fuel)
    {
        $fuel->delete();
        return redirect()->route('fuels.index');
    }
}
