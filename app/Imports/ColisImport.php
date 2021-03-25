<?php

namespace App\Imports;

use App\Colis;
use Maatwebsite\Excel\Concerns\ToModel;

class ColisImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Colis([
            'fournisseur_id' => $row[0],
            'nomclient'      => $row[1],
            'prenom'         => $row[1],
            'adresseclient'  => $row[3],
            'codepostale'    => $row[4],
            'numclient'      => $row[5],
            'gouvernorat'    => $row[6],
            'numclient2'     => $row[7],
            'cr'             => $row[8],
            'service'        => $row[9],
            'poid'           => $row[10],
            'taille'         => $row[11],
            'nbrpiece'       => $row[12],
            'remarque'       => $row[13],
        ]);
    }
}
