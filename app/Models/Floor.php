<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    public function branch()
    {
        return $this->hasOne('App\Models\Branch','id','branch_id');
    }
 
}
