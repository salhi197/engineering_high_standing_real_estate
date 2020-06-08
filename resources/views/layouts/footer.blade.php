


    <?php  if(isset($Contacts)) {?>
<footer class="footer-area">
        <div class="footer-top bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="footer-widget footer-logo">
                            <img src="images/logo-alco-3i.svg" alt="">
                            <p><strong>3i</strong> est un acteur incontournable de la construction de logements neufs sur le territoire national.</p>
                            <h4>Nos horaires : </h4>
                            <span>Dim - Jeu 8:30 - 17:00 
                            <br>Samedi 9:00 - 16:00 </span>
                            <ul>
                                @foreach($Contacts->reseaux as $reseau)
                                 <?php if ($reseau->type=='Facebook') { ?>
                                 <li><a  href="{{$reseau->url}}"  ><i class="fa fa-facebook"></i></a></li>
                               <?php } ?>
                                <?php if ($reseau->type=='Instagram') { ?>
                                <li><a href="{{$reseau->url}}" ><i class="fa fa-instagram"></i></a></li>
                                <?php } ?>
                                <?php if ($reseau->type=='Linkedin') { ?>
                                <li><a  href="{{$reseau->url}}" ><i class="fa fa-linkedin"></i></a></li>
                                <?php } ?>
                                <?php if ($reseau->type=='Twitter') { ?>
                                   <li><a  href="{{$reseau->url}}" ><i class="fa fa-twitter"></i></a></li>
                                <?php } ?>
                                 <?php if ($reseau->type=='Google Plus') { ?>
                                   <li><a  href="{{$reseau->url}}" ><i class="fa fa-google-plus"></i></a></li>
                                <?php } ?>
                                 <?php if ($reseau->type=='Tumblr') { ?>
                                   <li><a  href="{{$reseau->url}}" ><i class="fa fa-tumblr"></i></a></li>
                                <?php } ?>
                                 <?php if ($reseau->type=='Youtube') { ?>
                                   <li><a  href="{{$reseau->url}}" ><i class="fa fa-youtube-play"></i></a></li>
                                <?php } ?>
                                @endforeach
                               
                                
                            </ul>
                        </div>
                    </div>
               
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="footer-widget footer-menu">
                            <h4 class="widget-title">Navigation</h4>
                            <ul>
                                <li><a href="/">Accueil</a></li>
                                <li><a href="/about">Présentation</a></li>
                                <li><a href="/projets-en-cours">Nos Projets</a></li>
                                <li><a href="/nouveau-projets">Nouveautés</a></li>
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                     <div class="col-lg-3 col-sm-6 col-12">
                        <div class="footer-widget newsletter">

                            <h4 class="widget-title">newsletter</h4>
                            <p>Abonnez-vous à la newsletter de <strong>3i</strong> afin de recevoir toutes les nouveautés : </p>
                            <form method="post" action="/newletterEmail">
                              {{ csrf_field() }} 
                                <input type="text" placeholder="Entrez Votre Email" name="email"  id="email" required="required" value="{{ old('email') }}">
                                 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <button type="submit">Envoyer</button>
                            </form>
                        </div>

                            @if(Session::has('flash_message1'))
                           

                        <div class="alert alert-success alert-dismissable">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{Session::get('flash_message1')}}
                    </div>
                        @endif
                    </div>
                    
                      <div class="col-lg-3 col-sm-6 col-12">
                        <div class="footer-widget footer-contact">
                            <h4 class="widget-title">Informations</h4>
                            <ul>
                                <?php if ($Contacts->adresses!=null) { ?>
                                <li><i class="fa fa-home"></i>
                                    @foreach($Contacts->adresses as $adresse)
                                    {{$adresse->adresse}}
                                    <br>
                                          @endforeach
                                  </li>
                                  <?php } ?>
                                
                                  <?php if ($Contacts->telephones!=null) { ?>
                                <li><i class="fa fa-phone"></i> 
                                      @foreach($Contacts->telephones as $telephone)
                                    {{'+213 '.$telephone->telephone}}
                                 <br>
                                          @endforeach
                                </li>
                                  <?php } ?>
                                
                                 <?php if ($Contacts->faxs!=null) { ?>
                                <li><i class="fa fa-fax"></i>   
                                    @foreach($Contacts->faxs as $fax)
                                    {{'+213 '.$fax->fax}}
                                 <br>
                                          @endforeach 
                                </li>
                                <?php } ?>
                                 <?php if ($Contacts->emails!=null) { ?>
                                <li><i class="fa fa-envelope"></i> 
                                 @foreach($Contacts->emails as $email)
                                    {{$email->email}}
                                 <br>
                                          @endforeach 
                                </li>
                                 <?php } ?>
                            </ul>
                        </div>
                    </div>
                      
                </div>
            </div>
        </div>
        <div class="footer-bootem">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p>© 3i Group | All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<div class="ssk-sticky ssk-center ssk-lg ssk-right">
     @foreach($Contacts->reseaux as $reseau)
      <?php if ($reseau->type=='Facebook') { ?>
                               <a  href="{{$reseau->url}}"  class="ssk ssk-facebook"></a>
                <?php } ?>
                 <?php if ($reseau->type=='Twitter') { ?>
                               <a  href="{{$reseau->url}}"  class="ssk ssk-twitter"></a>
                <?php } ?>
     <?php if ($reseau->type=='Linkedin') { ?>
                               <a  href="{{$reseau->url}}"  class="ssk ssk-linkedin"></a>
                <?php } ?>
                <?php if ($reseau->type=='Instagram') { ?>
                               <a  href="{{$reseau->url}}"  class="ssk ssk-instagram"></a>
                <?php } ?>
      <?php if ($reseau->type=='Tumblr') { ?>
                               <a  href="{{$reseau->url}}"  class="ssk ssk-tumblr"></a>
                <?php } ?>
                 <?php if ($reseau->type=='Google Plus') { ?>
                               <a  href="{{$reseau->url}}"  class="ssk ssk-google-plus"></a>
                <?php } ?>
                 <?php if ($reseau->type=='Youtube') { ?>

                               <a  href="{{$reseau->url}}"  class="ssk ssk-youtube"></a>
                <?php } ?>
   
    @endforeach
</div>
 <?php } ?>
   

    <a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647; display: block;"><i class="fa fa-arrow-up"></i></a>
<script type="text/javascript">
   $(function(){
$("#addClass").click(function () {
          $('#qnimate').addClass('popup-box-on');
            });
          
            $("#removeClass").click(function () {
          $('#qnimate').removeClass('popup-box-on');
            });
  })
</script>
