@extends('layouts.template')

@section('titre', 'liste des Paiments')

@section('contenu')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PAIEMENT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">PAIEMENT</li>
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
               <h3 class="card-title">PAIEMENT</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
    <form action="{{ route('paiement.store') }}" method="post" enctype="multipart/form-data">
        @csrf
   <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
        <div class="col-md-6">


        <div class="form-group">
      
        </div>
        <div class="form-group">
            <label for="etat">état Paiement</label>
            <br>
            <input type="radio" id="enattente" name="etat" value="enattente"
                {{ old('etat') == 'enattente' ? 'checked' : '' }}>

            <label for="enattente">En Attente</label><br>
            <input type="radio" id="encours" name="etat" value="encours"
                {{ old('etat') == 'encours' ? 'checked' : '' }}>
            <label for="encours">En cours</label><br>
            <input type="radio" id="pret" name="etat" value="pret " {{ old('etat') == 'pret' ? 'checked' : '' }}>
            <label for="pret">Prêt </label>
            @error('etat')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>  </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="modepaiement">Mode De Paiement</label>

            <br>
            <input type="radio" id="cheque" name="modepaiement" value="cheque"
                {{ old('modepaiement') == 'cheque' ? 'checked' : '' }}>

            <label for="cheque">Chéque</label><br>
            <input type="radio" id="espece" name="modepaiement" value="espece"
                {{ old('modepaiement') == 'espece' ? 'checked' : '' }}>
            <label for="espece">Espéce</label><br>
            <input type="radio" id="prepayment" name="modepaiement" value="prepayment "
                {{ old('modepaiement') == 'prepayment' ? 'checked' : '' }}>
            <label for="prepayment">Prêt </label>

            @error('modepaiement')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>
  </div>
    <div class="col-md-6">



        <div class="form-group">
            <label for="colis_id">Colis Paiement</label>
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
       </div>
        <button class="btn btn-primary mt-2">Ajouter</button>
    </form>
@endsection
