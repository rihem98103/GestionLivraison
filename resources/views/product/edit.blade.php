@extends("layouts.template")

@section("titre","Modifier categorie")

@section('contenu')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> PRODUIT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">PRODUIT</li>
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
               <h3 class="card-title">AJOUTER PRODUIT</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
<form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
  <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
    <div class="col-md-6">
    <div class="form-group">
      
      <!--  <label for="photo">Photo </label>-->
        <img src="/images/products/{{$product->photo}}"  width="200" alt="user-avatar" class="img-circle">
        <input type="file" name="photo" id="photo" value="{{$product->photo}}" class="form-control">
  
    </div>
   
   
   
</div>
  <div class="col-md-6">
 <div class="form-group">
        <label for="nom">Nom produit</label>
        <input type="text" name="nom" value="{{$product->nom}}" id="nom" required class="form-control">
    </div>
    <div class="form-group">
        <label for="description">Description </label>
        <textarea name="description" id="description"  class="form-control">{{$product->description}}</textarea>
    </div>

    <div class="form-group">
        <label for="prix">Prix </label>
        <input type="number"step="0.001" name="prix" id="prix"  value="{{$product->prix}}" required class="form-control">
    </div>
    <div class="form-group">
        <label for="colis_id">Colis </label>
        <select name="colis_id" id="colis_id" required class="form-control">
            @foreach ($colis as $colis)
                <option value="{{$colis->id}}" @if($colis->id==$product->colis_id) selected @endif>{{$colis->nom}}</option>
            @endforeach
        </select></div>
    </div>
</div>
  <div class="col-md-6">
    
      <div class="col-md-6">
     </div>
    
    <button class="btn btn-primary mt-2">Modifier</button>
</form>
@endsection
