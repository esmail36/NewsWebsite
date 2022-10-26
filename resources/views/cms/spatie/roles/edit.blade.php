@extends('cms.parent')

@section('title' , 'Edit Role')

@section('styles')

@endsection

@section('mainTitle' , 'Edit Role')
@section('subTitle' , 'edit roles')

@section('menu-roles-active' , 'menu-open')
@section('main-roles-active' , 'active')
@section('create-roles-active' , 'active')

@section('content')

<div class="container-fluid">

<div class="row">
<!-- left column -->
        <div class="col-lg-12">
            <!-- general form elements -->
            <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Role</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
            @csrf



            <div class="card-body">

                <div class="form-group col-lg-12">
                    <label for="guard_name">Guard Name</label>
                    <select class="form-control" style="width: 100%;" name="guard_name" id="guard_name" aria-label=".form-select-sm example">
                        
                        
                        {{-- <option selected>{{ $roles->guard_name }}</option> --}}
                        <option value="admin" @if ($roles->guard_name == 'admin') selected
                            @endif >Admin</option>

                        <option value="author" @if ($roles->guard_name == 'author') selected
                            @endif >Author</option>
                    </select>
                    </div>

                    <div class="form-group">
                        <label for="name">Role Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $roles->name }}" placeholder="Enter Role Name">
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button onclick="performUpdate({{ $roles->id }})" type="button" class="btn btn-primary">Update</button>
                    <a href="{{ route('roles.index') }}" type="button" class="btn btn-primary">Cancle</a>
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

        {{-- $('.guard_name').select2({
        theme: 'bootstrap4'
        }) --}}

        function performUpdate(id){
            let formData = new FormData();
            formData.append('name' , document.getElementById('name').value);
            formData.append('guard_name' , document.getElementById('guard_name').value);

            storeRoute('/cms/admin/rolesUpdate/' + id,formData);
        }
        </script>

@endsection
