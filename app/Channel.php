<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $table = 'channels';

    protected $primaryKey = 'id';

    protected $fillable = [
        "uuid", "user_id", "name", "password",
    ];

    protected $hidden = [
        'password'
    ];
}
