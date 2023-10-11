@extends('layouts.template')

@section('titre', 'Contact me')

@section('contenu')



 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CONTACT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contact</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <!-- /.col 999999999999999999999999999999 -->
          <div class="col-md-6">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Contactez Nous</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <input class="form-control" type="email" placeholder="To:">
                </div>
                <div class="form-group">
                  <input class="form-control" type ="text" placeholder="Subject:">
                </div>
                <div class="form-group">
                   <!-- <textarea id="compose-textarea" class="form-control" style="height: 300px"></textarea>-->
                      
                      <form url="{{ route('send.message.google') }}" method="POST" >
                        <label for="message" >Message</label>
                        {{ @csrf_field() }}
                        <p>
                          <textarea name="message" id="message" rows="4" placeholder="Message à envoyer ici" ></textarea>
                          {{ $errors->first('message', ":message")}}
                        </p>
                        <button    class="btn btn-info"        type="submit" >Envoyer</button>
                      </form>
                    
                </div>
                <div class="form-group">
                  
                  
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  
                  
               
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection