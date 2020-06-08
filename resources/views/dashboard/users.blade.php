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
     
         @if(Auth::user()->type=='Administrateur Site')
			   <div class="row">
		 <div class="col-md-3">
           <a class="btn btn-primary" href="/users/ajouter">
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
         
         
          @endif
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Accueil</a></li>
        
        <li class="active"> Nos Utilisateurs</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Table des Utilisateurs</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                 <tr>
                 <th>Nom</th>
                 
                  <th>Email</th>
                  <th>Type</th>
                  <th>Date_creation</th>
 <th>Bloquer</th>
 <?php  if((Auth::user()->type=='Administrateur') ||(Auth::user()->type=='Administrateur Site') ) { ?>
  <th>Editer</th>
  <?php } ?>
 <?php if(Auth::user()->type=='Administrateur Site') { ?>
                
                  <th>Supprimer</th>
                   <?php } ?>
                </tr>
                </thead>
                  <tbody>
              <?php use Carbon\Carbon; Carbon::setLocale('fr');
                  if(isset($users)) {?>
                  @foreach($users as $user)
                   <tr>

                  <td>{{$user->name}}<?php $name=$user->id; ?></td>
                  <td>{{$user->email}}</td>
                       <td>{{$user->type}}</td>
                  <td>{{Carbon::parse($user->created_at)->diffForHumans()}}</td>
                  
                   <td>
                    <?php if($user->droits=='') { ?>
                    <a href="/users/bloquer/{{$user->id}}" type="button" class="btn btn-danger btn-xs" onclick="return sure2();">Bloquer</a>
                   <?php } ?>
                    <?php if($user->droits=='bloquer') { ?>
                    <a href="/users/Debloquer/{{$user->id}}" type="button" class="btn btn-danger btn-xs" onclick="return sure3();">Debloquer</a>
                   <?php } ?>
                   </td>
                    <?php  if((Auth::user()->type=='Administrateur') ||(Auth::user()->type=='Administrateur Site') ) { ?>
                    <td><p >
                            <a data-placement="top" data-toggle="tooltip" title="Editer"class="btn btn-warning btn-xs" href="/user/modification/{{$user->id}}">
            <i class="fa fa-pencil"></i>
            </a>
                        </p></td>
                      <?php } ?>
                <?php if(Auth::user()->type=='Administrateur Site') { ?>
                   
                    <td><p >
                      <a data-placement="top" data-toggle="tooltip"  title="Supprimer" onclick="return sure();"  href="user/supprimer/{{$user->id}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>
            <span class="nav-link-text"></span></a></p></td>
                 <?php } ?>
                       
                </tr>
                                               
                  @endforeach
              <?php }?>
              </tbody>
                <tfoot>
                 <tr>
                      <th>Nom</th>
                 
                  <th>Email</th>
                  <th>Type</th>
                  <th>Date_creation</th>
                  <th>Bloquer</th>
                  <?php  if((Auth::user()->type=='Administrateur') ||(Auth::user()->type=='Administrateur Site') ) { ?>
<th>Editer</th>
<?php } ?>
 <?php if(Auth::user()->type=='Administrateur Site') { ?>
                 
                  <th>Supprimer</th>
                  <?php } ?>
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
 function sure()
{
    return(confirm('Etes-vous sûr de vouloir Supprimer cette Utilisateur ?'));
}
function sure2()
{
    return(confirm('Etes-vous sûr de vouloir Bloquer cette Utilisateur ?'));
}
function sure3()
{
    return(confirm('Etes-vous sûr de vouloir Débloquer cette Utilisateur ?'));
}
 
</script>    
@endsection