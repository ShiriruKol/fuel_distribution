<?php

namespace App\Services\TypeFuels;

use App\Models\TypeFuel;
use Illuminate\Support\Facades\DB;

class Service
{
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

    public function show()
    {
        $types = TypeFuel::where('status', 0)->get();
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
