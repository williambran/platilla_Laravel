<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Modelo que relaciona supplier y model
class ModelSupplier extends Model
{
    use HasFactory;



    public function suppliers(){
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function modelProducts() {
        return $this->belongsTo(ModelProduct::class, 'model_id');
    }

    

}
