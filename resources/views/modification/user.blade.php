@extends('layouts2.master')

@section('content')

     <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user_image.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> {{Auth::user()->name}} </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Recherche...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGATION PRINCIPALE</li>
        <li class="treeview" >
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Tableau de bord</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="/home"><i class="fa fa-angle-right"></i> Tableau de bord</a></li>
            <li><a href="/"><i class="fa fa-angle-right"></i>Vue principale </a></li>
          </ul>
        </li>
       
        <li>
          <a href="/articles">
            <i class="fa fa-th"></i> <span>Articles</span>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
     
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Contacts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/contact/telephones"><i class="fa fa-angle-right"></i> Telephones</a></li>
            <li><a href="/contact/adresse"><i class="fa fa-angle-right"></i> Adresses</a></li>
            <li><a href="/contact/faxs"><i class="fa fa-angle-right"></i>Faxs</a></li>
            <li><a href="/contact/emails"><i class="fa fa-angle-right"></i>Emails</a></li>
            <li><a href="/contact/Reseaux"><i class="fa fa-angle-right"></i> Réseaux sociaux</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Projets</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/projets"><i class="fa fa-angle-right"></i> Nos Projets</a></li>
            <li><a href="/offrreExceptoinnelles"><i class="fa fa-angle-right"></i> Nos offres exceptionnelles</a></li>
            <li><a href="/nos-standards"><i class="fa fa-angle-right"></i>Nos Standards</a></li>
          </ul>
        </li>
       
            <?php if(Auth::user()->type=='Administrateur Site') { ?>
        <li class="active">
          <a href="/users">
            <i class="fa fa-user"></i> <span>Utilisateurs</span>
            <span class="pull-right-container">
            
            </span>
          </a>
        </li>
        <?php } ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Sliders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/slider/projets"><i class="fa fa-angle-right"></i> Slider des Projets</a></li>
            <li><a href="/slider/articles"><i class="fa fa-angle-right"></i> Slider des Articles</a></li>
           
          </ul>
        </li>
        <li>
          <a href="/newsletter">
            <i class="fa fa-envelope"></i> <span>NewsLetter</span>
         
          </a>
        </li>
     
        <li ><a href="/historique" ><i class="fa fa-book"></i> <span>Historique</span>  <span class="pull-right-container">
              <small class="label pull-right bg-red"></small>
               <small class="label pull-right bg-yellow"></small>
              <small class="label pull-right bg-blue"></small>
            </span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Suppression</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Modification</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Insertion</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <small>Formulaire</small>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li><a href="/users"> Nos Utilisateurs</a></li>
        <li class="active">Modifier Utlisateur</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      

      <div class="row">
        <div class="col-md-8">

          
          <!-- /.box -->

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Information de l'utilisateur</h3>
            </div>
            <form method="post" action="/user/modification/{{$user->id}}">
              <div class="box-body">
            {{ csrf_field() }}
              <div  class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                <label>Nom:</label>
                <input type="text"  class="form-control"  id="name" name="name" required autofocus placeholder="name" value="{{ $user->name }}" >
         @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
              </div>
              <div    class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email">{{ __('E-Mail Address') }}</label>
    
      <input type="email"  class="form-control"  id="email" name="email" required autofocus placeholder="Email" value="{{ $user->email }}">
         @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
    
  </div>
         
    
         
         
  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password">{{ __('Password') }}</label>
    
      <input type="password" class="form-control" id="password" name="password" required placeholder="Password" value="{{ old('password') }}">
        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
    
  </div>
            
         
  <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
    <label for="password_confirmation">{{ __('Password Confirmation') }}</label>
 
      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="Password Confirmation">
         @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
       
  </div>
  <?php if(Auth::user()->type=='Administrateur Site') {?>

          <div class="form-group" <?php if($yes==true) {?> hidden="hidden" <?php } ?>>
    <label for="type">{{ __('Type') }}</label>
   
     <select class="form-control" id="type" name="type">
    <option <?php if ($user->type== 'Administrateur'){  ?> selected <?php } ?>>Administrateur</option>
    <option <?php if ($user->type== 'Administrateur Site'){  ?> selected <?php } ?>>Administrateur Site</option>
    <option <?php if ($user->type== 'Employer'){  ?> selected <?php } ?> >Employer</option>
                    </select>    

         </div>
       <?php } ?>
         <div class="form-group">  <button type="submit" class="btn btn-primary">Valider</button></div>
           
             
            </div>
             
            
          </form>
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (left) -->
       
        <!-- /.col (right) -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
     
@endsection




