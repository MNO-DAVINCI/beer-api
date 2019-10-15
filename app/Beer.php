<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    protected $fillable = array('name', 'description', 'style', 'volume', 'abv');
}
