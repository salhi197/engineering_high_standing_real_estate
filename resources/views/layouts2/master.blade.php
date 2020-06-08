<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
 <link rel="shortcut icon" type="image/png" href="images/logo-3i-ico.png">
  <title>Group-3i |Tableau de bord</title>
  <!-- Tell the browser to be responsive to screen width -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<link rel="stylesheet"  href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css" />

{!! Html::style('css/font-awesome.min.css') !!}
   {!! Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
 
    {!! Html::style('bower_components/font-awesome/css/font-awesome.min.css') !!}
    
    {!! Html::style('bower_components/Ionicons/css/ionicons.min.css') !!}
    
    {!! Html::style('dist/css/AdminLTE.min.css') !!}
    
    {!! Html::style('dist/css/skins/_all-skins.min.css') !!}
    {!! Html::style('bower_components/morris.js/morris.css') !!}

{!! Html::style('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
{!! Html::style('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}


{!! Html::style('plugins/iCheck/all.css') !!}
{!! Html::style('bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') !!}

{!! Html::style('plugins/timepicker/bootstrap-timepicker.min.css') !!}
   {!! Html::style('bower_components/select2/dist/css/select2.min.css') !!}
    {!! Html::style('bower_components/bootstrap-daterangepicker/daterangepicker.css') !!}
 {!! Html::style('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}
   {!! Html::style('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic') !!}

      {!! Html::script('js/jquery.min.js') !!}
  
    {!! Html::script('js/index.js') !!}
	
</head>

<body  class="sidebar-mini skin-green-light">
  <div class="wrapper">
   
  @include('layouts2.nav')
     
  
 @yield('content')
   @include('layouts2.footer')
     @if(Auth::user()->type=='Administrateur' )
    @include('layouts2.aside')

@endif
    
  </div>

     {!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
   
    {!! Html::script('bower_components/jquery-ui/jquery-ui.min.js') !!}
    <script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
    
    {!! Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
    
    {!! Html::script('bower_components/raphael/raphael.min.js') !!}
    
    {!! Html::script('bower_components/morris.js/morris.min.js') !!}
    
    {!! Html::script('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') !!}
    
    {!! Html::script('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
 {!! Html::script('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
    
    {!! Html::script('bower_components/jquery-knob/dist/jquery.knob.min.js') !!}
    



    {!! Html::script('bower_components/moment/min/moment.min.js') !!}
    
    {!! Html::script('bower_components/bootstrap-daterangepicker/daterangepicker.js') !!}
    
    {!! Html::script('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}
    
    {!! Html::script('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}
    
    {!! Html::script('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}
 {!! Html::script('bower_components/fastclick/lib/fastclick.js') !!}

     {!! Html::script('bower_components/datatables.net/js/jquery.dataTables.min.js') !!}
    {!! Html::script('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}
    {!! Html::script('dist/js/adminlte.min.js') !!}
 {!! Html::script('bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') !!}
 {!! Html::script('plugins/timepicker/bootstrap-timepicker.min.js') !!}

     {!! Html::script('dist/js/pages/dashboard.js') !!}
        {!! Html::script('plugins/iCheck/icheck.min.js') !!}
         {!! Html::script('bower_components/select2/dist/js/select2.full.min.js') !!}
 {!! Html::script('dist/js/demo.js') !!}

{!! Html::script('plugins/input-mask/jquery.inputmask.js') !!}
{!! Html::script('plugins/input-mask/jquery.inputmask.date.extensions.js') !!}
{!! Html::script('plugins/input-mask/jquery.inputmask.extensions.js') !!}

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
     <script>
  $(function () {
     $('#example1').DataTable()
   


$('[data-mask]').inputmask()

  })

     $('.select2').select2({    tags: true
  
});
     $('#projet').select2();  
     
</script>
    <script type="text/javascript">
      $(document).ready(function () {
        $( "#message-div" ).fadeOut( 1500 );
      });
   

    </script>
    <script type="text/javascript">
        $('#example3').DataTable({
         "processing": true,
         
         "dom": 'lBfrtip',
         "buttons": [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                  
                   'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                    
                ]
            }
        ]
        
        });
    </script>
   
</body>

</html>
