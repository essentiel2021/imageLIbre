<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class source extends Model
{
    use HasFactory;
    public function photo(){
        return $this->belongsTo(source::class);
    }
}
