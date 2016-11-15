<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spider_article extends Model
{
    protected $table='spider_article';
    protected $fillable=['gzh_name','contentUrl','gzh_name','time','has_done','title'];
}
