@extends("layouts.template")

@section("titre","liste des clients")

@section('contenu')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CLIENT</h1>
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
        <div class="row">
          <div class="col-12">
           
            <div class="card">
              <div class="card-header">
              
                
                @if(session()->has('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
                
                
               <a class="btn btn-info" href="{{route('client.create')}}">Ajouter client</a>
     <!-- search--><br><br>
               <form action="{{ url('/search/') }}" method="GET">
    <div class="input-group">
       <input type="text"  name="search" class="form-control form-control-lg" placeholder="Chercher Par NOM ou E-MAIL">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
 
 <!-- <input type="text" name="search" required/>
 
    <button type="submit">Search</button>-->
</form> 
         
 

              </div>
              <!-- /.card-header -->
              <div class="card-body">
               
                
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
           <tr>
            <th></th>
            <th>Cin </th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Status</th>
            <th>E-mail</th>
            <th>Adresse</th>
            <th>Téléphonne</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
@forelse ($clients as $client)
    <tr>
        <td><img src="{{asset('images/clients/'.$client->photo)}}" width="100"></td>
        <td>{{$client->cin}}</td>
        <td>{{$client->nom}}</td>
        <td>{{$client->prenom}}</td>
        <td>{{$client->status}}</td>
        <td>{{$client->email}}</td>
        <td>{{$client->adresse}}</td>
        <td>{{$client->tel}}</td>
        
        <td>
            <a href="{{route('client.edit',$client->id)}}"><button class="btn btn-primary">modifier</button></a>
            <form onsubmit="return confirm('etes vous sure de supprimer?')" class="d-inline" action="{{route('client.destroy',$client->id)}}" method="post">
                @csrf
                @method("DELETE")
            <button class="btn btn-danger">supprimer</button>
            </form>

        </td>

    </tr>
@empty
<tr><th colspan="6">Pas de client trouvé!</th></tr>
@endforelse
  
     </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 
@endsection
