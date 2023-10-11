@extends('layouts.template')

@section('titre', 'liste des colis')

@section('contenu')

    <!-- Content Wrapper. Contains page content -->
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

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">




                    <div class="card-header">
                        <h3 class="card-title">COLIS</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <form action="{{ route('colis.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="client_id">Client de colis</label>
                                        <select name="client_id" id="client_id" required
                                            class="form-control @error('client_id')  border-danger @enderror">
                                            <option value="">-- choisir un client--</option>
                                            @foreach ($clients as $client)
                                                <option value="{{ $client->id }}"
                                                    @if ($client->id == old('client_id')) selected @endif>{{ $client->nom }} {{ $client->prenom }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="nom">Numero colis</label>
                                        <input type="text" name="nom" value="{{ old('nom') }}" id="nom"
                                            required class="form-control @error('nom')  border-danger @enderror">
                                        @error('nom')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nbre">Nombre colis</label>
                                        <input type="number" name="nbre" value="{{ old('nbre') }}" id="nbre"
                                            required class="form-control @error('nbre')  border-danger @enderror">
                                        @error('nbre')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">



                                    <div class="form-group">
                                        <label for="prix">Prix colis</label>
                                        <input type="number" step="0.001" name="prix" value="{{ old('prix') }}" id="prix"
                                            required class="form-control @error('prix')  border-danger @enderror">
                                        @error('prix')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="poids">Poids colis</label>
                                        <input type="number" step="0.001"name="poids" value="{{ old('poids') }}" id="poids"
                                            required class="form-control @error('poids')  border-danger @enderror">
                                        @error('poids')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
         
                                <div class="col-md-6">
                                </div>
                                <button class="btn btn-primary ">Ajouter</button>
                    </form>
                @endsection