<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SalonSEA</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Hover CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css" rel="stylesheet" />

    {{-- favicon --}}
    <link rel="icon" href="{{ asset('asset/LOGO.png') }}" type="image/x-icon">

    {{-- font google --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1600948836101-f9ffda59d250?q=80&w=2036&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center fixed;
            background-size: cover;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: #ffffff;
            color: #ffffff;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.3);
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-lg-6">
            <div class="card bg-transparent text-white shadow ">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ asset('asset/LOGO.png') }}" class="img-fluid" style="width: 200px;"
                            alt="SalonSEA Logo">
                    </div>
                    <h2 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; font-weight: 500; font-style: normal;">Login to SalonSEA</h2>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3 row justify-content-center">
                            <div class="col-10 col-sm-8 col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" autocomplete="off"
                                    class="form-control bg-transparent @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-center">
                            <div class="col-10 col-sm-8 col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" autocomplete="off"
                                    class="form-control bg-transparent @error('password') is-invalid @enderror"
                                    name="password" required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-8 col-md-6">
                                <button type="submit"
                                    class="btn btn-primary bg-transparent w-100 mt-3 hvr-bounce-to-right">Login</button>
                            </div>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <a href="{{ route('register') }}" class="text-decoration-none text-primary">Don't have an
                            account yet? Register Here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>