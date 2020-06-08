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
    <!-- header-area end -->
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
                            <li>Mot du fondateur</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcumb-area end -->
    <!-- ablout-area start -->




    <div class="about-area ptb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="about-wrap">
                       <h3><strong>Mot du fondateur : </strong></h3>
                            <!-- <h3>We Are The Best Architecture & Interior Designer in 1988</h3> -->
                            <p>

                               Aujourd'hui le <strong>groupe 3i</strong> immobiliére s'inscrit dans une prespective d'évolution d'efficacité et de péesévérance; ma proirité est de veiller a vous offrir une architecture moderne et épurée, commodité et bien-étre.<br> <br>

                               Mon équipe et moi-méme avons une large vision et une expertise dans l'ingénierie du batiment et l'immobilier haut standing. Nous construisons des programmes immobiliers alliant passion, modernité et un savoir-faire unique. <br> <br>

                                Notre fiabilité et notre force sont soutenues par une équioe de jeunes diplomés dont la seule mission et d'offrir a nos futurs résidents des réalisations soignées et des finitions de qualité répondant a des exigences prestigieuses et innovantes. <br> <br>

                                le <strong>groupe 3i</strong> s'engage et vous garantis confort et convivialité dans vos résidences futures. Et fiére de vous accompagner dans la fondation de votre lieu de vie.

</p>
                    </div>
                </div>
                <div class="col-md-6 d-none d-lg-block">
                    <div class="about-img" style="background-image: url(&quot;images/about/1.jpg&quot;); background-size: cover; background-position: center center;">
                        <img src="images/about/logo-fondateur.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>           

@endsection
            