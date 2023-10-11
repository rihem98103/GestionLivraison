@extends('layouts.template')

@section('titre', 'liste des factures')

@section('contenu')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>FACTURE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">FACTURE</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            
            
            
            
            <div class="card-header">
               <h3 class="card-title">FACTURE</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
                </button>
              </div>
            </div>

    <form action="{{ route('facture.store') }}" method="post" enctype="multipart/form-data">
        @csrf
 <div class="card-body">
            <div class="row">
        <div class="col-md-6">


        <div class="form-group">
            <label for="numero">Numero facture</label>
            <input type="number" name="numero" value="{{ old('numero') }}" id="numero" required
                class="form-control @error('numero')  border-danger @enderror">
            @error('numero')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>



      
</div>
   
    
<div class="col-md-6">
 <div class="form-group">
            <label for="colis_id">Colis </label>
            <select name="colis_id" id="colis_id" required
                class="form-control @error('colis_id')  border-danger @enderror">
                <option value="">-- choisir un colis --</option>
                @foreach ($colis as $colis)
                    <option value="{{ $colis->id }}" @if ($colis->id == old('colis_id')) selected @endif>
                        {{ $colis->nom }}</option>
                @endforeach
            </select>
        </div>

       
</div>
<div class="col-md-6">
      <div class="form-group">
            <label for="date">Date De Facture</label>
            <input type="date" name="date" value="{{ old('date') }}" id="date"
                class="form-control @error('date')  border-danger @enderror">
            @error('date')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>   
        
 
     </div>
    <!--  <div class="form-group">
            <label for="client_id">Client </label>
            <select name="client_id" id="client_id" required
                class="form-control @ error('client_id')  border-danger @ enderror">
                <option value="">-- choisir un client --</option>
                               

                @ foreach ($colis as $col)
                  
                        <option value="{ {  $ col->client->id }}" 
                                                  @ if ( $col->client->id == old('client_id')) selected @ endif>
                            { { $col->client->nom }}{  { $ col->client->prenom }}</option>
                    
                @ endforeach
            </select>
        </div>

      
       -->
<div class="col-md-6">

</div>


       
  



        <button class="btn btn-primary mt-2">Ajouter</button>
    </form></div>  </div>  </div>
@endsection
