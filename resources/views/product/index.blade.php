@extends("layouts.template")

@section("titre","liste des produits")

@section('contenu')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PRODUIT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">PRODUIT</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>




    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <div class="card">
              <div class="card-header">
              
@if(session()->has('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
   <a class="btn btn-info" href="{{route('product.create')}}">Ajouter Produit</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>photo</th>
            <th>Nom</th>
            <th>description</th>
            <th>prix</th>
            <th>Colis</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
@forelse ($products as $product)
    <tr>
        <td><img src="{{asset('images/products/'.$product->photo)}}" width="100"></td>
        <td>{{$product->nom}}</td>
        <td>{{$product->description}}</td>
        <td>{{$product->prix}}</td>
        <td>{{$product->colis->nom}}</td>
        <td>
            <a href="{{route('product.edit',$product->id)}}"><button class="btn btn-primary">Modifier</button></a>
            <form onsubmit="return confirm('etes vous sure de supprimer?')" class="d-inline" action="{{route('product.destroy',$product->id)}}" method="post">
                @csrf
                @method("DELETE")
            <button class="btn btn-danger">Supprimer</button>
            </form>

        </td>

    </tr>
@empty
<tr><th colspan="6">Pas de produit trouvé!</th></tr>
@endforelse
    </tbody>
</table>
@endsection
