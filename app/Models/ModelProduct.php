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
        return $this->belongsTo(Inventory::class, 'model_id','id');
    }

    public function products() {
        return $this->hasMany(Product::class)->where('model_codeID', $this->codeID);
    }

    public function supplier(){
        return $this->hasMany(ModelSupplier::class);
    }
}
