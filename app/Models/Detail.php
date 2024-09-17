<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $table = 'details';


    public function tallas(){
        return $this->hasMany(TallaDetail::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
