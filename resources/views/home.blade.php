<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="dist/output.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio - Abisam Hazim</title>
    <script>
          if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
      document.documentElement.classList.add('dark')
    } else {
      document.documentElement.classList.remove('dark')
    }
    </script>
</head>

<body>
  <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
    <div class="container">
        <div class="flex items-center justify-between relative">
            <div class="px-4 py-6">
                <a href="#home" class="font-bold text-lg  text-primary py-6 bg-gradient-to-r from-primary to-blue-700 bg-clip-text text-transparent
                ">MyPortfolio</a>
            </div>
            <div class="flex items-center px-4">
                <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                    <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                </button>

                <nav id="nav-menu" class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-full w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:shadow-none lg:rounded-none dark:bg-dark
                 dark:shadow-slate-600 lg:dark:bg-transparent">
                    <ul class="block lg:flex" id="#nav-active">
                        <li class="group">
                            <a href="#home" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white">Home</a>
                        </li>
                        <li class="group">
                            <a href="#about" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white">About</a>
                        </li>
                        <li class="group">
                            <a href="#portofolio" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white">Portofolio</a>
                        </li>
                        <li class="group">
                            <a href="#skills" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white">Skills</a>
                        </li>
                        <li class="group">
                            <a href="#certificate" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white">Certificate</a>
                        </li>
                        <li class="group">
                            <a href="#contact" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white">Contact</a>
                        </li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                        <li class="group">
                            <a href="route('logout')"
                             onclick="event.preventDefault();
                                                this.closest('form').submit()"
                            class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white">
                                Logout</a>
                        </form>
                        </li>
                        <li class="mt-3 lg:mt-0 flex items-center pl-8">
                          <div class="flex">
                            <span class="mr-2 text-sm text-slate-500">light</span>
                            <input type="checkbox" class="hidden" id="dark-toggle" />
                            <label for="dark-toggle">
                              <div class="flex h-5 w-9 cursor-pointer items-center rounded-full bg-slate-500 p-1">
                                <div class="toggle-circle h-4 w-4 rounded-full bg-white transition duration-300 ease-in-out">
                                </div>
                              </div>
                            </label>
                            <span class="ml-2 text-sm text-slate-500">Dark</span>
                          </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

  <!-- Hero Section Start -->
  <section id="home" class="pt-36 lg:pt-[25px] dark:bg-dark">
    <div class="container">
      <div class="flex flex-wrap">
        <div class="w-full self-center px-4 lg:w-1/2">
          <h1 class="text-base font-semibold text-primary md:text-xl">
            Hello Everyone 👋, <span class="block font-bold  text-primary py-6 bg-gradient-to-r from-primary to-blue-700 bg-clip-text text-transparent
             lg:text-5xl sm:text-lg">

             @foreach ($heroSectionsCollection as $heroSection )

              {{ $heroSection->title }}</h1>
          <h2 class="text-2xl font-medium text-primary py-4 bg-gradient-to-r from-primary to-blue-700 bg-clip-text text-transparent">
            {{ $heroSection->subTitle }}
        </h2>
          <p class="font-medium text-secondary mb-10
          leading-relaxed">{{ $heroSection->description  }}<span class="text-dark font-bold  dark:text-white"> many more..</span></p>

            <a href="#contact" class="text-base font-semibold text-white bg-primary
            py-3 px-8 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300
            ease-in-out">Contact me</a>
        </div>
        <div class="w-full self-end px-4 lg:w-1/2 md:scale-125 overflow-hidden">
          <div class="relative mt-10 lg:mt-9 lg:right-0">
            <img src="{{ Storage::url($heroSection->picture) }}" width="300" height="300" alt="Abisam Hazim"
            class="relative z-10 max-w-full mx-auto" />
            @endforeach
            <span class="absolute bottom-0  left-1/2 -translate-x-1/2">
              <svg width="400" height="400" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="#22d3ee
                " d="M41.6,-57.5C52,-49.7,57.2,-35,57.3,-21.7C57.4,-8.4,52.3,3.5,51,19.4C49.8,35.4,52.3,55.4,44.4,61.3C36.5,67.2,18.3,59,0.3,58.7C-17.7,58.3,-35.4,65.7,-45.2,60.4C-55,55.1,-56.9,37.1,-56.3,22.2C-55.8,7.4,-52.7,-4.4,-45.8,-11.6C-38.9,-18.8,-28.2,-21.4,-19.9,-29.9C-11.7,-38.4,-5.8,-52.6,4.9,-59.3C15.6,-66.1,31.2,-65.3,41.6,-57.5Z"
                transform="translate(100 100) scale(1.1)" />

              </svg>
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Hero Section End -->


  <!-- About Section Start -->
  <section id="about" class="pt-36 pb-32 dark:bg-dark">
    <div class="container">
        <div class="flex flex-wrap">
            @foreach ($abouts as $about)
                <div class="w-full md:w-1/2 px-4 mb-10"> <!-- Ganti lg:w-1/2 dengan md:w-1/2 -->
                    <h4 class="font-bold uppercase text-primary text-lg mb-5 max-w-xl">About Me</h4>
                    <h2 class="font-bold text-dark text-3xl mb-5 max-w-md lg:text-4xl dark:text-white">{{ $about->title }}</h2>
                    <p class="font-medium text-base text-secondary max-w-xl lg:text-lg">
                        {{ $about->subtitle }}
                    </p>
                </div>
            @endforeach
            <div class="flex items-center">

              <!-- youtube -->
              <a href="https://youtube.com/@abisamhazim?si=RHuHHmjETR9rU_ma" target="_blank"
              class="w-12 h-12 mr-3 rounded-full flex justify-center items-center border text-slate-400 border-slate-300 hover:border-primary hover:bg-primary
              hover:text-white ">
                <svg role="img" width="24" height="24" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <title>YouTube</title>
                  <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505
                  0-9.377.505A3.017 3.017 0 0 0
                  .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505
                  9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24
                  12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                </svg>
             </a>


             <!-- instagram -->
             <a href="https://www.instagram.com/biscuitsam__?igsh=dDEydW10MDg4Ynk0" target="_blank" class="w-12 h-12 mr-3 rounded-full flex justify-center items-center border text-slate-400 border-slate-300 hover:border-primary hover:bg-primary
             hover:text-white ">
              <svg role="img" width="24" height="24" viewBox="0 0 24 24" class="fill-current" xmlns="http://www.w3.org/2000/svg">
                 <title>Instagram</title>
                 <path d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077"/>
              </svg>
           </a>

           <!-- thereads -->
           <a href="https://www.threads.net/@biscuitsam__" target="_blank"
           class="w-12 h-12 mr-3 rounded-full flex justify-center items-center border text-slate-400 border-slate-300 hover:border-primary hover:bg-primary
           hover:text-white ">
           <svg role="img" width="24" height="24" viewBox="0 0 24 24" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Threads</title><path d="M12.186 24h-.007c-3.581-.024-6.334-1.205-8.184-3.509C2.35 18.44 1.5 15.586 1.472 12.01v-.017c.03-3.579.879-6.43 2.525-8.482C5.845 1.205 8.6.024 12.18 0h.014c2.746.02 5.043.725 6.826 2.098 1.677 1.29 2.858 3.13 3.509 5.467l-2.04.569c-1.104-3.96-3.898-5.984-8.304-6.015-2.91.022-5.11.936-6.54 2.717C4.307 6.504 3.616 8.914 3.589 12c.027 3.086.718 5.496 2.057 7.164 1.43 1.783 3.631 2.698 6.54 2.717 2.623-.02 4.358-.631 5.8-2.045 1.647-1.613 1.618-3.593 1.09-4.798-.31-.71-.873-1.3-1.634-1.75-.192 1.352-.622 2.446-1.284 3.272-.886 1.102-2.14 1.704-3.73 1.79-1.202.065-2.361-.218-3.259-.801-1.063-.689-1.685-1.74-1.752-2.964-.065-1.19.408-2.285 1.33-3.082.88-.76 2.119-1.207 3.583-1.291a13.853 13.853 0 0 1 3.02.142c-.126-.742-.375-1.332-.75-1.757-.513-.586-1.308-.883-2.359-.89h-.029c-.844 0-1.992.232-2.721 1.32L7.734 7.847c.98-1.454 2.568-2.256 4.478-2.256h.044c3.194.02 5.097 1.975 5.287 5.388.108.046.216.094.321.142 1.49.7 2.58 1.761 3.154 3.07.797 1.82.871 4.79-1.548 7.158-1.85 1.81-4.094 2.628-7.277 2.65Zm1.003-11.69c-.242 0-.487.007-.739.021-1.836.103-2.98.946-2.916 2.143.067 1.256 1.452 1.839 2.784 1.767 1.224-.065 2.818-.543 3.086-3.71a10.5 10.5 0 0 0-2.215-.221z"/></svg>
          </a>

          <!-- tiktok -->
           <a href="https://www.tiktok.com/@abisamhazim?_t=8pbryCVPN28&_r=1" target="_blank"
           class="w-12 h-12 mr-3 rounded-full flex justify-center items-center border text-slate-400 border-slate-300 hover:border-primary hover:bg-primary
           hover:text-white ">
           <svg role="img" width="24" height="24" viewBox="0 0 24 24" class="fill-current" xmlns="http://www.w3.org/2000/svg"><title>TikTok</title><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>          </a>

            </div>
        </div>
      </div>
    </div>

  </section>
  <!-- About Section End -->

  <!-- Portofolio section start -->
    <section id="portofolio" class="pt-36 pb-16 bg-slate-100 dark:bg-slate-700">
      <div class="container">
        <div class="w-full px-4">
          <div class="max-w-xl mx-auto text-center mb-16">
            <h4 class="font-semibold text-lg text-primary mb-2">Portofolio</h4>
            <h2 class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl  dark:text-white">New Project</h2>
            <p class="font-medium text-md text-secondary md:text-lg">The following is my latest project</p>
          </div>
        </div>


        <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
          <div class="mb-12 p-4 md:w-1/2">
        <!-- 1 -->
            <div class="rounded-md shadow-md overflow-hidden">
              <img src="dist/img/portofolio/2.jpg" alt="workshop-website"
              width="w-full" />
              <h3 class="font-semibold text-xl text-dark mt-5 mb-3 ml-2  dark:text-white px-2">Workshop Website</h3>
              <p class="font-medium text-base text-secondary dark:text-white ml-2 mb-1 px-2">a website that contains information about a workshop, in the form of services, education, and also products sold</p>
            </div>
          </div>

          <!-- 2 -->
          <div class="mb-12 p-4 md:w-1/2">
            <div class="rounded-md shadow-md overflow-hidden">
              <img src="dist/img/portofolio/3.jpg" alt="simple blog website"
              width="w-full" />
              <h3 class="font-semibold text-xl text-dark mt-5 mb-3 ml-2  dark:text-white px-2">Blog Apps</h3>
              <p class="font-medium text-base text-secondary dark:text-white ml-2 mb-1 px-2">A website created using Laravel, which contains a collection of blogs and also has search and pagination</p>
            </div>
          </div>

          <!-- 3 -->
          <div class="mb-12 p-4 md:w-1/2">
            <div class="rounded-md shadow-md overflow-hidden">
              <img src="dist/img/portofolio/1.jpg" alt="store-website"
              width="w-full" />
              <h3 class="font-semibold text-xl text-dark mt-5 mb-3 ml-2  dark:text-white px-2">E-Commerce</h3>
              <p class="font-medium text-base text-secondary dark:text-white ml-2 mb-1 px-2">website that contains product information in the form of accessories, accessories and phone casings</p>
            </div>
          </div>

          <!-- 4 -->
          <div class="mb-12 p-4 md:w-1/2">
          <div class="rounded-md shadow-md overflow-hidden">
          <img src="dist/img/portofolio/E-commerce_back_end.jpg" alt="back-end-E-commerce"
          width="w-full" />
          <h3 class="font-semibold text-xl text-dark mt-5 mb-3 ml-2  dark:text-white px-2">E-commerce Admin</h3>
          <p class="font-medium text-base text-secondary dark:text-white 50 ml-2 mb-1 px-2">A backend containing an e-commerce CRUD operating system that I created with my teams</p>
            </div>
        </div>

          <!-- 5 -->
          <div class="mb-12 p-4 md:w-1/2">
          <div class="rounded-md shadow-md overflow-hidden">
          <img src="dist/img/portofolio/adminDM.jpg" alt="back-end-Workshop"
          width="w-full" />
          <h3 class="font-semibold text-xl text-dark mt-5 mb-3 ml-2  dark:text-white px-2">Workshop Admin</h3>
          <p class="font-medium text-base text-secondary dark:text-white 50 ml-2 mb-1 px-2">A backend containing an Workshop CRUD operating, income data, visitor purchase history</p>
            </div>
        </div>

        </div>

      </div>
    </section>
  <!-- Portofolio section end -->

  <!-- Skills section start -->
  <section id="skills" class="pt-36 pb-32 bg-slate-500 dark:bg-slate-800 overflow-x-hidden">
    <div class="container max-w-full px-4 mx-auto">
      <div class="flex flex-wrap items-center justify-center w-full">
      <div class="mx-auto text-center mb-16">
        <h4 class="font-semibold text-lg text-primary mb-2">Skills</h4>
        <h2 class="font-bold text-white text-3xl mb-4 sm:text-4xl lg:text-5xl dark:text-white">My Skills</h2>
        <p class="font-medium text-md text-primary">This is the <span class="text-white font-semibold">programming language</span>, framework, Tools
          I currently use for frontend, backend and design</p>
      </div>


    <div class="w-full px-4">
      <div class="flex flex-wrap items-center justify-center">


        <!-- PHP NATIVE -->
        <a href="#" class="max-w-[120px] mx-4 py-4 grayscale opacity-60 transition
        hover:grayscale-0 duration-500 hover:opacity-100 lg:mx-6 xl:mx-8">
        <i><?xml version="1.0" encoding="utf-8"?>
          <svg width="100" height="100" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="16" cy="16" r="14" fill="#8892BF"/>
          <path d="M14.4392 10H16.1192L15.6444 12.5242H17.154C17.9819 12.5419 18.5986 12.7269 19.0045 13.0793C19.4184 13.4316 19.5402 14.1014 19.3698 15.0881L18.5541 19.4889H16.8497L17.6288 15.2863C17.7099 14.8457 17.6856 14.533 17.5558 14.348C17.426 14.163 17.146 14.0705 16.7158 14.0705L15.3644 14.0573L14.3661 19.4889H12.6861L14.4392 10Z" fill="white"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M6.74092 12.5243H10.0036C10.9612 12.533 11.6552 12.8327 12.0854 13.4229C12.5156 14.0132 12.6576 14.8193 12.5115 15.8414C12.4548 16.3085 12.3289 16.7665 12.1341 17.2159C11.9474 17.6652 11.6878 18.0704 11.355 18.4317C10.9491 18.8898 10.5149 19.1805 10.0523 19.304C9.58969 19.4274 9.11076 19.489 8.61575 19.489H7.15484L6.69222 22H5L6.74092 12.5243ZM7.43485 17.9956L8.16287 14.0441H8.40879C8.49815 14.0441 8.5914 14.0396 8.6888 14.0309C9.33817 14.0221 9.87774 14.0882 10.308 14.2291C10.7462 14.37 10.8923 14.9031 10.7462 15.8282C10.5678 16.9296 10.2186 17.5727 9.69926 17.7577C9.1799 17.934 8.53053 18.0176 7.75138 18.0088H7.58094C7.53224 18.0088 7.48355 18.0043 7.43485 17.9956Z" fill="white"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M24.4365 12.5243H21.1738L19.4329 22H21.1251L21.5878 19.489H23.0487C23.5437 19.489 24.0226 19.4274 24.4852 19.304C24.9479 19.1805 25.382 18.8898 25.7879 18.4317C26.1207 18.0704 26.3803 17.6652 26.567 17.2159C26.7618 16.7665 26.8877 16.3085 26.9444 15.8414C27.0905 14.8193 26.9486 14.0132 26.5183 13.4229C26.0881 12.8327 25.3942 12.533 24.4365 12.5243ZM22.5958 14.0441L21.8678 17.9956C21.9165 18.0043 21.9652 18.0088 22.0139 18.0088H22.1843C22.9635 18.0176 23.6128 17.934 24.1322 17.7577C24.6515 17.5727 25.0007 16.9296 25.1792 15.8282C25.3253 14.9031 25.1792 14.37 24.7409 14.2291C24.3107 14.0882 23.7711 14.0221 23.1217 14.0309C23.0243 14.0396 22.9311 14.0441 22.8417 14.0441H22.5958Z" fill="white"/>
          </svg></i>
        </a>

        <!-- lARAVEL -->
        <a href="#" class="max-w-[120px] mx-4 py-4 grayscale opacity-60 transition
        hover:grayscale-0 duration-500 hover:opacity-100 lg:mx-6 xl:mx-8">
          <i><?xml version="1.0" encoding="utf-8"?>
           <svg width="150" height="150" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M47.982 23.453c.012.044.018.089.018.134v7.071a.516.516 0 0 1-.26.448l-5.934 3.417v6.772a.517.517 0 0 1-.258.447L29.16 48.874c-.029.016-.06.026-.09.037-.012.004-.023.011-.035.015a.519.519 0 0 1-.264 0c-.015-.004-.027-.012-.041-.017-.028-.01-.058-.02-.085-.035l-12.386-7.132a.517.517 0 0 1-.259-.447V20.082c0-.046.006-.091.018-.135.004-.015.013-.028.018-.043.01-.027.019-.055.033-.08.01-.017.024-.03.035-.046.015-.02.029-.042.046-.06.015-.015.034-.026.051-.039.019-.015.035-.032.057-.044l6.194-3.566a.517.517 0 0 1 .515 0l6.194 3.566c.021.013.039.029.057.044.017.013.036.024.05.038.019.02.032.04.047.061.011.016.026.029.035.046.015.025.023.053.034.08.005.015.014.028.017.044a.52.52 0 0 1 .019.134v13.25l5.16-2.972v-6.773a.52.52 0 0 1 .019-.134c.004-.016.012-.03.018-.044.01-.027.019-.055.033-.08.01-.017.024-.03.035-.046.015-.02.028-.042.046-.06.015-.015.034-.025.05-.038.02-.016.037-.033.057-.045l6.195-3.566a.516.516 0 0 1 .515 0l6.194 3.566c.022.013.038.03.058.044.016.013.034.024.05.039.017.018.03.04.046.06.011.016.025.03.034.046.015.025.024.053.034.08.006.015.014.028.018.044zm-1.014 6.907v-5.88L44.8 25.728l-2.994 1.724v5.88l5.162-2.972zm-6.194 10.637v-5.884l-2.945 1.682-8.41 4.8v5.94l11.355-6.538zM17.032 20.975v20.022l11.355 6.537v-5.938l-5.932-3.357-.002-.002-.003-.001c-.02-.012-.036-.028-.055-.043-.016-.012-.035-.023-.049-.037l-.001-.002c-.017-.016-.029-.036-.043-.054-.013-.017-.028-.032-.038-.05l-.001-.002c-.012-.02-.019-.043-.027-.065-.009-.019-.02-.037-.025-.058-.006-.025-.007-.05-.01-.076-.003-.02-.008-.038-.008-.058V23.946L19.2 22.222l-2.168-1.247zm5.678-3.863-5.16 2.97 5.159 2.97 5.16-2.97-5.16-2.97h.001zm2.684 18.537 2.993-1.723V20.975l-2.167 1.247-2.994 1.724v12.951l2.168-1.248zM41.29 20.617l-5.16 2.97 5.16 2.97 5.158-2.97-5.158-2.97zm-.517 6.835-2.994-1.724-2.167-1.248v5.88l2.993 1.723 2.168 1.249v-5.88zm-11.872 13.25 7.568-4.32 3.783-2.16-5.156-2.968-5.936 3.418-5.41 3.115 5.151 2.915z" fill="#FF2D20"/></svg></i>        </a>


        <!-- MYSQL -->
        <a href="#" class="max-w-[120px] mx-4 py-4 grayscale opacity-60 transition
        hover:grayscale-0 duration-500 hover:opacity-100 lg:mx-6 xl:mx-8">
        <?xml version="1.0" encoding="utf-8"?>
        <svg width="150px" height="150px" viewBox="-18.458 -22.75 191.151 191.151" xmlns="http://www.w3.org/2000/svg"><path d="M-18.458 6.58h191.151v132.49H-18.458V6.58z" fill="none"/><path d="M40.054 113.583h-5.175c-.183-8.735-.687-16.947-1.511-24.642h-.046l-7.879 24.642h-3.94l-7.832-24.642h-.045c-.581 7.388-.947 15.602-1.099 24.642H7.81c.304-10.993 1.068-21.299 2.289-30.919h6.414l7.465 22.719h.046l7.511-22.719h6.137c1.344 11.268 2.138 21.575 2.382 30.919M62.497 90.771c-2.107 11.434-4.887 19.742-8.337 24.928-2.688 3.992-5.633 5.99-8.84 5.99-.855 0-1.91-.258-3.16-.77v-2.757c.611.088 1.328.138 2.152.138 1.498 0 2.702-.412 3.62-1.238 1.098-1.006 1.647-2.137 1.647-3.388 0-.858-.428-2.612-1.282-5.268L42.618 90.77h5.084l4.076 13.19c.916 2.995 1.298 5.086 1.145 6.277 2.229-5.953 3.786-12.444 4.673-19.468h4.901v.002z" fill="#5d87a1"/><path d="M131.382 113.583h-14.7V82.664h4.945v27.113h9.755v3.806zM112.834 114.33l-5.684-2.805c.504-.414.986-.862 1.42-1.381 2.416-2.838 3.621-7.035 3.621-12.594 0-10.229-4.014-15.346-12.045-15.346-3.938 0-7.01 1.298-9.207 3.895-2.414 2.84-3.619 7.022-3.619 12.551 0 5.435 1.068 9.422 3.205 11.951 1.955 2.291 4.902 3.438 8.843 3.438 1.47 0 2.819-.18 4.048-.543l7.4 4.308 2.018-3.474zm-18.413-6.934c-1.252-2.014-1.878-5.248-1.878-9.707 0-7.785 2.365-11.682 7.1-11.682 2.475 0 4.289.932 5.449 2.792 1.25 2.017 1.879 5.222 1.879 9.619 0 7.849-2.367 11.774-7.099 11.774-2.476.001-4.29-.928-5.451-2.796M85.165 105.013c0 2.622-.962 4.773-2.884 6.458-1.924 1.678-4.504 2.519-7.737 2.519-3.024 0-5.956-.966-8.794-2.888l1.329-2.655c2.442 1.223 4.653 1.831 6.638 1.831 1.863 0 3.319-.413 4.375-1.232 1.055-.822 1.684-1.975 1.684-3.433 0-1.837-1.281-3.407-3.631-4.722-2.167-1.19-6.501-3.678-6.501-3.678-2.349-1.712-3.525-3.55-3.525-6.578 0-2.506.877-4.529 2.632-6.068 1.757-1.545 4.024-2.315 6.803-2.315 2.87 0 5.479.769 7.829 2.291l-1.192 2.656c-2.01-.854-3.994-1.281-5.951-1.281-1.585 0-2.809.381-3.66 1.146-.858.762-1.387 1.737-1.387 2.933 0 1.828 1.308 3.418 3.722 4.759 2.196 1.192 6.638 3.723 6.638 3.723 2.409 1.709 3.612 3.53 3.612 6.534" fill="#f8981d"/><path d="M137.59 72.308c-2.99-.076-5.305.225-7.248 1.047-.561.224-1.453.224-1.531.933.303.3.338.784.601 1.198.448.747 1.229 1.752 1.942 2.276.783.6 1.569 1.194 2.393 1.717 1.453.899 3.1 1.422 4.516 2.318.825.521 1.645 1.195 2.471 1.756.406.299.666.784 1.193.971v-.114c-.264-.336-.339-.822-.598-1.196l-1.122-1.082c-1.084-1.456-2.431-2.727-3.884-3.771-1.196-.824-3.812-1.944-4.297-3.322l-.076-.076c.822-.077 1.797-.375 2.578-.604 1.271-.335 2.43-.259 3.734-.594.6-.15 1.195-.338 1.797-.523v-.337c-.676-.673-1.158-1.567-1.869-2.203-1.902-1.643-3.998-3.25-6.164-4.595-1.16-.749-2.652-1.231-3.887-1.868-.445-.225-1.195-.336-1.457-.71-.67-.822-1.047-1.904-1.533-2.877-1.08-2.053-2.129-4.331-3.061-6.502-.674-1.456-1.084-2.91-1.906-4.257-3.85-6.35-8.031-10.196-14.457-13.971-1.381-.786-3.024-1.121-4.779-1.533l-2.803-.148c-.598-.262-1.197-.973-1.719-1.309-2.132-1.344-7.621-4.257-9.189-.411-1.01 2.431 1.494 4.821 2.354 6.054.635.856 1.458 1.83 1.902 2.802.263.635.337 1.309.6 1.98.598 1.644 1.157 3.473 1.943 5.007.41.782.857 1.604 1.381 2.312.3.414.822.597.936 1.272-.521.744-.562 1.867-.861 2.801-1.344 4.221-.819 9.45 1.086 12.552.596.934 2.018 2.99 3.92 2.202 1.684-.672 1.311-2.801 1.795-4.668.111-.451.038-.747.262-1.043v.073c.521 1.045 1.047 2.052 1.53 3.1 1.159 1.829 3.177 3.735 4.858 5.002.895.676 1.604 1.832 2.725 2.245V74.1h-.074c-.227-.335-.559-.485-.857-.745-.674-.673-1.42-1.495-1.943-2.241-1.566-2.093-2.952-4.41-4.182-6.801-.602-1.16-1.121-2.428-1.606-3.586-.226-.447-.226-1.121-.601-1.346-.562.821-1.381 1.532-1.791 2.538-.711 1.609-.785 3.588-1.049 5.646l-.147.072c-1.19-.299-1.604-1.53-2.056-2.575-1.119-2.654-1.307-6.914-.336-9.976.26-.783 1.385-3.249.936-3.995-.225-.715-.973-1.122-1.383-1.685-.482-.708-1.01-1.604-1.346-2.39-.896-2.091-1.347-4.408-2.312-6.498-.451-.974-1.234-1.982-1.868-2.879-.712-1.008-1.495-1.718-2.058-2.913-.186-.411-.447-1.083-.148-1.53.073-.3.225-.412.523-.487.484-.409 1.867.111 2.352.336 1.385.56 2.543 1.083 3.699 1.867.523.375 1.084 1.085 1.755 1.272h.786c1.193.26 2.538.072 3.661.41 1.979.636 3.772 1.569 5.38 2.576 4.893 3.103 8.928 7.512 11.652 12.778.447.858.637 1.644 1.045 2.539.787 1.832 1.76 3.7 2.541 5.493.785 1.755 1.533 3.547 2.654 5.005.559.784 2.805 1.195 3.812 1.606.745.335 1.905.633 2.577 1.044 1.271.783 2.537 1.682 3.732 2.543.595.448 2.465 1.382 2.576 2.13M99.484 39.844a5.82 5.82 0 0 0-1.529.188v.075h.072c.301.597.824 1.011 1.197 1.532.301.599.562 1.193.857 1.791l.072-.074c.527-.373.789-.971.789-1.868-.227-.264-.262-.522-.451-.784-.22-.374-.705-.56-1.007-.86" fill="#5d87a1"/><path d="M141.148 113.578h.774v-3.788h-1.161l-.947 2.585-1.029-2.585h-1.118v3.788h.731v-2.882h.041l1.078 2.882h.557l1.074-2.882v2.882zm-6.235 0h.819v-3.146h1.072v-.643h-3.008v.643h1.115l.002 3.146z" fill="#f8981d"/></svg>
        </a>

            <!-- JAVA SCRIPT -->
        <a href="#" class="max-w-[120px] mx-4 py-4 grayscale opacity-60 transition
        hover:grayscale-0 duration-500 hover:opacity-100 lg:mx-6 xl:mx-8">
        <i><?xml version="1.0" encoding="utf-8"?>
          <svg width="100" height="100" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><title>file_type_js</title><path d="M18.774,19.7a3.727,3.727,0,0,0,3.376,2.078c1.418,0,2.324-.709,2.324-1.688,0-1.173-.931-1.589-2.491-2.272l-.856-.367c-2.469-1.052-4.11-2.37-4.11-5.156,0-2.567,1.956-4.52,5.012-4.52A5.058,5.058,0,0,1,26.9,10.52l-2.665,1.711a2.327,2.327,0,0,0-2.2-1.467,1.489,1.489,0,0,0-1.638,1.467c0,1.027.636,1.442,2.1,2.078l.856.366c2.908,1.247,4.549,2.518,4.549,5.376,0,3.081-2.42,4.769-5.671,4.769a6.575,6.575,0,0,1-6.236-3.5ZM6.686,20c.538.954,1.027,1.76,2.2,1.76,1.124,0,1.834-.44,1.834-2.15V7.975h3.422V19.658c0,3.543-2.078,5.156-5.11,5.156A5.312,5.312,0,0,1,3.9,21.688Z" style="fill:#f5de19"/></svg></i>
        </a>

                <!-- BOOTSTRAP -->
                <a href="#" class="max-w-[120px] mx-4 py-4 grayscale opacity-60 transition
                hover:grayscale-0 duration-500 hover:opacity-100 lg:mx-6 xl:mx-8">
                  <i><?xml version="1.0" encoding="UTF-8" standalone="no" ?>
                            <svg width="100" height="80" viewBox="0 0 256 256" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid">
                                <g>
                                    <path d="M0,222.991225 C0,241.223474 14.7785318,256 33.0087747,256 L222.991225,256 C241.223474,256 256,241.221468 256,222.991225 L256,33.0087747 C256,14.7765263 241.221468,0 222.991225,0 L33.0087747,0 C14.7765263,0 0,14.7785318 0,33.0087747 L0,222.991225 Z" fill="#563D7C">

                            </path>
                                    <path d="M106.157563,113.238095 L106.157563,76.9845938 L138.069328,76.9845938 C141.108559,76.9845938 144.039202,77.2378593 146.861345,77.7443978 C149.683488,78.2509362 152.179961,79.1554557 154.35084,80.4579832 C156.52172,81.7605107 158.258397,83.5695496 159.560924,85.8851541 C160.863452,88.2007585 161.514706,91.1675823 161.514706,94.7857143 C161.514706,101.298352 159.560944,106.001853 155.653361,108.896359 C151.745779,111.790864 146.752832,113.238095 140.67437,113.238095 L106.157563,113.238095 L106.157563,113.238095 Z M72.07493,50.5 L72.07493,205.5 L147.186975,205.5 C154.133788,205.5 160.899594,204.631661 167.484594,202.894958 C174.069594,201.158255 179.93088,198.480877 185.068627,194.862745 C190.206375,191.244613 194.294803,186.577293 197.334034,180.860644 C200.373264,175.143996 201.892857,168.37819 201.892857,160.563025 C201.892857,150.866431 199.541107,142.581033 194.837535,135.706583 C190.133963,128.832132 183.00635,124.020088 173.454482,121.270308 C180.401295,117.941627 185.647508,113.672295 189.193277,108.462185 C192.739047,103.252075 194.511905,96.7395349 194.511905,88.9243697 C194.511905,81.6881057 193.317939,75.6097352 190.929972,70.6890756 C188.542005,65.7684161 185.177193,61.8247114 180.835434,58.8578431 C176.493676,55.8909749 171.283644,53.756309 165.205182,52.4537815 C159.12672,51.151254 152.397096,50.5 145.016106,50.5 L72.07493,50.5 L72.07493,50.5 Z M106.157563,179.015406 L106.157563,136.466387 L143.279412,136.466387 C150.660401,136.466387 156.594049,138.166883 161.080532,141.567927 C165.567016,144.968971 167.810224,150.649353 167.810224,158.609244 C167.810224,162.661552 167.122789,165.990183 165.747899,168.595238 C164.373009,171.200293 162.527789,173.262597 160.212185,174.782213 C157.89658,176.301828 155.219203,177.387252 152.179972,178.038515 C149.140741,178.689779 145.956833,179.015406 142.628151,179.015406 L106.157563,179.015406 L106.157563,179.015406 Z" fill="#FFFFFF">

                            </path>
                                </g>
                            </svg>
                        </i>
                      </a>

         <!-- TAILWIND -->
        <a href="#" class="max-w-[120px] mx-4 py-4 grayscale opacity-60 transition
        hover:grayscale-0 duration-500 hover:opacity-100 lg:mx-6 xl:mx-8">
        <?xml version="1.0" encoding="utf-8"?>
        <svg width="100px" height="100px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><title>file_type_tailwind</title><path d="M9,13.7q1.4-5.6,7-5.6c5.6,0,6.3,4.2,9.1,4.9q2.8.7,4.9-2.1-1.4,5.6-7,5.6c-5.6,0-6.3-4.2-9.1-4.9Q11.1,10.9,9,13.7ZM2,22.1q1.4-5.6,7-5.6c5.6,0,6.3,4.2,9.1,4.9q2.8.7,4.9-2.1-1.4,5.6-7,5.6c-5.6,0-6.3-4.2-9.1-4.9Q4.1,19.3,2,22.1Z" style="fill:#44a8b3"/></svg>
        </a>

        <!-- HTML -->
        <a href="#" class="max-w-[120px] mx-4 py-4 grayscale opacity-60 transition
        hover:grayscale-0 duration-500 hover:opacity-100 lg:mx-6 xl:mx-8 text-orange-600">
        <svg role="img" width="100" height="100" class="fill-current"
        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>HTML5</title><path d="M1.5 0h21l-1.91 21.563L11.977 24l-8.564-2.438L1.5 0zm7.031 9.75l-.232-2.718 10.059.003.23-2.622L5.412 4.41l.698 8.01h9.126l-.326 3.426-2.91.804-2.955-.81-.188-2.11H6.248l.33 4.171L12 19.351l5.379-1.443.744-8.157H8.531z"/></svg>
      </a>

        <!-- CSS -->
        <a href="#" class="max-w-[120px] mx-4 py-4 grayscale opacity-60 transition
        hover:grayscale-0 duration-500 hover:opacity-100 lg:mx-6 xl:mx-8 text-blue-500">
        <svg role="img" width="100" height="100" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <title>CSS3</title><path d="M1.5 0h21l-1.91 21.563L11.977 24l-8.565-2.438L1.5 0zm17.09 4.413L5.41 4.41l.213 2.622 10.125.002-.255 2.716h-6.64l.24 2.573h6.182l-.366 3.523-2.91.804-2.956-.81-.188-2.11h-2.61l.29 3.855L12 19.288l5.373-1.53L18.59 4.414z"/></svg>
        </a>

        <!-- figma -->
        <a href="#" class="max-w-[120px] mx-4 py-4 grayscale opacity-60 transition
        hover:grayscale-0 duration-500 hover:opacity-100 lg:mx-6 xl:mx-8">
       <img src="dist/img/clients/figma-removebg.png" width="80" height="80" alt="">
        </a>

      </div>
    </div>
  </div>
