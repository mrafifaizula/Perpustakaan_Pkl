@extends('layouts.front')

@section('content')
     <!-- banner section start -->
     <div class="banner_section layout_padding">
        <div class="container">
           <div id="main_slider" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                 <div class="carousel-item active">
                    <div class="row">
                       <div class="col-sm-12">
                          <div class="banner_taital_main">
                             <h1 class="banner_taital">Architectural</h1>
                             <h1 class="banner_taital_1">INTERIOR DESIGN</h1>
                             <p class="consectetur_text">ThereThere are many variations of passages of Lorem Ipsum available</p>
                             <div class="readmore_bt"><a href="contact.html">Read More</a></div>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="carousel-item">
                    <div class="row">
                       <div class="col-sm-12">
                          <div class="banner_taital_main">
                             <h1 class="banner_taital">Architectural</h1>
                             <h1 class="banner_taital_1">INTERIOR DESIGN</h1>
                             <p class="consectetur_text">ThereThere are many variations of passages of Lorem Ipsum available</p>
                             <div class="readmore_bt"><a href="contact.html">Read More</a></div>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="carousel-item">
                    <div class="row">
                       <div class="col-sm-12">
                          <div class="banner_taital_main">
                             <h1 class="banner_taital">Architectural</h1>
                             <h1 class="banner_taital_1">INTERIOR DESIGN</h1>
                             <p class="consectetur_text">ThereThere are many variations of passages of Lorem Ipsum available</p>
                             <div class="readmore_bt"><a href="contact.html">Read More</a></div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
              <i class="fa fa-angle-left"></i>
              </a>
              <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
              <i class="fa fa-angle-right"></i>
              </a>
           </div>
        </div>
     </div>
     <!-- banner section end -->
  </div>
  <!-- header section end -->
  <!-- about sectuion start -->
  <div class="about_section layout_padding">
     <div class="container">
        <div class="row">
           <div class="col-md-6">
              <h1 class="about_taital">About <span style="color: #fcbf2d;">Us</span></h1>
              <p class="about_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humourThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p>
              <div class="read_bt_1"><a href="#">Read More</a></div>
           </div>
           <div class="col-md-6">
              <div class="about_img"><img src="{{asset('front/images/about.png')}}" class="about_img"></div>
           </div>
        </div>
     </div>
  </div>
  <!-- about sectuion end -->
  <!-- services section start -->
  <div class="services_section layout_padding">
     <div class="container">
        <div class="row">
           <div class="col-md-12">
              <h1 class="services_taital">Our <span style="color: #fcbf2d;">Services</span></h1>
           </div>
        </div>
        <div class="services_section_2">
           <div class="row">
              <div class="col-sm-4">
                 <div class="services_box active">
                    <div class="services_icon"><img src="{{asset('front/images/icon-1.png')}}"></div>
                    <h3 class="retina_text">Retina Ready</h3>
                    <p class="services_text">many variations of passages of Lorem Ipsum available,</p>
                 </div>
              </div>
              <div class="col-sm-4">
                 <div class="services_box">
                    <div class="services_icon"><img src="{{asset('front/images/icon-2.png')}}"></div>
                    <h3 class="retina_text">Creative Elements</h3>
                    <p class="services_text">many variations of passages of Lorem Ipsum available,</p>
                 </div>
              </div>
              <div class="col-sm-4">
                 <div class="services_box">
                    <div class="services_icon"><img src="{{asset('front/images/icon-3.png')}}"></div>
                    <h3 class="retina_text">Easy-to-Use</h3>
                    <p class="services_text">many variations of passages of Lorem Ipsum available,</p>
                 </div>
              </div>
           </div>
        </div>
        <div class="services_section_2">
           <div class="row">
              <div class="col-md-4">
              </div>
              <div class="col-md-4">
                 <div class="services_box">
                    <div class="services_icon"><img src="{{asset('front/images/icon-4.png')}}"></div>
                    <h3 class="retina_text">Easy Import</h3>
                    <p class="services_text">many variations of passages of Lorem Ipsum available,</p>
                 </div>
              </div>
              <div class="col-md-4">
              </div>
           </div>
        </div>
     </div>
  </div>
  <!-- services section end -->
  <!-- gallery section start -->
  <div class="gallery_section layout_padding">
     <div class="container">
        <div class="row">
           <div class="col-sm-12">
              <h1 class="gallery_taital">Our <span style="color: #fcbf2d;">Gallery</span></h1>
              <p class="gallery_text">Here are many variations of passages of Lorem Ipsum available, but the majority have suffer</p>
           </div>
        </div>
        <div class="gallery_section">
           <div class="gallery_section_2">
              <div class="row">
                 <div class="col-md-4">
                    <div class="container_main">
                       <img src="{{asset('front/images/img-5.png')}}" alt="Avatar" class="image">
                       <div class="overlay">
                          <div class="text">
                             <h4 class="interior_text">HOME DESIGN</h4>
                             <p class="ipsum_text">of passages of Lorem Ipsum available, but the majority have suffer</p>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="container_main">
                       <img src="{{asset('front/images/img-2.png')}}" alt="Avatar" class="image">
                       <div class="overlay">
                          <div class="text">
                             <h4 class="interior_text">HOME DESIGN</h4>
                             <p class="ipsum_text">of passages of Lorem Ipsum available, but the majority have suffer</p>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="container_main">
                       <img src="{{asset('front/images/img-3.png')}}" alt="Avatar" class="image">
                       <div class="overlay">
                          <div class="text">
                             <h4 class="interior_text">HOME DESIGN</h4>
                             <p class="ipsum_text">of passages of Lorem Ipsum available, but the majority have suffer</p>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <div class="gallery_section_2">
              <div class="row">
                 <div class="col-md-4">
                    <div class="container_main">
                       <img src="{{asset('front/images/img-4.png')}}" alt="Avatar" class="image">
                       <div class="overlay">
                          <div class="text">
                             <h4 class="interior_text">Interior Design</h4>
                             <p class="ipsum_text">of passages of Lorem Ipsum available, but the majority have suffer</p>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="container_main">
                       <img src="{{asset('front/images/img-5.png')}}" alt="Avatar" class="image">
                       <div class="overlay">
                          <div class="text">
                             <h4 class="interior_text">Interior Design</h4>
                             <p class="ipsum_text">of passages of Lorem Ipsum available, but the majority have suffer</p>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="container_main">
                       <img src="{{asset('front/images/img-6.png')}}" alt="Avatar" class="image">
                       <div class="overlay">
                          <div class="text">
                             <h4 class="interior_text">Interior Design</h4>
                             <p class="ipsum_text">of passages of Lorem Ipsum available, but the majority have suffer</p>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <div class="seemore_bt"><a href="#">See More</a></div>
     </div>
  </div>
  <!-- gallery section end -->
  <!-- blog section start -->
  <div class="blog_section layout_padding">
     <div class="container">
        <div id="custom_slider" class="carousel slide" data-ride="carousel">
           <div class="carousel-inner">
              <div class="carousel-item active">
                 <div class="row">
                    <div class="col-md-4">
                       <h1 class="blog_taital">New Ideas <span style="color: #fcbf2d;">Design</span></h1>
                       <p class="blog_text">There are many variations of passages of Lorem Ipsum available, but theThere are many variations of passages of Lorem Ipsum available, but the</p>
                    </div>
                    <div class="col-md-8">
                       <div class="blog_img">
                          <h6 class="dummy_text">There are many variations of passages of Lorem</h6>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="carousel-item">
                 <div class="row">
                    <div class="col-md-4">
                       <h1 class="blog_taital">New Ideas <span style="color: #fcbf2d;">Design</span></h1>
                       <p class="blog_text">There are many variations of passages of Lorem Ipsum available, but theThere are many variations of passages of Lorem Ipsum available, but the</p>
                    </div>
                    <div class="col-md-8">
                       <div class="blog_img">
                          <h6 class="dummy_text">There are many variations of passages of Lorem</h6>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="carousel-item">
                 <div class="row">
                    <div class="col-md-4">
                       <h1 class="blog_taital">New Ideas <span style="color: #fcbf2d;">Design</span></h1>
                       <p class="blog_text">There are many variations of passages of Lorem Ipsum available, but theThere are many variations of passages of Lorem Ipsum available, but the</p>
                    </div>
                    <div class="col-md-8">
                       <div class="blog_img">
                          <h6 class="dummy_text">There are many variations of passages of Lorem</h6>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <a class="carousel-control-prev" href="#custom_slider" role="button" data-slide="prev">
           <i class="fa fa-angle-left"></i>
           </a>
           <a class="carousel-control-next" href="#custom_slider" role="button" data-slide="next">
           <i class="fa fa-angle-right"></i>
           </a>
        </div>
     </div>
  </div>
  <!-- blog section end -->
  <!-- news section start -->
  <div class="news_section layout_padding">
     <div class="container">
        <div class="row">
           <div class="col-md-12">
              <h1 class="news_taital">Read Our <span style="color: #fcbf2d;">Latest News</span></h1>
           </div>
        </div>
        <div class="news_section_2">
           <div class="row">
              <div class="col-md-6">
                @foreach ($buku as $item)
                <div class="news_box active">
                    <div class="news_img"><img src="{{ asset('images/buku/'.$item->image_buku) }}" style="height: 300px;width: 500px"></div>
                    <h6 class="post_text active">Judul : {{$item->judul}}</h6>
                    <div class="news_taital_main active">
                       <div class="like_text active">Kategori <span class="padding_15">{{$item->Kategori->nama_kategori}}</span></div>
                       <div class="like_text active">Penulis <span class="padding_15">{{$item->Penulis->nama_penulis}}</span></div>
                       <div class="like_text active">Penerbit <span class="padding_15">{{$item->Penerbit->nama_penerbit}}</span></div>
                    </div>
                    <h3 class="artictecture_text active">Deskripsi</h3>
                    <p class="long_text active">It is a long established fact that a reader will be distracted by the readable content </p>
                 </div>
                @endforeach
              </div>
           </div>
        </div>
     </div>
  </div>
  <!-- news section end -->
  <!-- testimonial section start -->
  <div class="testimonial_section layout_padding">
     <div class="container">
        <div id="my_slider" class="carousel slide" data-ride="carousel">
           <div class="carousel-inner">
              <div class="carousel-item active">
                 <div class="row">
                    <div class="col-sm-12">
                       <h1 class="testimonial_taital">Testimonial</h1>
                    </div>
                 </div>
                 <div class="testimonial_section_2">
                    <div class="row">
                       <div class="col-md-6">
                          <div class="testimonial_box">
                             <div class="client_img"><img src="{{asset('front/images/client-img.png')}}"></div>
                             <h4 class="customer_text">HumouThere</h4>
                             <p class="lorem_text">T suffered alteration in some form, by injected humouThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou</p>
                          </div>
                       </div>
                       <div class="col-md-6">
                          <div class="testimonial_box">
                             <div class="client_img"><img src="{{asset('front/images/client-img1.png')}}"></div>
                             <h4 class="customer_text">HumouThere</h4>
                             <p class="lorem_text">T suffered alteration in some form, by injected humouThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou</p>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="carousel-item">
                 <div class="row">
                    <div class="col-sm-12">
                       <h1 class="testimonial_taital">Testimonial</h1>
                    </div>
                 </div>
                 <div class="testimonial_section_2">
                    <div class="row">
                       <div class="col-md-6">
                          <div class="testimonial_box">
                             <div class="client_img"><img src="{{asset('front/images/client-img.png')}}"></div>
                             <h4 class="customer_text">HumouThere</h4>
                             <p class="lorem_text">T suffered alteration in some form, by injected humouThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou</p>
                          </div>
                       </div>
                       <div class="col-md-6">
                          <div class="testimonial_box">
                             <div class="client_img"><img src="{{asset('front/images/client-img1.png')}}"></div>
                             <h4 class="customer_text">HumouThere</h4>
                             <p class="lorem_text">T suffered alteration in some form, by injected humouThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou</p>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="carousel-item">
                 <div class="row">
                    <div class="col-sm-12">
                       <h1 class="testimonial_taital">Testimonial</h1>
                    </div>
                 </div>
                 <div class="testimonial_section_2">
                    <div class="row">
                       <div class="col-md-6">
                          <div class="testimonial_box">
                             <div class="client_img"><img src="{{asset('front/images/client-img.png')}}"></div>
                             <h4 class="customer_text">HumouThere</h4>
                             <p class="lorem_text">T suffered alteration in some form, by injected humouThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou</p>
                          </div>
                       </div>
                       <div class="col-md-6">
                          <div class="testimonial_box">
                             <div class="client_img"><img src="{{asset('front/images/client-img1.png')}}"></div>
                             <h4 class="customer_text">HumouThere</h4>
                             <p class="lorem_text">T suffered alteration in some form, by injected humouThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou</p>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
           <i class="fa fa-angle-left"></i>
           </a>
           <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
           <i class="fa fa-angle-right"></i>
           </a>
        </div>
     </div>
  </div>
  <!-- testimonial section end -->
@endsection