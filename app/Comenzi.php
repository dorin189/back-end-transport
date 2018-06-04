<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comenzi extends Model
{
    use SoftDeletes;

    protected $table = 'comenzi';

    protected $guarded = [];
    protected $dates = ['deleted_at'];

}
