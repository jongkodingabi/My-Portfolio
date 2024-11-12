<x-header-admin></x-header-admin>


    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


	<!-- CSS Files -->
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
	<link rel="stylesheet" href="{{ asset('asset-admin/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('asset-admin/assets/css/plugins.min.css')}}">
	<link rel="stylesheet" href="{{ asset('asset-admin/assets/css/kaiadmin.min.css')}}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('asset-admin/assets/css/demo.css')}}">
</head>
<style>



.sidebar {
        width: 250px; /* Sesuaikan lebar sidebar */
    }

.navbar {
    margin-bottom: 0 !important;
}

h1 {
    margin: 0;
}



.table-responsive {
    margin-top: 20px;
}

thead.thead-dark th {
    background-color: #343a40;
    color: white;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: #f9f9f9;
}

.table-hover tbody tr:hover {
    background-color: #f1f1f1;
}

.btn {
    margin-right: 5px;
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
				<!-- Navbar Header -->
				<nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom mb-0">

					<div class="container-fluid">
						<nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pe-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</nav>

						<ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
							<li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
								<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" aria-haspopup="true">
									<i class="fa fa-search"></i>
								</a>
								<ul class="dropdown-menu dropdown-search animated fadeIn">
									<form class="navbar-left navbar-form nav-search">
										<div class="input-group">
											<input type="text" placeholder="Search ..." class="form-control">
										</div>
									</form>
								</ul>
							</li>
							<li class="nav-item topbar-icon dropdown hidden-caret">
								<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-envelope"></i>
								</a>
								<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
									<li>
										<div class="dropdown-title d-flex justify-content-between align-items-center">
											Messages
											<a href="#" class="small">Mark all as read</a>
										</div>
									</li>
									<li>
										<div class="message-notif-scroll scrollbar-outer">
											<div class="notif-center">
												<a href="#">
													<div class="notif-img">
														<img src="{{ asset('asset-admin/assets/img/jm_denis.jpg')}}" alt="Img Profile">
													</div>
													<div class="notif-content">
														<span class="subject">Jimmy Denis</span>
														<span class="block">
															How are you ?
														</span>
														<span class="time">5 minutes ago</span>
													</div>
												</a>
												<a href="#">
													<div class="notif-img">
														<img src="{{ asset('asset-admin/assets/img/chadengle.jpg')}}" alt="Img Profile">
													</div>
													<div class="notif-content">
														<span class="subject">Chad</span>
														<span class="block">
															Ok, Thanks !
														</span>
														<span class="time">12 minutes ago</span>
													</div>
												</a>
												<a href="#">
													<div class="notif-img">
														<img src="{{ asset('asset-admin/assets/img/mlane.jpg')}}"" alt="Img Profile">
													</div>
													<div class="notif-content">
														<span class="subject">Jhon Doe</span>
														<span class="block">
															Ready for the meeting today...
														</span>
														<span class="time">12 minutes ago</span>
													</div>
												</a>
												<a href="#">
													<div class="notif-img">
														<img src="{{ asset('asset-admin/assets/img/talha.jpg')}}" alt="Img Profile">
													</div>
													<div class="notif-content">
														<span class="subject">Talha</span>
														<span class="block">
															Hi, Apa Kabar ?
														</span>
														<span class="time">17 minutes ago</span>
													</div>
												</a>
											</div>
										</div>
									</li>
									<li>
										<a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
									</li>
								</ul>
							</li>
							<li class="nav-item topbar-icon dropdown hidden-caret">
								<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-bell"></i>
									<span class="notification">4</span>
								</a>
								<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
									<li>
										<div class="dropdown-title">You have 4 new notification</div>
									</li>
									<li>
										<div class="notif-scroll scrollbar-outer">
											<div class="notif-center">
												<a href="#">
													<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
													<div class="notif-content">
														<span class="block">
															New user registered
														</span>
														<span class="time">5 minutes ago</span>
													</div>
												</a>
												<a href="#">
													<div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
													<div class="notif-content">
														<span class="block">
															Rahmad commented on Admin
														</span>
														<span class="time">12 minutes ago</span>
													</div>
												</a>
												<a href="#">
													<div class="notif-img">
														<img src="{{ asset('asset-admin/assets/img/profile2.jpg')}}" alt="Img Profile">
													</div>
													<div class="notif-content">
														<span class="block">
															Reza send messages to you
														</span>
														<span class="time">12 minutes ago</span>
													</div>
												</a>
												<a href="#">
													<div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
													<div class="notif-content">
														<span class="block">
															Farrah liked Admin
														</span>
														<span class="time">17 minutes ago</span>
													</div>
												</a>
											</div>
										</div>
									</li>
									<li>
										<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
									</li>
								</ul>
							</li>
							<li class="nav-item topbar-icon dropdown hidden-caret">
								<a class="nav-link" data-bs-toggle="dropdown" href="#" aria-expanded="false">
									<i class="fas fa-layer-group"></i>
								</a>
								<div class="dropdown-menu quick-actions animated fadeIn">
									<div class="quick-actions-header">
										<span class="title mb-1">Quick Actions</span>
										<span class="subtitle op-7">Shortcuts</span>
									</div>
									<div class="quick-actions-scroll scrollbar-outer">
										<div class="quick-actions-items">
											<div class="row m-0">
												<a class="col-6 col-md-4 p-0" href="#">
													<div class="quick-actions-item">
														<div class="avatar-item bg-danger rounded-circle">
															<i class="far fa-calendar-alt"></i>
														</div>
														<span class="text">Calendar</span>
													</div>
												</a>
												<a class="col-6 col-md-4 p-0" href="#">
													<div class="quick-actions-item">
														<div class="avatar-item bg-warning rounded-circle">
															<i class="fas fa-map"></i>
														</div>
														<span class="text">Maps</span>
													</div>
												</a>
												<a class="col-6 col-md-4 p-0" href="#">
													<div class="quick-actions-item">
														<div class="avatar-item bg-info rounded-circle">
															<i class="fas fa-file-excel"></i>
														</div>
														<span class="text">Reports</span>
													</div>
												</a>
												<a class="col-6 col-md-4 p-0" href="#">
													<div class="quick-actions-item">
														<div class="avatar-item bg-success rounded-circle">
															<i class="fas fa-envelope"></i>
														</div>
														<span class="text">Emails</span>
													</div>
												</a>
												<a class="col-6 col-md-4 p-0" href="#">
													<div class="quick-actions-item">
														<div class="avatar-item bg-primary rounded-circle">
															<i class="fas fa-file-invoice-dollar"></i>
														</div>
														<span class="text">Invoice</span>
													</div>
												</a>
												<a class="col-6 col-md-4 p-0" href="#">
													<div class="quick-actions-item">
														<div class="avatar-item bg-secondary rounded-circle">
															<i class="fas fa-credit-card"></i>
														</div>
														<span class="text">Payments</span>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>
							</li>

							<li class="nav-item topbar-user dropdown hidden-caret">
								<a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
									<div class="avatar-sm">
										<img src="{{ asset('asset-admin/assets/img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
									</div>
									<span class="profile-username">
										<span class="op-7">Hi,</span> <span class="fw-bold">Hizrian</span>
									</span>
								</a>
								<ul class="dropdown-menu dropdown-user animated fadeIn">
									<div class="dropdown-user-scroll scrollbar-outer">
										<li>
											<div class="user-box">
												<div class="avatar-lg"><img src="{{ asset('asset-admin/assets/img/profile.jpg')}}" alt="image profile" class="avatar-img rounded"></div>
												<div class="u-text">
													<h4>Hizrian</h4>
													<p class="text-muted">hello@example.com</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
												</div>
											</div>
										</li>
										<li>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#">My Profile</a>
											<a class="dropdown-item" href="#">My Balance</a>
											<a class="dropdown-item" href="#">Inbox</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#">Account Setting</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#">Logout</a>
										</li>
									</div>
								</ul>
							</li>
						</ul>
					</div>
				<!-- End Navbar -->
			</div>



                        <!-- Tombol untuk Create Skill -->
                        <div class="container">
                            <div class="text-center mb-4">
                                <!-- Menambahkan judul Add Skills -->
                                <h3 class="mb-3">Add Skills</h3>
                                <a href="{{ route('skills.create') }}" class="btn btn-success">Create Skill</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped" id="myTable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($skills as $index => $skill)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $skill->title }}</td>
                                            <td>{{ $skill->description }}</td>
                                            <td>
                                                <a href="{{ route('admin.skills.skillsShow', $skill->id) }}" class="btn btn-info btn-sm">View</a>
                                                <a href="{{ route('admin.skills.skillsEdit', $skill->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form id="delete-form-{{ $skill->id }}" action="{{ route('skills.destroy', $skill->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $skill->id }})">Delete</button>
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                {{-- Sucsess Alert --}}
                            <script>
                                @if (session('success'))
                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: "{{ session('success') }}",
                                    text: "successfully save your work",
                                });
                                @endif
                                </script>

                                {{-- Confirm Alert --}}
                                <script>
                                    function confirmDelete(skillId) {
                                Swal.fire({
                                    title: "Do you want to delete this skill?",
                                    showDenyButton: true,
                                    confirmButtonText: "Delete",
                                    icon: 'warning',
                                    denyButtonText: `Don't delete`,
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Jika user mengonfirmasi penghapusan, submit form secara manual
                                        document.getElementById("delete-form-" + skillId).submit();
                                    } else if (result.isDenied) {
                                        Swal.fire("Skill is not deleted", "", "info");
                                    }
                                });
                            }
                                </script>

                            </div>
                        </div>




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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script>let table = new DataTable('#myTable');</script>
</body>

</html>
