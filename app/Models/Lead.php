<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    public function links(){
        $this->hasMany(Link::class,'lead_id','id');
    }
    public function medias(){
        $this->hasMany(Media::class,'lead_id','id');
    }
}
