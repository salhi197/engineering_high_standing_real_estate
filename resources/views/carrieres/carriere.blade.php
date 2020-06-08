@extends('layouts.master')
@section('title', 'Carrière')
@section('content')

     
        <!-- header-area start -->
         <header class="header-area bg-1 sticky-menu" id="sticky-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-10 col-sm-8 col-6">
                    <div class="logo">
                        <a href="/"><img src="images/logo-alco-3i.svg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-10 d-none d-lg-block">
                    <div class="mainmenu">
                        <ul id="navigation">
                            <li ><a href="/">Accueil</a>
                                
                            </li>
                            <li><a href="#">Présentation <i class="fa fa-angle-down"></i></a>
                                  <ul>
                                    <li><a href="/about">Qui sommes-nous</a></li>
                                    <li><a href="/standards">Nos standards</a></li>
                                    <li><a href="/fondateur">Mot du fondateur</a></li>
                                </ul>
                            </li>
                            <li ><a href="/nos-projets">Nos Projets </a>
                            </li>
                            <li ><a href="/nouveau-projets">Nos offres exceptionnelles</a>
                                
                            </li>
                             <li ><a href="/actualite">Actualités</a></li>
                            <li class="active"><a href="/carriere">Carrière</a></li>
                       
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
                        <h2>Recrutement</h2>
                        <ul>
                            <li><a href="/">Accueil</a></li>
                            <li>-</li>
                            <li>Carrière</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcumb-area end -->
    <!-- ablout-area start -->
<div class="blog-area blog-details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-wrap">
                        
                        <div class="blog-content">
                        <!-- 
                         -->
                            <h4>Nous recrutons : </h4>
                        </div>
                    </div>
                    <div class="blog-details-wrap">
                      
                        <blockquote>
                        - Ingénieur CES <br>
                        - Architecte Sénior et Junior <br>
                        - Ingénieur en Génie civil <br>
                        - Marketing <br>
                        - Assistant (e) Commercial (Junior) <br>
                        - 3diste <br>
                        - Conducteur des travaux <br>
                        - Architect cuisiniste 


                         </blockquote>
                  
                        <div class="blog-form">
						@if(Session::has('flash_message'))
                        <div class="alert alert-success alert-dismissable">
                            {{Session::get('flash_message')}}
                    </div>
                        @endif
                            <h3>Envoyez votre candidature</h3>
                            <form  action="/carriere" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="text"  class="form-control {{ $errors->has('name') ? 'has-error' : '' }}"  type="text" required="required" placeholder="Nom" id="name" name="name" value="{{ old('name') }}">
                                   @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
								
								<!-- <span>Email</span> -->
                                <input type="email" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" placeholder="Email" required="required" id="email" name="email" value="{{ old('email') }}">
                                   @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
								<!-- <span>Message</span> -->
                                <textarea  class="form-control {{ $errors->has('msg') ? 'has-error' : '' }}" required="required" placeholder="Message" id="msg" name="msg" cols="30" rows="10" >{{ old('msg') }}</textarea>
                                   @if ($errors->has('msg'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('msg') }}</strong>
                                    </span>
                                @endif

								 <!-- <span>Joindre votre CV</span> -->
                                <input class="file" type="file"  required name="a_file" id="a_file">
								@if ($errors->has('a_file'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('a_file') }}</strong>
                                    </span>
                                @endif
								<br>
                                <button>Envoyer</button>
                            </form>
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
