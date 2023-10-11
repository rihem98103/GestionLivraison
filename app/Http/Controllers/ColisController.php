<?php

namespace App\Http\Controllers;

use App\Models\Colis;
use App\Models\Client;
use Illuminate\Http\Request;

class ColisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coliss=Colis::all();
        return view("colis.index",compact('coliss'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients=Client::all();
        return view('colis.create',compact('clients'));
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
            'nom' => 'required|unique|string|min:3|max:150',
            'poids' => 'required|numeric',
            'nbre' => 'required|numeric',
            'prix' => 'required|numeric',
           // 'total' => 'required|numeric',
            'client_id' => 'required',
           // 'livraison_id' => 'required',
            
            ]);

            $inputs=$request->all();
            //traitement du champ photo
            

            //insertion d'un nouveau produit dans la base de données
            Colis::create($inputs);

            return redirect()->route('colis.index')
->with('success','colis créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Colis  $colis
     * @return \Illuminate\Http\Response
     */
    public function show(Colis $colis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Colis  $colis
     * @return \Illuminate\Http\Response
     */
    public function edit(Colis $coli)
    {
        $clients=Client::all();
        //$livraisons=Livraison::all();
        //dd($colis);
       //dd($clients);
        return view('colis.edit',compact('coli','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Colis  $colis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Colis $coli)
    {
        $request->validate([
            'nom' => 'required|string|min:3|max:150',
            'poids' => 'required|numeric',
            'nbre' => 'required|numeric',
            'prix' => 'required|numeric',
            'client_id' => 'required|numeric',
           // 'livraison_id' => 'required',
            ]);
            
            $coli->update($request->all());
            $coli->save();

            return redirect()->route('colis.index')
        ->with('success','Colis modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Colis  $colis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Colis $coli)
    {
        $coli->delete();
        return redirect()->route('colis.index')
        ->with('success','colis supprimée avec succès.');
    }
}