<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TallaDetail extends Model
{
    use HasFactory;

    public function talla() {
        return $this->belongsTo(Talla::class);
    }

    public function detail() {
        return $this->belongsTo(Detail::class);
    }
}
