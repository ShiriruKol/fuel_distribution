<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeFuel\StoreRequest;
use App\Models\Fuel;
use App\Models\TypeFuel;
use App\Models\User;
use App\Services\TypeFuels\Service;

class TypeFuelController extends Controller
{
    public Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function type_fuels()
    {
        $types = TypeFuel::where('status', 0)->get();
        $types = $this->service->show($types);
        return view('type_fuel.type_fuels', compact('types'));
    }

    public function create(Fuel $fuel)
    {
        $users = User::all();
        return view('type_fuel.create', compact('fuel', 'users'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('fuels.show', $data['fuel_id']);
    }

    public function destroy(TypeFuel $type)
    {
        $fuel_id = $type->fuel_id;
        $this->destroy($type);
        return redirect()->route('fuels.show', $fuel_id);
    }

    public function create_employee()
    {
        $fuels = Fuel::all();
        return view('type_fuel.create_employee', compact('fuels'));
    }

    public function store_employee(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        $this->service->store_employee($data);

        return redirect()->route('home.index');
    }

    public function update(TypeFuel $type)
    {
        $this->service->update($type);
        $types = TypeFuel::where('status', 0)->get();
        $types = $this->service->show($types);
        return redirect()->route('type_fuel.index', $types);
    }

    public function typeFuelsUser()
    {
        $types = TypeFuel::where('user_id', auth()->user()->id)->get();
        $types = $this->service->show($types);

        return view('type_fuel.user', compact('types'));
    }
}
