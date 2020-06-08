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
            <li class="active"><a href="/projets"><i class="fa fa-angle-right"></i> Nos Projets</a></li>
            <li><a href="/offrreExceptoinnelles"><i class="fa fa-angle-right"></i> Nos offres exceptionnelles</a></li>
            <li><a href="/nos-standards"><i class="fa fa-angle-right"></i>Nos Standards</a></li>
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
      
        <li class="active"><a href="/historique"><i class="fa fa-book"></i> <span>Historique</span>  <span class="pull-right-container">
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
        <li><a href="/projets">Projet</a></li>
        <li class="active">Nouveau Offre</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
      

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">
                Information de l'offre
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
            <!-- /.box-header -->
            <div class="box-body pad">
                <form method="post" action="/offre/ajouter" >
         
        {{ csrf_field() }} 
         
 
  
                     <input hidden="hidden" value="{{$projet->id}}" name="projet_id" >  
                       <input hidden="hidden" value="{{$projet->nom}}" name="projet_nom" >  
                 <div class="form-group">
    <label for="type_offre">Type Offre:</label>
   <select class="form-control select2" id=type_offre"  name="type_offre"  data-placeholder="Selectoinner  Type d'offre" style="width: 100%;">
    
    @foreach($offres as $offre)
     <option>{{$offre->nom}}</option>
                 
                  @endforeach
                </select>
   
             
  </div>
 
                         <div class="form-group date{{ $errors->has('date_debut') ? ' has-error' : '' }}">  
						 <label for="date_debut">Date debut Offre:</label>   
						 <div class="input-group date">     
						 <div class="input-group-addon">                 
						 <i class="fa fa-calendar">
						 </i>          
						 </div>             
						 <input type="date" class="form-control pull-right"   name="date_debut" id="date_debut"  value="{{ old('date_debut') }}"required>                 </div>
    
                    
                 

                               @if ($errors->has('date_debut'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_debut') }}</strong>
                                    </span>
                                @endif
                         </div>
						 
						 
						 
                        <div class="form-group date {{ $errors->has('date_fin') ? ' has-error' : '' }}">  
						<label for="date_fin">Date Fin Offre:</label>  
						<div class="input-group date">            
						<div class="input-group-addon">        
						<i class="fa fa-calendar"></i>     
						</div> 
						<input type="date" class="form-control pull-right"   name="date_fin" id="date_fin"  value="{{ old('date_fin') }}" required>                 </div>    
                              @if ($errors->has('date_fin'))                  
							<span class="help-block">                      
							  <strong>{{ $errors->first('date_fin') }}</strong>      
							 </span>                               
							  @endif  
						 </div>
         
      <div class="form-group">       
      <div class="modal-footer">     
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
