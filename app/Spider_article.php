<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spider_article extends Model
{
    protected $table='spider_article';
    protected $fillable=['gzh_id','contentUrl','title','time','has_done'];
}
