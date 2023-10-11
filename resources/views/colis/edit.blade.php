@extends("layouts.template")

@section("titre","Modifier colis")

@section('contenu')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> COLIS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">COLIS</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            
            
            
            
            <div class="card-header">
               <h3 class="card-title">MODIFIER COLIS</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
                </button>
              </div>
            </div>

 <!--<form action="{{route('colis.update',$coli->id)}}" method="post">-->
 <form action="{{route('colis.update', ['coli' =>$coli->id])}}" method="post">
    @csrf  
    @method('PUT')
 
        <div class="card-body">
            <div class="row">
    <div class="col-md-6">

    <div class="form-group">
        <label for="nom">Nom colis</label>
        <input type="text" name="nom" value="{{$coli->nom}}" id="nom" required class="form-control">
    </div>
    <div class="form-group">
        <label for="poids">poids colis</label>
        <input type="number" name="poids" value="{{$coli->poids}}" id="poids" required class="form-control">
    </div>
    </div>
  <div class="col-md-6">

    <div class="form-group">
        <label for="nbre">nombre de colis</label>
        <input type="number" name="nbre" value="{{$coli->nbre}}" id="nbre" required class="form-control">
    </div>

    <div class="form-group">
        <label for="prix">prix colis</label>
        <input type="number" name="prix" id="prix"  value="{{$coli->prix}}" required class="form-control">
    </div>
    </div>
  <div class="col-md-6">
   

    
    <div class="form-group">
        <label for="client_id">Client</label>
        <select name="client_id" id="client_id" required class="form-control">
            @foreach ($clients as $client)
                <option value="{{$client->id}}" @if($client->id==$coli->client_id) selected @endif>{{$client->nom}} {{$client->prenom}}</option>
            @endforeach
        </select>
    </div> 

    </div>
    <div class="col-md-6">    </div>


    <button class="btn btn-primary mt-2">Modifier</button>
</form>
@endsection
