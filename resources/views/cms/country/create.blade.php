@extends('cms.parent')

@section('title' , 'Create Country')

@section('styles')

@endsection

@section('mainTitle' , 'Create Country')
@section('subTitle' , 'create country')

@section('menu-country-active' , 'menu-open')
@section('main-country-active' , 'active')
@section('create-country-active' , 'active')

@section('content')

<div class="container-fluid">

<div class="row">
<!-- left column -->
        <div class="col-lg-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Country</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('countries.store') }} " method="POST">
            @csrf
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </div>

                @endif

                @if (session()->has('message'))


                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Success</h5>
                  {{session('message')}}
                </div>
              </div>
                @endif

                <div class="card-body">
                  <div class="form-group">
                    <label for="country_name">Country Name</label>
                    <input type="text" class="form-control" name="country_name" id="country_name" placeholder="Enter Country Name">
                  </div>
                  <div class="form-group">
                    <label for="code">Code</label>
                    <input type="text" class="form-control" name="code" id="code" placeholder="Enter Country Code">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            </div>
            <!-- /.card -->

        </div>
        <!--/.col (left) -->
</div>
</div>
@endsection

@section('scripts')

@endsection
