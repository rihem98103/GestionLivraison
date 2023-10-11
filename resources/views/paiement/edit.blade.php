@extends('layouts.template')

@section('titre', 'Modifier paiement')

@section('contenu')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> PAIEMENT</h1>
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



    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            
            
            
            
            <div class="card-header">
               <h3 class="card-title">AJOUTER PAIEMENT</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
    <form action="{{ route('paiement.update', $paiement->id) }}" method="post">
        @csrf
        @method('PUT')

        {{ csrf_field() }}
  <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
    <div class="col-md-6">

        <div class="form-group">
            <label for="montant">Montant paiement</label>
            <input type="number" name="montant" id="montant" value="{{ $paiement->montant }}" required class="form-control">
        </div>

        <div class="form-group">
            <label for="etat">Etat paiement</label>
            <br>

            <input type="radio" id="enattente" name="etat"
                value="enattente"{{ $paiement->etat == 'enattente' ? 'checked' : '' }}>
            <label for="enattente">En Attente</label>

            <br>

            <input type="radio" id="encours" name="etat" value="encours"
                {{ $paiement->etat == 'encours' ? 'checked' : '' }}@if (old('etat')) checked @endif>
            <label for="encours">En cours</label>

            <br>

            <input type="radio" id="pret" name="etat"
                value="pret"{{ $paiement->etat == 'pret' ? 'checked' : '' }}>
            <label for="pret">Pret </label>

   </div>

            <!--<input type="text" name="etat" value="{ { $paiement->etat }}" id="etat" required class="form-control">-->
     
        </div>
  <div class="col-md-6">
      
        <div class="form-group">
            <label for="modepaiement">Mode de paiement</label>
            <br>

            <input type="radio" id="cheque" name="modepaiement"
                value="cheque"{{ $paiement->modepaiement == 'cheque' ? 'checked' : '' }}>
            <label for="cheque">Cheque</label>

            <br>

            <input type="radio" id="espece" name="modepaiement" value="espece"
                {{ $paiement->modepaiement == 'espece' ? 'checked' : '' }}@if (old('modepaiement')) checked @endif>
            <label for="espece"> Espece</label>

            <br>

            <input type="radio" id="prepayment" name="modepaiement"
                value="prepayment"{{ $paiement->modepaiement == 'prepayment' ? 'checked' : '' }}>
            <label for="prepayment">Prepayment </label>
        </div>

</div>
  <div class="col-md-6">
        <div class="form-group">
            <label for="colis_id">Colis Paiement</label>
            <select name="colis_id" id="colis_id" required class="form-control">
                @foreach ($colis as $colis)
                    <option value="{{ $colis->id }}" @if ($colis->id == $paiement->colis_id) selected @endif>
                        {{ $colis->nom }}</option>
                @endforeach
            </select>
        </div></div>
   <div class="col-md-6"></div>

        <button class="btn btn-primary mt-2">Modifier</button>
    </form>
@endsection
