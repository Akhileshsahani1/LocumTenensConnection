<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('Css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('Css/style.css') }}" />
     <link rel="stylesheet" href="{{ asset('Css/css.css') }}" /> 
    <title>404</title>
</head>

<body>
    <!--Main Navigation-->
    <header>
       
        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            <!-- Container wrapper -->
            <div class="container-fluid gx-0">
                

                <!-- Brand -->
                <a class="navbar-brand d-flex justify-content-md-center " href="#" style="width: 240px;">
                    <img src="{{asset('Assets/logo.svg')}}" style="width: 60px" alt="profileImage" />
                </a>
                <!-- Search form -->

                
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="main-body  bg-white ">
        
        <section class="page_404">
            <div class="container">
                <div class="row">	
                <div class="col-sm-12 ">
                <div class="col-sm-10 col-sm-offset-1  text-center">
                   <div>
                    <h1 class="text-center text404">404</h1>
                    <div style="height: 250px; width: 250px;" class="text-center m-auto my-4">
                        <img src="{{asset('Assets/images/sad.png')}}" class="" style="height: 100%; width: 100%;" alt="">
                    </div>
                   </div>
                
                
                <div class="contant_box_404">
                <h3 class="h2">
                Look like you're lost
                </h3>
                
                <p>the page you are looking for not avaible!</p>
                <a href="{{route('practice.home')}}" class="button-bg btn-text  py-2 px-5 shadow card_button ">Go to Home</a>
                <!-- <a href="" class="link_404 card_button ">Go to Home</a> -->
            </div>
                </div>
                </div>
                </div>
            </div>
        </section>
    </main>
    <!--Main layout-->
    <script src="https://kit.fontawesome.com/2b6a19a134.js" crossorigin="anonymous"></script>
    <script src="{{ asset('Js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('Js/script.js')}}"></script>
</body>

</html>