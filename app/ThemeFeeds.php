<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThemeFeeds extends Model
{
     protected $connection='feeds';
     protected $table='themefeeds';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'theme_id', 'title','description','date','organization',
    ];}
