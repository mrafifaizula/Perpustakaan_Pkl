<header id="header" class="header sticky-top">
   <div class="branding d-flex align-items-cente">

     <div class="container position-relative d-flex align-items-center justify-content-between">
       <a href="index.html" class="logo d-flex align-items-center">
         <!-- Uncomment the line below if you also wish to use an image logo -->
         <!-- <img src="{{asset('front/assets/img/assalaam.png')}}" alt=""> -->
         <h1 class="sitename">PERPUSTAKAAN</h1>
       </a>

       <nav id="navmenu" class="navmenu">
         <ul>
           <li><a href="#hero" class="active">Home</a></li>
           <li><a href="#about">About</a></li>
           <li><a href="#services">Services</a></li>
           <li><a href="#portfolio">Portfolio</a></li>
           <li><a href="#team">Team</a></li>
           <li><a href="#contact">Contact</a></li>
           <li>
            @guest
        <li>
            <a class="nav-link" href="{{url('login')}}">Login</a>
        </li>
        <li>
            <a class="nav-link" href="{{url('register')}}">Register</a>
        </li>
        @else
        <a class="nav-link" href="{{route('logout')}}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        @endguest
        </li>
         </ul>
         <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
       </nav>

     </div>

   </div>

 </header>