<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redirect extends Model
{
    protected $fillable = [
        'slug', 'redirect_to'
    ];
}
