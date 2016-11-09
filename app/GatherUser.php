<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GatherUser extends Model
{
	protected $connection = 'feeds';
    protected $table='users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email','images',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
