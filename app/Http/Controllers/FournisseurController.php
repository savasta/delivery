<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fournisseur;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $fournisseur = new Fournisseur();
        $fournisseur->nomsociete = $request->nomsociete;
        $fournisseur->expediteur = $request->expediteur;
        $fournisseur->tel = $request->tel;
        $fournisseur->email = $request->email;
        $fournisseur->adresse_livraison = $request->adresse_livraison;
        $fournisseur->adresse= $request->adresse;
        $fournisseur->gouvernorat = $request->gouvernorat;
        $fournisseur->prix_livraison = $request->prix_livraison;
        $fournisseur->prix_retour = $request->prix_retour;
        $fournisseur->mdp = $request->mdp;
        $fournisseur->proofcin = $request->proofcin;
        $fournisseur->proofpatente = $request->proofpatente;
        $fournisseur->save();
        return response()->json([
            'msg' => 'un nouveau fournisseur a été ajouté',
            'success' => 1],
             200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get_privider($id)
    {
        $provider=Fournisseur::where('id',$id)->first();
        return response()->json([
            'provider' => $provider],
             200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fournisseur::where('id', $id)->delete();
        $response = [
            'msg' => 'le fournisseur a été supprimé',
            'success' => 1,
            'status' => 200
        ];
        return response()->json($response, $response['status']);
    }
}
