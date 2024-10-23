<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Avatars - Kaiadmin Bootstrap 5 Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('asset-admin/assets/img/kaiadmin/favicon.ico')}}" type="image/x-icon"/>

	<!-- Fonts and icons -->
<script src="{{ asset('asset-admin/assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Public Sans:300,400,500,600,700"]},
			custom: {"families":["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

    {{-- Java Script --}}
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">


	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('asset-admin/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('asset-admin/assets/css/plugins.min.css')}}">
	<link rel="stylesheet" href="{{ asset('asset-admin/assets/css/kaiadmin.min.css')}}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('asset-admin/assets/css/demo.css')}}">
</head>
<style>

    .container {
        max-width: 1000px;
        padding-bottom: 100px;
        justify-content: flex;
        align-items: center;
    }


    .sidebar {
        width: 250px; /* Sesuaikan lebar sidebar */
    }

    .navbar {
    margin-bottom: 0 !important;
}

h1 {
    margin: 0;
}

.certificate-section {
    display: flex;
    justify-content: center; /* Pusatkan horizontal */
    align-items: center; /* Pusatkan vertikal */
    min-height: 80vh; /* Tinggi minimum viewport untuk menjaga form di tengah halaman */
    padding: 20px;
    max-width: 100px;
}


</style>
<body>
	{{-- <div class="wrapper"> --}}
		<x-sidebar></x-sidebar>

<div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img
                            src="assets/img/kaiadmin/logo_light.svg"
                            alt="navbar brand"
                            class="navbar-brand"
                            height="20"
                            />
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
                </div>
                <!-- End Logo Header -->
            </div>
            <x-navbar-admin></x-navbar-admin>





            <center>
                <div class="container">
                    <section class="certificate-section">
                    <div class="row justify-content-center">
                        <div class="col-md-full">
                                <div class="d-flex flex-column">
                                    <h1>Certificates</h1>
                                    <a href="{{ route('certificates.create') }}" class="btn btn-primary">
                                        Add Certificate</a>
                                </div>
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                            <table id="certificates-table" class="table table-hover table-striped mx-full">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Issued By</th>
                                        <th>Issue Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($certificates as $index => $certificate)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $certificate->title }}</td>
                                        <td>{{ $certificate->issued }}</td>
                                        <td>{{ $certificate->date }}</td>
                                        <td>
                                            <a href="{{ route('admin.certificates.certificatesShow', $certificate->id) }}" class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('admin.certificates.certificatesEdit', $certificate->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('certificates.destroy', $certificate->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </center>
            </div>
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

    {{-- JQuery And DataTables JS --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#certificates-table').DataTable({
                paging: true,    // Enables pagination
                searching: true, // Enables search bar
                ordering: true,  // Enables column sorting
            });
        });
        </script>

</body>
</html>
