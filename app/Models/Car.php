<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'car_category_id',
        'capacity',
        'price'
    ];

    public function category()
    {
        return $this->belongsTo(CarCategory::class, 'car_category_id');
    }
}
