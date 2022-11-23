
@extends('layouts.land')


@section('content')

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">





    <!-- SLIDER -->
    <div class="owl-carousel owl-theme hero-slider">



        <div class="slide slide1">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-10 offset-lg-1 text-white">
                        <h6 class="text-white text-uppercase">save money save time</h6>
                        <h1 class="display-3 my-4">Enhance<br />Your Experience</h1>
                    </div>
                </div>
            </div>
        </div>


        <div class="slide slide2">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-10 offset-lg-1 text-white">
                        <h6 class="text-white text-uppercase">Welcome to</h6>
                        <h1 class="display-3 my-4">Online Car Rental <br />Group 12</h1>
                    </div>
                </div>
            </div>
        </div>


        <div class="slide slide3">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-10 offset-lg-1 text-white">
                        <h6 class="text-white text-uppercase">Visit Active Vacation</h6>
                        <h2 class="display-3 my-4">Sri Lanka</h2>
                    </div>
                </div>
            </div>
        </div>




    </div>

    <!-- ABOUT -->
    <section id="about">
        <div class="container">


            <div class="row">
                <div class="col-12 ">
                    <div class="intro">
                        <!-- <h2> <br/><br/></h2> -->
                        <h2>About Us</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-5 py-5">
                    <div class="row">

                        <div class="col-12">
                            <div class="info-box">
                                <img src="img/vision.png" alt="">
                                <div class="ms-4">
                                    <h5>Our Vision</h5>
                                    <p>To lead our industry by defining service excellence and building unmatched customer loyalty.<br/> </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="info-box">
                                <img src="" alt="">
                                <div class="ms-4">
                                    <h5>Why Choose Us?</h5>
                                    <p> > We Have Well Experienced & Professional Drivers<br/>
                                        > Our Drivers Know The Shortest Route To Your Destination <br/>
                                        > We Have A Big Fleet Of Vehicles<br/>
                                        > We Don’t Have Hidden Charges<br/>
                                        > We Are Flexible<br/> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <img src="img/about.jpg" alt="">
                </div>
            </div>
        </div>
    </section>


    <!-- Vehicle -->
    <section id="vehicle" class="text-center">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <!-- <h2> <br/><br/></h2> -->
                        <h2>Our Vehicles</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-8">
                    <div class="team-member">
                        <div class="image">
                            <img src="img/gtr.jfif" alt="">
                            <div class="social-icons">
                                <a href="master-car.html"><i></i></a>
                            </div>
                            <div class="overlay"></div>
                        </div>
                        <p>Car</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-8">
                    <div class="team-member">
                        <div class="image">
                            <img src="img/gtr.jfif" alt="">
                            <div class="social-icons">
                                <a href="master-suv.html"><i></i></a>
                            </div>
                            <div class="overlay"></div>
                        </div>
                        <p>SUV & Cabs</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-8">
                    <div class="team-member">
                        <div class="image">
                            <img src="img/gtr.jfif" alt="">
                            <div class="social-icons">
                                <a href="#"><i></i></a>
                            </div>
                            <div class="overlay"></div>
                        </div>
                        <p>Van & Bus</p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- service -->
    <section class="bg-light" id="service">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <!-- <h2> <br/><br/></h2> -->
                        <h2>Our Service </h2>
                        <p class="mx-auto"></p>
                    </div>
                </div>
            </div>
        </div>
        <div id="projects-slider" class="owl-theme owl-carousel">
            <div class="project">
                <div class="overlay"></div>
                <img src="img/wedCar1.jpeg" alt="">
                <div class="content">
                    <h1>Self Driving</h1>
                </div>
            </div>
            <div class="project">
                <div class="overlay"></div>
                <img src="img/wedCar2.jpg" alt="">
                <div class="content">
                    <h1>With Driver</h1>
                </div>
            </div>
            <div class="project">
                <div class="overlay"></div>
                <img src="img/wedCar1.jpeg" alt="">
                <div class="content">
                    <h1>SUV</h1>
                </div>
            </div>
            <div class="project">
                <div class="overlay"></div>
                <img src="img/wedCar2.jpg" alt="">
                <div class="content">
                    <h1>Wedding</h1>
                </div>
            </div>
            <div class="project">
                <div class="overlay"></div>
                <img src="img/wedCar1.jpeg" alt="">
                <div class="content">
                    <h1>4 X 4</h1>
                </div>
            </div>
            <div class="project">
                <div class="overlay"></div>
                <img src="img/wedCar2.jpg" alt="">
                <div class="content">
                    <h1>Trip</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Offer -->
    <section id="offer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <!-- <h2> <br/><br/></h2> -->
                        <h2>Special Offers</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8">
                    <div class="team-member">
                        <div class="image">
                            <img src="img/offer1.jpg" alt="">
                            <div class="social-icons">
                                <a href="#"></a>
                            </div>
                            <div class="overlay"></div>
                        </div>
                        <h5>offer percentage</h5>
                        <p>Type offer details</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-8">
                    <div class="team-member">
                        <div class="image">
                            <img src="img/offer2.jpg" alt="">
                            <div class="social-icons">
                                <a href="#"></a>
                            </div>
                            <div class="overlay"></div>
                        </div>

                        <h5>offer percentage</h5>
                        <p>Type offer details</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-8">
                    <div class="team-member">
                        <div class="image">
                            <img src="img/offer3.jfif" alt="">
                            <div class="social-icons">
                                <a href="#"></a>
                            </div>
                            <div class="overlay"></div>
                        </div>

                        <h5>offer percentage</h5>
                        <p>Type offer details</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Review -->
    <section class="bg-light" id="reviews">

        <div class="row">
            <div class="col-12">
                <div class="intro">
                    <!-- <h2> <br/><br/></h2> -->
                    <h2>Review</h2>
                </div>
            </div>
        </div>

    </section>

    <section id="contact">
        <div class="container">
            <!-- <h2> <br/><br/></h2> -->
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <h2>Contact Us</h2>
                        <p class="mx-auto">Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                            roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <article class="blog-post">
                        <a class="tag">Address</a>
                        <div class="content">
                            <h2> <br/></h2>
                            <p>No 15,<br/> Hollywood Crasent,<br/> Galaha</p>
                        </div>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="blog-post">
                        <a class="tag">Phone Numbers</a>
                        <div class="content">
                            <h2> <br/></h2>
                            <p>Phone:  077-5579398 <br/>
                                Fax:  077-5579398</p>
                        </div>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="blog-post">
                        <a class="tag">Email</a>
                        <div class="content">
                            <h2> <br/></h2>
                            <p>sanjeewadanu423@gmail.com</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
</body>

    @endsection



