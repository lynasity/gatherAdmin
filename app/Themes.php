<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Themes extends Model
{
      protected $connection='feeds';
      protected $table='themes';
      protected $fillable=['theme_name'];
      protected
      $hidden=['created_at','updated_at'];
}
