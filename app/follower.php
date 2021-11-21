<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class follower extends Model
{
    //
    protected $fillable = [
        'user_id', 'follower_id','follower_name', 'follower_email',
    ];
}
