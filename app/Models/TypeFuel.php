<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeFuel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = false;

    public function fuel()
    {
        return $this->belongsTo(Fuel::class, 'id', 'id');
    }
}
