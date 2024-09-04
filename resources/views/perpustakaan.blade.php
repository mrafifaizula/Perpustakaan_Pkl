@extends('layouts.front')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>

.container_main {
    position: relative;
    width: 100%;
    height: 300px; /* Set a fixed height */
    overflow: hidden;
}

.image {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures the image covers the area while maintaining aspect ratio */
}

.overlay {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100%;
    width: 100%;
    opacity: 0;
    transition: .5s ease;
    background-color: rgba(0, 0, 0, 0.5); /* Dark overlay with transparency */
}

.container_main:hover .overlay {
    opacity: 1;
}

.text {
    color: white;
    font-size: 16px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
        padding: 20px;
    }

    .feature-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: #fff;
        border-radius: 10px;
        padding: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .feature-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .feature-item img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
    }

    .feature-title {
        margin-top: 10px;
        font-size: 1.2em;
        text-align: center;
        font-weight: bold;
        color: #333;
    }
</style>
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
                                    <p class="consectetur_text">ThereThere are many variations of passages of Lorem Ipsum
                                        available</p>
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
                                    <p class="consectetur_text">ThereThere are many variations of passages of Lorem Ipsum
                                        available</p>
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
                                    <p class="consectetur_text">ThereThere are many variations of passages of Lorem Ipsum
                                        available</p>
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
                    <p class="about_text">There are many variations of passages of Lorem Ipsum available, but the majority
                        have suffered alteration in some form, by injected humourThere are many variations of passages of
                        Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour
                    </p>
                    <div class="read_bt_1"><a href="#">Read More</a></div>
                </div>
                <div class="col-md-6">
                    <div class="about_img"><img src="{{ asset('front/images/about.png') }}" class="about_img"></div>
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
                            <div class="services_icon"><img src="{{ asset('front/images/icon-1.png') }}"></div>
                            <h3 class="retina_text">Retina Ready</h3>
                            <p class="services_text">many variations of passages of Lorem Ipsum available,</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="services_box">
                            <div class="services_icon"><img src="{{ asset('front/images/icon-2.png') }}"></div>
                            <h3 class="retina_text">Creative Elements</h3>
                            <p class="services_text">many variations of passages of Lorem Ipsum available,</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="services_box">
                            <div class="services_icon"><img src="{{ asset('front/images/icon-3.png') }}"></div>
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
                            <div class="services_icon"><img src="{{ asset('front/images/icon-4.png') }}"></div>
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
                    <p class="gallery_text">Here are many variations of passages of Lorem Ipsum available, but the majority
                        have suffer</p>
                </div>
            </div>
            <div class="gallery_section">
                <div class="gallery_section_2">
                    <div class="row">
                        @foreach ($buku as $item)
                        <div class="col-md-4">
                           <div class="container_main">
                               <a href=""> <!-- Add a link to the image -->
                                   <img src="{{ asset('images/buku/' . $item->image_buku) }}" alt="Avatar" class="image img-responsive">
                               </a>
                               <div class="overlay">
                                   <div class="text">
                                       <h4 class="interior_text">{{ $item->judul }}</h4>
                                       <p class="ipsum_text">of passages of Lorem Ipsum available, but the majority
                                           have
                                           suffer</p>
                                   </div>
                               </div>
                           </div>
                       </div>                       
                        @endforeach
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
                                <p class="blog_text">There are many variations of passages of Lorem Ipsum available, but
                                    theThere are many variations of passages of Lorem Ipsum available, but the</p>
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
                                <p class="blog_text">There are many variations of passages of Lorem Ipsum available, but
                                    theThere are many variations of passages of Lorem Ipsum available, but the</p>
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
                                <p class="blog_text">There are many variations of passages of Lorem Ipsum available, but
                                    theThere are many variations of passages of Lorem Ipsum available, but the</p>
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
                    <div class="container">
                        <div class="features-grid">
                            @foreach ($buku as $item)
                                <a href="{{ route('buku.show', $item->id) }}" class="feature-item">
                                    <!-- Mengubah div menjadi a -->
                                    <img src="{{ asset('images/buku/' . $item->image_buku) }}" alt="{{ $item->title }}">
                                    <div class="feature-title">{{ $item->judul }}</div>
                                </a>
                            @endforeach
                        </div>
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
                                        <div class="client_img"><img src="{{ asset('front/images/client-img.png') }}">
                                        </div>
                                        <h4 class="customer_text">HumouThere</h4>
                                        <p class="lorem_text">T suffered alteration in some form, by injected humouThere
                                            are many variations of passages of Lorem Ipsum available, but the majority have
                                            suffered alteration in some form, by injected humou</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="testimonial_box">
                                        <div class="client_img"><img src="{{ asset('front/images/client-img1.png') }}">
                                        </div>
                                        <h4 class="customer_text">HumouThere</h4>
                                        <p class="lorem_text">T suffered alteration in some form, by injected humouThere
                                            are many variations of passages of Lorem Ipsum available, but the majority have
                                            suffered alteration in some form, by injected humou</p>
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
                                        <div class="client_img"><img src="{{ asset('front/images/client-img.png') }}">
                                        </div>
                                        <h4 class="customer_text">HumouThere</h4>
                                        <p class="lorem_text">T suffered alteration in some form, by injected humouThere
                                            are many variations of passages of Lorem Ipsum available, but the majority have
                                            suffered alteration in some form, by injected humou</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="testimonial_box">
                                        <div class="client_img"><img src="{{ asset('front/images/client-img1.png') }}">
                                        </div>
                                        <h4 class="customer_text">HumouThere</h4>
                                        <p class="lorem_text">T suffered alteration in some form, by injected humouThere
                                            are many variations of passages of Lorem Ipsum available, but the majority have
                                            suffered alteration in some form, by injected humou</p>
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
                                        <div class="client_img"><img src="{{ asset('front/images/client-img.png') }}">
                                        </div>
                                        <h4 class="customer_text">HumouThere</h4>
                                        <p class="lorem_text">T suffered alteration in some form, by injected humouThere
                                            are many variations of passages of Lorem Ipsum available, but the majority have
                                            suffered alteration in some form, by injected humou</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="testimonial_box">
                                        <div class="client_img"><img src="{{ asset('front/images/client-img1.png') }}">
                                        </div>
                                        <h4 class="customer_text">HumouThere</h4>
                                        <p class="lorem_text">T suffered alteration in some form, by injected humouThere
                                            are many variations of passages of Lorem Ipsum available, but the majority have
                                            suffered alteration in some form, by injected humou</p>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
