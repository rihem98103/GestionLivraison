@extends("layouts.template")

@section("titre","Modifier livraison")

@section('contenu')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> LIVRAISON</h1>
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



    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            
            
            
            
            <div class="card-header">
               <h3 class="card-title">AJOUTER LIVRAISON</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
<form action="{{route('livraison.update',$livraison->id)}}" method="post">
    @csrf
    @method('PUT')
  <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
    <div class="col-md-6">
    <div class="form-group">
       <!-- <label for="etat">etat livraison</label>
        <input type="text" name="etat" value="{ {$livraison->etat}}" id="etat" required class="form-control">
    -->
     
      <div class="form-group">
        <label for="datedepart">Date De Départ </label>
        <input type="date" name="datedepart" value="{{$livraison->datedepart}}" id="datedepart" required class="form-control">
    </div>
    <div class="form-group">
        <label for="datearrive">Date De Arrivée </label>
        <input type="date" name="datearrive" value="{{$livraison->datearrive}}" id="datearrive" required class="form-control">
    </div>
    
    
    </div>
    
    

    <div class="form-group">
        <label for="prix">Prix De Livraison</label>
        <input type="number" name="prix" id="prix"  value="{{$livraison->prix}}" required class="form-control">
    </div>
    </div>
  <div class="col-md-6"> 
  
        <label for="etat">Etat De Livraison</label>
            <br>

            <input type="radio" id="enattente" name="etat"
                value="enattente"{{ $livraison->etat == 'enattente' ? 'checked' : '' }}>
            <label for="enattente">En Attente</label>

            <br>

            <input type="radio" id="encours" name="etat" value="encours"
                {{ $livraison->etat == 'encours' ? 'checked' : '' }}@if (old('etat')) checked @endif>
            <label for="encours">En cours</label>

            <br>

            <input type="radio" id="pret" name="etat"
                value="pret"{{ $livraison->etat == 'pret' ? 'checked' : '' }}>
            <label for="pret">Prêt </label>

 
    </div>
  <div class="col-md-6">
    <div class="form-group">
        <label for="livreur_id">Livreur</label>
        <select name="livreur_id" id="livreur_id" required class="form-control">
            @foreach ($livreurs as $livreur)
                <option value="{{$livreur->id}}" @if($livreur->id==$livraison->livreur_id) selected @endif>{{$livreur->prenom}} {{$livreur->nom}}</option>
            @endforeach
        </select>
    </div></div>
 <div class="col-md-6"> </div>
    <button class="btn btn-primary mt-2">Modifier</button>
</form>
@endsection
