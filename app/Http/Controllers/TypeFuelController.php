<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeFuel\StoreRequest;
use App\Models\Fuel;
use App\Models\TypeFuel;
use App\Models\User;
use App\Services\TypeFuels\Service;
use Illuminate\Support\Facades\DB;

class TypeFuelController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
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
        $type->delete();
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
        return redirect()->route('home.index');
    }

}
