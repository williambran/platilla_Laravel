<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $table = 'inventories';



    public function stock() {
        return $this->belongsTo(Stock::class);
    }

    public function modelos() {
        return $this->hasMany(ModelProduct::class, 'inventorie_id','id');
    }
}
