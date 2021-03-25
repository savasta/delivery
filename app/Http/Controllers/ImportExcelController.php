<?php

namespace App\Http\Controllers;

use App\Imports\ColisImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{
    public function import(Request $request)
    {
        $this->validate($request, [
            'select_file'  =>   'required|mimes:xls,xlsx'
        ]);
        $path = $request->file('select_file')->getRealPath();
        $mi = new ColisImport;

        $array = Excel::toArray($mi, $request->file('select_file'));
        // dd($array);
        // $data = Excel::import(new ColisImport,$path);
        // dd($data);

        if($data->count() > 0)
        {
            foreach($data->toArray() as $key => $value)
            {
                foreach($value as $row)
                {
                    $isertdata[] = array(
                        'fournisseur_id' => $row['fournisseur_id'],
                        'nomclient'      => $row['nomclient'],
                        'prenom'         => $row['prenom'],
                        'adresseclient'  => $row['adresseclient'],
                        'codepostale'    => $row['codepostale'],
                        'numclient'      => $row['numclient'],
                        'gouvernorat'    => $row['gouvernorat'],
                        'numclient2'    => $row['numclient2'],
                        'cr'             => $row['cr'],
                        'service'       => $row['service'],
                        'poid'           => $row['poid'],
                        'taille'        => $row['taille'],
                        'nbrpiece'       => $row['nbrpiece'],
                        'remarque'       => $row['remarque']
                    );
                }
            }

            if(!empty($inset_data))
            {
                DB::table('colis')->insertGetId($inset_data);
            }
        }

        return back()->with('success','Les données du fichier est importées avec succès'  );
    }
}
