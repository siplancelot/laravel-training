<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'customer_name',
        'car_id',
        'days',
        'total_price'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
