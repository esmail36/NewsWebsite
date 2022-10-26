<?php
use App\Models\Category;

$categories = Category::all();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>News | @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('website/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    

    <!-- Custom styles for this template -->
    <link href="{{ asset('website/css/modern-business.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/custom.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('cms/plugins/fontawesome-free/css/all.min.css')}}">

    <link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">



    @yield('style')

</head>

<body>

<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('website.home') }}">news</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('website.home') }}">home</a>
                </li>


                @foreach ($categories as $category)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('website.allNews' , $category->id) }}">{{ $category->name }}</a>
                </li>
                @endforeach
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('website.contact') }}">Contact</a>
                    
                </li>

                @if (Auth::user())

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle profile-btn" type="button" data-toggle="dropdown" aria-expanded="false">
                        @if (Auth::user()->image != null)
                        <img class="img-circle img-borderd-sm d-flex mr-3 rounded-circle" src="{{ asset('storage/images/visitor/'.Auth::user()->image)}}" width="35" height="35" alt="User Image"> 

                        @else
                        <img class="img-circle img-borderd-sm d-flex mr-3 rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar7.png" width="35" height="35" alt="User Image">
                        @endif
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{ route('showProfile') }}">Profile</a>
                      <a class="dropdown-item" href="{{ route('viewlogout') }}">Logout</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>


                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li> --}}

                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('viewlogout') }}">Login</a>
                </li>
                @endif

            </ul>
        </div>
    </div>
</nav>



@yield('content')
<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Momen Sisalem 2018</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('website/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('website/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{asset('cms/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('cms/js/crud.js')}}"></script>
<script src="{{asset('website/js/custom.js')}}"></script>




@yield('script')

</body>

</html>
