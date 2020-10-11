<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    protected $primaryKey = 'counter_id';
    protected $guarded = [];
}
