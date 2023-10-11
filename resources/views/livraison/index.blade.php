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




    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <div class="card">
              <div class="card-header">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
   <a class="btn btn-info" href="{{route('livraison.create')}}">Ajouter livraison</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>

                <th>Etat</th>
                <th>Prix</th>
                <th>Date De Départ</th>
                <th>Date De Arrivée</th>
                <th>Livreur</th>
                
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($livraisons as $livraison)
                <tr>
                    <td>
                    
                     @if($livraison->etat=='enattente')
                       <h4>  <span  class="badge bg-danger">  En Attente</span>  </h4>  
                          @elseif($livraison->etat=='encours')
                                   <h4>  <span  class="badge bg-warning">  En Cours</span>  </h4>   
                          @elseif($livraison->etat=='pret')
                               <h4>  <span  class="badge bg-success">  Prêt</span>  </h4>   
                  <!--  { { $paiement->etat }}-->
                     @endif
                    
                    
                    
                    
                    
                    
                    </td>
                    <td>{{ $livraison->prix }}</td>
                    <td>{{ $livraison->datedepart }}</td>
                    <td>{{ $livraison->datearrive }}</td>
                    
                    <td>{{$livraison->livreur->nom}} {{$livraison->livreur->prenom}}
                        
                    </td>
                    <td>
                        <a href="{{ route('livraison.edit', $livraison->id) }}"><button class="btn btn-primary">modifier</button></a>
                        <form onsubmit="return confirm('etes vous sure de supprimer?')" class="d-inline"
                            action="{{ route('livraison.destroy', $livraison->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">supprimer</button>
                        </form>

                    </td>

                </tr>
            @empty
                <tr>
                    <th colspan="6">Pas de colis trouvé!</th>
                </tr>
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