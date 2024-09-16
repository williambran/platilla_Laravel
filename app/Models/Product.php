<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'products';


    protected $dates = [
        'created_at',
        'updated_at'
    ];



    public function modelProduct() {
        return $this->belongsTo(ModelProduct::class, 'model_id');
    }

    public function details() {
        return $this->hasMany(Detail::class);
    }
    
}
