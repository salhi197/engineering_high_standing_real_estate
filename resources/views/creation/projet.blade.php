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
        <li><a href="/projets">Projet</a></li>
        <li class="active">Nouveau Projet</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10">
      

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">
                 Information de Projet
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
                <form method="post" action="/projets/ajouter" enctype="multipart/form-data">
         
        {{ csrf_field() }} 
         
  <div class="form-group {{ $errors->has('nom') ? ' has-error' : '' }}">
    <label for="nom">Nom:</label>
    <input type="text"  placeholder="Enter Nom ..." class="form-control " id="nom" name="nom"  value="{{ old('nom') }}"  required>
  @if ($errors->has('nom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nom') }}</strong>
                                    </span>
                                @endif
       
         </div>
         
  <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
    <label for="description">Description:</label>
    <textarea id="description"  placeholder="Enter description ..." name="description" class="textarea" required   style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('description') }}</textarea>
       @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
  </div>
         
                   <div class="form-group{{ $errors->has('appartements') ? ' has-error' : '' }}">
    <label for="appartements">Appartements:</label>
    <textarea id="appartements" placeholder="Enter les types d'appartements ..." name="appartements" class="textarea " required style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('appartements') }}</textarea>
       @if ($errors->has('appartements'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('appartements') }}</strong>
                                    </span>
                                @endif
  </div>
                        <div class="form-group{{ $errors->has('partieC') ? ' has-error' : '' }}">
    <label for="patieC">Parties Communes:</label>
    <textarea id="partieC" placeholder="Enter les parties communes ..." name="partieC" class="textarea " required style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('partieC') }}</textarea>
       @if ($errors->has('partieC'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('partieC') }}</strong>
                                    </span>
                                @endif
  </div>
         
         <div class="form-group{{ $errors->has('parking') ? ' has-error' : '' }}">
    <label for="parking">Parking:</label>
    <textarea id="parking" placeholder="Enter les types d'parking ..." name="parking" class="textarea" required style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('parking') }}</textarea>
       @if ($errors->has('parking'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('parking') }}</strong>
                                    </span>
                                @endif
  </div>
                       
                        <div class="form-group{{ $errors->has('localisation') ? ' has-error' : '' }}">
    <label for="localisation">Localisation:</label>
    <input type="url"  class="form-control " id="localisation" name="localisation"  value="{{ old('localisation') }}"  placeholder="https://example.com"
               pattern="https://.*"   required>
  @if ($errors->has('localisation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('localisation') }}</strong>
                                    </span>
                                @endif
       
         </div>
         
            <div class="form-group{{ $errors->has('disponibilite') ? ' has-error' : '' }}">
    <label for="disponibilite">Disponibilité:</label>
    <input type="text"  class="form-control " id="disponibilite" name="disponibilite"  value="{{ old('disponibilite') }}"  placeholder="Disponibilité"
              >
  @if ($errors->has('disponibilite'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('disponibilite') }}</strong>
                                    </span>
                                @endif
       
         </div>
     
      
   <div class="form-group">
    <label for="types">Type Projet:</label>
   <select class="form-control select2" id="type"  required name="type"  data-placeholder="Selectoinner  Type de projet" style="width: 100%;">
    
    @foreach($types as $type)
     <option>{{$type->nom}}</option>
                 
                  @endforeach
                </select>
   
             
  </div>
                       <div class="form-group {{ $errors->has('filename.*') ? 'has-error' : '' }}">
                       <label> Photos de projet</label>
      <div class="input-group control-group increment " id="increment1" >
          <input type="file" name="filename[]" class="form-control">
          <div class="input-group-btn"> 
            <button class="btn btn-success" id="btn-success1" type="button"><i class="glyphicon glyphicon-plus"></i>Ajouter</button>
          </div>
          
        </div>
        <div class="clone hide" id="clone1">
          <div class="control-group input-group" id="control-group1" style="margin-top:10px">
            <input type="file" name="filename[]" class="form-control">
            <div class="input-group-btn"> 
              <button class="btn btn-danger" id="btn-danger1"type="button"><i class="glyphicon glyphicon-remove"></i> Supprimer</button>
            </div>
          </div>
           
        </div>
        @if ($errors->has('filename.*'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('filename.*') }}</strong>
                                    </span>
                                @endif
        
                           </div>
                           <br>
 <div class="form-group{{ $errors->has('video') ? ' has-error' : '' }}">
    <label for="video">Vidéo de projet:</label>
    
            <input type="file" name="video" id="video"  class="form-control "  value="{{ old('video') }}"/>
                            @if ($errors->has('video'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('video') }}</strong>
                                    </span>
                                @endif
                              </div>




                       <div class="form-group{{ $errors->has('pourcentage') ? ' has-error' : '' }}">
    <label for="type">Etat d'avancement:</label>
    
            <input type="number" name="pourcentage" id="pourcentage"  class="form-control "  value="{{ old('pourcentage') }}"/>
                            @if ($errors->has('pourcentage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pourcentage') }}</strong>
                                    </span>
                                @endif
                              </div>
                           
                      <div class="form-group {{ $errors->has('filename2.*') ? ' has-error ' : '' }}">
                       <label> Photos d'etat d'avancement</label>
     <div class="input-group control-group increment" id="increment2" >
          <input type="file" name="filename2[]" class="form-control">
          <div class="input-group-btn"> 
            <button class="btn btn-success" id="btn-success2" type="button"><i class="glyphicon glyphicon-plus"></i>Ajouter</button>
          </div>
        </div>
         <div class="clone hide" id="clone2">
          <div class="control-group input-group" id="control-group2" style="margin-top:10px">
            <input type="file" name="filename2[]" class="form-control">
            <div class="input-group-btn"> 
              <button class="btn btn-danger" id="btn-danger2"type="button"><i class="glyphicon glyphicon-remove"></i> Supprimer</button>
            </div>
          </div>
        </div>
         @if ($errors->has('filename2.*'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('filename2.*') }}</strong>
                                    </span>
                                @endif
                           </div> 


                           <br>
                            <div class="form-group">
    <label for="type_offre">Type Offre:</label>
   <select class="form-control select2" id=type_offre"  name="type_offre" data-placeholder="Selectoinner  Type d'offre" style="width: 100%;">
    
    @foreach($offres as $offre)
     <option>{{$offre->nom}}</option>
                 
                  @endforeach
                </select>
   
             
  </div>    
    <div class="form-group date{{ $errors->has('date_debut') ? ' has-error' : '' }}">
    <label for="date_debut">Date debut Offre:</label>
     <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
               <input type="date" class="form-control pull-right"   name="date_debut" id="date_debut"  value="{{ old('date_debut') }}"/>
                </div>
    
                    
                 

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
               <input type="date" class="form-control pull-right"   name="date_fin" id="date_fin"  value="{{ old('date_debut') }}"/>
                </div>
   

                              @if ($errors->has('date_fin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_fin') }}</strong>
                                    </span>
                                @endif
  </div>
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

<script type="text/javascript">

    $(document).ready(function() {

      $("#btn-success1").click(function(){ 
          var html = $("#clone1").html();
          $("#increment1").after(html);
      });

      $("body").on("click","#btn-danger1",function(){ 
          $(this).parents("#control-group1").remove();
      });
$("#btn-success2").click(function(){ 
          var html = $("#clone2").html();
          $("#increment2").after(html);
      });

      $("body").on("click","#btn-danger2",function(){ 
          $(this).parents("#control-group2").remove();
      });
    });

</script>    
     
@endsection
