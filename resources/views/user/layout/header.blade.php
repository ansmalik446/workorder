<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Wear</title>
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
            <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" id="theme-styles">
            
            
            


</head>

<body class="flip-container-bg"  >
    <section class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand pl-2" href="{{url('admins/')}}"><img src="{{asset('img/logo.gif')}}" alt="Logo" class="img img-fuild"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link home-Btn px-3 py-2" href="{{url('admins/')}}">Home</a>
              </li>
              @if (Auth::user()->role=="admins") 
              <li class="nav-item active ml-3">
                <a class="nav-link home-Btn px-3 py-2" href="{{url('admins/get_orders')}}">Order</a>
              </li>@endif
            </ul>
            <form class="d-flex text-center pl-2 pt-lg-0 pt-2">
              {{-- <button class="btn px-4 py-2" type="button">Login</button> --}}
              @if (Auth::check())
              <a href="{{url('/logout')}}"  class="btn px-4 py-31" type="button">Logout</a>


            @else
            <a href="{{url('/login')}}" class="btn px-4 py-2"type="button">Login</a>
              @endif

          </form>
          </div>
        </nav>
    </section>

@yield('content')

<!-- <footer class="footer-bg p-2">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 mb-3 col-sm-12 d-flex justify-content-md-center">
          <div class="d-flex align-items-center"><a class="mb-2" href="#">
            <img src="{{asset('img/logo.gif')}}" class="img-fluid" alt="footer-logo"></div>
           </a>
        </div>
      </div>
    </div>
      // Copyright 
   <div class="footer-copyright text-center py-3 text-light">© 2020 Copyright:
    <a href="#" class="text-light"> <b>WorkOrder.com</b></a>
  </div>
  // Copyright 
  
</footer> -->

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       
        <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>

        <script>
          $('.dropify').dropify();
      </script> 
      @yield('js')

      </body>

</html>
