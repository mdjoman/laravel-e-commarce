<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    public function Order(){
        return $this->belongsTo('App\Models\Order');
    }
    public function Shiping(){
        return $this->belongsTo('App\Models\Shiping');
    }
}
