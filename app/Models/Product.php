<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function getOrder()
    {
        return $this->hasMany('App\Models\Order', 'pid', 'id');
    }
}
