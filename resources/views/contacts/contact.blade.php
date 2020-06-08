@extends('layouts.master')
@section('title', 'Contact')
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
                             <li><a href="/actualite">Actualités</a></li>
                            <li><a href="/carriere">Carrière</a></li>
                       
                            <li class="active"><a href="/contact">Contact</a></li>
                             
                        </ul>
                    </div>
                </div>
             
                <div class="col-md-1 col-sm-1 col-2 d-lg-none d-sm-block">
                    <div class="responsive-menu-wrap floatright"></div>
                </div>
            </div>
        </div>
    </header>
   
    
    <!-- breadcumb-area start -->
    <div class="breadcumb-area black-opacity bg-img-6">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap">
                        <h2>Contactez Nous</h2>
                        <ul>
                            <li><a href="index.html">Accueil</a></li>
                            <li>-</li>
                            <li>Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcumb-area end -->
    <!-- ablout-area start -->
<div class="contact-area pt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="contact-form">
                        <div class="cf-msg" style="display: none;"></div>
                        @if(Session::has('flash_message'))
                        <div class="alert alert-success alert-dismissable">
                            {{Session::get('flash_message')}}
                    </div>
                        @endif
                        <form action="/contact" method="post" >
                         {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <input class="form-control {{ $errors->has('name') ? 'has-error' : '' }}"  type="text" required="required" placeholder="Nom" id="name" name="name" value="{{ old('name') }}">
                                     @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="col-md-6 col-12">
                                    <input type="email" class="form-control {{ $errors->has('email1') ? 'has-error' : '' }}" placeholder="Email" required="required" id="email1" name="email1" value="{{ old('email1') }}">
                                      @if ($errors->has('email1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email1') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control {{ $errors->has('subject') ? 'has-error' : '' }}" placeholder="Sujet" required="required" id="subject" name="subject" value="{{ old('subject') }}">
                                    @if ($errors->has('subject'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="col-12">
                                    <textarea  class="form-control {{ $errors->has('msg') ? 'has-error' : '' }}" required="required" placeholder="Message" id="msg" name="msg">{{ old('msg') }}</textarea>
                                      @if ($errors->has('msg'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('msg') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="col-12">
                                    <button id="submit" class="cont-submit btn-contact btn-style" name="submit">Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="contact-wrap">
                         <?php  if(isset($Contacts)) {?>
                        <ul>
                            
                            <?php  if(isset($Contacts->telephones)) {?>
                            <li>
                                <i class="fa fa-phone"></i> Téléphone
                                <p>
                                 @foreach($Contacts->telephones as $telephone)
                                    <span>{{'+213 '.$telephone->telephone}}</span>
                                          @endforeach
                                </p>
                            </li>
                             <?php  } ?>
                            
                            <?php  if(isset($Contacts->faxs)) {?>
                             <li>
                                <i class="fa fa-fax"></i> Fax
                                <p>
                                 @foreach($Contacts->faxs as $fax)
                                    <span>{{'+213 '.$fax->fax}}</span>
                                          @endforeach
                                </p>
                            </li>
                            <?php  } ?>
                             <?php  if(isset($Contacts->emails)) {?>
                            <li>
                                <i class="fa fa-envelope"></i> Email
                                <p>
                                      @foreach($Contacts->emails as $email)
                                    <span>{{$email->email}}</span>
                                          @endforeach
                                </p>
                            </li>
                            <?php  } ?>
                            <?php  if(isset($Contacts->adresses)) {?>
                            <li>
                                <i class="fa fa-location-arrow"></i> Adresse
                                <p>
                                    @foreach($Contacts->adresses as $adresse)
                                    <span>{{$adresse->adresse}}</span>
                                          @endforeach
                                </p>
                            </li>
                             <?php  } ?>
                            
                            
                        </ul>
                          <?php  } ?>
                    </div>
                </div>
            </div>
        </div>
     



        <div class="maps">
   <?php if (isset($Contacts->localisation)) {?>
            <iframe src="{{$Contacts->localisation}}" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen=""></iframe>
           <?php } ?>
        </div>
    </div>
    
    
  
    
     
@endsection
