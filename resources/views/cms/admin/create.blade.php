@extends('cms.parent')

@section('title' , 'Create Admin')

@section('styles')
<link rel="stylesheet" href="{{ asset('cms/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('cms/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('mainTitle' , 'Create Admin')
@section('subTitle' , 'create admin')

@section('content')

@section('menu-admin-active' , 'menu-open')
@section('main-admin-active' , 'active')
@section('create-admin-active' , 'active')

<div class="container-fluid">

<div class="row">
<!-- left column -->
        <div class="col-lg-12">
            <!-- general form elements -->
            <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Admin</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
            @csrf

            <div class="card-body row">

                <div class="form-group col-lg-12">
                    <label for="role_id">Role name</label>
                    <select class="form-control" style="width: 100%;" name="role_id" id="role_id" aria-label=".form-select-sm example">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

            {{-- <input type="text" name="country_id" id="country_id" value="{{ $id }}" class="form-control form-control-solid" hidden/> --}}

            <div class="form-group col-lg-12">
                    <label for="country_id">Country name</label>
                    <select class="form-control" style="width: 100%;" name="country_id" id="country_id" aria-label=".form-select-sm example">
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                        @endforeach
                    </select>
                </div>
                

            {{-- <div class="form-group col-lg-12">
                    <label for="city_name">City name</label>
                    <select class="form-control" style="width: 100%;" name="city_name" id="city_name" aria-label=".form-select-sm example">
                        @foreach ($cities as $city)
                            <option value="{{ $city->country_id == $city->country->id }}">{{ $city->city_name }}</option>
                        @endforeach
                    </select>
                </div> --}}

                    <div class="form-group col-lg-4">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="mobile">Mobile</label>
                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile">
                    </div>

                    <div class="form-group col-lg-4">
                    <label for="gender">Gender</label>
                    <select class="form-control" style="width: 100%;" name="gender" id="gender" aria-label=".form-select-sm example">

                            <option value="">All</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>

                    </select>
                    </div>
                    <div class="form-group col-lg-4">
                    <label for="status">Status</label>
                    <select class="form-control" style="width: 100%;" name="status" id="status" aria-label=".form-select-sm example">

                            <option value="">All</option>
                            <option value="active">Active</option>
                            <option value="inactive">InActive</option>

                    </select>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="date_of_birth">Date Of Birth</label>
                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Enter Date Of Birth">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Enter Image">
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button onclick="performStore()" type="button" class="btn btn-primary">Save</button>
                    <a href="{{ route('admins.index') }}" type="button" class="btn btn-primary">Return Back</a>
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


    <script>

        $('.country_id').select2({
        theme: 'bootstrap4'
        })

        function performStore(){
            let formData = new FormData();
            formData.append('first_name' , document.getElementById('first_name').value);
            formData.append('last_name' , document.getElementById('last_name').value);
            formData.append('mobile' , document.getElementById('mobile').value);
            formData.append('email' , document.getElementById('email').value);
            formData.append('gender' , document.getElementById('gender').value);
            formData.append('status' , document.getElementById('status').value);
            formData.append('country_id' , document.getElementById('country_id').value);
            {{-- formData.append('city_name' , document.getElementById('city_name').value); --}}
            formData.append('password' , document.getElementById('password').value);
            formData.append('role_id' , document.getElementById('role_id').value);
            formData.append('date_of_birth' , document.getElementById('date_of_birth').value);
            formData.append('image' , document.getElementById('image').files[0]);

            store('/cms/admin/admins',formData);
        }
        </script>

@endsection
