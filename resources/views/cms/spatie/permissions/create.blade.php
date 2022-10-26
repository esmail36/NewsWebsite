@extends('cms.parent')

@section('title' , 'Create Permission')

@section('styles')

@endsection

@section('mainTitle' , 'Create Permission')
@section('subTitle' , 'create permissions')

@section('menu-permissions-active' , 'menu-open')
@section('main-permissions-active' , 'active')
@section('create-permissions-active' , 'active')

@section('content')

<div class="container-fluid">

<div class="row">
<!-- left column -->
        <div class="col-lg-12">
            <!-- general form elements -->
            <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Permission</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
            @csrf



            <div class="card-body">

                <div class="form-group col-lg-12">
                    <label for="guard_name">Guard Name</label>
                    <select class="form-control" style="width: 100%;" name="guard_name" id="guard_name" aria-label=".form-select-sm example">
                            <option value="admin">Admin</option>
                            <option value="author">Author</option>
                            
                        
                    </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Permission Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Permission Name">
                    </div>

                    

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button onclick="performStore()" type="button" class="btn btn-primary">Save</button>
                    <a href="{{ route('permissions.index') }}" type="button" class="btn btn-primary">Return Back</a>
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

        function performStore(){
            let formData = new FormData();
            formData.append('name' , document.getElementById('name').value);
            formData.append('guard_name' , document.getElementById('guard_name').value);

            store('/cms/admin/permissions',formData);
        }
        </script>

@endsection
