<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @include('components.style')
    <title>Branch | SalonSEA</title>
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
    </section>

    <!-- branch -->
    <section id="branch" class="py-5 mt-5 background-dark">
        <div class="container">
            <h2 class="text-white font-service text-end mb-5 mt-5">Our Branch</h2>
            <p class="lead text-center mb-5 text-white">
                Welcome to our branches! Explore our locations below:
            </p>
            <div class="row gx-4">
                <div class="col-md-6">
                    <img src="https://www.playsalon.in/wp-content/uploads/2023/12/Play-Salon-at-Phoenix-Mall-of-Asia-3.jpg"
                        class="img-fluid img-thumbnail" alt="Map Image" />
                </div>
                <div class="col-md-6 mb-4 mt-4">
                    <div class="accordion" id="branchAccordion">
                        @foreach ($branchs as $branch)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="branch{{ $branch->id }}Heading">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#branch{{ $branch->id }}Collapse" aria-expanded="true"
                                        aria-controls="branch{{ $branch->id }}Collapse">
                                        {{ $branch->name }}
                                    </button>
                                </h2>
                                <div id="branch{{ $branch->id }}Collapse" class="accordion-collapse collapse show"
                                    aria-labelledby="branch{{ $branch->id }}Heading"
                                    data-bs-parent="#branchAccordion">
                                    <div class="accordion-body">
                                        <p>{{ $branch->location }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end branch -->

    @include('components.footer')

    @include('components.script')
</body>

</html>
