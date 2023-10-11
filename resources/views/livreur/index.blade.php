@extends("layouts.template")

@section("titre","liste des livreurs")

@section('contenu')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>LIVREUR</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">LIVREUR</li>
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
 <a class="btn btn-info" href="{{route('livreur.create')}}">Ajouter Livreur</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

@forelse ($livreurs as $livreur)
  <div class="col-12  ">
              <div class="card bg-light d-flex flex-fill">
                
                <div style="text-align:center;font-size: 25px;"class="card-header text-muted border-bottom-0">
                   {{$livreur->email}} <br><br>
                    <h2 style="font-size: 25px;"class="lead"><b> {{$livreur->nom}} {{$livreur->prenom}}</b></h2>
                      <p style="font-size: 25px;" class="text-muted text-sm"><b>CIN: </b>  {{$livreur->cin}}</p>
                      
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div  class="col-7">
                    <br><br>
                      <ul class="ml-4 mb-0 fa-ul text-muted" >
                        <li style="font-size: 20px;" class="medium"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span><p> Route :  {{$livreur->adresse}}</li>
                     <li style="font-size: 20px";class="medium"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone :  {{$livreur->tel}}</li>
                       <li style="font-size: 20px";class="medium"><span class="fa-li"><i class="fa fa-car"></i></span> Type De Permis :   {{$livreur->typepermis}}</li>

                      </ul>


                    </div>   
        
                    <div class="col-5 text-center">
                      <img src="{{asset('images/livreurs/'.$livreur->photo)}}" width="200" alt="user-avatar" class="img-circle ">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <form onsubmit="return confirm('etes vous sure de supprimer?')" class="d-inline" action="{{route('livreur.destroy',$livreur->id)}}" method="post">
                      @csrf
                      @method("DELETE") 
                      <a href="#" class="btn btn-danger">
                          <i class="fas fa-trash"></i>
                      </a>  
                    </form>

                    <a href="{{route('livreur.edit',$livreur->id)}}" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> Modifier
                    </a>
                  </div>
                </div>
              </div>
            </div>
        
      
      
 
   
@empty
<tr><th colspan="9">Pas de livreur trouvé!</th></tr>
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
