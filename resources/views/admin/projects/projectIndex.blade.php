<x-header-admin></x-header-admin>


{{-- Data Tables --}}
<link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">

<!-- CSS Files -->
<link rel="stylesheet" href="{{ asset('asset-admin/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('asset-admin/assets/css/plugins.min.css') }}">
<link rel="stylesheet" href="{{ asset('asset-admin/assets/css/kaiadmin.min.css') }}">

{{-- Table Styling --}}
<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">


<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="{{ asset('asset-admin/assets/css/demo.css') }}">
</head>
<style>
    .container {
        max-width: 1000px;
        padding-bottom: 100px;
        justify-content: flex;
        align-items: center;
    }


    .sidebar {
        width: 250px;
        /* Sesuaikan lebar sidebar */
    }

    .navbar {
        margin-bottom: 0 !important;
    }

    h1 {
        margin: 0;
    }

    .certificate-section {
        display: flex;
        justify-content: center;
        /* Pusatkan horizontal */
        align-items: center;
        /* Pusatkan vertikal */
        min-height: 100vh;
        /* Tinggi minimum viewport untuk menjaga form di tengah halaman */
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

                    <a href="{{ asset('asset-admin/index.html') }}" class="logo">
                        <img src="{{ asset('asset-admin/assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand"
                            class="navbar-brand" height="20">
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
            <x-navbar-admin></x-navbar-admin>
            <!-- End Navbar -->
        </div>


        {{-- <center>
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <section class="certificate-section">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h1 class="text-center">Project's</h1>
                            </div>
                                <a href="{{ route('projects.create') }}" class="btn btn-primary">
                                    Add Projects
                                </a>
                        </div>

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <table id="projects-table" class="table table-hover table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Project Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $index => $project)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $project->title }}</td>
                                        <td>{{ $project->description }}</td>
                                        <td>
                                            <a href="{{ route('admin.projects.projectShow', $project->id) }}" class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('admin.projects.projectEdit', $project->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div> --}}

        <!-- Tombol untuk Create Project -->
        <div class="container">
            <div class="text-center mb-4">
                <!-- Menambahkan judul Add Skills -->
                <h3 class="mb-3">Add Project's</h3>
                <a href="{{ route('projects.create') }}" class="btn btn-success">Create Project</a>
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
                        @foreach ($projects as $index => $project)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $project->title }}</td>
                                <td>{{ Str::limit($project->description, 50) }}</td>
                                <td>
                                    <a href="{{ route('admin.projects.projectShow', $project->id) }}"
                                        class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('admin.projects.projectEdit', $project->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form id="delete-form-{{ $project->id }}"
                                        action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="confirmDelete({{ $project->id }})">Delete</button>
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
                            showConfirmButton: true,
                        });
                    @endif
                </script>

                {{-- Confirm Alert --}}
                <script>
                    function confirmDelete(projectId) {
                        Swal.fire({
                            title: "Do you want to delete this project?",
                            showDenyButton: true,
                            showCancelButton: true,
                            icon: "warning",
                            confirmButtonText: "Delete",
                            denyButtonText: `Don't delete`,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Jika user mengonfirmasi penghapusan, submit form secara manual
                                document.getElementById("delete-form-" + projectId).submit();
                            } else if (result.isDenied) {
                                Swal.fire("Project is not deleted", "", "info");
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
                        <br />
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
                        <br />
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
    <script src="{{ asset('asset-admin/assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('asset-admin/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('asset-admin/assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('asset-admin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <!-- Moment JS -->
    <script src="{{ asset('asset-admin/assets/js/plugin/moment/moment.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('asset-admin/assets/js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('asset-admin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('asset-admin/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('asset-admin/assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('asset-admin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('asset-admin/assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('asset-admin/assets/js/plugin/jsvectormap/world.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('asset-admin/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('asset-admin/assets/js/kaiadmin.min.js') }}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{ asset('asset-admin/assets/js/setting-demo2.js') }}"></script>

    <!-- Tambahkan CDN DataTables di sini -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>


</body>

</html>
