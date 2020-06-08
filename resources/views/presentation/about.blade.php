@extends('layouts.master')

@section('title', 'A Propos')

@section('content')

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
                            <li class="active"><a href="#">Présentation <i class="fa fa-angle-down"></i></a>
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
    <!-- breadcumb-area start -->
     <div class="breadcumb-area black-opacity bg-img-6">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap">
                        <h2>Présentation</h2>
                        <ul>
                            <li><a href="/">Accueil</a></li>
                            <li>-</li>
                            <li>Qui Sommes Nous</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcumb-area end -->
    <!-- ablout-area start -->
    <div class="about-area3 ptb-120">
        <div class="container">
            <div class="d-flex">
                <div class="w-50">
                    <div class="about-active">
                        <div class="about-wrap3">
                            <h3><strong>Présentation du groupe 3i :</strong></h3>
                            <!-- <h3>We Are The Best Architecture & Interior Designer in 1988</h3> -->
                            <p><strong>Le Groupe INTERNATIONAL INFRASTRUCTURE INVESTEMENT</strong> 

<br>
Expert dans l’ingénierie du bâtiment et l’immobilier haut standing. Nous construisons des programmes immobiliers alliant passion, expertise, modernité et un savoir-faire unique <br><br>

Notre force réside dans un choix très fin du site, une conception dotée d’une architecture moderne, de la rigueur dans les suivis et le pilotage de nos chantiers, des réalisations soignées avec des finitions de qualité. <br><br>

Après plusieurs années de dur labeur, le<strong> groupe 3i </strong>s'inscrit aujourd'hui dans une réelle démarche qualité, qui a pour exigence, de vous offrir de prestigieuses propriétés en réelle mesure de vous satisfaire. <br><br>

Le <strong>groupe 3i </strong> travaille chaque jour à conserver sa crédibilité, la confiance de ses clients et la reconnaissance des professionnels  <br><br>

Créer et innover sans cesse, le<strong> groupe 3i </strong> se distingue par ses espaces de vie de caractère, contemporains et intelligents au style architectural distingué, offrant une fonctionnalité maximale et un confort de vie sans égal.



</p>
                            <!-- <a href="about.html" class="readmore-btn">More About Us</a> -->
                        </div>
                       <!--  <div class="about-wrap3">
                            <h2>Visual art</h2>
                            <h3>We Are The Best Architecture & Interior Designer in 1988</h3>
                            <p>For each project we establish relation ships with ano partners we know will help us create added value for your project well any bringing together the public and private sectors.</p>
                            <a href="about.html" class="readmore-btn">Read More</a>
                        </div>
                        <div class="about-wrap3">
                            <h2>ofarchitecture</h2>
                            <h3>We Are The Best Architecture & Interior Designer in 1988</h3>
                            <p>For each project we establish relation ships with ano partners we know will help us create added value for your project well any bringing together the public and private sectors.</p>
                            <a href="about.html" class="readmore-btn">More About Us</a>
                        </div> -->
                    </div>
                </div>
                <div class="w-50">
                    <div class="about-img-active">
                        <div class="about-img3">
                            <img src="images/about/1-alco.jpg" alt="">
                        </div>
                       <!--  <div class="about-img3">
                            <img src="assets/images/about/5.jpg" alt="">
                        </div>
                        <div class="about-img3">
                            <img src="assets/images/about/6.jpg" alt="">
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
</div>



@endsection
            