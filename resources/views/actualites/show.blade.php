@extends('layouts.master')
@section('title', $article->titre)
@section('content')

   
     @include('layouts.head')
 
      
   
     <div class="blog-area blog-details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-wrap">
                        <div class="blog-img">
                            <img src="/image/{{$article->photo}}" alt="">
                        </div>
                        <div class="blog-content">
                            <ul class="blog-meta">
                                <li><a id="a" >{{$article->created_at->toFormattedDateString()}}</a></li>
                                <li>|</li>
                                <li><a id="a">écrit par: @foreach($article->auteurs as $auteur) {{$auteur->nom}} @endforeach</a></li>
                            </ul>
                            <h4>{{$article->titre}}</h4>
                        </div>
                    </div>
                    <div class="blog-details-wrap">
                        <p>  {!! $article->text !!}</p>
                        <blockquote>{!! $article->resume !!}</blockquote>
                        @if($article->video !=null)
<br> <br>
   <video width="500" height="300" controls>
  <source src="/image/{{$article->video}}" type="video/mp4">

  Your browser does not support the video tag.
</video>
@endif
 @if($article->source !=null)
<iframe width="420" height="315" src="{{$article->source}}">
</iframe>
@endif

                        <div class="socila-link">
                           <!--  <ul>
                                <li>Share :</li>
                                <li><a href="blog-detsils.html#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="blog-detsils.html#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="blog-detsils.html#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="blog-detsils.html#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="blog-detsils.html#"><i class="fa fa-vimeo"></i></a></li>
                            </ul> -->
                        </div>
                         <!--  <div class="comment">
        <ul class="blog-form">
           <h3>Commentaires</h3>    
           <?php use Carbon\Carbon; Carbon::setLocale('fr'); ?>

            @foreach ($article->comments as $comment)
            
            
                     <li>
                <div class="text-muted">  {{$comment->nom}}</div>  
              
               <strong>
                  {{Carbon::parse($comment->created_at)->diffForHumans()}}: &nbsp;
                </strong>
                {{$comment->commentaire}}
            </li>
           
           
            @endforeach
        </ul>
        
    </div>
    <br>
    <br> -->
                       <!--  <div class="blog-form">
                            <h3>Envoyez votre Commentaire</h3>
                            <form action="/commentaire/{{$article->id}}" method="post">
                                {{ csrf_field() }}
                                
                               
                             <input type="text" class="form-control {{ $errors->has('nom') ? ' is-invalid' : '' }}" required placeholder="Votre Nom" name="nom" id="nam" value="{{ old('nom') }}">
                                <!-- <span>Email</span> -->
                               <!--  <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" required placeholder="Votre Adresse mail" name="email" id="email" value="{{ old('email') }}"> -->
                                <!-- <span>Message</span> -->
                              <!--   <textarea name="commentaire" id="commentaire" class="form-control {{ $errors->has('commentaire') ? ' is-invalid' : '' }}" required  cols="30" rows="10" placeholder="Votre commentaire">{{ old('commentaire') }}</textarea> -->
                                  <!-- <span>Joindre votre CV</span> -->
                            
                               <!--  <button  type="submit">Envoyer</button>
                            </form>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <aside class="sidebar-wrap">
                       
                       
                      
                        <div class="widget recent-post">
                            <h3 class="widget-title">Aarticles plus récents</h3>
                            <ul>
                            	@foreach($articles as $a)
                                <li>
                                    <div class="post-content">
                                        <a id="a" href="/actualite/artilce/{{$a->id}}">{{$a->titre}}</a>
                                        <p>{{$article->created_at->toFormattedDateString()}}</p>
                                    </div>
                                </li>
                              @endforeach
                            </ul>
                        </div>
                       
                    </aside>
                </div>
            </div>
        </div>
    </div>
  
     
@endsection
