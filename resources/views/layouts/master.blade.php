<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Group 3i - @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" type="image/png" href="images/logo-3i-ico.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700">
  
    
    {!! Html::style('css/bootstrap.min.css') !!}
    
    {!! Html::style('css/animate.css') !!}
    
    {!! Html::style('css/owl.carousel.css') !!}
    
    {!! Html::style('css/font-awesome.min.css') !!}
    
    {!! Html::style('css/flaticon.css') !!}
    
    {!! Html::style('css/magnific-popup.css') !!}
    
    {!! Html::style('css/slicknav.min.css') !!}
    
    {!! Html::style('css/slick.css') !!}
    
    {!! Html::style('css/styles.css') !!}
    
    {!! Html::style('css/responsive.css') !!}
    
 {!! Html::style('css/carousel.css') !!}
    
     {!! Html::style('social-share/css/social-share-kit.css') !!}
    
   
    

</head>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5bbf504c08387933e5baed95/1cppf3m59';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<body style="overflow: visible;" cz-shortcut-listen="true">
  
    
     @yield('content')
    
    
    
     @include('layouts.footer')
    
     {!! Html::script('js/vendor/modernizr-2.8.3.min.js') !!}
   
    {!! Html::script('js/vendor/jquery-2.2.4.min.js') !!}
    
    {!! Html::script('js/vendor/popper.min.js') !!}
    
    {!! Html::script('js/bootstrap.min.js') !!}
    
    {!! Html::script('js/owl.carousel.min.js') !!}
    
    {!! Html::script('js/slick.min.js') !!}
    
    {!! Html::script('js/plugins.js') !!}
    
    {!! Html::script('js/scripts.js') !!}
       {!! Html::script('js/jquery-1.10.2.js') !!}
         
   
     {!! Html::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyCbeBYsZSDkbIyfUkoIw1Rt38eRQOQQU0o') !!}
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
 
  
</body>

</html>