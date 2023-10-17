<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fuel extends Model
{
    use HasFactory;

    use HasFactory;
    use SoftDeletes;

    public $guarded = false;

    /*public function types()
    {
        return $this->belongsToMany(TypeFuel::class, 'type_fuels', 'fuel_id', 'id');
    }*/
}
