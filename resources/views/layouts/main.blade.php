<body class="hold-transition sidebar-mini layout-fixed">

	<div class="wrapper">

		@include('layouts.nav')

	    <!-- Left side column. contains the logo and sidebar -->
		@include('layouts.sidebar')

		<!-- Content Wrapper. Contains page content -->
	    <div class="content-wrapper">

	        <section class="content">

	            @yield('content')

	        </section>

	    </div>

	    <!-- Main Footer -->
	    <footer class="main-footer">

			Created by Jeremy Kuchler &copy; {{ date('Y') }}

	    </footer>
		
	</div>

</body>
