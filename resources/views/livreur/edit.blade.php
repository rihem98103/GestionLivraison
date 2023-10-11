@extends("layouts.template")

@section("titre","Modifier livreur")

@section('contenu')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Livreur</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Livreur</li>
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
               <h3 class="card-title"> Livreur</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
                </button>
              </div>
            </div>


<form action="{{route('livreur.update',$livreur->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
   
   <div class="card-body">
            <div class="row">
    <div class="col-md-6">

    <div class="form-group">
        <label for="cin">Cin </label>
        <input type="number" name="cin" value="{{$livreur->cin}}" id="cin" required class="form-control">
    </div>
    <div class="form-group">
        <label for="nom">Nom </label>
        <input type="text" name="nom" value="{{$livreur->nom}}" id="nom" required class="form-control">
    </div>
    
  <div class="form-group">
        <label for="prenom">Prenom </label>
        <input type="text" name="prenom" value="{{$livreur->prenom}}" id="prenom" required class="form-control">
    </div>
 

  <div class="form-group">
        <label for="email">E-mail </label>
        <input type="email" name="email" value="{{$livreur->email}}" id="email" required class="form-control">
    </div>
    <div class="form-group">
        <label for="adresse">Adresse </label>
        <input type="text" name="adresse" value="{{$livreur->adresse}}" id="adresse" required class="form-control">
    </div>


 <div class="form-group">
        <label for="tel">telephone  </label>
        <input type="number" name="tel" id="tel"  value="{{$livreur->tel}}" required class="form-control">
    </div>

    <div class="form-group">
        <label for="typepermis">Catégories de permis </label>
        <input type="text" name="typepermis" value="{{$livreur->typepermis}}" id="typepermis" required class="form-control">
    </div>




    </div>

      <div class="col-md-6">
<div class="form-group">
      <!--  <label for="photo">Photo </label>-->
        <img src="/images/livreurs/{{$livreur->photo}}"  width="200" alt="user-avatar" class="img-circle">
        <input type="file" name="photo" id="photo" value="{{$livreur->photo}}" class="form-control">
    </div> 
</div>

 
  

 



    <div class="col-md-6">       <div class="form-group">  </div></div> 
      <div class="col-md-6">   <div class="form-group">  </div></div>
    <button class="btn btn-primary mt-2">Modifier</button>
</form>
@endsection
