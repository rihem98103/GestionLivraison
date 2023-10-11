<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
    
    
   

class ClientController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
           /*  $clients=Client::all();
            return view("client.index",compact('clients')); */
            $utilisateur = Client::all();
            return $utilisateur;
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
           // $categories=Category::all();
            return view('client.create');
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
                'status' => 'required',
                'photo' => 'required|image|mimes:png,jpg,svg,gif|max:2048',
                'email' => 'required',
                'adresse' => 'required|string|min:3|max:150',
                'tel' => 'required|min:8|max:8'
                //'category_id' => 'required|numeric',
                ]);
    
                $inputs=$request->all();
                //traitement du champ photo
                if($photo=$request->file('photo')){
                //changer le nom du fichier par un nom unique
                $newname=time().'.'.$photo->getClientOriginalExtension();
                //copier un fichier parcouru dans mon projet
                $photo->move("images/clients/",$newname);
                $inputs['photo']=$newname;
                }
    
                //insertion d'un nouveau produit dans la base de données
                Client::create($inputs);
    
                return redirect()->route('client.index')
    ->with('success','Client créé avec succès.');
        }
    
        /**
         * Display the specified resource.
         *
         * @param  \App\Models\Client  $client
         * @return \Illuminate\Http\Response
         */
        public function show(Client $client)
        {
            //
        }
    
        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\Client  $client
         * @return \Illuminate\Http\Response
         */
        public function edit(Client $client)
        {
            //$categories=Category::all();
            return view('client.edit',compact('client'));
    
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Models\Client  $client
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
         
           $request->validate([
                'cin' => 'required|min:8|max:8',
                'nom' => 'required|string|min:3',
                'prenom' => 'required',
                'status' => 'required',
                'photo' => 'sometimes|image|mimes:png,jpg,svg,gif|max:2048',
                'email' => 'required',
                'adresse' => 'required',
                'tel' => 'required|min:8|max:8'
                ]);
          /*  $client->update($request->all());  */ 
            $data= Client::find($id); 
        $data->cin=$request->input('cin');
      $data->nom=$request->input('nom');
      $data->prenom=$request->input('prenom');
         $data->status=$request->input('status');
          $data->email=$request->input('email');
         $data->adresse=$request->input('adresse');
       $data->tel=$request->input('tel');
    
     if($request->hasfile('photo'))
     {$destination='images/clients/'.$data->photo;
     $file=$request->file('photo');
     $extension=$file->getClientOriginalExtension();
     $filename=time().'.'.$extension;
     $file->move('images/clients/',$filename);
     $data->photo=$filename;

     }
    $data->save();

            return redirect()->route('client.index')
            ->with('success','Client modifié avec succès.'); 
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Client  $client
         * @return \Illuminate\Http\Response
         */
        public function destroy(Client $client)
        {
            $client->delete();
            return redirect()->route('client.index')
            ->with('success','client supprimée avec succès.');
    
        }
        public function search(Request $request){
            $search=$request->input('search') ;
           // if($search!=""){
        $clients=Client::query('nom','LIKE',"%{$search}%")
        ->orwhere('email','LIKE',"%{$search}%")->get();
       /* }else{
             $clients=Client::all();
            }
        $data=compact('client','search');*/
           
        return view('client.index',compact('clients'));
        }


    }
    
    