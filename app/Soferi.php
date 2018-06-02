<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soferi extends Model
{
    protected $table = 'soferi';

    protected $guarded = [];

    public function parc()
    {
        return $this->hasOne(ParcAuto::class);
    }
}
