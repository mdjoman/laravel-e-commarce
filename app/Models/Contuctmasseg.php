<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contuctmasseg extends Model
{
    use HasFactory;
    public function Order(){
        return $this->belongsTo('App\Models\Order');
    }
}
