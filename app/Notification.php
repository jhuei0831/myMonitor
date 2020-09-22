<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';

    protected $primaryKey = 'id';

    protected $fillable = [
        "user_id", "channel_id", "title", "icon" , "message", "footer", "width", 
    ];
}
