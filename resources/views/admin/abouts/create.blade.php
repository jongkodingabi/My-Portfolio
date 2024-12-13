<x-header-admin></x-header-admin>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('asset-admin/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('asset-admin/assets/css/plugins.min.css')}}">
	<link rel="stylesheet" href="{{ asset('asset-admin/assets/css/kaiadmin.min.css')}}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('asset-admin/assets/css/demo.css')}}">
    <style>
    .edit-about-section {
    display: flex;
    justify-content: center; /* Pusatkan horizontal */
    align-items: center; /* Pusatkan vertikal */
    min-height: 100vh; /* Tinggi minimum viewport untuk menjaga form di tengah halaman */
    padding: 20px;
    padding-top: 100px;
}

/* Gaya untuk container form */
.form-container {
    width: 100%;
    max-width: 600px; /* Lebar maksimum form */
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Gaya untuk form elemen */
form label {
    display: block;
    margin-bottom: 8px;
}

form input,
form textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

form button {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

form button:hover {
    background-color: #0056b3;
}
</style>
</head>
<body>
	<div class="wrapper">
		<x-sidebar>
        </x-sidebar>

		<div class="main-panel">
			<div class="main-header">
				<div class="main-header-logo">
					<!-- Logo Header -->
					<div class="logo-header" data-background-color="dark">

						<a href="{{ asset('asset-admin/index.html')}}" class="logo">
							<img src="{{ asset('asset-admin/assets/img/kaiadmin/logo_light.svg')}}" alt="navbar brand" class="navbar-brand" height="20">
						</a>
						<div class="nav-toggle">
							<button class="btn btn-toggle toggle-sidebar">
								<i class="gg-menu-right"></i>
							</button>
							<button class="btn btn-toggle sidenav-toggler">
								<i class="gg-menu-left"></i>
							</button>
						</div>
						<button class="topbar-toggler more">
							<i class="gg-more-vertical-alt"></i>
						</button>

					</div>
					<!-- End Logo Header -->
				</div>
				<x-navbar-admin></x-navbar-admin>
			</div>


			<section class="padding-bottom: 5px;">
                <section class="edit-about-section">
                    <div class="form-container">


    <h1>Add About</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('abouts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Title:</label>
         <input type="text" name="title" value="{{ old('title') }}"><br>

         <label>Sub Title:</label>
         <input type="text" name="subtitle" value="{{ old('subtitle') }}"><br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>

			<footer class="footer">
				<div class="container-fluid d-flex justify-content-between">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="http://www.themekita.com">
									ThemeKita
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#"> Help </a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#"> Licenses </a>
							</li>
						</ul>
					</nav>
					<div class="copyright">
						2024, made with <i class="fa fa-heart heart text-danger"></i> by
						<a href="http://www.themekita.com">ThemeKita</a>
					</div>
					<div>
						Distributed by
						<a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
					</div>
				</div>
			</footer>
		</div>

		<!-- Custom template | don't include it in your project! -->
		<div class="custom-template">
			<div class="title">Settings</div>
			<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
						<h4>Logo Header</h4>
						<div class="btnSwitch">
							<button type="button" class=" selected changeLogoHeaderColor" data-color="dark"></button>
							<button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Navbar Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeTopBarColor" data-color="dark"></button>
							<button type="button" class="changeTopBarColor" data-color="blue"></button>
							<button type="button" class="changeTopBarColor" data-color="purple"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
							<button type="button" class="changeTopBarColor" data-color="green"></button>
							<button type="button" class="changeTopBarColor" data-color="orange"></button>
							<button type="button" class="changeTopBarColor" data-color="red"></button>
							<button type="button" class="changeTopBarColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeTopBarColor" data-color="dark2"></button>
							<button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="purple2"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="green2"></button>
							<button type="button" class="changeTopBarColor" data-color="orange2"></button>
							<button type="button" class="changeTopBarColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Sidebar</h4>
						<div class="btnSwitch">
							<button type="button" class="selected changeSideBarColor" data-color="white"></button>
							<button type="button" class="changeSideBarColor" data-color="dark"></button>
							<button type="button" class="changeSideBarColor" data-color="dark2"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="custom-toggle">
				<i class="icon-settings"></i>
			</div>
		</div>
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="{{ asset('asset-admin/assets/js/core/jquery-3.7.1.min.js')}}"></script>
	<script src="{{ asset('asset-admin/assets/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('asset-admin/assets/js/core/bootstrap.min.js')}}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ asset('asset-admin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
	<!-- Moment JS -->
	<script src="{{ asset('asset-admin/assets/js/plugin/moment/moment.min.js')}}"></script>

	<!-- Chart JS -->
	<script src="{{ asset('asset-admin/assets/js/plugin/chart.js/chart.min.js')}}"></script>

	<!-- jQuery Sparkline -->
	<script src="{{ asset('asset-admin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

	<!-- Chart Circle -->
	<script src="{{ asset('asset-admin/assets/js/plugin/chart-circle/circles.min.js')}}"></script>

	<!-- Datatables -->
	<script src="{{ asset('asset-admin/assets/js/plugin/datatables/datatables.min.js')}}"></script>

	<!-- Bootstrap Notify -->
	<script src="{{ asset('asset-admin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

	<!-- jQuery Vector Maps -->
	<script src="{{ asset('asset-admin/assets/js/plugin/jsvectormap/jsvectormap.min.js')}}"></script>
	<script src="{{ asset('asset-admin/assets/js/plugin/jsvectormap/world.js')}}"></script>

	<!-- Sweet Alert -->
	<script src="{{ asset('asset-admin/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

	<!-- Kaiadmin JS -->
	<script src="{{ asset('asset-admin/assets/js/kaiadmin.min.js')}}"></script>

	<!-- Kaiadmin DEMO methods, don't include it in your project! -->
	<script src="{{ asset('asset-admin/assets/js/setting-demo2.js')}}"></script>
</body>
</html>
