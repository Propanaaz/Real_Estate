<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Raji Ola & Co - Real Estate Agent</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ url('images/logo.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ url('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ url('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="/" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="{{ url('img/raji_ola_&_co.png') }}" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">Raji Ola & Co</h1>
                    
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="/" class="nav-item nav-link active">Home</a>
                        <a href="/about" class="nav-item nav-link">About</a>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                @foreach($menucategory as $menucategory)
                                <a href="/property-list/{{$menucategory['property_type']}}" class="dropdown-item">{{$menucategory['property_type']}}</a>

                                @endforeach
                             
                            </div>
                        </div>
                        <a href="/property-list/all" class="nav-item nav-link">Property</a>

                        {{-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                <a href="404.html" class="dropdown-item">404 Error</a>
                            </div>
                        </div> --}}
                        <a href="/contact" class="nav-item nav-link">Contact</a>
                    </div>
                    {{-- <a href="" class="btn btn-primary px-3 d-none d-lg-flex">Add Property</a> --}}
                </div>
            </nav>
        </div>
        <!-- Navbar End -->


        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <h2 style="margin-top: 200px;">{{$property['name']}}</h2>
                <div class="col-md-12 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        {{-- @foreach($headerimage as $headerimage) --}}
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="{{ url('images/'.$headerimage['image1']) }}" alt="" style="height: 800px;">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="{{ url('images/'.$headerimage['image2']) }}" alt="" style="height: 800px;">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="{{ url('images/'.$headerimage['image3']) }}" alt="" style="height: 800px;">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="{{ url('images/'.$headerimage['image4']) }}" alt="" style="height: 800px;">
                        </div>
                        {{-- @endforeach --}}
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
             
                 
              
            
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Key Features</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Feature</th>
                                            <th scope="col">Desription</th>
                                             </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>{{$property['feature1']}}</td>
                                            <td>{{$property['feature1ans']}}</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>{{$property['feature2']}}</td>
                                            <td>{{$property['feature2ans']}}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td>3</td>
                                            <td>{{$property['feature3']}}</td>
                                            <td>{{$property['feature3ans']}}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->  




        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="{{ url('images/'.$property['image1']) }}" style="height:500px;">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">{{$property['name']}}</h1>
                        <h1 class="mb-4">{{$property['location']}}</h1>
                        <h3 style="text-decoration: underline">More Details</h3>
                        <?php 
                            echo htmlspecialchars_decode( $property['description']);
                            ?>
                    
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
{{-- 

        <!-- Property List Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h1 class="mb-3">Property Listing</h1>
                            <p>Explore our wide range of properties that are available at various locations</p>
                        </div>
                    </div>
                    <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                        <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1">Featured</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2">For Sell</a>
                            </li>
                            <li class="nav-item me-0">
                                <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-3">For Rent</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            @if(count($property) > 0){
                                @foreach ($property as $property)
                                
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="property-item rounded overflow-hidden">
                                        <div class="position-relative overflow-hidden">
                                            <a href=""><img class="img-fluid" src="{{ url('images/'.$property['image1']) }}" alt="" style="height:400px; width:400px;"></a>
                                            <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For {{ $property['tag'] }}</div>
                                            <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">{{ $property['propertytype'] }}</div>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="text-primary mb-3">#{{ $property['price'] }}</h5>
                                            <a class="d-block h5 mb-2" href="">{{ $property['name'] }}</a>
                                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $property['location'] }}</p>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>{{ $property['feature1'] }}</small>
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>{{ $property['feature2'] }}</small>
                                            <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>{{ $property['feature3'] }}</small>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <h3>No Match Found</h3>
                            
@endif                       


                            
                        </div>

                        
                    </div>
               
                </div>
            </div>
        </div>
        <!-- Property List End --> --}}
        <!-- Call to Action Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="bg-light rounded p-3">
                    <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                        <div class="row g-5 align-items-center">
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            
                             
                        
                                <img class="img-fluid rounded w-100" src="{{ url('images/employee/'.$ceo['image']) }}"  alt="">
                            </div>
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                                <div class="mb-4">
                                    <h1 class="mb-3">Meet the CEO</h1>
                                    <p>At Raji Ola & Co We Are Always Concerned About Client's Satisfactions. <br>
                                        You Can Contact Us to book an Appointment Now. <br>
                                    We are Here to Meet Up With Your Real Estate Demands</p>

                                </div>
                                <a href="tel:08142958974" class="btn btn-primary py-3 px-4 me-2"><i class="fa fa-phone-alt me-2"></i>Make A Call</a>
                                <a href="/contact" class="btn btn-dark py-3 px-4"><i class="fa fa-calendar-alt me-2"></i>Get Appoinment</a>
                            </div>
                        </div><h5 style="margin-left:100px;">MR. RAJI</h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action End -->


        <!-- Team Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Property Agents</h1>
                    <p>Meet our Estate Agents Who are always Committed to Managing our Clients Properties</p>
                </div>
                <div class="row g-4">
                    @foreach($user as $user)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s" >
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative" >
                                <img class="img-fluid" src="{{ url('images/employee/'.$user['image']) }}" alt=""  >
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-email-f"></i></a>
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">{{$user['name']}}</h5>
                                <small>{{$user['designation']}}</small>
                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>
        </div>
        <!-- Team End -->


        <!-- Testimonial Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Our Clients Say!</h1>
                    <p>Hear from our trusted clients</p>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>I was able to get an Apartment In Less than 2 Days.</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="{{ url('img/testimonial-1.jpg') }}" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Adebimpe Aseez</h6>
                                    <small>Software Engineer</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>The have the best services when it gets to real estate</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="{{ url('img/testimonial-2.jpg') }}" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Adeniyi Adewale</h6>
                                    <small>Trader</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>Their Staffs are top notch</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="{{ url('img/testimonial-3.jpg') }}" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Ibrahim Medinat</h6>
                                    <small>Civil Servant</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
        

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Get In Touch</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>No 5 Olanipekun Complex, Up Jesus, Idishin Extension Ibadan</p>
                            <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+2348142958974</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>mutiuraji74@gmail.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
            
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Photo Gallery</h5>
                        <div class="row g-2 pt-2">

                            @foreach($gallerypost as $propert)
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="{{ url('images/'.$propert['image1']) }}" alt="" style="height:50px;">
                            </div>
                          @endforeach
                       
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Newsletter</h5>
                        <p>Subscribe To Our Newsletter to Up-To-Data Information</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; Raji Ola & Co, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
						
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                             
                                Designed By Propa Technologies                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="{{ url('js/jquery-3.6.1.js') }}"></script>
  <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>


    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="{{ url('lib/wow/wow.min.js') }}"></script>
    <script src="{{ url('lib/easing/easing.min.js')}}"></script>
    <script src="{{ url('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ url('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ url('js/main.js') }}"></script>
</body>

</html>