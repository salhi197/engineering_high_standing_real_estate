 
@extends('layouts.master')
@section('title', 'Actualités')
@section('content')

   
     @include('layouts.head')
   
    <div class="container">
  

    
          <div class="blog-area">
        <div class="container">
            <div class="row">
               @foreach($articles as $article)
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="blog-wrap">
                      <a href="/actualite/artilce/{{$article->id}}">
                        <div class="blog-img">
                           @if(Storage::disk('local')->has($article->photo))
                            <img src="image/{{$article->photo}}" alt="">
                            @endif
                        </div>
                      </a>
                        <div class="blog-content">
                            <ul class="blog-meta">
                                <li><a id="a">{{$article->created_at->toFormattedDateString()}}</a></li>
                                <li>|</li>
                                <li><a id="a">écrit par: @foreach($article->auteurs as $auteur) {{$auteur->nom}} @endforeach</a></li>
                            </ul>
                            
                            <h4><a id="a" href="/actualite/artilce/{{$article->id}}">{{$article->titre}}</a></h4>
                            <p> <?php  if (strlen($article->resume) >=200)
                    {
                      
                     $morceau = substr($article->resume,0,201).'...';
                     } else 
                  {$morceau=$article->resume;
                  }
                      
                     ?>
                       {{$morceau}}
                     </p>
                        </div>
                    </div>
                </div>
               
               @endforeach
               
               
                <div class="col-12">
                    <div class="pagination-wrap text-center">
                        <ul>
                            <li><a ><i class="fa fa-angle-left"></i></a></li>
                           
                           
                            <li> <span>1</span></li>
                          
                            <li><a><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

  

 
    
    </div>

   
    
     
@endsection
