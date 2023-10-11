@extends('layouts.template')

@section('titre', 'liste des livreurs')

@section('contenu')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>LIVREUR</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">LIVREUR</li>
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
               <h3 class="card-title">LIVREUR</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
                </button>
              </div>
            </div>




    <form action="{{ route('livreur.store') }}" method="post" enctype="multipart/form-data">
        @csrf

   <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
        <div class="col-md-6">

        <div class="form-group">
            <label for="cin">CIN</label>
            <input type="cin" name="cin" value="{{ old('cin') }}" id="cin" required
                class="form-control @error('cin')  border-danger @enderror">
            @error('cin')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nom">Nom </label>
            <input type="text" name="nom" value="{{ old('nom') }}" id="nom" required placeholder="Enter Nom"
                class="form-control @error('nom')  border-danger @enderror">
            @error('nom')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>

   

        <div class="col-md-6">
       <div class="form-group">
            <label for="email">E-mail </label>
            <input type="email" name="email" value="{{ old('email') }}" id="email" required
                class="form-control @error('email')  border-danger @enderror">
            @error('email')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="prenom">Prénom </label>
            <input type="text" name="prenom" value="{{ old('prenom') }}" id="prenom" required placeholder="Enter Prenom"
                class
                ="form-control @error('prenom')  border-danger @enderror">
            @error('prenom')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>


           
      
</div>

        <div class="col-md-6">

             <div class="form-group">
            <label for="adresse">Adresse </label>
            <input type="adresse" name="adresse" value="{{ old('adresse') }}" id="adresse" required
                class="form-control @error('adresse')  border-danger @enderror">
            @error('adresse')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>
          <div class="form-group">
            <label for="photo">Photo </label>
            <input type="file" name="photo" id="photo" value="{{ old('photo') }}" required
                class="form-control @error('photo')  border-danger @enderror">
            @error('photo')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>
</div>

  
        <div class="col-md-6">
        <div class="form-group">
            <label for="tel">Téléphonne </label>
            <input type="tel" name="tel" value="{{ old('tel') }}" id="tel" required
                class="form-control @error('tel')  border-danger @enderror">
            @error('tel')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="typepermis">Catégories de permis </label>
            <input type="text" name="typepermis" value="{{ old('typepermis') }}" id="typepermis" placeholder="B ou B+E ou C"
                class="form-control @error('typepermis')  border-danger @enderror">
            @error('typepermis')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>
</div>
  
        <button class="btn btn-primary ">Ajouter</button>
    </form>
@endsection
