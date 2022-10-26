@extends('cms.parent')

@section('title' , 'Profile')

@section('styles')

@endsection

@section('mainTitle' , 'Profile')
@section('subTitle' , 'profile')

{{-- @section('menu-admin-active' , 'menu-open')
@section('main-admin-active' , 'active')
@section('index-admin-active' , 'active') --}}

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="container-fluid">

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-md-10 offset-md-1">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  {{-- <img class="profile-user-img img-fluid img-circle"
                        src="{{ asset('storage/images/admin/' .auth('admin')->user()->images) }}"
                        alt="User profile picture"> --}}

                  @if (Auth::guard('admin')->id())
                  @if (auth('admin')->user()->image !=='')
                  <img class="profile-user-img img-fluid img-circle"
                    src="{{ asset('storage/images/admin/' .auth('admin')->user()->images) }}" alt="User Image">
                  @else
                  <img class="brand-image img-circle img-bordered-sm img-responsive " src="{{ asset('cms/dist/img/user1-128x128.jpg') }}" alt="User Image">
                  @endif
                @endif 
                  @if (Auth::guard('author')->id())
                  @if (auth('author')->user()->image !=='')
                  <img class="profile-user-img img-fluid img-circle"
                    src="{{ asset('storage/images/author/' .auth('author')->user()->images) }}" alt="User Image">
                  @else
                  <img class="brand-image img-circle img-bordered-sm img-responsive " src="{{ asset('cms/dist/img/user1-128x128.jpg') }}" alt="User Image">
                  @endif
                @endif 
                </div>

                {{-- <h3 class="profile-username text-center">{{ auth('admin')->user()->full_name }}</h3> --}}
                @if (Auth::guard('admin')->id())
                <h3 class="profile-username text-center">{{ auth('admin')->user()->full_name }}</h3>
            @elseif (Auth::guard('author')->id())
            <h3 class="profile-username text-center">{{ auth('author')->user()->full_name }}</h3>
            @else
            <a href="#" class="d-block"> users</a>
            @endif

            @if (Auth::guard('admin')->id())
            <p class="text-muted text-center">Admin</p>
            @endif
            @if (Auth::guard('author')->id())
            <p class="text-muted text-center">Author</p>
            @endif
                

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    @if (Auth::guard('admin')->id())
                    <b>Email</b> <a class="float-right">{{ auth('admin')->user()->email }}</a>
                    @endif
                    @if (Auth::guard('author')->id())
                    <b>Email</b> <a class="float-right">{{ auth('author')->user()->email }}</a>
                    @endif
                    
                  </li>
                  <li class="list-group-item">
                    @if (Auth::guard('admin')->id())
                    <b>Gender</b> <a class="float-right">{{ auth('admin')->user()->user->gender }}</a>
                    @endif
                    @if (Auth::guard('author')->id())
                    <b>Gender</b> <a class="float-right">{{ auth('author')->user()->user->gender }}</a>
                    @endif
                  </li>
                  <li class="list-group-item">
                    @if (Auth::guard('admin')->id())
                    <b>Mobile</b> <a class="float-right">{{ auth('admin')->user()->user->mobile }}</a>
                    @endif
                    @if (Auth::guard('author')->id())
                    <b>Mobile</b> <a class="float-right">{{ auth('author')->user()->user->mobile }}</a>
                    @endif
                  </li>
                </ul>

                {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
 
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


@section('scripts')
@endsection
