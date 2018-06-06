<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParcAuto extends Model
{
    protected $table = 'parc_auto';

    protected $fillable = [
        'soferi_id', 'denumire_auto', 'numar_inmatriculare', 'tonaj', 'km', 'revizie', 'an_fabricatie'
    ];

    protected $guarded = [];

    public function soferi() {
        return $this->belongsTo(Soferi::class);
    }


}
