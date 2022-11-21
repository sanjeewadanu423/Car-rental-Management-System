<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Admin Dashboard </title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('fonts/fontawesome-all.min.css') }}">
    </head>

    <body id="page-top">
        <div id="wrapper">

            <!-- side navigation bar -->
            <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
                <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.html">
                        <div class="sidebar-brand-icon rotate-n-15"></div>
                        <div class="sidebar-brand-text mx-3"><span>Rent a car</span></div>
                    </a>
                    <hr class="sidebar-divider my-0">
                    <ul class="navbar-nav text-light" id="accordionSidebar">
                        <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}"><span>Dashboard</span></a></li>

                        <li class="nav-item"><a class="nav-link" href="booking.html"><span>Booking</span></a>
                                            <a class="nav-link" href="{{ route('drivers') }}"><span>Driver</span></a>
                                            <a class="nav-link" href="vehicle.html"><span>Vehicle</span></a>
                                            <a class="nav-link" href="{{ route('customers') }}"><span>Customer</span></a>
                                            <a class="nav-link" href="{{ route('offers') }}"><span>Offer</span></a>
                                            <a class="nav-link" href="{{ route('reviews') }}"><span>Review</span></a>
                                            <a class="nav-link" href="{{ route('roles') }}"><span>Roles</span></a>
                                            <a class="nav-link" href="{{ route('users') }}"><span>Users</span></a>
                                            <a class="nav-link" href="{{ route('types') }}"><span>Vehi Models</span></a>
                                            <a class="nav-link" href="{{ route('categorys') }}"><span>Vehi Category</span></a>
                        </li>

                    </ul>
                    <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
                </div>
            </nav>


            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                        <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                            <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group"></div>
                            </form>
                            <ul class="navbar-nav flex-nowrap ms-auto">


                                <li class="nav-item dropdown no-arrow mx-1">
                                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter"> 7 </span><i class="fas fa-envelope fa-fw"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                            <h6 class="dropdown-header">alerts center</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar4.jpeg">
                                                    <div class="bg-success status-indicator"></div>
                                                </div>
                                                <div class="fw-bold">
                                                    <div class="text-truncate"><span>Hi there! I am wondering if you can help me with a problem I've been having.</span></div>
                                                    <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                                </div>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar2.jpeg">
                                                    <div class="status-indicator"></div>
                                                </div>
                                                <div class="fw-bold">
                                                    <div class="text-truncate"><span>I have the photos that you ordered last month!</span></div>
                                                    <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                                </div>
                                            </a><a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar3.jpeg">
                                                    <div class="bg-warning status-indicator"></div>
                                                </div>
                                                <div class="fw-bold">
                                                    <div class="text-truncate"><span>Last month's report looks great, I am very happy with the progress so far, keep up the good work!</span></div>
                                                    <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                                </div>
                                            </a><a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar5.jpeg">
                                                    <div class="bg-success status-indicator"></div>
                                                </div>
                                                <div class="fw-bold">
                                                    <div class="text-truncate"><span>Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</span></div>
                                                    <p class="small text-gray-500 mb-0">Chicken the Dog · 2w</p>
                                                </div>
                                            </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                        </div>
                                    </div>
                                    <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                                </li>
                                <div class="d-none d-sm-block topbar-divider"></div>
                                <li class="nav-item dropdown no-arrow">
                                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">{{ Auth::user()->name }}</span></a>
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
                            </ul>
                        </div>
                    </nav>
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            <footer class="bg-white sticky-footer"></footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>



    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js//theme.js') }}" ></script>
</body>

</html>
