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
        <li class="active treeview" >
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Tableau de bord</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="/home"><i class="fa fa-angle-right"></i> Tableau de bord</a></li>
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
       
            <?php if(Auth::user()->type=='Administrateur Site'){ ?>
        <li>
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
        
      
        <li><a href="/historique"><i class="fa fa-book"></i> <span>Historique</span>  <span class="pull-right-container">
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
     
      <ol class="breadcrumb">
        <li><a class="active"><i class="fa fa-dashboard"></i>Accueil</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$nb_projets}}</h3>

              <p>Nombre Projets</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/projets" class="small-box-footer">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
          </div>



        </div>
                <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$nb_article}}</h3>

              <p>Nombre Article</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/articles" class="small-box-footer">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         @if((Auth::user()->type=='Administrateur')|| (Auth::user()->type=='Administrateur Site'))
                <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$nb_user}}</h3>

              <p>Nombre d'utilisateurs</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="" class="small-box-footer">Plus d'infos <i class="fa fa-ban-right"></i></a>
          </div>
        </div>
        @endif
       
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Historique personnelle</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th hidden="hidden">id</th>
                <th>Actoin</th>
                 
                  <th>Table</th>
                  <th>Utilisateur</th>
                  
                  <th>Date_historique</th>
                  <th>Voir Plus</th>
                </tr>
                </thead>
            <tbody>
              <?php use Carbon\Carbon; Carbon::setLocale('fr');
                  if(isset($historiques)) {?>
                  @foreach($historiques as $historique)
                   <tr>
                     <td hidden="hidden">{{$historique->id}}</td>
                  <td>{{$historique->actoin}}</td>
                  <td>{{$historique->table}}</td>
                   <td>{{$historique->user_name}}</td>
               
                  <td>{{Carbon::parse($historique->created_at)->diffForHumans()}}</td>
                   <td><a data-placement="top" data-toggle="tooltip"  title="view" class="btn btn-info" href="/information/{{$historique->id}}">
                <i class="glyphicon glyphicon-eye-open"></i> Voir
              </a></td>
                 
                </tr>
                  @endforeach
              <?php }?>
              </tbody>
                <tfoot>
                 <tr>
                  <th hidden="hidden">id</th>
            <th>Actoin</th>
                 
                  <th>Table</th>
                  <th>Utilisateur</th>
                  
                  <th>Date_historique</th>
                  <th>Voir Plus</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
    
     
@endsection
