<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crime extends Model
{
    //
    protected $fillable = [
        'case_name', 'photo', 'location', 'user_id', 'start_date', 'status', 'detail'
    ];
}
