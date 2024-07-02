<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    @include('components.style')
    <title>SalonSEA</title>
</head>

<style>
    .card-img {
        outline: none !important;
        box-shadow: none !important;
    }

    .card-img:focus,
    .card-img:hover {
        outline: none !important;
        box-shadow: none !important;
    }

    .rating {
        direction: rtl;
        font-size: 2rem;
    }

    .rating input {
        display: none;
    }

    .rating label {
        color: #ddd;
        float: right;
    }

    .rating input:checked~label,
    .rating input:hover~label,
    .rating label:hover~label {
        color: #ffc107;
    }

    .scrolling-wrapper {
        overflow-x: auto;
        white-space: nowrap;
    }

    .scrolling-wrapper .card {
        display: inline-block;
        margin-right: 15px;
        border-radius: 50px;
        min-width: 300px;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .scrolling-wrapper .card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .checked {
        color: orange;
    }
</style>

<body>
    <section id="header">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('asset/LOGO.png') }}" style="width: 200px" class="img-fluid mt-4"
                        alt="Logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar"
                    aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 font-barlow fs-5">
                        <li class="nav-item hvr-underline-from-center">
                            <a class="nav-link active text-white" aria-current="page"
                                href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item hvr-underline-from-center">
                            <a class="nav-link text-white" href="{{ route('indexservice') }}">Service</a>
                        </li>
                        <li class="nav-item hvr-underline-from-center">
                            <a class="nav-link text-white" href="{{ route('indexbranch') }}">Branch</a>
                        </li>
                        <li class="nav-item hvr-underline-from-center">
                            <a class="nav-link text-white" href="{{ route('dashboard') }}"><i
                                    class="fa fa-database"></i></a>
                        </li>


                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" style="color: white;" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user-circle" style="color: white; font-size: 1.5rem;"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#"
                                            role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end navbar -->


        <!-- Sidebar -->
        <div class="collapse" id="sidebar">
            <div class="bg-dark p-4">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 font-barlow fs-5">
                    <li class="nav-item hvr-underline-from-center">
                        <a class="nav-link active text-white" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item hvr-underline-from-center">
                        <a class="nav-link text-white" href="{{ route('indexservice') }}">Service</a>
                    </li>
                    <li class="nav-item hvr-underline-from-center">
                        <a class="nav-link text-white" href="{{ route('indexbranch') }}">Branch</a>
                    </li>
                    <li class="nav-item hvr-underline-from-center">
                        <a class="nav-link text-white" href="{{ route('dashboard') }}"></i>Dashboard</a>
                    </li>
                    <!-- Login & Logut Button -->
                    <li class="nav-item">
                        <a class="btn btn-primary ms-3 rounded-pill">{{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-item text-white" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end sidebar -->

        <!-- header -->
        <div class="background container-fluid position-relative d-flex align-items-center justify-content-center"
            style="
          background-image: linear-gradient(
              rgba(0, 0, 0, 0.4),
              rgba(0, 0, 0, 1)
            ),
            url('https://images.unsplash.com/photo-1602982903808-29f783644d21?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        ">
            <div class="text-white text-center">
                <img src="{{ asset('asset/TEXT.png') }}" class="img-fluid"
                    style="width: 1000px; font-family: 'Raleway', sans-serif" data-aos="fade-up"
                    data-aos-duration="1000" data-aos-delay="400" alt="Salon SEA" />
                <h4 class="font-barlow mt-5" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    Our commitment is to establish new standards of professionalism,
                    expertise, and creativity in the salon industry.
                </h4>
                <h4 class="font-barlow" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    Our team of skilled stylists is dedicated to staying ahead with
                    cutting-edge trends, techniques, and premium products, ensuring our
                    clients always receive exceptional service and stunning results.
                </h4>
                <a href="{{ route('reservation') }}" class="btn text-white border-white mt-3 hvr-bounce-to-right font-barlow"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">Reservation Now</a>
            </div>
        </div>
        <!-- end header -->
    </section>

    <!-- Service Section -->
    <section id="services" class="py-5 background-dark">
        <div class="container">
            <div id="serviceCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active mt-4">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="carousel-text p-4 text-white font-barlow">
                                    <h1 class="font-barlow">Haircut And Styling</h1>
                                    <p>
                                        Enjoy our best haircuts for a fresh and modern look. Find
                                        a hairstyle that suits your personality. Make an
                                        appointment immediately and feel the difference!
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="https://images.unsplash.com/photo-1599351431408-433ef72fe40b?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    class="d-block w-100 rounded-3" alt="Service 1" />
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item mt-4">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="carousel-text p-4 text-white font-barlow">
                                    <h3 class="font-barlow">Manicure and Pedicure</h3>
                                    <p>
                                        Enjoy our best manicure and pedicure services for a fresh and modern look. Find
                                        a nail style that suits your personality. Make an appointment now and feel the
                                        difference!
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="https://images.unsplash.com/photo-1519415510236-718bdfcd89c8?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    class="d-block w-100 rounded-3" alt="Service 1" />
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item mt-4">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="carousel-text p-4 text-white font-barlow">
                                    <h3 class="font-barlow">Facial Treatments</h3>
                                    <p>
                                        Enjoy our best facial treatments for fresh and radiant skin. Find a treatment
                                        that suits your skin's needs. Make an appointment now and feel the difference!
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    class="d-block w-100 rounded-3" alt="Service 1" />
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#serviceCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#serviceCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"></span>
                </button>
            </div>
        </div>
    </section>
    <!-- end service section -->

    <!-- Gallery Section -->
    <section id="gallery" class="py-y mb-5 mt-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="font-barlow">Our Gallery</h2>
                <p class="font-barlow">Take a look at some of our recent work and the ambiance of our salon.</p>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="250">
                    <div class="card bg-dark text-white h-100">
                        <img src="https://images.unsplash.com/photo-1593702295094-aea22597af65?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="card-img" alt="Gallery Image 1">
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                            <h5 class="card-title">Haircut</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="250">
                    <div class="card bg-dark text-white h-100">
                        <img src="https://plus.unsplash.com/premium_photo-1661684840761-64f23dd8615d?q=80&w=2076&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="card-img" alt="Gallery Image 2">
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                            <h5 class="card-title">Hair Coloring</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="250">
                    <div class="card bg-dark text-white h-100">
                        <img src="https://images.unsplash.com/photo-1519415510236-718bdfcd89c8?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="card-img" alt="Gallery Image 3">
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                            <h5 class="card-title">Manicure and Pedicure</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">
                    <div class="card bg-dark text-white h-100">
                        <img src="https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="card-img" alt="Gallery Image 4">
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                            <h5 class="card-title">Facial Treatments</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">
                    <div class="card bg-dark text-white h-100">
                        <img src="https://images.unsplash.com/photo-1595944024804-733665a112db?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="card-img" alt="Gallery Image 5">
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                            <h5 class="card-title">Salon Ambiance</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">
                    <div class="card bg-dark text-white h-100">
                        <img src="https://d1ooscleda9ip9.cloudfront.net/Upload/669/Documents/City%20Retreat.jpg"
                            class="card-img" alt="Gallery Image 6">
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                            <h5 class="card-title">Our Team</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of gallery section -->

    <!-- rating -->
    <section class="container-fluid py-5 main-color">
        <div class="container">
            <h2 class="text-center text-dark font-barlow mb-5">What do customers say???</h2>

            <div class="row" data-masonry='{"percentPosition": true }'>
                @foreach ($ratings as $rating)
                    <div class="col-lg-4 mb-3">
                        <div class="card p-3">
                            <figure>
                                <blockquote class="blockquote">
                                    <figcaption class="blockquote-footer">
                                        {{ $rating->name }}
                                    </figcaption>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="fa fa-star {{ $i <= $rating->rating ? 'checked' : '' }}"></span>
                                    @endfor
                                </blockquote>

                                <p>{{ $rating->comment }}</p>
                            </figure>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- end of rating -->

    <!-- about-us -->
    <section id="about-us" class="py-5 background-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="250">
                    <h2 class="mb-4">About Us</h2>
                    <p class="mb-4">
                        At Salon SEA, we are passionate about delivering exceptional
                        beauty services tailored to enhance your unique style and
                        personality. With years of experience in the industry, our team of
                        skilled professionals is committed to providing you with top-notch
                        hair, makeup, and nail care solutions.
                    </p>
                    <p class="mb-4">
                        Our mission is to create a welcoming environment where you can
                        relax and indulge in the latest trends and techniques. Whether
                        you're looking for a stunning new hairstyle, flawless makeup, or
                        impeccable nail art, we strive to exceed your expectations with
                        every visit.
                    </p>
                    <button type="button" class="btn  mt-3 hvr-bounce-to-right border-white text-white"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-aos="fade-up"
                        data-aos-duration="1000" data-aos-delay="400">
                        Explore Our Service
                    </button>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1551836022-d0b54d686dd0?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="img-fluid rounded mt-3" alt="About Us Image" data-aos="fade-left"
                        data-aos-duration="1000" data-aos-delay="400" />
                </div>
            </div>
        </div>
    </section>
    <!-- end about-us -->

    {{-- input review --}}
    <section id="inputreview" class="background-dark text-dark">
        <div class="container py-5">
            <h2 class="text-center font-barlow text-white mb-5">Give Us Your Rating</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('home.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" autocomplete="off" class="form-control" id="name"
                                        name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="rating">Rating</label>
                                    <div class="d-flex justify-content-center rating mt-2">
                                        <input type="radio" name="rating" id="star1" value="5">
                                        <label for="star1"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" id="star2" value="4">
                                        <label for="star2"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" id="star3" value="3">
                                        <label for="star3"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" id="star4" value="2">
                                        <label for="star4"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" id="star5" value="1">
                                        <label for="star5"><i class="fas fa-star"></i></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="comment">Comment</label>
                                    <textarea class="form-control" id="feedback" name="comment" rows="4" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block mt-5">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- end input review --}}


    {{-- footer --}}
    @include('components.footer')
    {{-- end footer --}}

    @include('components.script')
</body>

</html>