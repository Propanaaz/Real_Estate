<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edit Category</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ url('images/logo.png') }}" rel="icon">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ url('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ url('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ url('css/style2.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Edit Category</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                 
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{url('admin_dashboard')}}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                       
              
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
               
                
            </nav>
            <!-- Navbar End -->


            <!-- Form Start -->

            @if($errors->any())
            @foreach($errors->all() as $errors)
            <ul>
                <li>{{$errors}}</li>
            
            </ul>
            @endforeach
            @endif
            
                @if(session()-> has("message"))
                <h3>{{session()->get("message")}}</h3>
            
            @endif
       @foreach($propertytype as $propertytype)
       
            <form method="POST" action="/update_propertytype" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                
        
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Edit Category</h6>
                     

                       
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="propertytype" id="floatingInput"
                                    placeholder="name@example.com" value="{{$propertytype['property_type']}}">
                                <label for="floatingInput">Category Name</label>
                                
                            </div>
                           
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="description" id="floatingInput"
                                    placeholder="name@example.com" value="{{$propertytype['description']}}">
                                <label for="floatingInput">Category Description</label>
                                
                            </div>

                    

                            <input type="text" name="cid" value="{{$propertytype['id']}}" style="display: none;">

                           
                        </div>
                        
                    </div>
        
                </div>
            </div>
            <input class="form-control form-control-lg" value="submit" name="submit" type="submit">


        </form>
        @endforeach
        
            <!-- Form End -->


   <!-- Footer Start -->
   <div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded-top p-4">
        <div class="row">
            <div class="col-12 col-sm-6 text-center text-sm-start">
                &copy; <a href="#">Raji Ola & Co</a>, All Right Reserved. 
            </div>
            <div class="col-12 col-sm-6 text-center text-sm-end">
                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                Designed By Propa Technologies
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="{{ url('js/jquery-3.6.1.js') }}"></script>
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('lib/chart/chart.min.js') }}"></script>
    <script src="{{ url('lib/easing/easing.min.js') }}"></script>
    <script src="{{ url('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ url('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ url('lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ url('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ url('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ url('js/main2.js') }}"></script>
    <script src="{{ url('tinymce/tinymce.min.js') }}"></script>
</body>
</html>


<script>
    tinymce.init({
        selector: "#floatingTextarea"
    });
</script>
<script>
    (function(){
        
        var no = 0;
        $(".tags").keypress(function(e){
            if(e.which == "44"){
                no = no + 1;
            }
            if(no == 3){
                alert("max reached")
                $(".tag2").val($(".tags").val());
                $(".tags").attr({"disabled":"disabled"});
                e.preventDefault();
                $("<span>reset</span>").insertAfter(".tags").click(function(){

                    $(".tags").removeAttr("disabled").val("");
                    $(this).remove();
                    no = 0;
                });
               

            }
            
        });

        
        // });
//         $(".tag").click(function(){
        
//                 if($(this).hasClass("tagselected")){
//                 $(this).removeClass("tagselected");
//                 $(this).css({
//                 "backgroundColor":"green"
//             });
//             no = no - 1;
//             }else{
//                 $(this).addClass("tagselected");
//             $(this).css({
//                 "backgroundColor":"red"
//             });
//             no = no + 1;
            
//             }
          
//   if(no == 3){
//         alert("max reached")
//                 $(".tags").attr({"disabled":"disabled"});
//         }

            
//         });



      
})();
</script>