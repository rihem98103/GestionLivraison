@extends("layouts.template")

@section("titre","Modifier facture")

@section('contenu')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> FACTURE</h1>
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



    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            
            
            
            
            <div class="card-header">
               <h3 class="card-title">MODIFIER FACTURE</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
<form action="{{route('facture.update',$facture->id)}}" method="post">
    @csrf
    @method('PUT')
  <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
    <div class="col-md-6">

    <div class="form-group">
        <label for="numero">etat facture</label>
        <input type="number" name="numero" value="{{$facture->numero}}" id="numero" required class="form-control">
    </div>
    
    

 
    </div>
  <div class="col-md-6">
  
    <div class="form-group">
        <label for="date">date  facture</label>
        <input type="date" name="date" value="{{$facture->date}}" id="date" required class="form-control">
    </div>
</div>
  <div class="col-md-6">
    
    <div class="col-md-6">
      <div class="form-group">
          <label for="colis_id">Colis produit</label>
          <select name="colis_id" id="colis_id" required class="form-control">
              @foreach ($colis as $colis)
                  <option value="{{$colis->id}}" @if($colis->id==$facture->colis_id) selected @endif>{{$colis->nom}}</option>
              @endforeach
          </select></div>

    <button class="btn btn-primary mt-2">Modifier</button>
</form>
@endsection