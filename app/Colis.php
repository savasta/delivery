<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colis extends Model
{
    protected $fillable = [
        '_token',
    ];


    public function fourniseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }

}
