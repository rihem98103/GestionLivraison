@extends('layouts.template')

@section('titre', 'liste des factures')

@section('contenu')
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

 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> {{ $facture->colis->client->nom }}
                    {{ $facture->colis->client->prenom }}
                    <small class="float-right">Date: {{ $facture->date }}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>{{ $facture->colis->client->nom }}</strong><br>
                    {{ $facture->colis->client->adresse }}<br>
                   
                    Phone: {{ $facture->colis->client->tel }}<br>
                    Email: {{ $facture->colis->client->email }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>Aramex Tunisia</strong><br>
                    lac1,Tunis<br>
                    Phone: 71 160 800<br>
                    Email: all_tun_social@aramex.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <br>
                  <b>Facture {{ $facture->numero }}</b>
                  <br>
                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qte</th>
                      <th>Product</th>
                      <th>Colis</th>
                      <th>Description</th>
                      <th>MontantHT</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>{{ $facture->qte }}</td>
                      <td>@foreach($facture->colis->product as $product)

                        {{ $product->nom }} 
                    
                    @endforeach</td>
                      
                      <td>@foreach($facture->colis->product as $product)

                        {{ $product->description }} 
                    
                    @endforeach</td>
                    <td>{{$facture->colis->nom}}</td>
                      <td>{{$facture->colis->prix * $facture->colis->nbre}}</td>
                    </tr>
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="../../dist/img/credit/visa.png" alt="Visa">
                  <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../../dist/img/credit/american-express.png" alt="American Express">
                  <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
                  @foreach($facture->colis->paiement as $paiement)

                        {{ $paiement->modepaiement }} 
                    
                    @endforeach
                 
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                   
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th>Livraison:</th>
                        <td>7 Dt</td>
                      </tr>
                      <tr>
                        <th style="width:50%">MontantHT:</th>
                        <td>{{  $facture->colis->prix * $facture->colis->nbre* $facture->colis->poids}}</td>
                      </tr>
                      <tr>
                        <th>TVA (19%)</th>
                        <td>{{ $facture->total *0.19 }}</td>
                      </tr>
                      
                      <tr>
                        <th>Total:</th>
                        <td>{{ $facture->total + $facture->total*0.19 +7}}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing 
              -->
                  <a href="{{asset('../facture/invoice-print.html')}}" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button><div class="row no-print">
                <div class="col-12">
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;" onclick="window.print()">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

            </div>
<script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->

@endsection
