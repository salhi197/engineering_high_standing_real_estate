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
    <div class="row">
		 <div class="col-md-3">
          <a class="btn btn-primary" href="/projets/ajouter">
            <i class="glyphicon glyphicon-plus"></i>Ajouter</a>
			</div>
        @if($flash=session('message'))

		  <div class="col-md-3" id="message-div" style="width: 20%;">
        <div class="box-header  alert-success">
              <h3 class="box-title">{{$flash}}</h3>

            
            </div>
     
     
       
      </div>
        @endif
			</div>
          
        
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Accueil</a></li>
        
        <li class="active">Nos Projets</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Table des Projets</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-hover table-bordered">
                <thead>
                 <tr>
                  <th hidden="hidden">position</th>
                  <th>Nom</th>
                 
                  <th>Type</th>
               
                 
                  <th>Offre</th>
                 
                  <th>Etat d'avencement</th>
                 <th>Editer</th>
                  <th>Supprimer</th>
                </tr>
                </thead>
             <tbody>
              <?php 
                  if(isset($projets)) {?>
                  @foreach($projets as $projet)
                   <tr data-index="{{$projet->id}}" data-position="{{$projet->positionne}}" >
                    <td hidden="hidden">{{$projet->positionne}}</td>
                  <td>{{$projet->nom}}</td>
                  <td>{{$projet->type}}</td>
              
                  <td>@if($projet->offre==null)
					<a data-placement="top" data-toggle="tooltip" title="Ajouter" href="/ajouterOfrre/{{$projet->id}}">  <small class="label label-primary"><i class="glyphicon glyphicon-plus"></i> Ajouter</small> </a>
					
				  @else
					  <a data-placement="top" data-toggle="tooltip" title="Editer" href="/modifier/offre/{{$projet->id}}">  <small class="label label-warning "><i class="glyphicon glyphicon-pencil"></i> Editer</small> </a>
					  <a data-placement="top" data-toggle="tooltip" title="Supprimer" onclick="return sure1();" href="/supprime/offre/{{$projet->id}}">  <small class="label label-danger "><i class="glyphicon glyphicon-trash"></i> Supprimer</small> </a>
				  @endif</td>
                 <td><span class="badge <?php if($projet->type=='Nouveau') {?>bg-red <?php } ?>
                 <?php if($projet->type=='Traveaux en cours') {?>bg-yellow <?php } ?>
                 <?php if($projet->type=='Dèrniere opportunite') {?>bg-blue <?php } ?>
                   <?php if($projet->type=='Livraison Immédiate') {?>bg-green <?php } ?>">
                   <?php if($projet->pourcentage==null) 
                   {$pr=0;
                   }
                   else
                   {
                    $pr=$projet->pourcentage;
                   }

                   ?>
                   {{$pr}}%</span></td>
                       <td><p >
                       <a data-placement="top" data-toggle="tooltip" title="Editer" class="btn btn-warning btn-xs" href="/projets/modifier/{{$projet->id}}"><i class="fa fa-pencil"></i>
            <span class="nav-link-text"></span></a></p></td>
                        <td><p >
                          <a data-placement="top" data-toggle="tooltip"  title="Supprimer" onclick="return sure2();"id="supprimer_projet" href="/projets/supprimer/{{$projet->id}}"class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>
            <span class="nav-link-text"></span></a></p></td>
                </tr>
                  @endforeach
              <?php }?>
              </tbody>
                <tfoot>
                 <tr>
                    <th hidden="hidden">position</th>
               <th>Nom</th>
                 
                  <th>Type</th>
                
                  <th>Offre</th>
                 
                  <th>Etat d'avencement</th>
                 <th>Editer</th>
                  <th>Supprimer</th>
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
   
     <script>
 function sure1()
{
    return(confirm('Etes-vous sûr de vouloir supprimer cette Offre ?'));
}
 function sure2()
{
    return(confirm('Etes-vous sûr de vouloir supprimer ce Projet ?'));
}
</script>   
<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
 <script
  src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>



  <script type="text/javascript">

     $(document).ready(function () {
       $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     
           $('table tbody').sortable({
               update: function (event, ui) {
                   $(this).children().each(function (index) {
                         if ($(this).attr('data-position') != (index+1)) {
                            $(this).attr('data-position', (index+1)).addClass('updated');
                        }
                   });


                   saveNewPositions();
               }
           });
        });

    function saveNewPositions() {


            var positions = [];
            $('.updated').each(function () {
               positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
               $(this).removeClass('updated');
            });

            $.ajax({
               url: '/updatepostion',
               method: 'POST',
               dataType: 'json',
               data: {
               
                   update: 1,
                   positions: positions
               }, success: function (response) {
                    console.log(response);
               }
            });
        }
  </script>
     
@endsection
