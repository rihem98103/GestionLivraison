@extends('layouts.template')

@section('titre', 'liste des paiements')

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
   <a class="btn btn-info" href="{{route('paiement.create')}}">Ajouter Paiement</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>

                 <th>Montant à payer </th>
                <th>Etat </th>
               
                <th>Mode De Paiement</th>
                <th>Colis</th>
                
                
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($paiements as $paiement)
                <tr>
                    <td>{{ $paiement->colis->prix * $paiement->colis->poids *$paiement->colis->nbre }}</td>
                    <td> 
                     @if($paiement->etat=='enattente')
                      
                             <h4>  <span  class="badge bg-danger">  En Attente</span>  </h4>  
                         
                     @elseif($paiement->etat=='encours')
                                  
                                   <h4>  <span  class="badge bg-warning">  En Cours</span>  </h4>   
                          
                    @elseif($paiement->etat=='pret')
                               <h4>  <span  class="badge bg-success">  Prêt</span>  </h4>   
                  <!--  { { $paiement->etat }}-->
                     @endif
                    </td>
                    <td>{{ $paiement->modepaiement }}</td>
                    <td>{{$paiement->colis->nom}}</td>
                    
                    
                    <td>
                        <a href="{{ route('paiement.edit', $paiement->id) }}"><button class="btn btn-primary">modifier</button></a>
                        <form onsubmit="return confirm('etes vous sure de supprimer?')" class="d-inline"
                            action="{{ route('paiement.destroy', $paiement->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">supprimer</button>
                        </form>

                    </td>

                </tr>
            @empty
                <tr>
                    <th colspan="6">Pas de Paiement trouvé!</th>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection




   

