<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Colis;
use App\Fournisseur;
use Illuminate\Support\Facades\Auth;

class ColisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form(Request $request)
    {

        $input = $request->all();
        unset($input['_token']);
        $colis = new Colis();
        $colis->fournisseur_id = $request->fournisseur_id;
        $colis->nomclient = $request->nomclient;
        $colis->prenom = $request->prenom;
        $colis->adresseclient = $request->adresseclient;
        $colis->codepostale = $request->codepostale;
        $colis->numclient = $request->numclient;
        $colis->gouvernorat = $request->gouvernorat;
        $colis->numclient2 = $request->numclient2;
        $colis->cr = $request->cr;
        $colis->service = $request->service;
        $colis->poid = $request->poid;
        $colis->taille = $request->taille;
        $colis->nbrpiece = $request->nbrpiece;
        $colis->remarque = $request->remarque;
        $colis->save();
        return back()->with('success', 'Le colis a eté créé avec succés!');
        // response()->json([
        //     'msg' => 'the [colis] has been created succefully ',
        //     'success' => 1],
        //      200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Colis::create($request->all());
        return response()->json(
            [
                'msg' => 'un nouveau colis a été créé',
                'success' => 1
            ],
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_colis($id)
    {
        $colis = Colis::where('id', $id)->first();
        return response()->json(
            [
                'colis' => $colis
            ],
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_created_colis()
    {
            $colis = Colis::where(['fournisseur_id' => Auth::user()->id, 'etat' => 'crée'])->get();
            return view('Dashboard/\createdcolis',[
            'colis'=> $colis
            ]);

    }

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
        Colis::where('id', $id)->delete();
        $response = [
            'msg' => 'un colis a été supprimé',
            'success' => 1,
            'status' => 200
        ];
        return response()->json($response, $response['status']);
    }


    public function test(Request $request)
    {
        $input = $request->all();
        dd($input);

        return 'hello';
    }

}
