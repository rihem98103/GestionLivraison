<?php

namespace App\Http\Controllers;

use App\Models\Livreur;
use Illuminate\Http\Request;

class LivreurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livreurs=Livreur::all();
            return view("livreur.index",compact('livreurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livreur.create');
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
            'cin' => 'required|numeric',
            'nom' => 'required|string|min:3|max:150',
            'prenom' => 'required',
            'photo' => 'required|image|mimes:png,jpg,speg,gif,webp|max:2048',
            'email' => 'required',
            'adresse' => 'required|string|min:3|max:150',
            'tel' => 'required |numeric',
            'typepermis' => 'required'
            
            //'category_id' => 'required|numeric',
            ]);

            $inputs=$request->all();
            //traitement du champ photo
            if($photo=$request->file('photo')){
            //changer le nom du fichier par un nom unique
            $newname=time().'.'.$photo->getClientOriginalExtension();
            //copier un fichier parcouru dans mon projet
            $photo->move("images/livreurs/",$newname);
            $inputs['photo']=$newname;
            }

            //insertion d'un nouveau produit dans la base de données
            Livreur::create($inputs);

            return redirect()->route('livreur.index')
->with('success','Livreur créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livreur  $livreur
     * @return \Illuminate\Http\Response
     */
    public function show(Livreur $livreur)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Livreur  $livreur
     * @return \Illuminate\Http\Response
     */
    public function edit(Livreur $livreur)
    {
          return view('livreur.edit',compact('livreur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Livreur  $livreur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*$request->validate([
            'cin' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'photo' => 'required',
            'email' => 'required',
            'adresse' => 'required',
            'tel' => 'required',
            'typepermis' => 'required',
            
            //'category_id' => 'required|numeric',
            ]);
            $livreur->update($request->all());*/
            $data= Livreur::find($id); 
            $data->cin=$request->input('cin');
            $data->nom=$request->input('nom');
            $data->prenom=$request->input('prenom');
            $data->email=$request->input('email');
            $data->adresse=$request->input('adresse');
             $data->typepermis=$request->input('typepermis');
            $data->tel=$request->input('tel');
            
            if($request->hasfile('photo'))
            {$destination='images/livreurs/'.$data->photo;
            $file=$request->file('photo');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('images/livreurs/',$filename);
            $data->photo=$filename;
            
            }
            $data->save();
                return redirect()->route('livreur.index')
    ->with('success','Livreur modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livreur  $livreur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livreur $livreur)
    {
        $livreur->delete();
            return redirect()->route('livreur.index')
            ->with('success','livreur supprimée avec succès.');
    }
}