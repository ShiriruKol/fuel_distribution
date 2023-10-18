<?php

namespace App\Services\Fuels;

use App\Models\Fuel;
use Illuminate\Support\Facades\DB;

class Service
{
    public function fuels()
    {
        return Fuel::all();
    }

    public function show(Fuel $fuel)
    {
        $types = $fuel->types;
        foreach ($types as $key => $type){
            $user = DB::table('users')->select( 'name')->where('id', $type->user_id)->get();
            $types[$key]['user_name'] = $user[0]->name;
        }
        return $types;
    }

    public function store($data)
    {
        try {
            Db::beginTransaction();
            Fuel::create($data);

            DB::commit();

        }catch (\Exception $exception)
        {
            DB::rollBack();
            return $exception->getMessage();
        }
        return true;
    }
}
