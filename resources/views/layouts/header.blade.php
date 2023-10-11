<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/contact" class="nav-link">Contact</a>
      </li>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search 
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>-->

      <!-- Messages Dropdown Menu -->
      
  
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">

                            @guest
                                @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                @endif
              
                                @if (Route::has('register'))
                                        <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                @endif
                                @else
                                      <li class="nav-item d-none d-sm-inline-block">
                                       <a id="navbarDropdown" class="d-block" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                         
                                        </a>
            
                                    
                                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
            
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                          
                                            </form>
                                        
                                    </li>
                        @endguest



        <!--<a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>-->
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">GESTON LIVRAISON</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/femmeavatar.jpg" style="width:1500;height:2000" class="img-circle" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">   
            @guest
                                    @if (Route::has('login'))
                                       
                                    @endif
            
                                    @if (Route::has('register'))
                                      
                                    @endif
                                @else
                                    <li class="nav-link">
                                        <a id="navbarDropdown" class="d-block" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>
            
                                       <!-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
            
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>-->
                                    </li>
                                @endguest
                                </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

  
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex"></div>
        
       

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
          <!--<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>-->
          <li class="nav-header">UTILISATEUR</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-user" aria-hidden="true"></i>
              <p>
                Client
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('client.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste Des Clients</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('client.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter Des Clients</p>
                </a>
              </li>
            
           
       
            </ul>
          </li>


    <li class="nav-item">
            <a href="#" class="nav-link">
           <i class="fa fa-users" aria-hidden="true"></i>
              <p>
                Livreur
                 <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('livreur.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste Des Livreur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('livreur.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter Des Livreur</p>
                </a>
              </li>
            
           
       
            </ul>
          </li>

<br>
             <li class="nav-header">PRODUIT</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
<i class="fa fa-cubes" aria-hidden="true"></i>
              <p>
                Colis
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('colis.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste Des Colis</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('colis.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter Des Colis</p>
                </a>
              </li>
             
          
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
<i class="fa fa-tasks" aria-hidden="true"></i>
              <p>
                Produit
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('product.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste Produit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('product.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter Produit</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
<i class="fa fa-cart-plus" aria-hidden="true"></i>
              <p>
                Livraison
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('livraison.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Liste des livraison</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('livraison.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter livraison</p>
                </a>
              </li>
        
            </ul>
          </li><br>
                <li class="nav-header">PAIEMENT </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
<i class="fa fa-credit-card" aria-hidden="true"></i>
              <p>
                Paiement
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('paiement.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste des Paiement</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('paiement.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter Paiement</p>
                </a>
              </li>
              
            </ul>
          </li>
         
          <li class="nav-item">
            <a href="#" class="nav-link">
<i class="fa fa-archive" aria-hidden="true"></i>
              <p>
                Facture
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('facture.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste des facture</p>
                </a>
              </li>
          
              <li class="nav-item">
                <a href="{{ route('facture.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter facture</p>
                </a>
              </li>
           
             
            </ul>
          </li>
      
             
             <br>
              
        <!--
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Search
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>-->
         


        </ul>
      </nav><br><br><br>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
