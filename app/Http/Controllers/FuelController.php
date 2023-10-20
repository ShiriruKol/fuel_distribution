<?php

namespace App\Http\Controllers;

use App\Http\Requests\Fuel\StoreRequest;
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

    private function calculationRemaining_fuel($total_number, $types): float
    {
        foreach ($types as $type) {
            $total_number -= $type->number_fuel;
        }
        return $total_number;
    }

    public function show(Fuel $fuel)
    {
        $types = $this->service->show($fuel);

        $remaining_fuel = $this->calculationRemaining_fuel($fuel->total_number, $types);

        return view('fuel.show', compact('fuel', 'types', 'remaining_fuel'));
    }


    public function create()
    {
        return view('fuel.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

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

    public function edit(Fuel $fuel)
    {
        return view('fuel.edit', compact('fuel'));
    }

    public function update(Fuel $fuel, StoreRequest $request)
    {
        $data = $request->validated();

        $fuel->update($data);
        $fuel->refresh();

        return redirect()->route('fuels.index');
    }

}