</div>
 </div>
 </section>
  <!-- Skills section end -->

  <!-- certificate section start -->
<section id="certificate" class="bg-slate-100 dark:bg-dark pt-36 pb-32 overflow-x-hidden">
  <div class="container">
    <div class="w-full px-4">
      <div class="max-w-xl mx-auto text-center mb-16">
           <h4 class="font-semibold text-lg text-primary mb-2">Certificate</h4>
            <h2 class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl  dark:text-white">My Certificate</h2>
            <p class="font-medium text-md text-secondary md:text-lg">These are some of the certificates that I have obtained right now</p>
        </div>
      </div>

      <div class="max-w-screen-xl flex flex-wrap justify-items-center xl:w-10/12 xl:mx-auto"></div>
        <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-10 justify-center">

            <!-- certificate 1 -->
            <div class="rounded overflow-hidden shadow-lg dark:bg-slate-700">
            <a href="#"></a>
            <div class="relative">
                <a href="#">
                    <img class="w-full"
                        src="dist/img/certificate/Sertifikat_1.jpg"
                        alt="Sunset in the mountains">
                    <div
                        class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                    </div>
                </a>
                <a href="#!">
                    <div
                        class="absolute bottom-0 left-0 bg-primary px-4 py-2 text-white text-sm hover:bg-white hover:text-primary transition duration-500 ease-in-out">
                        Photos
                    </div>
                </a>

            </div>
            <div class="px-6 py-4">

                <a href="#"
                    class="text-dark font-semibold text-lg inline-block hover:text-primary transition duration-500 ease-in-out  dark:text-white">Starting basic
                    programming to become a software developer</a>
                <p class="text-gray-500 text-sm pt-2">
                  Start knowledge about the world of programming and become a software developer
                </p>
            </div>
            <div class="px-6 py-4 flex flex-row items-center">
                <span href="#" class="py-1 text-sm font-regular text-gray-900  dark:text-white mr-1 flex flex-row items-center">
                    <svg height="13px" width="13px" class="fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                        style="enable-background:new 0 0 512 512;" xml:space="preserve">
                        <g>
                            <g>
                                <path d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256
			c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128
			c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z"></path>
                            </g>
                        </g>
                    </svg>
                    <span class="ml-1  dark:text-white">October 22, 2023</span></span>
            </div>
        </div>

          <!--  certificate 2 -->
        <div class="rounded overflow-hidden shadow-lg dark:bg-slate-700">
            <a href="#"></a>
            <div class="relative">
                <a href="#">
                    <img class="w-full"
                        src="dist/img/certificate/Sertifikat_2.jpg"
                        alt="Sunset in the mountains">
                    <div
                        class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                    </div>
                </a>
                <a href="#!">
                    <div
                        class="absolute bottom-0 left-0 bg-primary px-4 py-2 text-white text-sm hover:bg-white hover:text-primary transition duration-500 ease-in-out">
                        Photos
                    </div>
                </a>
            </div>
            <div class="px-6 py-4">

                <a href="#"
                    class="text-dark font-semibold text-lg inline-block hover:text-primary transition duration-500 ease-in-out  dark:text-white">Learn basic google cloud</a>
                <p class="text-gray-500 text-sm">
                  Get to know what Google Cloud is</p>
            </div>
            <div class="px-6 py-4 flex flex-row items-center">
                <span href="#"
                    class="py-1 text-sm font-regular text-gray-900  dark:text-white mr-1 flex flex-row justify-between items-center">
                    <svg height="13px" width="13px" class="fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                        style="enable-background:new 0 0 512 512;" xml:space="preserve">
                        <g>
                            <g>
                                <path
                                    d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                                </path>
                            </g>
                        </g>
                    </svg>
                    <span class="ml-1  dark:text-white">September 02, 2023</span></span>
            </div>
        </div>

        <!-- certificate 3 -->
        <div class="rounded overflow-hidden shadow-lg dark:bg-slate-700">

            <a href="#"></a>
            <div class="relative">
                <a href="#">
                    <img class="w-full"
                        src="dist/img/certificate/Sertifikat_3.jpg"
                        alt="Sunset in the mountains">
                    <div
                        class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                    </div>
                </a>
                <a href="#!">
                    <div
                        class="absolute bottom-0 left-0 bg-primary px-4 py-2 text-white text-sm hover:bg-white hover:text-primary transition duration-500 ease-in-out">
                        Photos
                    </div>
                </a>
            </div>
            <div class="px-6 py-4">

                <a href="#"
                    class="text-dark font-semibold text-lg inline-block hover:text-primary transition duration-500 ease-in-out  dark:text-white">Programming Logic (101)</a>
                <p class="text-gray-500 text-sm">
                  Know what programming logic is
               </p>
            </div>
            <div class="px-6 py-4 flex flex-row items-center">
                <span href="#"
                    class="py-1 text-sm font-regular text-gray-900  dark:text-white mr-1 flex flex-row justify-between items-center">
                    <svg height="13px" width="13px" class="fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                        style="enable-background:new 0 0 512 512;" xml:space="preserve">
                        <g>
                            <g>
                                <path
                                    d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                                </path>
                            </g>
                        </g>
                    </svg>
                    <span class="ml-1  dark:text-white">August 29, 2023</span></span>
            </div>
        </div>


      <!-- certificate 5 -->
      <div class="rounded overflow-hidden shadow-lg dark:bg-slate-700">
        <a href="#"></a>
        <div class="relative">
            <a href="#">
                <img class="w-full"
                    src="dist/img/certificate/Sertifikat_5.jpg"
                    alt="Sunset in the mountains">
                <div
                    class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                </div>
            </a>
            <a href="#!">
                <div
                    class="absolute bottom-0 left-0 bg-primary px-4 py-2 text-white text-sm hover:bg-white hover:text-primary transition duration-500 ease-in-out">
                    Photos
                </div>
            </a>

        </div>
        <div class="px-6 py-4">

            <a href="#"
                class="text-dark font-semibold text-lg inline-block hover:text-primary transition duration-500 ease-in-out  dark:text-white">DevCoach: Flutter</a>
            <p class="text-gray-500 text-sm">
            Future navigation with GoRouter
            </p>
        </div>
        <div class="px-6 py-4 flex flex-row items-center">
            <span href="#"
                class="py-1 text-sm font-regular text-gray-900  dark:text-white mr-1 flex flex-row justify-between items-center">
                <svg height="13px" width="13px" class="fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                    style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <g>
                        <g>
                            <path
                                d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                            </path>
                        </g>
                    </g>
                </svg>
                <span class="ml-1  dark:text-white">August 30, 2024</span></span>
        </div>
    </div>

    <!-- certificate 6 -->
    <div class="rounded overflow-hidden shadow-lg dark:bg-slate-700">
      <a href="#"></a>
      <div class="relative">
          <a href="#">
              <img class="w-full"
                  src="dist/img/certificate/Sertifikat_6.jpg"
                  alt="Sunset in the mountains">
              <div
                  class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
              </div>
          </a>
          <a href="#!">
              <div
                  class="absolute bottom-0 left-0 bg-primary px-4 py-2 text-white text-sm hover:bg-white hover:text-primary transition duration-500 ease-in-out">
                  Photos
              </div>
          </a>

      </div>
      <div class="px-6 py-4">

          <a href="#"
              class="text-dark font-semibold text-lg inline-block hover:text-primary transition duration-500 ease-in-out  dark:text-white">Mastering SOLID Principles to Boost Engineering career</a>
          <p class="text-gray-500 text-sm">
            Organized by Indosat Ooredo Hutchison Digital Camp
          </p>
      </div>
      <div class="px-6 py-4 flex flex-row items-center">
          <span href="#"
              class="py-1 text-sm font-regular text-gray-900  dark:text-white mr-1 flex flex-row justify-between items-center">
              <svg height="13px" width="13px" class="fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                  style="enable-background:new 0 0 512 512;" xml:space="preserve">
                  <g>
                      <g>
                          <path
                              d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                          </path>
                      </g>
                  </g>
              </svg>
              <span class="ml-1 dark:text-white">February 20, 2023</span></span>
      </div>
  </div>

    <!-- certificate 7 -->
    <div class="rounded overflow-hidden shadow-lg dark:bg-slate-700">
      <a href="#"></a>
      <div class="relative">
          <a href="#">
              <img class="w-full"
                  src="dist/img/certificate/Sertifikat_7.jpg"
                  alt="Sunset in the mountains">
              <div
                  class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
              </div>
          </a>
          <a href="#!">
              <div
                  class="absolute bottom-0 left-0 bg-primary px-4 py-2 text-white text-sm hover:bg-white hover:text-primary transition duration-500 ease-in-out">
                  Photos
              </div>
          </a>

      </div>
      <div class="px-6 py-4">

          <a href="#"
              class="text-dark font-semibold text-lg inline-block hover:text-primary transition duration-500 ease-in-out  dark:text-white">Cloud Practitioner Essentials (Belajar Dasar AWS Cloud)</a>
          <p class="text-gray-500 text-sm">
            The class is aimed at beginners who want to start a career in the cloud computing field by referring to AWS's international competency standards.
          </p>
      </div>
      <div class="px-6 py-4 flex flex-row items-center">
          <span href="#"
              class="py-1 text-sm font-regular text-gray-900  dark:text-white mr-1 flex flex-row justify-between items-center">
              <svg height="13px" width="13px" class="fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                  style="enable-background:new 0 0 512 512;" xml:space="preserve">
                  <g>
                      <g>
                          <path
                              d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                          </path>
                      </g>
                  </g>
              </svg>
              <span class="ml-1 dark:text-white">September 18, 2024</span></span>
      </div>
  </div>


    <!-- certificate 8 -->
    <div class="rounded overflow-hidden shadow-lg dark:bg-slate-700">
      <a href="#"></a>
      <div class="relative">
          <a href="#">
              <img class="w-full"
                  src="dist/img/certificate/Sertifikat_8.jpg"
                  alt="Sunset in the mountains">
              <div
                  class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
              </div>
          </a>
          <a href="#!">
              <div
                  class="absolute bottom-0 left-0 bg-primary px-4 py-2 text-white text-sm hover:bg-white hover:text-primary transition duration-500 ease-in-out">
                  Photos
              </div>
          </a>

      </div>
      <div class="px-6 py-4">

          <a href="#"
              class="text-dark font-semibold text-lg inline-block hover:text-primary transition duration-500 ease-in-out  dark:text-white">Education expo & science olympiad</a>
          <p class="text-gray-500 text-sm">
            National level olympiads organized by Education Expo in various fields.
          </p>
      </div>
      <div class="px-6 py-4 flex flex-row items-center">
          <span href="#"
              class="py-1 text-sm font-regular text-gray-900  dark:text-white mr-1 flex flex-row justify-between items-center">
              <svg height="13px" width="13px" class="fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                  style="enable-background:new 0 0 512 512;" xml:space="preserve">
                  <g>
                      <g>
                          <path
                              d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                          </path>
                      </g>
                  </g>
              </svg>
              <span class="ml-1 dark:text-white">September 18, 2024</span></span>
      </div>
  </div>

          <!-- certificate 4 -->
          <div class="rounded overflow-hidden shadow-lg dark:bg-slate-700">
            <a href="#"></a>
            <div class="relative">
                <a href="#">
                    <img class="w-full"
                        src="dist/img/certificate/Sertifikat_4.jpg"
                        alt="Sunset in the mountains">
                    <div
                        class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                    </div>
                </a>
                <a href="#!">
                    <div
                        class="absolute bottom-0 left-0 bg-primary px-4 py-2 text-white text-sm hover:bg-white hover:text-primary transition duration-500 ease-in-out">
                        Photos
                    </div>
                </a>
            </div>
            <div class="px-6 py-4">

                <a href="#"
                    class="text-dark font-semibold text-lg inline-block hover:text-primary transition duration-500 ease-in-out  dark:text-white">Digital literacy seminar</a>
                <p class="text-gray-500 text-sm pt-2">
                  with the theme digital literacy, being smart in the digital era,
                  organized by the directorate of informatics empowerment, Kominfo</p>
            </div>
            <div class="px-6 py-4 flex flex-row items-center">
                <span href="#"
                    class="py-1 text-sm font-regular text-gray-900  dark:text-white mr-1 flex flex-row justify-between items-center">
                    <svg height="13px" width="13px" class="fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                        style="enable-background:new 0 0 512 512;" xml:space="preserve">
                        <g>
                            <g>
                                <path
                                    d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                                </path>
                            </g>
                        </g>
                    </svg>
                    <span class="ml-1  dark:text-white">February 20, 2023</span></span>
            </div>
        </div>

    </div>
