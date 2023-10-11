@extends('layouts.template')

@section('titre', 'liste des livraison')

@section('contenu')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>LIVRAISON</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">LIVRAISON</li>
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
               <h3 class="card-title">LIVRAISON</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
    <form action="{{ route('livraison.store') }}" method="post" enctype="multipart/form-data">
        @csrf
   <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
        <div class="col-md-6">
       
       
      <!--  <div class="form-group">
            <label for="etat">Etat livraison</label>
            <input type="text" name="etat" value="{ { old('etat') }}" id="etat" required
                class="form-control @ error('etat')  border-danger @ enderror">
            @ error('etat')
                <div class="text text-danger">{ { $message }}</div>
            @ enderror
        </div>-->

<div class="form-group">
            <label for="etat">Etat livraison</label>
            <br>

            <input type="radio" id="enattente" name="etat" value="enattente"
                {{ old('etat') == 'enattente' ? 'checked' : '' }}>
            <label for="enattente">En Attente</label><br>


            <input type="radio" id="encours" name="etat" value="encours"
                {{ old('etat') == 'encours' ? 'checked' : '' }}>
            <label for="encours">En  Cours</label><br>

            <input type="radio" id="pret" name="etat" value="pret " {{ old('etat') == 'pret' ? 'checked' : '' }}>
            <label for="pret">Prêt </label>

            @error('etat')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div> 




























 <div class="form-group">
            <label for="datedepart">Date Départ </label>
            <input type="date" name="datedepart" value="{{ old('datedepart') }}" id="datedepart" 
                class="form-control @error('datedepart')  border-danger @enderror">
            @error('datedepart')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>
     
  </div>
    <div class="col-md-6">
       <div class="form-group">
            <label for="prix">Prix De Livraison</label>
            <input type="number" name="prix" value="{{ old('prix') }}" id="prix" required
                class="form-control @error('prix')  border-danger @enderror">
            @error('prix')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>
       

        <div class="form-group">
            <label for="datearrive">Date Arrive </label>
            <input type="date" name="datearrive" value="{{ old('datearrive') }}" id="datearrive" 
                class="form-control @error('datearrive')  border-danger @enderror">
            @error('datearrive')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>
  </div>
    <div class="col-md-6">

        <div class="form-group">
            <label for="livreur_id">Livreur  </label>
            <select name="livreur_id" id="livreur_id" required
                class="form-control @error('livreur_id')  border-danger @enderror">
                <option value="">-- choisir un livreur--</option>
                @foreach ($livreurs as $livreur)
                    <option value="{{ $livreur->id }}" @if ($livreur->id == old('livreur_id')) selected @endif>
                        {{ $livreur->nom }} {{$livreur->prenom}}</option>
                @endforeach
            </select>
        </div>
  </div>
   <div class="col-md-6">
       </div>

        <button class="btn btn-primary mt-2">Ajouter</button>
    </form>
@endsection
