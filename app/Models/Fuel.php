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

    public function types()
    {
        return $this->hasMany(TypeFuel::class, 'fuel_id', 'id');
    }

    public function calculationRemaining_fuel(): float
    {
        $tmp_total = $this->total_number;
        foreach ($this->types as $type) {
            $tmp_total -= $type->number_fuel;
        }
        return $tmp_total;
    }
}
