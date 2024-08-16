<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelProduct extends Model
{
    use HasFactory;

    public function inventario(){
        return $this->hasMany(Inventory::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function supplier(){
        return $this->hasMany(ModelSupplier::class);
    }
}
