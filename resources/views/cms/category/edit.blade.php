@extends('cms.parent')

@section('title' , 'Create Category')

@section('styles')

@endsection

@section('mainTitle' , 'Create Category')
@section('subTitle' , 'create category')

@section('menu-category-active' , 'menu-open')
@section('main-category-active' , 'active')
@section('create-category-active' , 'active')

@section('content')

<div class="container-fluid">

<div class="row">
<!-- left column -->
        <div class="col-lg-12">
            <!-- general form elements -->
            <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
            @csrf



            <div class="card-body">


                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $categories->name }}" placeholder="Enter Category Name">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" style="resize : none;" name="description" id="description" placeholder="Enter Description" cols="50" rows="4">{{ $categories->description }}</textarea>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button onclick="performUpdate({{ $categories->id }})" type="button" class="btn btn-primary">Update</button>
                    <a href="{{ route('categories.index') }}" type="button" class="btn btn-primary">Return Back</a>
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

        {{-- $('.country_id').select2({
        theme: 'bootstrap4'
        }) --}}

        function performUpdate(id){
            let formData = new FormData();
            formData.append('name' , document.getElementById('name').value);
            formData.append('description' , document.getElementById('description').value);

            storeRoute('/cms/admin/categoriesUpdate/' + id,formData);
        }
        </script>

@endsection
