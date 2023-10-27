<?php

namespace App\Services\TypeFuels;

use App\Models\Fuel;
use App\Models\NortType;
use App\Models\TypeFuel;
use App\Models\User;
use App\Notifications\FuelApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class Service
{
    public function destroy(TypeFuel $typeFuel)
    {
        try {
            Db::beginTransaction();
            $typeFuel->delete();
            DB::commit();

        }catch (\Exception $exception)
        {
            DB::rollBack();
            return $exception->getMessage();
        }
        return true;
    }

    public function store_employee($data)
    {
        try {
            Db::beginTransaction();
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
            DB::commit();

        }catch (\Exception $exception)
        {
            DB::rollBack();
            return $exception->getMessage();
        }
        return true;
    }

    public function update($type)
    {
        try {
            Db::beginTransaction();
            $type->status = 1;
            $type->update();
            $type->refresh();

            $users = User::where('role_id', 1)->get();
            $norts = NortType::where('type_id', $type->id)->get();

            foreach ($users as $user) {
                foreach ($user->unreadNotifications as $notification) {
                    foreach ($norts as $nort){
                        if ($notification->id == $nort->nort_id){
                            $notification->markAsRead();
                        }
                    }
                }
            }
            DB::commit();

        }catch (\Exception $exception)
        {
            DB::rollBack();
            return $exception->getMessage();
        }
        return true;
    }

    public function store($data)
    {
        try {
            Db::beginTransaction();
            TypeFuel::create($data);
            DB::commit();

        }catch (\Exception $exception)
        {
            DB::rollBack();
            return $exception->getMessage();
        }
        return true;
    }

    public function show($types)
    {
        foreach ($types as $key => $type)
        {
            $user = DB::table('users')->select( 'name')->where('id', $type->user_id)->get();
            $types[$key]['user_name'] = $user[0]->name;
            $fuel = DB::table('fuels')->select( 'name')->where('id', $type->fuel_id)->get();
            $types[$key]['fuel_name'] = $fuel[0]->name;
        }
        return $types;
    }
}
