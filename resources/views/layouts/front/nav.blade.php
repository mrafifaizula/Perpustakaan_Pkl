<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
       <div class="logo" ><a href="index.html"><img style="height: 80px;" src="{{asset('front/images/assalaam.png')}}"></a></div>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
             <li class="nav-item active">
                <a class="nav-link" href="index.html">Home</a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="blog.html">Blog</a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="gallery.html">Gallery</a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact</a>
             </li>
             <li class="nav-item">
                <li><a class="nav-link" href="{{url('/keranjang')}}"><i class="bi bi-cart"></i></a></li>
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
             </li>
          </ul>
       </div>
    </nav>
 </div>