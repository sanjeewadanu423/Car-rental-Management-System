<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="link.png">

    <!-- Bootstrap CSS -->
    {{-- <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet'> --}}
    {{-- <link rel="stylesheet" href="css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- <link rel="stylesheet" href="css/owl.carousel.min.css"> --}}
    {{-- <link rel="stylesheet" href="css/owl.theme.default.min.css"> --}}
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    {{-- <link rel="stylesheet" href="css/style.css"> --}}

    <title>Rent A Car</title>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">


    <!-- TOP NAV -->
    <div class="top-nav" id="home">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <p> <i class='bx bxs-envelope'></i> sanjeewadanu423@gmail.com.com</p>
                    <p> <i class='bx bxs-phone-call'></i> 077 55 79 398</p>
                </div>
                <div class="col-auto social-icons">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- BOTTOM NAV -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">


        <div class="container">


            <a class="navbar-brand" href="{{ route('index') }}">Rent A Car</a>





            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#availability"
                        class="btn btn-brand ms-lg-3 ">Availability</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="#vehicle">Vehicle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="#service">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="#offer">Offers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="#reviews">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="#contact">Contact Us</a>
                    </li>
                </ul>
                @guest
                @if (Route::has('login'))
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        class="btn btn-brand ms-lg-3">Log In</a>
                @endif
                @else
                <li class="nav-item dropdown no-arrow btn btn-brand ms-lg-3">
                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">{{ Auth::user()->name }}</a>
                        <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>
                @endguest
            </div>

        </div>

    </nav>

    @yield('content')

    <!-- footer -->
    <footer>
        <div class="footer-top text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h4 class="navbar-brand">Rent A Car<span class="dot">.</span></h4>
                        <div class="col-auto social-icons">
                            <a href="#"><i class='bx bxl-facebook'></i></a>
                            <a href="#"><i class='bx bxl-twitter'></i></a>
                            <a href="#"><i class='bx bxl-instagram'></i></a>
                        </div>
                        <div class="col-auto conditions-section">
                            <a href="#">privacy</a>
                            <a href="#">terms</a>
                            <a href="#">disclaimer</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>



    <!-- loging form -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="container-fluid">
                        <div class="row gy-4">
                            <div class="col-lg-4 col-sm-12 bg-cover"
                                style="background-image: url(img/c2.jpg); min-height:300px;">
                                <div>

                                </div>
                            </div>
                            <div class="col-lg-8">
                                <form class="p-lg-5 col-12 row g-3"  method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div>
                                        <h3>Please Log</h3>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control  @error('email') is-invalid @enderror" placeholder="sanjeewadanu423@gmail.com" id="email"
                                            aria-describedby="emailHelp" name="email"  required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="userName" class="form-label">Enter Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="password" id="password"
                                            aria-describedby="emailHelp" name="password" required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <button type="submit" class="btn btn-brand">Log In</button>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>

                                    <div class="col-6">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#register"
                                        class="btn btn-brand ms-lg-3">Register</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- registration form -->
    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="container-fluid">
                        <div class="row gy-4">
                            <div class="col-lg-4 col-sm-12 bg-cover"
                                style="background-image: url(img/c2.jpg); min-height:300px;">
                                <div>

                                </div>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="col-lg-8">
                                <form class="p-lg-5 col-12 row g-3" action="{{ route('regi') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <h3>Please Registerr</h3>
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="fullname" class="form-label">Full Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" required autocomplete="name"
                                            autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="sanjeewadanu423@gmail.com" aria-describedby="emailHelp">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                    <div class="col-lg-6">
                                        <label for="password" class="form-label">Password</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password"
                                            aria-describedby="emailHelp">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="password-confirm" class="form-label">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password"
                                            aria-describedby="emailHelp">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="idNo" class="form-label">Enter ID Number</label>
                                        <input type="text" class="form-control" name="customer_nic" placeholder="981351363V">
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="tpNo" class="form-label">Telephone Number</label>
                                        <input type="text" class="form-control" name="customer_phone" placeholder="0755793398">
                                    </div>

                                    <div class="col-12">
                                        <label for="address" class="form-label">Enter Address</label>
                                        <textarea class="form-control" style="height:100px" name="customer_address" placeholder="Address"></textarea>

                                        </textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="tpNo" class="form-label">Job</label>
                                        <input type="text" class="form-control" name="customer_job" placeholder="Job">
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <strong>Customer Photo:</strong>

                                            <input class="form-control" id="myFile" type="file" name="file">

                                    </div>




                                    <div class="col-6">
                                        <button type="submit" class="btn btn-brand"
                                            name="submit">Register</button>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- availability form -->
    <div class="modal fade" id="availability" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="container-fluid">
                        <div class="row gy-4">
                            <div class="col-lg-8">
                                <form class="p-lg-5 col-12 row g-3" method = "post" action = "{{ route('Check') }}">
                                    @csrf
                                    <div>
                                        <h3>Availability Checking</h3>
                                    </div>

                                    <div>
                                        <span class="form-label">Choose The Service</span>
                                        <select class="form-control" name="service">
                                            <option value="self drive">Self Drive</option>
                                            <option value="with driver">With Driver</option>
                                        </select>
                                    </div>






                                    <div class="row">


                                        <div class="col-sm-6">
                                            <div >
                                                <span class="form-label">Pickup Date</span>
                                                <input class="form-control" type="date" name="booking_date" required>
                                            </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <div>
                                                <span class="form-label">Return Date</span>
                                                <input class="form-control" type="date" name="return_date" required>
                                            </div>
                                        </div>


                                    </div>


                                    <div class="row">


                                        <div class="col-sm-4">
                                            <div>
                                                <span class="form-label">Vehicle Type</span>
                                                <select class="form-control" name="vehicle_type">
                                                    <option value="1">Car</option>
                                                    <option value="2">SUV & Cabs</option>
                                                    <option value="3">Van & Bus</option>
                                                </select>
                                            </div>
                                        </div>



                                    </div>


                                    <div class="col-6">
                                        <button type="submit" class="btn btn-brand">Check availability</button>
                                        <h1><br/></h1>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/app.js"></script> --}}


</body>
</html>
