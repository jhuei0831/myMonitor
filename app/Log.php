<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'log';

    protected $primaryKey = 'id';

    protected $fillable = [
        "user", "ip", "os", "browser", "browser_detail", "action", "table", "data", "created_at", "updated_at"
    ];
}
