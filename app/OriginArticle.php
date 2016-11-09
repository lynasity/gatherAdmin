<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OriginArticle extends Model
{
    protected $table='originArticle';
    protected $fillable=['title','gzh_id','digest','content','url','has_done','date'];
}
