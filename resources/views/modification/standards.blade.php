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
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Projets</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="/projets"><i class="fa fa-angle-right"></i> Nos Projets</a></li>
            <li><a href="/offrreExceptoinnelles"><i class="fa fa-angle-right"></i> Nos offres exceptionnelles</a></li>
            <li class="active"><a href="/nos-standards"><i class="fa fa-angle-right"></i>Nos Standards</a></li>
          </ul>
        </li>
       
            <?php if(Auth::user()->type=='Administrateur Site') { ?>
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
      
        <li ><a href="/historique"><i class="fa fa-book"></i> <span>Historique</span>  <span class="pull-right-container">
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
        <li><a href="/nos-standards">Standards</a></li>
        <li class="active">Modifier Standards</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10">
      

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
           
            <div class="box-body pad">
             <form method="post" action="/modifierStandards/{{$standard->id}}" enctype="multipart/form-data" >
         
        {{ csrf_field() }} 
        
 
       <div class="form-group{{ $errors->has('securite') ? ' has-error' : '' }}">
    <label for="securite">Sécurité:</label>
      <textarea  placeholder="sécurité..."  class="textarea"style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="securite" name="securite" required> {{$standard->securite}} </textarea>
  @if ($errors->has('securite'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('securite') }}</strong>
                                    </span>
                                @endif
       
         </div>
          <div class="form-group {{ $errors->has('confort') ? 'has-error' : '' }}">
    <label for="confort">Confort:</label>
    <textarea id="confort" placeholder="confort..."  name="confort"  class="textarea"style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required >@if (isset($standard)) {{$standard->confort}} @endif</textarea>
       @if ($errors->has('confort'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('confort') }}</strong>
                                    </span>
                                @endif
  </div>
    <div class="form-group {{ $errors->has('esthetique') ? ' has-error' : '' }}">
    <label for="esthetique">Esthétique:</label>
    <textarea id="esthetique" name="esthetique" placeholder="esthetique..."  class="textarea"style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required > @if (isset($standard)) {{$standard->esthetique}} @endif </textarea>
       @if ($errors->has('text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('esthetique') }}</strong>
                                    </span>
                                @endif
  </div>
   <div class="form-group {{ $errors->has('fonctoinnalite') ? ' has-error' : '' }}">
    <label for="fonctoinnalite">Fonctionnalité:</label>
    <textarea id="fonctoinnalite" name="fonctoinnalite" placeholder="fonctoinnalite..."  class="textarea"style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"required > @if (isset($standard)) {{$standard->fonctoinnalite}} @endif </textarea>
       @if ($errors->has('text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fonctoinnalite') }}</strong>
                                    </span>
                                @endif
  </div>
      <div class="form-group">  
     
      <button type="submit" class="btn btn-primary">Valider</button>
          
      </div>                         
  </div>
          
  
           
              
     
    
      
</form>     
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
    
     
@endsection
