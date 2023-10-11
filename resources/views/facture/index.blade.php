@extends('layouts.template')

@section('titre', 'liste des factures')

@section('contenu')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Facture</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Facture</li>
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
   <a class="btn btn-info" href="{{route('facture.create')}}">Ajouter Facture</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>

                <th>Numero</th>
                <th>Montant Total</th>
               
                <th>Client</th>
                <th>Product</th>
                <th>Date Facture</th>
                <th>Colis</th>
                
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($factures as $facture)
                <tr>
                    <td>{{ $facture->numero }}</td>
                    <td>{{ $facture->colis->nbre* $facture->colis->poids* $facture->colis->prix }}</td>
                    <td>{{ $facture->colis->client->nom }} {{ $facture->colis->client->prenom }}</td>

                    <td>
                     @foreach($facture->colis->product as $product)

                       {{ $product->nom }} 

                          @endforeach
                            
                    </td><!--    ($products as $product)                  -->
                    <td>{{ $facture->date }}</td>
                    <td>{{$facture->colis->nom}}
                       
                    </td>
                    <td>
                        <a href="{{ route('facture.show', $facture->id) }}"><button class="btn btn-primary btn-sm">Détails</button></a>

                        <a href="{{ route('facture.edit', $facture->id) }}"><button class="btn btn-info btn-sm">Modifier</button></a>
                        <form onsubmit="return confirm('etes vous sure de supprimer?')" class="d-inline"
                            action="{{ route('facture.destroy', $facture->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Supprimer</button>
                        </form>

                    </td>

                </tr>
            @empty
                <tr>
                    <th colspan="8">Pas de colis trouvé!</th>
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
