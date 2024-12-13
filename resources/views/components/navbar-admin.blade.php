  <!-- Navbar Header -->
  <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
      <div class="container-fluid">
          <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
              {{-- <div class="input-group">
        <div class="input-group-prepend">
          <button type="submit" class="btn btn-search pe-1">
            <i class="fa fa-search search-icon"></i>
          </button>
        </div>
        <input
          type="text"
          placeholder="Search ..."
          class="form-control"
        />
      </div> --}}
          </nav>

          <marquee behavior="scroll" direction="right">Welcome back, {{ auth()->user()->name }}</marquee>

          <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
              <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                  <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                      aria-expanded="false" aria-haspopup="true">
                      <i class="fa fa-search"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-search animated fadeIn">
                      <form class="navbar-left navbar-form nav-search">
                          <div class="input-group">
                              <input type="text" placeholder="Search ..." class="form-control" />
                          </div>
                      </form>
                  </ul>
              </li>
              <li class="nav-item topbar-icon dropdown hidden-caret">
                  <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button"
                      data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                      <div class="notif-content">
                                          @foreach ($totalContacts as $contacts)
                                              <span class="subject">{{ $contacts->name }}</span>
                                              <span class="block"> {{ Str::limit($contacts->messages, 20) }} </span>
                                              <span class="time">{{ $contacts->email }}</span>
                                          @endforeach
                                      </div>
                                  </a>
                              </div>
                      </li>
                      <li>
                          <a class="see-all" href="javascript:void(0);">See all messages<i
                                  class="fa fa-angle-right"></i>
                          </a>
                      </li>
                  </ul>
              </li>

              <li class="nav-item topbar-user dropdown hidden-caret">
                  <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                      <div class="avatar-sm">
                          <img src="{{ asset('asset-admin/assets/img/profile.jpg') }}" alt="..."
                              class="avatar-img rounded-circle" />
                      </div>
                      <span class="profile-username">
                          <span class="op-7">Hi,</span>
                          <span class="fw-bold">{{ auth()->user()->name }}
                          </span>
                      </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                      <div class="dropdown-user-scroll scrollbar-outer">
                          <li>
                              <div class="user-box">
                                  <div class="avatar-lg">
                                      <img src="{{ asset('asset-admin/assets/img/profile.jpg') }}" alt="image profile"
                                          class="avatar-img rounded" />
                                  </div>
                                  <div class="u-text">
                                      <h4>{{ auth()->user()->name }}</h4>
                                      <p class="text-muted">{{ auth()->user()->email }}</p>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <div class="dropdown-divider"></div>
                              <!-- Authentication -->
                              <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                              <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                  @csrf
                                  <a class="dropdown-item" href="#"
                                      onclick="event.preventDefault(); confirmLogout();">
                                      Logout
                                  </a>
                              </form>
                              <script>
                                  function confirmLogout() {
                                      Swal.fire({
                                          title: 'Are you sure?',
                                          text: 'You will out from this admin',
                                          icon: 'warning',
                                          showCancelButton: true,
                                          confirmButtonColor: '#3085d6',
                                          cancelButtonColor: '#d33',
                                          confirmButtonText: 'Yes',
                                      }).then((result) => {
                                          if (result.isConfirmed) {
                                              document.getElementById('logout-form').submit();
                                          }
                                      });
                                  }
                              </script>
                          </li>
                      </div>
                  </ul>
              </li>
          </ul>
      </div>
  </nav>
  <!-- End Navbar -->
