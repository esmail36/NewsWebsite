@extends('cms.parent')

@section('title' , 'Create Slider')

@section('styles')

@endsection

@section('mainTitle' , 'Create Slider')
@section('subTitle' , 'create slider')

@section('menu-slider-active' , 'menu-open')
@section('main-slider-active' , 'active')
@section('create-slider-active' , 'active')

@section('content')

<div class="container-fluid">

<div class="row">
<!-- left column -->
        <div class="col-lg-12">
            <!-- general form elements -->
            <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Slider</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
            @csrf



            <div class="card-body">

            

                    <div class="form-group">
                        <label for="main_title">Main Title</label>
                        <input type="text" class="form-control" name="main_title" id="main_title" placeholder="Enter Slider Name">
                    </div>

                    <div class="form-group">
                        <label for="sub_title">Sub Title</label>
                        <input type="text" class="form-control" name="sub_title" id="sub_title" placeholder="Enter Street Name">
                    </div>

                    <div class="form-group col-lg-12">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Enter Image" optional>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button onclick="performStore()" type="button" class="btn btn-primary">Save</button>
                    <a href="{{ route('sliders.index') }}" type="button" class="btn btn-primary">Return Back</a>
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



        function performStore(){
            let formData = new FormData();
            formData.append('main_title' , document.getElementById('main_title').value);
            formData.append('sub_title' , document.getElementById('sub_title').value);
            formData.append('image' , document.getElementById('image').files[0]);

            store('/cms/admin/sliders',formData);
        }
        </script>

@endsection
