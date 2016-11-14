<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFeedback extends Model
{
    protected $connection='feeds';
    protected $table='userfeedback';
    protected $fillable=['has_read','username','feedback'];
}
