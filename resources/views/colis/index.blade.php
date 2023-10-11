@extends('layouts.template')

@section('titre', 'liste des colis')

@section('contenu')
 <!-- Content Wrapper. Contains page content -->


<?php
use Picqer\Barcode\BarcodeGeneratorHTML as P;
                $generate= new P();

?>



  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>COLIS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">COLIS</li>
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
  <a class="btn btn-info" href="{{route('colis.create')}}">Ajouter Colis</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th></th>
                <th>Numéro</th>
                <th>Poids</th>
                <th>Nombre de colis</th>
                <th>Prix</th>
                <th>Total</th>
                <th>Clients</th>
                <th>produit</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($coliss as $colis)
                <tr>
<td>
 
                   {!! $generate->getBarcode($colis->nom ,$generate::TYPE_CODE_128);!!}
                                       </td>
                    <td>{{ $colis->nom }}</td>
                    <td>{{ $colis->poids }}</td>
                    <td>{{ $colis->nbre }}</td>
                    <td>{{ $colis->prix }}</td>
                    <td>{{ $colis->prix * $colis->nbre*$colis->poids  }}</td>
                    <td>{{$colis->client->nom}} {{$colis->client->prenom}}
                    </td>
                       

                          <td> @foreach($colis->product as $product){{ $product->nom }}  @endforeach </td>

                      
                    <td>
                        <a href="{{ route('colis.edit', $colis->id) }}"><button class="btn btn-primary">modifier</button></a>
                     <!--   <form onsubmit="return confirm('etes vous sure de supprimer?')" class="d-inline"
                            action="{ { route('colis.destroy', $colis->id) }}" method="post">
                            @ csrf
                            @ method('DELETE')
                            <button class="btn btn-danger">supprimer</button>
                        </form>-->

                    </td>

                </tr>
            @empty
                <tr>
                    <th colspan="7">Pas de colis trouvé!</th>
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
