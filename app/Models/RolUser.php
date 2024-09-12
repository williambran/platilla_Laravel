<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolUser extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }


    public function rol() {
        return $this->belongsTo(Rol::class);
    }
}
