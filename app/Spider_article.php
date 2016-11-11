<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spider_article extends Model
{
    protected $table='spider_article';
    protected $fillable=['gzh_id','gzh_name','contentUrl','title','time','has_done'];
}
