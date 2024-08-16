<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;


    public function inventories() {
        return $this->hasMany(Inventory::class);
    }


    function getStock($id) {
        $stock = $this->where('id', $id)->first();
        return  $stock;
    }
}
