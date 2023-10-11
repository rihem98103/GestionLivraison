@extends("layouts.template")

@section("titre","Modifier client")

@section('contenu')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> CLIENT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">CLIENT</li>
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
               <h3 class="card-title">AJOUTER CLIENT</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
                </button>
              </div>
            </div>

<form action="{{route('client.update',$client->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                 
    <div class="col-md-6">     <div class="form-group">
      <!--  <label for="photo">Photo </label>-->
        <img src="/images/clients/{{$client->photo}}"  width="200" alt="user-avatar" class="img-circle">
        <input type="file" name="photo" id="photo"  value="{{$client->photo}}"   class="form-control">
    </div>
 </div>

    <div class="col-md-6">
        
    <div class="form-group">
        <label for="cin">Cin </label>
        <input type="number" name="cin" value="{{$client->cin}}" id="cin" required class="form-control">
    </div>
   <div class="form-group">
        <label for="email">Email </label>
        <input type="email" name="email" value="{{$client->email}}" id="email" required class="form-control">
    </div>
    </div>

    <div class="col-md-6">
    <div class="form-group">
        <label for="nom">Nom </label>
        <input type="text" name="nom" value="{{$client->nom}}" id="nom" required class="form-control">
    </div>
    <div class="form-group">
        <label for="prenom">prenom </label>
        <input type="text" name="prenom" value="{{$client->prenom}}" id="prenom" required class="form-control">
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
        <label for="status">Status </label>
        <input type="text" name="status" value="{{$client->status}}" id="status" required class="form-control">
    </div>
  
</div>
 <div class="col-md-6">
    <div class="form-group">
        <label for="adresse">adresse </label>
        <input type="text" name="adresse" value="{{$client->adresse}}" id="adresse" required class="form-control">
    </div>

    <div class="form-group">
        <label for="tel">Téléphonne</label>
        <input type="number" name="tel" id="tel"  value="{{$client->tel}}" required class="form-control">
    </div>
</div><div class="col-md-6"></div>
    <button class="btn btn-primary mt-2">Modifier</button>
</form>
@endsection
