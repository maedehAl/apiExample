<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class episode extends Model
{
    protected $fillable=[
        'title','body','videoUrl','number'
    ];
}
