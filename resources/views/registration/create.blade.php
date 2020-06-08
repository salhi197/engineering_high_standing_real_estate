@extends('layouts.master')
@section('title', 'online')
@section('content')

        <header class="header-area bg-1 sticky-menu" id="sticky-header">
        <div class="container">
            <div class="row">
                 <div class="col-lg-2 col-md-12 col-sm-10 col-6">
                    <div class="logo">
                        <a href="/"><img class="logo1" src="images/logo-alco-3i.svg" alt="3i group"></a>
                    </div>
                </div>
                <div class="col-lg-10 d-none d-lg-block">
                    <div class="mainmenu">
                        <ul id="navigation">
                            <li class="active"><a href="/">Accueil</a>
                                
                            </li>
                            <li><a href="#">Présentation <i class="fa fa-angle-down"></i></a>
                                  <ul>
                                    <li><a href="/about">Qui sommes-nous</a></li>
                                    <li><a href="/standards">Nos standards</a></li>
                                    <li><a href="/fondateur">Mot du fondateur</a></li>
                                </ul>
                            </li>
                            <li><a href="/nos-projets">Nos Projets </a>
                            </li>
                            <li><a href="/nouveau-projets">Nos offres exceptionnelles</a>
                                
                            </li>
                             <li><a href="/actualite">Actualités</a></li>
                            <li><a href="/carriere">Carrière</a></li>
                       
                            <li><a href="/contact">Contact</a></li>
                            
                        </ul>
                    </div>
                </div>
              
           
                <div class="col-md-1 col-sm-1 col-2 d-lg-none d-sm-block">
                    <div class="responsive-menu-wrap floatright"></div>
                </div>
            </div>
        </div>
    </header>
     <div class="breadcumb-area black-opacity bg-img-6">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap">
                        <h2>Creation Utilisateur</h2>
                        <ul>
                            <li><a href="/">Accueil</a></li>
                            <li>-</li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="blog-area blog-details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-wrap">
                        
                        <div class="blog-content">
                        <!-- 
                         -->
                            <h4>Créer un Utilisateur: </h4>
                        </div>
                    </div>
                    <div class="blog-details-wrap">
                      
                       
                  
                        <div class="blog-form">
                                         <form  method="post" action="/register">
         {{ csrf_field() }}
         <div class="modal-header">
        
       
      </div> 
          <div class="modal-body">
              
            <div class="form-group">
    <label for="name">{{ __('Nom') }}</label>
    
      <input type="text"  class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  id="name" name="name" required autofocus placeholder="name" value="{{ old('name') }}" >
         @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
    
  </div>
         
         
         
         
  <div class="form-group">
    <label for="email">{{ __('E-Mail Address') }}</label>
    
      <input type="email"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  id="email" name="email" required autofocus placeholder="Email" value="{{ old('email') }}">
         @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
    
  </div>
         
    
         
         
  <div class="form-group">
    <label for="password">{{ __('Password') }}</label>
    
      <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" required placeholder="Password" value="{{ old('password') }}">
        @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
    
  </div>
            
         
  <div class="form-group">
    <label for="password_confirmation">{{ __('Password Confirmation') }}</label>
 
      <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" id="password_confirmation" name="password_confirmation" required placeholder="Password Confirmation">
         @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
       
  </div>
  

          <div class="form-group">
    <label for="type">{{ __('Type') }}</label>
   
     <select class="form-control" id="type" name="type">
    <option <?php if (old('type')== 'Administrateur'){  ?> selected <?php } ?>>Administrateur</option>
    <option <?php if (old('type')== 'Employer'){  ?> selected <?php } ?> >Employer</option>
                    </select>    

         </div>
         <div class="form-group">
   <div class="modal-footer ">
      <button type="submit" class="btn btn-primary btn-lg active">Valider</button>
      
    </div>
              </div> 
         
         </div>
                    </form>
            </div>
             
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <aside class="sidebar-wrap">
                   
                        
                        
                    </aside>
                </div>
            </div>
        </div>
    </div>
    
     
@endsection
