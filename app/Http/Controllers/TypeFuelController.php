<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeFuel\StoreRequest;
use App\Models\Fuel;
use App\Models\NortType;
use App\Models\TypeFuel;
use App\Models\User;
use App\Notifications\FuelApplication;
use App\Services\TypeFuels\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class TypeFuelController extends Controller
{
    public Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function type_fuels()
    {
        $types = $this->service->show();
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
        $users = User::where('role_id', 1)->get();

        Notification::send($users, new FuelApplication($data['number_fuel'], Fuel::find($data['fuel_id'])->name, Auth::user()->name));
        $type = TypeFuel::orderBy('id', 'desc')->first();
        $norts = DB::table('notifications')->select('id')->orderBy('id', 'desc')->limit(count($users))->get();

        $data = array();

        foreach ($norts as $nort)
        {
            $data [] = [
                'type_id' => $type->id,
                'nort_id' => $nort->id,
            ];
        }

        foreach ($data as $item)
        {
            NortType::create($item);
        }

        return redirect()->route('home.index');
    }

    public function update(TypeFuel $type)
    {

        $type->status = 1;
        $type->update();
        $type->refresh();

        $users = User::where('role_id', 1)->get();
        $norts = NortType::where('type_id', $type->id)->get();
        /*dd($norts);*/
        foreach ($users as $user) {
            foreach ($user->unreadNotifications as $notification) {
                foreach ($norts as $nort){
                    if ($notification->id == $nort->nort_id){
                        $notification->markAsRead();
                    }
                }
            }
        }

        $types = $this->service->show();
        return redirect()->route('type_fuel.index', $types);
    }
}
