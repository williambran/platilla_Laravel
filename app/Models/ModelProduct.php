<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ModelProduct extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'models';

    public function inventario(){
        return $this->belongsTo(Inventory::class, 'inventorie_id');
    }

    public function products() {
        return $this->hasMany(Product::class, 'model_id');
    }

    public function supplier(){
        return $this->hasMany(ModelSupplier::class, 'model_id');
    }
}
