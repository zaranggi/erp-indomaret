<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>PT. Indomarco Prismatama</title>

	<!-- Global stylesheets -->
	<link href="{{ asset('fonts.googleapis.com/css1381.css?family=Roboto:400,300,100,500,700,900') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('global_assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	  <!-- Core JS files -->
	  <script src="{{ asset('/global_assets/js/main/jquery.min.js') }}"></script>
	  <script src="{{ asset('/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
	  <script src="{{ asset('/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
	  <script src="{{ asset('/global_assets/js/plugins/ui/ripple.min.js') }}"></script>
	  <!-- /core JS files -->
      <style>
          .sidebar-user-material-body{background:url('{{url('global_assets/images/backgrounds/user_bg4.jpg')}}') center center no-repeat;background-size:cover}
      </style>


	  @yield('styles')

</head>

 <body class="hold-transition skin-purple sidebar-collapse sidebar-xs">

       @include('admin.partials.header')

      <!-- Page content -->
	<div class="page-content">
   @include('admin.partials.sidebar')
         
        <!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				 
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="{{ url('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					 
				</div>
			</div>
			<!-- /page header -->
			
			<!-- Content area -->
			<div class="content">
				@yield('content')

			</div>
			<!-- /Content area -->
			@include('admin.partials.footer')
			
		</div>
		<!-- /content-wrapper -->


    </div><!-- /.Page content -->



	   @yield('scripts')
			   <!-- Theme JS files -->
	   <script src="{{ asset('assets/js/app.js') }}"></script>
	   <!-- /theme JS files -->

 </body>
</html>
 
 

