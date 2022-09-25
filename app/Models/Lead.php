<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    public function links(){
        return $this->hasMany(Link::class,'lead_id','id');
    }
    public function medias(){
        return $this->hasMany(Media::class,'lead_id','id');
    }
}
