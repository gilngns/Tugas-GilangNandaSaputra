<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @include('components.style')
    <title>Service | SalonSEA</title>
</head>

<body>
    <section id="header">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg background-dark">
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
                        <!-- Login & Logout Button -->
                        <li class="nav-item dropdown">
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
                        </li>
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

    </section>


    <section id="services" class="py-5 background-dark mt-5">
        <div class="container">
            <h2 class="text-white font-service text-center mb-5 mt-5">Our Services</h2>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs d-flex justify-content-center align-items-center " id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="makeup-tab" data-bs-toggle="tab" data-bs-target="#makeup"
                        type="button" role="tab" aria-controls="makeup" aria-selected="true">Manicure And
                        Pedicure</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="haircut-tab" data-bs-toggle="tab" data-bs-target="#haircut"
                        type="button" role="tab" aria-controls="haircut" aria-selected="false">Haircuts and
                        Styling</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="hair-coloring-tab" data-bs-toggle="tab"
                        data-bs-target="#hair-coloring" type="button" role="tab" aria-controls="hair-coloring"
                        aria-selected="false">Facial Treatments</button>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content mt-4" id="myTabContent">
                <!-- Makeup Tab Pane -->
                <div class="tab-pane fade show active" id="makeup" role="tabpanel" aria-labelledby="makeup-tab">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="p-4 text-white font-barlow">
                                <h3 class="font-barlow">Manicure And Pedicure</h3>
                                <p>
                                    Enjoy our best manicure and pedicure services for a fresh and modern look. Find a
                                    nail style that suits your personality. Make an appointment now and feel the
                                    difference!
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="https://images.unsplash.com/photo-1519415510236-718bdfcd89c8?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                class="d-block w-100 rounded-3" alt="Makeup">
                        </div>
                    </div>
                </div>

                <!-- Haircut Tab Pane -->
                <div class="tab-pane fade" id="haircut" role="tabpanel" aria-labelledby="haircut-tab">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="p-4 text-white font-barlow">
                                <h3 class="font-barlow">Haircut And Styling</h3>
                                <p>
                                    Enjoy our best haircuts for a fresh and modern look. Find
                                    a hairstyle that suits your personality. Make an
                                    appointment immediately and feel the difference!
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="https://images.unsplash.com/photo-1599351431408-433ef72fe40b?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                class="d-block w-100 rounded-3" alt="Haircut">
                        </div>
                    </div>
                </div>

                <!-- Hair Coloring Tab Pane -->
                <div class="tab-pane fade" id="hair-coloring" role="tabpanel" aria-labelledby="hair-coloring-tab">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="p-4 text-white font-barlow">
                                <h3 class="font-barlow">Facial Treatments</h3>
                                <p>
                                    Enjoy our best facial treatments for fresh and radiant skin. Find a treatment that
                                    suits your skin's needs. Make an appointment now and feel the difference!
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                class="d-block w-100 rounded-3" alt="Hair Coloring">
                        </div>
                    </div>
                </div>

                <!-- Nail Care Tab Pane -->
                <div class="tab-pane fade" id="nail-care" role="tabpanel" aria-labelledby="nail-care-tab">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="p-4 text-white font-barlow">
                                <h3 class="font-barlow">Nail Care</h3>
                                <p>
                                    Enjoy our best nail care services for a fresh and modern look. Find a nail style
                                    that suits your personality. Make an appointment now and feel the difference!
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="https://images.unsplash.com/photo-1632345031435-8727f6897d53?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                class="d-block w-100 rounded-3" alt="Nail Care">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('components.footer')

    @include('components.script')
</body>

</html>
