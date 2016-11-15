<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gzh extends Model
{
    protected $table='gzh';
    protected $fillable=['id','name','historyUrl'];
    protected $hidden=['created_at','updated_at'];
}
