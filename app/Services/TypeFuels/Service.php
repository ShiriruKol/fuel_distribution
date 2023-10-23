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
}
