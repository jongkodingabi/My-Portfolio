<x-header-admin></x-header-admin>


{{-- Sweet Alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- CSS Files -->
<link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('asset-admin/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('asset-admin/assets/css/plugins.min.css') }}">
<link rel="stylesheet" href="{{ asset('asset-admin/assets/css/kaiadmin.min.css') }}">

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="{{ asset('asset-admin/assets/css/demo.css') }}">
</head>
<style>
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
        justify-content: center;
        /* Pusatkan horizontal */
        align-items: center;
        /* Pusatkan vertikal */
        min-height: 80vh;
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
            <x-navbar-admin></x-navbar-admin>
        </div>



        <!-- Tombol untuk Create Skill -->
        <div class="container">
            <div class="text-center mb-4">
                <!-- Menambahkan judul Add Skills -->
                <h3 class="mb-3">Add About</h3>
                <a href="{{ route('abouts.create') }}" class="btn btn-success">Create About</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-striped" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Sub Title</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($abouts as $index => $about)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $about->title }}</td>
                                <td>{{ Str::limit($about->subtitle, 100) }}</td>
                                <td>
                                    <a href="{{ route('abouts.show', $about->id) }}"
                                        class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('abouts.edit', $about->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form id="delete-form-{{ $about->id }}"
                                        action="{{ route('abouts.destroy', $about->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="confirmDelete({{ $about->id }})">Delete</button>
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
                    function confirmDelete(aboutId) {
                        Swal.fire({
                            title: "Are you sure?",
                            text: "You wont be able to revert this",
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonText: "Delete",
                            icon: "warning",
                            denyButtonText: `Don't delete`,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Jika user mengonfirmasi penghapusan, submit form secara manual
                                document.getElementById("delete-form-" + aboutId).submit();
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your About has been deleted",
                                    icon: "success"
                                })
                            } else if (result.isDenied) {
                                Swal.fire("About is not deleted", "", "info");
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
</body>

</html>
