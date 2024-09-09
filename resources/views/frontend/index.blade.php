@extends('layouts.frontend')

@section('content')
    <div class="main-banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-banner">
                        <div class="item item-1">
                            <div class="header-text">
                                <span class="category">Our Courses</span>
                                <h2>With Scholar Teachers, Everything Is Easier</h2>
                                <p>Scholar is free CSS template designed by TemplateMo for online educational related
                                    websites. This layout is based on the famous Bootstrap v5.3.0 framework.</p>
                                <div class="buttons">
                                    <div class="main-button">
                                        <a href="#">Request Demo</a>
                                    </div>
                                    <div class="icon-button">
                                        <a href="#"><i class="fa fa-play"></i> What's Scholar?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item item-2">
                            <div class="header-text">
                                <span class="category">Best Result</span>
                                <h2>Get the best result out of your effort</h2>
                                <p>You are allowed to use this template for any educational or commercial purpose. You are
                                    not allowed to re-distribute the template ZIP file on any other website.</p>
                                <div class="buttons">
                                    <div class="main-button">
                                        <a href="#">Request Demo</a>
                                    </div>
                                    <div class="icon-button">
                                        <a href="#"><i class="fa fa-play"></i> What's the best result?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item item-3">
                            <div class="header-text">
                                <span class="category">Online Learning</span>
                                <h2>Online Learning helps you save the time</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temporious
                                    incididunt ut labore et dolore magna aliqua suspendisse.</p>
                                <div class="buttons">
                                    <div class="main-button">
                                        <a href="#">Request Demo</a>
                                    </div>
                                    <div class="icon-button">
                                        <a href="#"><i class="fa fa-play"></i> What's Online Course?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="services section" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="service-item">
                        <div class="icon">
                            <img src="{{ asset('front/assets/images/service-01.png') }}" alt="online degrees">
                        </div>
                        <div class="main-content">
                            <h4>Online Degrees</h4>
                            <p>Whenever you need free templates in HTML CSS, you just remember TemplateMo website.</p>
                            <div class="main-button">
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item">
                        <div class="icon">
                            <img src="{{ asset('front/assets/images/service-02.png') }}" alt="short courses">
                        </div>
                        <div class="main-content">
                            <h4>Short Courses</h4>
                            <p>You can browse free templates based on different tags such as digital marketing, etc.</p>
                            <div class="main-button">
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item">
                        <div class="icon">
                            <img src="{{ asset('front/assets/images/service-03.png') }}" alt="web experts">
                        </div>
                        <div class="main-content">
                            <h4>Web Experts</h4>
                            <p>You can start learning HTML CSS by modifying free templates from our website too.</p>
                            <div class="main-button">
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section about-us" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-1">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Where shall we begin?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod
                                    tempor incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices
                                    gravida.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How do we work together?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod
                                    tempor incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices
                                    gravida.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Why SCHOLAR is the best?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    There are more than one hundred responsive HTML templates to choose from
                                    <strong>Template</strong>Mo website. You can browse by different tags or categories.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Do we get the best support?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    You can also search on Google with specific keywords such as <code>templatemo business
                                        templates, templatemo gallery templates, admin dashboard templatemo, 3-column
                                        templatemo, etc.</code>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 align-self-center">
                    <div class="section-heading">
                        <h6>About Us</h6>
                        <h2>What make us the best academy online?</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravid risus commodo.</p>
                        <div class="main-button">
                            <a href="#">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section courses" id="buku">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <h2>Daftar Buku</h2>
                    </div>
                </div>
            </div>
            <ul class="event_filter">
                <li>
                    <a class="is_active" data-filter="*">Show All</a>
                </li>
                @foreach ($kategori as $item)
                    <li>
                        <a data-filter=".{{ $item->nama_kategori }}">{{ $item->nama_kategori }}</a>
                    </li>
                @endforeach
            </ul>
            <div class="row event_box">
                @foreach ($buku as $item)
                    <div
                        class="col-lg-4 col-md-6 align-self-center mb-30 event_outer {{ $item->Kategori->nama_kategori }}">
                        <div class="events_item">
                            <div class="thumb"
                                style="width: 100%; padding-top: 110%; position: relative; overflow: hidden;">
                                <a href="{{ url('buku', $item->id) }}">
                                    <img src="{{ asset('images/buku/' . $item->image_buku) }}" alt=""
                                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
                                </a>
                                <span class="category">{{ $item->Kategori->nama_kategori }}</span>
                            </div>
                            <div class="down-content">
                                <h4>{{ $item->judul }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <div class="section fun-facts" id="testimoni">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="counter">
                                    <h2 class="timer count-title count-number" data-to="{{ \App\Models\User::count() }}"
                                        data-speed="1000"></h2>
                                    <p class="count-text ">Pengguna</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="counter">
                                    <h2 class="timer count-title count-number" data-to="{{ \App\Models\Buku::count() }}"
                                        data-speed="1000"></h2>
                                    <p class="count-text ">Judul</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="counter">
                                    <h2 class="timer count-title count-number"
                                        data-to="{{ \App\Models\Kategori::count() }}" data-speed="1000"></h2>
                                    <p class="count-text ">Jumlah Buku</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="counter end">
                                    <h2 class="timer count-title count-number"
                                        data-to="{{ \App\Models\Kategori::count() }}" data-speed="1000"></h2>
                                    <p class="count-text ">Kategori</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section testimonials">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="owl-carousel owl-testimonials">
                        <div class="item">
                            <p>“Please tell your friends or collegues about TemplateMo website. Anyone can access the
                                website to download free templates. Thank you for visiting.”</p>
                            <div class="author">
                                <img src="{{ asset('front/assets/images/testimonial-author.jpg') }}" alt="">
                                <span class="category">Full Stack Master</span>
                                <h4>Claude David</h4>
                            </div>
                        </div>
                        <div class="item">
                            <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravid.”</p>
                            <div class="author">
                                <img src="{{ asset('front/assets/images/testimonial-author.jpg') }}" alt="">
                                <span class="category">UI Expert</span>
                                <h4>Thomas Jefferson</h4>
                            </div>
                        </div>
                        <div class="item">
                            <p>“Scholar is free website template provided by TemplateMo for educational related websites.
                                This CSS layout is based on Bootstrap v5.3.0 framework.”</p>
                            <div class="author">
                                <img src="{{ asset('front/assets/images/testimonial-author.jpg') }}" alt="">
                                <span class="category">Digital Animator</span>
                                <h4>Stella Blair</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 align-self-center">
                    <div class="section-heading">
                        <h6>TESTIMONIALS</h6>
                        <h2>What they say about us?</h2>
                        <p>You can search free CSS templates on Google using different keywords such as templatemo
                            portfolio, templatemo gallery, templatemo blue color, etc.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-us section" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6  align-self-center">
                    <div class="section-heading">
                        <h6>Contact Us</h6>
                        <h2>Feel free to contact us anytime</h2>
                        <p>Thank you for choosing our templates. We provide you best CSS templates at absolutely 100% free
                            of charge. You may support us by sharing our website to your friends.</p>
                        <div class="special-offer">
                            <span class="offer">off<br><em>50%</em></span>
                            <h6>Valide: <em>24 April 2036</em></h6>
                            <h4>Special Offer <em>50%</em> OFF!</h4>
                            <a href="#"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-us-content">
                        <form id="contact-form" action="" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input type="name" name="name" id="name" placeholder="Your Name..."
                                            autocomplete="on" required>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                            placeholder="Your E-mail..." required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" id="message" placeholder="Your Message"></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="orange-button">Send Message
                                            Now</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    // Initialize Isotope
    var $grid = $('.event_box').isotope({
        itemSelector: '.event_outer',
        layoutMode: 'fitRows'
    });

    // Filter items on click
    $('.event_filter a').click(function() {
        $('.event_filter a').removeClass('is_active');
        $(this).addClass('is_active');

        var filterValue = $(this).attr('data-filter');
        $grid.isotope({
            filter: filterValue
        });

        return false;
    });
</script>
