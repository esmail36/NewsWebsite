@extends('cms.parent')

@section('title' , 'Edit Slider')

@section('styles')

@endsection

@section('mainTitle' , 'Edit Slider')
@section('subTitle' , 'edit slider')

@section('menu-slider-active' , 'menu-open')
@section('main-slider-active' , 'active')
@section('edit-slider-active' , 'active')

@section('content')

<div class="container-fluid">

<div class="row">
<!-- left column -->
        <div class="col-lg-12">
            <!-- general form elements -->
            <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Slider</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
            @csrf



            <div class="card-body">

            

                    <div class="form-group">
                        <label for="main_title">Main Title</label>
                        <input type="text" class="form-control" name="main_title" id="main_title" value="{{ $sliders->main_title }}" placeholder="Enter Slider Name">
                    </div>

                    <div class="form-group">
                        <label for="sub_title">Sub Title</label>
                        <input type="text" class="form-control" name="sub_title" id="sub_title" value="{{ $sliders->sub_title }}" placeholder="Enter Street Name">
                    </div>

                    <div class="form-group col-lg-12">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Enter Image" optional>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button onclick="performUpdate({{ $sliders->id }})" type="button" class="btn btn-primary">Update</button>
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



        function performUpdate(id){
            let formData = new FormData();
            formData.append('main_title' , document.getElementById('main_title').value);
            formData.append('sub_title' , document.getElementById('sub_title').value);
            formData.append('image' , document.getElementById('image').files[0]);

            storeRoute('/cms/admin/slidersUpdate/' + id ,formData);
        }
        </script>

@endsection
