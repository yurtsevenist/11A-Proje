<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function getUser()
    {
        return $this->hasOne('App\Models\User', 'id', 'cid');
    }
    public function getProduct()
    {
        return $this->hasOne('App\Models\Product', 'id', 'pid');
    }

}
