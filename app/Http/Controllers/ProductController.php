<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Colis;
use COM;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view("product.index",compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colis=Colis::all();

        return view('Product.create',compact('colis'));
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
            'nom' => 'required|string|min:3|max:150',
           // 'description' => 'required',
            'photo' => 'required|image|mimes:png,jpg,speg,gif,webp|max:2048',
            'prix' => 'required|numeric',
            'colis_id' => 'required',
            ]);

            $inputs=$request->all();
            //traitement du champ photo
            if($photo=$request->file('photo')){
            //changer le nom du fichier par un nom unique
            $newname=time().'.'.$photo->getClientOriginalExtension();
            //copier un fichier parcouru dans mon projet
            $photo->move("images/products/",$newname);
            $inputs['photo']=$newname;
            }

            //insertion d'un nouveau produit dans la base de données
            Product::create($inputs);

            return redirect()->route('product.index')
->with('success','Produit créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $colis=Colis::all();
        
        return view('product.edit',compact('product','colis'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      /*  $request->validate([
            'nom' => 'required|string|min:3',
            'description' => 'required',
            'photo' => 'required',
            'prix' => 'required',
            'colis_id' => 'required',
            ]);
            $product->update($request->all());*/
            $data= Product::find($id); 
          
            $data->nom=$request->input('nom');
            $data->description=$request->input('description');
            $data->prix=$request->input('prix');
            
             $data->colis_id=$request->input('colis_id');
            
            
            if($request->hasfile('photo'))
            {$destination='images/products/'.$data->photo;
            $file=$request->file('photo');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('images/products/',$filename);
            $data->photo=$filename;
            
            }
            $data->save();












            return redirect()->route('product.index')
->with('success','Produit modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')
        ->with('success','produit supprimée avec succès.');

    }
}