
  <header class="main-header">
    <!-- Logo -->
    <a href="/home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Groupe </b>3i</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Groupe </b>3i</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">{{count($newsletter)}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">{{count($newsletter)}} messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  @foreach($newsletter as $message)
                  <li><!-- start message -->
                    <a href="#">
                     <?php  ?>
                      <h4>
                        {{$message->email}}
                        <small><i class="fa fa-clock-o"></i> {{Carbon::parse($message->created_at)->diffForHumans()}}</small>
                      </h4>
                      <p>{{$message->sujet}}</p>
                    </a>
                  </li>
                  @endforeach
                  <!-- end message -->
                
                 
                </ul>
              </li>
              <li class="footer"><a href="/newsletter">Voir tout les Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">{{count($HistoriquesS)+count($HistoriquesM)+count($HistoriquesI)}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">{{count($HistoriquesS)+count($HistoriquesM)+count($HistoriquesI)}} Historique</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  @foreach($HistoriquesM as $M)
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i>{{$M->actoin .' ' . $M->user_name}}
                    </a>
                  </li>
                  @endforeach
                     @foreach($HistoriquesS as $S)
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i>{{$S->actoin .' ' . $S->user_name}}
                    </a>
                  </li>
                  @endforeach
                     @foreach($HistoriquesI as $I)
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i>{{$I->actoin .' ' . $I->user_name}}
                    </a>
                  </li>
                  @endforeach
                 
                
                </ul>

              </li>
              <li class="footer"><a href="/historique">Voir tout</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/user_image.png" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/user_image.png" class="img-circle" alt="User Image">

                <p>
                  {{Auth::user()->name}} - {{Auth::user()->type}}
                
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
              
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/CompteModifier/{{Auth::user()->id}}" class="btn btn-default btn-flat"> Modifier Profile</a>
                </div>
                <div class="pull-right">
                  <a href="/logout" class="btn btn-default btn-flat">Déconnexion</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
      
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
   