<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Colis;
use COM;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paiements=Paiement::all();
        return view("paiement.index",compact('paiements'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colis=Colis::all();
        return view('paiement.create',compact('colis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'etat' => 'required|string|min:3|max:150',
            'modepaiement' => 'required',
            'colis_id' => 'required',
            ]);

            $inputs=$request->all();
          
            

            //insertion d'un nouveau produit dans la base de données
            Paiement::create($inputs);

            return redirect()->route('paiement.index')
->with('success','paiement créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function show(Paiement $paiement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function edit(Paiement $paiement)
    {
        $colis=Colis::all();
        return view('paiement.edit',compact('paiement','colis'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paiement $paiement)
    {
        $request->validate([
            'etat' => 'required',
            'modepaiement' => 'required',
            'colis_id' => 'required',
            ]);
            $paiement->update($request->all());

            return redirect()->route('paiement.index')
->with('success','Produit modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paiement $paiement)
    {
        $paiement->delete();
        return redirect()->route('paiement.index')
        ->with('success','paiement supprimée avec succès.');

    }
}