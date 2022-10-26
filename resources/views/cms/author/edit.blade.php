@extends('cms.parent')

@section('title' , 'Edit Author')

@section('styles')

@endsection

@section('mainTitle' , 'Edit Author')
@section('subTitle' , 'create author')

@section('content')

@section('menu-author-active' , 'menu-open')
@section('main-author-active' , 'active')
@section('create-author-active' , 'active')

<div class="container-fluid">

<div class="row">
<!-- left column -->
        <div class="col-lg-12">
            <!-- general form elements -->
            <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Author's Data</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
            @csrf

            <div class="card-body row">

            <div class="form-group col-lg-12">
                    <label for="country_id">Country name</label>
                    <select class="form-control" style="width: 100%;" name="country_id" id="country_id" aria-label=".form-select-sm example">
                            <option selected value="{{ $authors->user->country->id }}">{{ $authors->user->country->country_name }}</option>

                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                        @endforeach
                    </select>
                </div>

            {{-- <div class="form-group col-lg-12">
                    <label for="city_name">City name</label>
                    <select class="form-control" style="width: 100%;" name="city_name" id="city_name" aria-label=".form-select-sm example">
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->cities->city_name }}</option>
                        @endforeach
                    </select>
                </div> --}}

                    <div class="form-group col-lg-4">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $authors->user->first_name }}" placeholder="Enter First Name">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $authors->user->last_name }}" placeholder="Enter Last Name">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $authors->email }}" placeholder="Enter Email">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="{{ $authors->password }}" placeholder="Enter Password">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="mobile">Mobile</label>
                        <input type="text" class="form-control" name="mobile" id="mobile" value="{{ $authors->user->mobile }}" placeholder="Enter Mobile">
                    </div>

                    <div class="form-group col-lg-4">
                    <label for="gender">Gender</label>
                    <select class="form-control" style="width: 100%;" name="gender" id="gender"  aria-label=".form-select-sm example">

                            <option selected>{{ $authors->user->gender }}</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>

                    </select>
                    </div>
                    <div class="form-group col-lg-4">
                    <label for="status">Status</label>
                    <select class="form-control" style="width: 100%;" name="status" id="status" aria-label=".form-select-sm example">

                            <option selected>{{ $authors->user->status }}</option>
                            <option value="active">Active</option>
                            <option value="inactive">InActive</option>

                    </select>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="date_of_birth">Date Of Birth</label>
                        <input type="date" class="form-control" name="date_of_birth" value="{{ $authors->user->date_of_birth }}" id="date_of_birth" placeholder="Enter Date Of Birth">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Enter Image" optional>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="file">File</label>
                        <input type="file" class="form-control" name="file" id="file" placeholder="Enter file" optional>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button onclick="performUpdate({{ $authors->id }})" type="button" class="btn btn-primary">Update</button>
                    <a href="{{ route('authors.index') }}" type="button" class="btn btn-primary">Return Back</a>
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

        

        function performUpdate(id){
            let formData = new FormData();
            formData.append('first_name' , document.getElementById('first_name').value);
            formData.append('last_name' , document.getElementById('last_name').value);
            formData.append('mobile' , document.getElementById('mobile').value);
            formData.append('email' , document.getElementById('email').value);
            formData.append('gender' , document.getElementById('gender').value);
            formData.append('status' , document.getElementById('status').value);
            formData.append('country_id' , document.getElementById('country_id').value);
            formData.append('date_of_birth' , document.getElementById('date_of_birth').value);
            formData.append('image' , document.getElementById('image').files[0]);
            formData.append('file' , document.getElementById('file').files[0]);

            storeRoute('/cms/admin/authorsUpdate/'+id ,formData);
        }
        </script>

@endsection