</div>
 </section>
  <!-- certificate section end -->

  <!-- Contact section start -->
   <section id="contact" class="pt-36 pb-32 dark:bg-slate-800">
    <div class="container">
      <div class="w-full px-4">
        <div class="max-w-xl mx-auto text-center mb-16">
          <h4 class="font-semibold text-lg text-primary mb-2">Contact</h4>
           <h2 class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl dark:text-white">Contact Me</h2>
           <p class="font-medium text-md text-secondary md:text-lg">Feel free to contact me</p>
       </div>
      </div>

      <form action="https://formspree.io/f/mgvwjyko" method="POST">
        <div class="w-full lg:w-2/3 lg:mx-auto">
          <div class="w-full px-4 mb-8">
            <label for="name"  class="text-base font-bold text-primary">Name</label>
            <input type="text" placeholder="Your name" id="name" name="name" class="w-full bg-slate-200 text-dark p-3 rounded-md
            focus:outline-none focus:ring-primary focus:border-primary" required/>
          </div>

          <div class="w-full px-4 mb-8">
            <label for="email" class="text-base font-bold text-primary">Email</label>
            <input type="email" placeholder="Your email" id="email" name="email" class="w-full bg-slate-200 text-dark p-3 rounded-md
            focus:outline-none focus:ring-primary focus:border-primary" required/>
          </div>

          <div class="w-full px-4 mb-8">
            <label for="message" class="text-base font-bold text-primary">Messages</label>
            <textarea id="message" placeholder="Give a messages" name="message" class="w-full bg-slate-200 text-dark p-3 rounded-md
            focus:outline-none focus:ring-primary focus:border-primary h-32" required></textarea>
          </div>

          <!-- Bot prevention -->
          <input type="hidden" name="_honeypot" style="display:none">
          <input type="hidden" name="_captcha" value="false">

          <div class="w-full px-4">
            <button type="submit" class="text-base font-semibold text-white bg-primary
            py-3 px-8 rounded-full w-full hover:opacity-80 hover:shadow-lg
            transition duration-500">Submit</button>
          </div>
        </div>
      </form>


   </section>
  <!-- Contact section  end-->

  <!-- footer start -->
  <footer class="bg-dark pt-24 pb-12 max-w-full box-border overflow-x-hidden">
    <div class="container mx-auto px-4">
      <div class="flex flex-wrap">
        <div class="w-full px-4 mb-12 text-slate-300 font-medium
        md:w-1/3">
          <h2 class="font-bold text-4xl text-white mb-5">Abisam Hazim</h2>
          <h3 class="font-bold text-2xl mb-2">Contact me</h3>
          <p>abisamhazim04@gmail.com</p>
          <p>Komplek Laladon permai No.64</p>
          <p>Bogor</p>
        </div>
        <div class="w-full px-4 mb-12 md:w-1/3">
          <h3 class="font-semibold text-xl text-white mb-5">Follow me on</h3>
          <ul class="text-slate-300">
            <li>
              <a href="https://youtube.com/@abisamhazim?si=RHuHHmjETR9rU_ma"
              class="inline-block text-base hover:text-primary mb-3">Youtube</a>
            </li>

            <li>
              <a href="https://instagram.com"
              class="inline-block text-base hover:text-primary mb-3">Instagram</a>
            </li>

            <li>
              <a href="https://www.threads.net/@biscuitsam__"
              class="inline-block text-base hover:text-primary mb-3">Threads</a>
            </li>
            <li>
              <a href="https://www.tiktok.com/@abisamhazim?_t=8pbryCVPN28&_r=1"
              class="inline-block text-base hover:text-primary mb-3">Tiktok</a>
            </li>
          </ul>
        </div>

        <div class="w-full px-4 mb-12 md:w-1/3">
          <h3 class="font-semibold text-xl text-white mb-5">Hyperlink</h3>
          <ul class="text-slate-300">
            <li>
              <a href="#home"
              class="inline-block text-base hover:text-primary mb-3">Home</a>
            </li>

            <li>
              <a href="#about"
              class="inline-block text-base hover:text-primary mb-3">About</a>
            </li>

            <li>
              <a href="#portofolio"
              class="inline-block text-base hover:text-primary mb-3">Portofolio</a>
            </li>
            <li>
              <a href="#skills"
              class="inline-block text-base hover:text-primary mb-3">Skills</a>
            </li>

            <li>
              <a href="#certificate"
              class="inline-block text-base hover:text-primary mb-3">Certificate</a>
            </li>

            <li>
              <a href="#contact"
              class="inline-block text-base hover:text-primary mb-3">Contact</a>
            </li>
          </ul>
        </div>

      </div>
      <div class="w-full pt-10 border-t border-slate-700"></div>

      <div class="flex items-center justify-center mb-5">
        <!-- youtube -->
        <a href="https://youtube.com/@abisamhazim?si=RHuHHmjETR9rU_ma" target="_blank"
        class="w-12 h-12 mr-3 rounded-full flex justify-center items-center border text-slate-400 border-slate-300 hover:border-primary hover:bg-primary
        hover:text-white ">
          <svg role="img" width="24" height="24" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <title>YouTube</title>
            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505
            0-9.377.505A3.017 3.017 0 0 0
            .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505
            9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24
            12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
          </svg>
       </a>


       <!-- instagram -->
       <a href="https://www.instagram.com/biscuitsam__?igsh=dDEydW10MDg4Ynk0" target="_blank" class="w-12 h-12 mr-3 rounded-full flex justify-center items-center border text-slate-400 border-slate-300 hover:border-primary hover:bg-primary
       hover:text-white ">
        <svg role="img" width="24" height="24" viewBox="0 0 24 24" class="fill-current" xmlns="http://www.w3.org/2000/svg">
           <title>Instagram</title>
           <path d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077"/>
        </svg>
     </a>

     <!-- thereads -->
     <a href="https://www.threads.net/@biscuitsam__" target="_blank"
     class="w-12 h-12 mr-3 rounded-full flex justify-center items-center border text-slate-400 border-slate-300 hover:border-primary hover:bg-primary
     hover:text-white ">
     <svg role="img" width="24" height="24" viewBox="0 0 24 24" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Threads</title><path d="M12.186 24h-.007c-3.581-.024-6.334-1.205-8.184-3.509C2.35 18.44 1.5 15.586 1.472 12.01v-.017c.03-3.579.879-6.43 2.525-8.482C5.845 1.205 8.6.024 12.18 0h.014c2.746.02 5.043.725 6.826 2.098 1.677 1.29 2.858 3.13 3.509 5.467l-2.04.569c-1.104-3.96-3.898-5.984-8.304-6.015-2.91.022-5.11.936-6.54 2.717C4.307 6.504 3.616 8.914 3.589 12c.027 3.086.718 5.496 2.057 7.164 1.43 1.783 3.631 2.698 6.54 2.717 2.623-.02 4.358-.631 5.8-2.045 1.647-1.613 1.618-3.593 1.09-4.798-.31-.71-.873-1.3-1.634-1.75-.192 1.352-.622 2.446-1.284 3.272-.886 1.102-2.14 1.704-3.73 1.79-1.202.065-2.361-.218-3.259-.801-1.063-.689-1.685-1.74-1.752-2.964-.065-1.19.408-2.285 1.33-3.082.88-.76 2.119-1.207 3.583-1.291a13.853 13.853 0 0 1 3.02.142c-.126-.742-.375-1.332-.75-1.757-.513-.586-1.308-.883-2.359-.89h-.029c-.844 0-1.992.232-2.721 1.32L7.734 7.847c.98-1.454 2.568-2.256 4.478-2.256h.044c3.194.02 5.097 1.975 5.287 5.388.108.046.216.094.321.142 1.49.7 2.58 1.761 3.154 3.07.797 1.82.871 4.79-1.548 7.158-1.85 1.81-4.094 2.628-7.277 2.65Zm1.003-11.69c-.242 0-.487.007-.739.021-1.836.103-2.98.946-2.916 2.143.067 1.256 1.452 1.839 2.784 1.767 1.224-.065 2.818-.543 3.086-3.71a10.5 10.5 0 0 0-2.215-.221z"/></svg>
    </a>

    <!-- tiktok -->
     <a href="https://www.tiktok.com/@abisamhazim?_t=8pbryCVPN28&_r=1" target="_blank"
     class="w-12 h-12 mr-3 rounded-full flex justify-center items-center border text-slate-400 border-slate-300 hover:border-primary hover:bg-primary
     hover:text-white ">
     <svg role="img" width="24" height="24" viewBox="0 0 24 24" class="fill-current" xmlns="http://www.w3.org/2000/svg"><title>TikTok</title><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>          </a>

      </div>
      <p class="font-medium text-xs text-slate-500 text-center">Made with 💖, by <a href="https://instagram.com" target="_blank
        " class="font-bold text-primary">
        Abisam Hazim</a>, with using <a href="https://tailwindcss.com" target="_blank" class="font-bold text-sky-500">Tailwind CSS</a></p>
    </div>
   </footer>
  <!-- footer end -->

  <!-- back to top start -->
  <a href="#home" id="to-top" class="fixed justify-center items-center z-50 bottom-4 right-4 p-4 h-14 w-14 max-h-full max-w-full bg-primary rounded-full hover:animate-pulse hidden overflow-hidden">
    <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
      <svg width="100px" height="100px" class="z-[9999]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M17 15L12 10L7 15" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
  </a>
  <!-- back to top end -->

  <script src="dist/js/script.js"></script>
</body>
</html>
