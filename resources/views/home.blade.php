<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link href="dist/output.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio - Abisam Hazim</title>
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
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
                    @if (auth()->check())
                        <a href="#home"
                            class="font-bold text-lg  text-primary py-6 bg-gradient-to-r from-primary to-blue-700 bg-clip-text text-transparent">
                            {{ auth()->user()->name }}
                        </a>
                    @endif
                </div>
                <div class="flex items-center px-4">
                    <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                        <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                    </button>

                    <nav id="nav-menu"
                        class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-full w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:shadow-none lg:rounded-none dark:bg-dark
                 dark:shadow-slate-600 lg:dark:bg-transparent">
                        <ul class="block lg:flex" id="#nav-active">
                            <li class="group">
                                <a href="#home"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white">Home</a>
                            </li>
                            <li class="group">
                                <a href="#about"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white">About</a>
                            </li>
                            <li class="group">
                                <a href="#portofolio"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white">Portofolio</a>
                            </li>
                            <li class="group">
                                <a href="#skills"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white">Skills</a>
                            </li>
                            <li class="group">
                                <a href="#certificate"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white">Certificate</a>
                            </li>
                            <li class="group">
                                <a href="#contact"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white">Contact</a>
                            </li>
                            <li class="mt-3 lg:mt-0 flex items-center pl-8">
                                <div class="flex">
                                    <span class="mr-2 text-sm text-slate-500">light</span>
                                    <input type="checkbox" class="hidden" id="dark-toggle" />
                                    <label for="dark-toggle">
                                        <div
                                            class="flex h-5 w-9 cursor-pointer items-center rounded-full bg-slate-500 p-1">
                                            <div
                                                class="toggle-circle h-4 w-4 rounded-full bg-white transition duration-300 ease-in-out">
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
                        Hello Everyone 👋, <span
                            class="block font-bold  text-primary py-6 bg-gradient-to-r from-primary to-blue-700 bg-clip-text text-transparent
             lg:text-5xl sm:text-lg">

                            @foreach ($heroSectionsCollection as $heroSection)
                                {{ $heroSection->title }}</h1>
                    <h2
                        class="text-2xl font-medium text-primary py-4 bg-gradient-to-r from-primary to-blue-700 bg-clip-text text-transparent">
                        {{ $heroSection->subTitle }}
                    </h2>
                    <p class="font-medium text-secondary mb-10
          leading-relaxed">
                        {{ $heroSection->description }}<span class="text-dark font-bold  dark:text-white"> many
                            more..</span></p>

                    <a href="#contact"
                        class="text-base font-semibold text-white bg-primary
            py-3 px-8 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300
            ease-in-out">Contact
                        me</a>
                </div>
                <div class="w-full self-end px-4 lg:w-1/2 md:scale-125 overflow-hidden">
                    <div class="relative mt-10 lg:mt-9 lg:right-0">
                        <img src="{{ Storage::url($heroSection->picture) }}" width="300" height="300"
                            alt="Abisam Hazim" class="relative z-10 max-w-full mx-auto" />
                        @endforeach
                        <span class="absolute bottom-0  left-1/2 -translate-x-1/2">
                            <svg width="400" height="400" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#42b883"
                                    d="M41.6,-57.5C52,-49.7,57.2,-35,57.3,-21.7C57.4,-8.4,52.3,3.5,51,19.4C49.8,35.4,52.3,55.4,44.4,61.3C36.5,67.2,18.3,59,0.3,58.7C-17.7,58.3,-35.4,65.7,-45.2,60.4C-55,55.1,-56.9,37.1,-56.3,22.2C-55.8,7.4,-52.7,-4.4,-45.8,-11.6C-38.9,-18.8,-28.2,-21.4,-19.9,-29.9C-11.7,-38.4,-5.8,-52.6,4.9,-59.3C15.6,-66.1,31.2,-65.3,41.6,-57.5Z"
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
                        <h2 class="font-bold text-dark text-3xl mb-5 max-w-md lg:text-4xl dark:text-white">
                            {{ $about->title }}</h2>
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
                        <svg role="img" width="24" height="24" class="fill-current" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>YouTube</title>
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505
                  0-9.377.505A3.017 3.017 0 0 0
                  .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505
                  9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24
                  12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                        </svg>
                    </a>


                    <!-- instagram -->
                    <a href="https://www.instagram.com/biscuitsam__?igsh=dDEydW10MDg4Ynk0" target="_blank"
                        class="w-12 h-12 mr-3 rounded-full flex justify-center items-center border text-slate-400 border-slate-300 hover:border-primary hover:bg-primary
             hover:text-white ">
                        <svg role="img" width="24" height="24" viewBox="0 0 24 24" class="fill-current"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>Instagram</title>
                            <path
                                d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077" />
                        </svg>
                    </a>

                    <!-- thereads -->
                    <a href="https://www.threads.net/@biscuitsam__" target="_blank"
                        class="w-12 h-12 mr-3 rounded-full flex justify-center items-center border text-slate-400 border-slate-300 hover:border-primary hover:bg-primary
           hover:text-white ">
                        <svg role="img" width="24" height="24" viewBox="0 0 24 24" class="fill-current"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <title>Threads</title>
                            <path
                                d="M12.186 24h-.007c-3.581-.024-6.334-1.205-8.184-3.509C2.35 18.44 1.5 15.586 1.472 12.01v-.017c.03-3.579.879-6.43 2.525-8.482C5.845 1.205 8.6.024 12.18 0h.014c2.746.02 5.043.725 6.826 2.098 1.677 1.29 2.858 3.13 3.509 5.467l-2.04.569c-1.104-3.96-3.898-5.984-8.304-6.015-2.91.022-5.11.936-6.54 2.717C4.307 6.504 3.616 8.914 3.589 12c.027 3.086.718 5.496 2.057 7.164 1.43 1.783 3.631 2.698 6.54 2.717 2.623-.02 4.358-.631 5.8-2.045 1.647-1.613 1.618-3.593 1.09-4.798-.31-.71-.873-1.3-1.634-1.75-.192 1.352-.622 2.446-1.284 3.272-.886 1.102-2.14 1.704-3.73 1.79-1.202.065-2.361-.218-3.259-.801-1.063-.689-1.685-1.74-1.752-2.964-.065-1.19.408-2.285 1.33-3.082.88-.76 2.119-1.207 3.583-1.291a13.853 13.853 0 0 1 3.02.142c-.126-.742-.375-1.332-.75-1.757-.513-.586-1.308-.883-2.359-.89h-.029c-.844 0-1.992.232-2.721 1.32L7.734 7.847c.98-1.454 2.568-2.256 4.478-2.256h.044c3.194.02 5.097 1.975 5.287 5.388.108.046.216.094.321.142 1.49.7 2.58 1.761 3.154 3.07.797 1.82.871 4.79-1.548 7.158-1.85 1.81-4.094 2.628-7.277 2.65Zm1.003-11.69c-.242 0-.487.007-.739.021-1.836.103-2.98.946-2.916 2.143.067 1.256 1.452 1.839 2.784 1.767 1.224-.065 2.818-.543 3.086-3.71a10.5 10.5 0 0 0-2.215-.221z" />
                        </svg>
                    </a>

                    <!-- tiktok -->
                    <a href="https://www.tiktok.com/@abisamhazim?_t=8pbryCVPN28&_r=1" target="_blank"
                        class="w-12 h-12 mr-3 rounded-full flex justify-center items-center border text-slate-400 border-slate-300 hover:border-primary hover:bg-primary
                      hover:text-white ">
                        <svg role="img" width="24" height="24" viewBox="0 0 24 24" class="fill-current"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>TikTok</title>
                            <path
                                d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                        </svg> </a>

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
                    <h2 class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl  dark:text-white">New Project
                    </h2>
                    <p class="font-medium text-md text-secondary md:text-lg">The following is my latest project</p>
                </div>
            </div>


            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                <div class="mb-12 p-4 md:w-1/2">
                    <!-- 1 -->
                    <div class="rounded-md shadow-md overflow-hidden">
                        <img src="dist/img/portofolio/2.jpg" alt="workshop-website" width="w-full" />
                        <h3 class="font-semibold text-xl text-dark mt-5 mb-3 ml-2  dark:text-white px-2">Workshop
                            Website</h3>
                        <p class="font-medium text-base text-secondary dark:text-white ml-2 mb-1 px-2">a website that
                            contains information about a workshop, in the form of services, education, and also products
                            sold</p>
                    </div>
                </div>

                <!-- 2 -->
                <div class="mb-12 p-4 md:w-1/2">
                    <div class="rounded-md shadow-md overflow-hidden">
                        <img src="dist/img/portofolio/3.jpg" alt="simple blog website" width="w-full" />
                        <h3 class="font-semibold text-xl text-dark mt-5 mb-3 ml-2  dark:text-white px-2">Blog Apps</h3>
                        <p class="font-medium text-base text-secondary dark:text-white ml-2 mb-1 px-2">A website
                            created using Laravel, which contains a collection of blogs and also has search and
                            pagination</p>
                    </div>
                </div>

                <!-- 3 -->
                <div class="mb-12 p-4 md:w-1/2">
                    <div class="rounded-md shadow-md overflow-hidden">
                        <img src="dist/img/portofolio/1.jpg" alt="store-website" width="w-full" />
                        <h3 class="font-semibold text-xl text-dark mt-5 mb-3 ml-2  dark:text-white px-2">E-Commerce
                        </h3>
                        <p class="font-medium text-base text-secondary dark:text-white ml-2 mb-1 px-2">website that
                            contains product information in the form of accessories, accessories and phone casings</p>
                    </div>
                </div>

                <!-- 4 -->
                <div class="mb-12 p-4 md:w-1/2">
                    <div class="rounded-md shadow-md overflow-hidden">
                        <img src="dist/img/portofolio/E-commerce_back_end.jpg" alt="back-end-E-commerce"
                            width="w-full" />
                        <h3 class="font-semibold text-xl text-dark mt-5 mb-3 ml-2  dark:text-white px-2">E-commerce
                            Admin</h3>
                        <p class="font-medium text-base text-secondary dark:text-white 50 ml-2 mb-1 px-2">A backend
                            containing an e-commerce CRUD operating system that I created with my teams</p>
                    </div>
                </div>

                <!-- 5 -->
                <div class="mb-12 p-4 md:w-1/2">
                    <div class="rounded-md shadow-md overflow-hidden">
                        <img src="dist/img/portofolio/adminDM.jpg" alt="back-end-Workshop" width="w-full" />
                        <h3 class="font-semibold text-xl text-dark mt-5 mb-3 ml-2  dark:text-white px-2">Workshop Admin
                        </h3>
                        <p class="font-medium text-base text-secondary dark:text-white 50 ml-2 mb-1 px-2">A backend
                            containing an Workshop CRUD operating, income data, visitor purchase history</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- Portofolio section end -->

    <!-- Skills section start -->
    <section id="skills" class="pt-36 pb-32 bg-emerald-700 dark:bg-slate-800 overflow-x-hidden">
        <div class="container max-w-full px-4 mx-auto">
            <div class="flex flex-wrap items-center justify-center w-full">
                <div class="mx-auto text-center mb-16">
                    <h4 class="font-semibold text-lg text-primary mb-2">Skills</h4>
                    <h2 class="font-bold text-white text-3xl mb-4 sm:text-4xl lg:text-5xl dark:text-white">My Skills
                    </h2>
                    <p class="font-medium text-md text-primary">This is the <span
                            class="text-white font-semibold">programming language</span>, framework, Tools
                        I currently use for frontend, backend and design</p>
                </div>


                <div class="w-full px-4">
                    <div class="flex flex-wrap items-center justify-center">

                        @foreach ($skills as $skill)
                            <!-- PHP NATIVE -->
                            <a href="#"
                                class="max-w-[120px] mx-4 py-4 grayscale opacity-60 transition
                                hover:grayscale-0 duration-500 hover:opacity-100 lg:mx-6 xl:mx-8">
                                <img src="{{ Storage::url($skill->images) }}" alt="{{ $skill->title }} "
                                    class="h-full w-full">
                            </a>
                        @endforeach
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
                    <h2 class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl  dark:text-white">My
                        Certificate</h2>
                    <p class="font-medium text-md text-secondary md:text-lg">These are some of the certificates that I
                        have obtained right now</p>
                </div>
            </div>

            <div class="max-w-screen-xl flex flex-wrap justify-items-center xl:w-10/12 xl:mx-auto"></div>
            <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-10 justify-center">

                <!-- certificate 1 -->
                <div class="rounded overflow-hidden shadow-lg dark:bg-slate-700">
                    <a href="#"></a>
                    <div class="relative">
                        <a href="#">
                            <img class="w-full" src="dist/img/certificate/Sertifikat_1.jpg"
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
                            class="text-dark font-semibold text-lg inline-block hover:text-primary transition duration-500 ease-in-out  dark:text-white">Starting
                            basic
                            programming to become a software developer</a>
                        <p class="text-gray-500 text-sm pt-2">
                            Start knowledge about the world of programming and become a software developer
                        </p>
                    </div>
                    <div class="px-6 py-4 flex flex-row items-center">
                        <span href="#"
                            class="py-1 text-sm font-regular text-gray-900  dark:text-white mr-1 flex flex-row items-center">
                            <svg height="13px" width="13px" class="fill-current" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                xml:space="preserve">
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
                            <img class="w-full" src="dist/img/certificate/Sertifikat_2.jpg"
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
                            class="text-dark font-semibold text-lg inline-block hover:text-primary transition duration-500 ease-in-out  dark:text-white">Learn
                            basic google cloud</a>
                        <p class="text-gray-500 text-sm">
                            Get to know what Google Cloud is</p>
                    </div>
                    <div class="px-6 py-4 flex flex-row items-center">
                        <span href="#"
                            class="py-1 text-sm font-regular text-gray-900  dark:text-white mr-1 flex flex-row justify-between items-center">
                            <svg height="13px" width="13px" class="fill-current" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                xml:space="preserve">
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
                            <img class="w-full" src="dist/img/certificate/Sertifikat_3.jpg"
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
                            class="text-dark font-semibold text-lg inline-block hover:text-primary transition duration-500 ease-in-out  dark:text-white">Programming
                            Logic (101)</a>
                        <p class="text-gray-500 text-sm">
                            Know what programming logic is
                        </p>
                    </div>
                    <div class="px-6 py-4 flex flex-row items-center">
                        <span href="#"
                            class="py-1 text-sm font-regular text-gray-900  dark:text-white mr-1 flex flex-row justify-between items-center">
                            <svg height="13px" width="13px" class="fill-current" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                xml:space="preserve">
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
                            <img class="w-full" src="dist/img/certificate/Sertifikat_5.jpg"
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
                            class="text-dark font-semibold text-lg inline-block hover:text-primary transition duration-500 ease-in-out  dark:text-white">DevCoach:
                            Flutter</a>
                        <p class="text-gray-500 text-sm">
                            Future navigation with GoRouter
                        </p>
                    </div>
                    <div class="px-6 py-4 flex flex-row items-center">
                        <span href="#"
                            class="py-1 text-sm font-regular text-gray-900  dark:text-white mr-1 flex flex-row justify-between items-center">
                            <svg height="13px" width="13px" class="fill-current" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                xml:space="preserve">
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
                            <img class="w-full" src="dist/img/certificate/Sertifikat_6.jpg"
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
                            class="text-dark font-semibold text-lg inline-block hover:text-primary transition duration-500 ease-in-out  dark:text-white">Mastering
                            SOLID Principles to Boost Engineering career</a>
                        <p class="text-gray-500 text-sm">
                            Organized by Indosat Ooredo Hutchison Digital Camp
                        </p>
                    </div>
                    <div class="px-6 py-4 flex flex-row items-center">
                        <span href="#"
                            class="py-1 text-sm font-regular text-gray-900  dark:text-white mr-1 flex flex-row justify-between items-center">
                            <svg height="13px" width="13px" class="fill-current" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                xml:space="preserve">
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
                            <img class="w-full" src="dist/img/certificate/Sertifikat_7.jpg"
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
                            class="text-dark font-semibold text-lg inline-block hover:text-primary transition duration-500 ease-in-out  dark:text-white">Cloud
                            Practitioner Essentials (Belajar Dasar AWS Cloud)</a>
                        <p class="text-gray-500 text-sm">
                            The class is aimed at beginners who want to start a career in the cloud computing field by
                            referring to AWS's international competency standards.
                        </p>
                    </div>
                    <div class="px-6 py-4 flex flex-row items-center">
                        <span href="#"
                            class="py-1 text-sm font-regular text-gray-900  dark:text-white mr-1 flex flex-row justify-between items-center">
                            <svg height="13px" width="13px" class="fill-current" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                xml:space="preserve">
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
                            <img class="w-full" src="dist/img/certificate/Sertifikat_8.jpg"
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
                            class="text-dark font-semibold text-lg inline-block hover:text-primary transition duration-500 ease-in-out  dark:text-white">Education
                            expo & science olympiad</a>
                        <p class="text-gray-500 text-sm">
                            National level olympiads organized by Education Expo in various fields.
                        </p>
                    </div>
                    <div class="px-6 py-4 flex flex-row items-center">
                        <span href="#"
                            class="py-1 text-sm font-regular text-gray-900  dark:text-white mr-1 flex flex-row justify-between items-center">
                            <svg height="13px" width="13px" class="fill-current" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                xml:space="preserve">
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
                            <img class="w-full" src="dist/img/certificate/Sertifikat_4.jpg"
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
                            class="text-dark font-semibold text-lg inline-block hover:text-primary transition duration-500 ease-in-out  dark:text-white">Digital
                            literacy seminar</a>
                        <p class="text-gray-500 text-sm pt-2">
                            with the theme digital literacy, being smart in the digital era,
                            organized by the directorate of informatics empowerment, Kominfo</p>
                    </div>
                    <div class="px-6 py-4 flex flex-row items-center">
                        <span href="#"
                            class="py-1 text-sm font-regular text-gray-900  dark:text-white mr-1 flex flex-row justify-between items-center">
                            <svg height="13px" width="13px" class="fill-current" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                xml:space="preserve">
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
                    <h2 class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl dark:text-white">Contact Me
                    </h2>
                    <p class="font-medium text-md text-secondary md:text-lg">Feel free to contact me</p>
                </div>
            </div>

            <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="w-full lg:w-2/3 lg:mx-auto">
                    <div class="w-full px-4 mb-8">
                        <label for="name" class="text-base font-bold text-primary">Name</label>
                        <input type="text" placeholder="Your name" id="name" name="name"
                            class="w-full bg-slate-200 text-dark p-3 rounded-md
            focus:outline-none focus:ring-primary focus:border-primary"
                            required />
                    </div>

                    <div class="w-full px-4 mb-8">
                        <label for="email" class="text-base font-bold text-primary">Email</label>
                        <input type="email" placeholder="Your email" id="email" name="email"
                            class="w-full bg-slate-200 text-dark p-3 rounded-md
            focus:outline-none focus:ring-primary focus:border-primary"
                            required />
                    </div>

                    <div class="w-full px-4 mb-8">
                        <label for="message" class="text-base font-bold text-primary">Messages</label>
                        <textarea id="message" placeholder="Give a messages" name="messages"
                            class="w-full bg-slate-200 text-dark p-3 rounded-md
            focus:outline-none focus:ring-primary focus:border-primary h-32"
                            required></textarea>
                    </div>

                    <!-- Bot prevention -->
                    <input type="hidden" name="_honeypot" style="display:none">
                    <input type="hidden" name="_captcha" value="false">

                    <div class="w-full px-4">
                        <button type="submit"
                            class="text-base font-semibold text-white bg-primary
            py-3 px-8 rounded-full w-full hover:opacity-80 hover:shadow-lg
            transition duration-500">Submit</button>
                    </div>
                </div>
            </form>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script>
                @if (session('success'))
                    Swal.fire({
                        title: "{{ session('success') }}",
                        icon: 'success',
                        position: 'center',
                    })
                @endif
            </script>

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
                            <a href="#home" class="inline-block text-base hover:text-primary mb-3">Home</a>
                        </li>

                        <li>
                            <a href="#about" class="inline-block text-base hover:text-primary mb-3">About</a>
                        </li>

                        <li>
                            <a href="#portofolio"
                                class="inline-block text-base hover:text-primary mb-3">Portofolio</a>
                        </li>
                        <li>
                            <a href="#skills" class="inline-block text-base hover:text-primary mb-3">Skills</a>
                        </li>

                        <li>
                            <a href="#certificate"
                                class="inline-block text-base hover:text-primary mb-3">Certificate</a>
                        </li>

                        <li>
                            <a href="#contact" class="inline-block text-base hover:text-primary mb-3">Contact</a>
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
                    <svg role="img" width="24" height="24" class="fill-current" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <title>YouTube</title>
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505
            0-9.377.505A3.017 3.017 0 0 0
            .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505
            9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24
            12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                    </svg>
                </a>


                <!-- instagram -->
                <a href="https://www.instagram.com/biscuitsam__?igsh=dDEydW10MDg4Ynk0" target="_blank"
                    class="w-12 h-12 mr-3 rounded-full flex justify-center items-center border text-slate-400 border-slate-300 hover:border-primary hover:bg-primary
       hover:text-white ">
                    <svg role="img" width="24" height="24" viewBox="0 0 24 24" class="fill-current"
                        xmlns="http://www.w3.org/2000/svg">
                        <title>Instagram</title>
                        <path
                            d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077" />
                    </svg>
                </a>

                <!-- thereads -->
                <a href="https://www.threads.net/@biscuitsam__" target="_blank"
                    class="w-12 h-12 mr-3 rounded-full flex justify-center items-center border text-slate-400 border-slate-300 hover:border-primary hover:bg-primary
     hover:text-white ">
                    <svg role="img" width="24" height="24" viewBox="0 0 24 24" class="fill-current"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <title>Threads</title>
                        <path
                            d="M12.186 24h-.007c-3.581-.024-6.334-1.205-8.184-3.509C2.35 18.44 1.5 15.586 1.472 12.01v-.017c.03-3.579.879-6.43 2.525-8.482C5.845 1.205 8.6.024 12.18 0h.014c2.746.02 5.043.725 6.826 2.098 1.677 1.29 2.858 3.13 3.509 5.467l-2.04.569c-1.104-3.96-3.898-5.984-8.304-6.015-2.91.022-5.11.936-6.54 2.717C4.307 6.504 3.616 8.914 3.589 12c.027 3.086.718 5.496 2.057 7.164 1.43 1.783 3.631 2.698 6.54 2.717 2.623-.02 4.358-.631 5.8-2.045 1.647-1.613 1.618-3.593 1.09-4.798-.31-.71-.873-1.3-1.634-1.75-.192 1.352-.622 2.446-1.284 3.272-.886 1.102-2.14 1.704-3.73 1.79-1.202.065-2.361-.218-3.259-.801-1.063-.689-1.685-1.74-1.752-2.964-.065-1.19.408-2.285 1.33-3.082.88-.76 2.119-1.207 3.583-1.291a13.853 13.853 0 0 1 3.02.142c-.126-.742-.375-1.332-.75-1.757-.513-.586-1.308-.883-2.359-.89h-.029c-.844 0-1.992.232-2.721 1.32L7.734 7.847c.98-1.454 2.568-2.256 4.478-2.256h.044c3.194.02 5.097 1.975 5.287 5.388.108.046.216.094.321.142 1.49.7 2.58 1.761 3.154 3.07.797 1.82.871 4.79-1.548 7.158-1.85 1.81-4.094 2.628-7.277 2.65Zm1.003-11.69c-.242 0-.487.007-.739.021-1.836.103-2.98.946-2.916 2.143.067 1.256 1.452 1.839 2.784 1.767 1.224-.065 2.818-.543 3.086-3.71a10.5 10.5 0 0 0-2.215-.221z" />
                    </svg>
                </a>

                <!-- tiktok -->
                <a href="https://www.tiktok.com/@abisamhazim?_t=8pbryCVPN28&_r=1" target="_blank"
                    class="w-12 h-12 mr-3 rounded-full flex justify-center items-center border text-slate-400 border-slate-300 hover:border-primary hover:bg-primary
     hover:text-white ">
                    <svg role="img" width="24" height="24" viewBox="0 0 24 24" class="fill-current"
                        xmlns="http://www.w3.org/2000/svg">
                        <title>TikTok</title>
                        <path
                            d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                    </svg> </a>

            </div>
            <p class="font-medium text-xs text-slate-500 text-center">Made with 💖, by <a href="https://instagram.com"
                    target="_blank
        " class="font-bold text-primary">
                    Abisam Hazim</a>, with using <a href="https://tailwindcss.com" target="_blank"
                    class="font-bold text-sky-500">Tailwind CSS</a></p>
        </div>
    </footer>
    <!-- footer end -->

    <!-- back to top start -->
    <a href="#home" id="to-top"
        class="fixed justify-center items-center z-50 bottom-4 right-4 p-4 h-14 w-14 max-h-full max-w-full bg-primary rounded-full hover:animate-pulse hidden overflow-hidden">
        <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
        <svg width="100px" height="100px" class="z-[9999]" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M17 15L12 10L7 15" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
    </a>
    <!-- back to top end -->

    <script src="dist/js/script.js"></script>
</body>

</html>
