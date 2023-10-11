<?php

namespace App\Http\Controllers;

use App\Models\Colis;
use App\Models\Facture;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factures=Facture::all();
        return view("facture.index",compact('factures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colis=Colis::all();
        return view('facture.create',compact('colis'));
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
            'numero' => 'required|numeric',
            
            'date' => 'required|date',
            'colis_id' => 'required',
            ]);

            $inputs=$request->all();

            Facture::create($inputs);

            return redirect()->route('facture.index')
           ->with('success','Facture créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function show(Facture $facture)
    {
        return view('facture.show',compact('facture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function edit(Facture $facture)
    {
        $colis=Colis::all();
        return view('facture.edit',compact('facture','colis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facture $facture)
    {
        $request->validate([
            'numero' => 'required',
            'date' => 'required',
            'colis_id' => 'required',
            ]);
            $facture->update($request->all());

            return redirect()->route('facture.index')
->with('success','facture modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facture $facture)
    {
        $facture->delete();
        return redirect()->route('facture.index')
        ->with('success','facture supprimée avec succès.');
    }
}