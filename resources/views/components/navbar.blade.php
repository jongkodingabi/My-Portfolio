<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">Abi Portofolio's</a>
      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav nav ml-auto">
          <li class="nav-item"><a href="/" class="nav-link"><span>Home</span></a></li>
          <li class="nav-item"><a href="/about" class="nav-link"><span>About</span></a></li>
          <li class="nav-item"><a href="/contact" class="nav-link"><span>Contact</span></a></li>
          <li class="nav-item"><a href="/skills" class="nav-link"><span>Skills</span></a></li>
          <li class="nav-item"><a href="/project" class="nav-link"><span>Projects</span></a></li>
          <li class="nav-item"><a href="/certificate" class="nav-link"><span>Certificate</span></a></li>
          <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-dropdown-link :href="route('logout')"
        onclick="event.preventDefault();
        this.closest('form').submit();">
         {{ __('Log Out') }}
        </x-dropdown-link>
         </form></li>
        </ul>
      </div>
    </div>
  </nav>
