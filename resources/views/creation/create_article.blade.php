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
       
        <li class="active">
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
            <li><a href="/contact/telephones"><i class="fa fa-angle-rightfa fa-angle-right"></i> Telephones</a></li>
            <li><a href="/contact/adresse"><i class="fa fa-angle-rightfa fa-angle-right"></i> Adresses</a></li>
            <li><a href="/contact/faxs"><i class="fa fa-angle-rightfa fa-angle-right"></i>Faxs</a></li>
            <li><a href="/contact/emails"><i class="fa fa-angle-rightfa fa-angle-right"></i>Emails</a></li>
            <li><a href="/contact/Reseaux"><i class="fa fa-angle-rightfa fa-angle-right"></i> Réseaux sociaux</a></li>
            
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
       
            <?php if((Auth::user()->type=='Administrateur') ||(Auth::user()->type=='Administrateur Site') ){ ?>
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
     

        <small>Formulaire</small>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li><a href="/articles">Article</a></li>
        <li class="active">Nouveau Article</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10">
      

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">
			  Information de l'article
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
              <form method="post" action="/ajouterArticle" enctype="multipart/form-data">
                 {{ csrf_field() }} 

  <div class="form-group{{ $errors->has('titre') ? 'has-error' : '' }}">
    <label for="titre">Titre:</label>
    <input type="text" placeholder="Titre..."  class="form-control" id="titre" name="titre"  value="{{ old('titre') }}"  required>
  @if ($errors->has('titre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('titre') }}</strong>
                                    </span>
                                @endif
       
         </div>
         
  <div class="form-group{{ $errors->has('resume') ? 'has-error' : '' }}">
    <label for="resume">Résumé:</label>
    <textarea id="resume" placeholder="Résumé..."  name="resume" class="form-control" required >{{ old('resume') }}</textarea>
       @if ($errors->has('resume'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('resume') }}</strong>
                                    </span>
                                @endif
  </div>
 <div class="form-group{{ $errors->has('text') ? 'has-error' : '' }}">
  <textarea class="textarea " placeholder="Enter le text de l'article" id="text" name="text"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required >{{ old('text') }}</textarea>
                       @if ($errors->has('text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                @endif
                              </div>
                        
                      
  <div class="form-group {{ $errors->has('mot_cles[]') ? 'has-error' : '' }}">
    <label for="mot_cle">Mots clés:</label>
   <select class="form-control select2" id="mot_cles[]"  name="mot_cles[]" multiple="multiple" data-placeholder="Selectoinner  mot clé(s)" style="width: 100%;">
    
    @foreach($motcles as $motcle)
     <option >{{$motcle->name}}</option>
                 
                  @endforeach
                </select>
   
              @if ($errors->has('mot_cle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mot_cle') }}</strong>
                                    </span>
                                @endif
  </div>
        
                          <div class="form-group {{ $errors->has('auteur') ? 'has-error' : '' }}">
    <label for="auteur">Auteurs:</label>
     <select class="form-control select2" id="auteurs[]"  name="auteurs[]"multiple="multiple" data-placeholder="Selectoinner  auteur(s)" style="width: 100%;">
                  @foreach($auteurs as $auteur)
     <option>{{$auteur->nom}}</option>
                 
                  @endforeach
                </select>
  
              @if ($errors->has('auteur'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('auteur') }}</strong>
                                    </span>
                                @endif
  </div>
          
                        
      
  
      <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    <label for="photo">Photo:</label>
         <input type="file" name="photo" id="photo" class="form-control"  value="{{ old('photo') }}" required >
           @if ($errors->has('photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
         </div> 
          <div class="form-group{{ $errors->has('video') ? ' has-error' : '' }}">
    <label for="video">Vidéo:</label>
    
            <input type="file" name="video" id="video"  class="form-control "  value="{{ old('video') }}"/>
                            @if ($errors->has('video'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('video') }}</strong>
                                    </span>
                                @endif
                              </div>
  <div class="form-group {{ $errors->has('source') ? 'has-error' : '' }}">
    <label for="source">Youtube vidéo:</label>
    <input type="url" placeholder="Source"class="form-control" id="source" name="source"  value="{{ old('source') }}"  placeholder="https://example.com"
               pattern="https://.*">
  @if ($errors->has('source'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('source') }}</strong>
                                    </span>
                                @endif
       
         </div>
                       
              
      <div class="form-group">  
     
      <button type="submit" class="btn btn-primary">Valider</button>
          
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
