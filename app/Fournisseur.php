<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    public function colis(){
        $this->hasMany(Colis::class);
    }
}
