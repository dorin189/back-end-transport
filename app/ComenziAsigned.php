<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComenziAsigned extends Model
{
    use SoftDeletes;

    protected $table = 'comenzi_asigned';

    protected $guarded = [];

    public function sofer() {
        return $this->belongsTo(Soferi::class);
    }

    public function comand() {
        return $this->belongsTo(Comenzi::class, 'comenzi_id');
    }
}
