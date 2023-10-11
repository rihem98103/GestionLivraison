<?php

namespace App\Http\Controllers;

use App\Models\Livreur;
use App\Models\Livraison;
use Illuminate\Http\Request;

class LivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livraisons=Livraison::all();
        return view("livraison.index",compact('livraisons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $livreurs=Livreur::all();
        return view('livraison.create',compact('livreurs'));
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
            'prix' => 'required',
            'datedepart' => 'required',
            'datearrive' => 'required',
            'livreur_id' => 'required',
            ]);

            $inputs=$request->all();
            Livraison::create($inputs);

            return redirect()->route('livraison.index')
->with('success','livraison créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function show(Livraison $livraison)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function edit(Livraison $livraison)
    {
        $livreurs=Livreur::all();
        return view('livraison.edit',compact('livraison','livreurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Livraison $livraison)
    {
        $request->validate([
            'etat' => 'required',
            'prix' => 'required',
            'datedepart' => 'required',
            'datearrive' => 'required',
            'livreur_id' => 'required',
            ]);
            $livraison->update($request->all());

            return redirect()->route('livraison.index')
->with('success','livraison modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livraison $livraison)
    {
        $livraison->delete();
        return redirect()->route('livraison.index')
        ->with('success','livraison supprimée avec succès.');
    }
}