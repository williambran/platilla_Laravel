<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;


    public function stock() {
        return $this->belongsTo(Stock::class);
    }

    public function modelProducts(){
        return $this->belongsTo(ModelProduct::class);
    }
}
