@extends('cms.parent')

@section('title' , 'Index Slider')

@section('styles')

@endsection

@section('mainTitle' , 'Index Slider')
@section('subTitle' , 'index slider')

@section('menu-slider-active' , 'menu-open')
@section('main-slider-active' , 'active')
@section('index-slider-active' , 'active')

@section('content')
<!-- /.row -->
        <div class="row">
        <div class="col-12">
            <div class="card countainer-fluid">
            <div class="card-header">
                <a type="button" href="{{ route('sliders.create') }}" class="btn btn-primary">Add New Slider</a>


                <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                    </div>
                </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                    <th>Imgae</th>
                    <th>Main Title</th>
                    <th>Sub Title</th>
                        <th>Settings</th>
                    </tr>
                </thead>
                <tbody>

            @foreach ($sliders as $slider)
                <tr>
                <td><img class="img-circle img-borderd-sm" src="{{ asset('storage/images/slider/'.$slider->image)}}" width="50" height="50" alt="Slider Image"></td>
                <td>{{$slider->main_title}}</td>
                <td>{{$slider->sub_title}}</td>
                <td>
                    <div class="btn">
                        <a href="{{route('sliders.edit' , $slider->id)}}" type="button" class="btn btn-primary">
                        Edit
                        </a>
                        <a href="#" type="button" onclick="performDestroy({{ $slider->id }} , this)" class="btn btn-danger">
                        Delete
                        </a>


                    </div>
                </td>
                </tr>
            @endforeach
                </tbody>
                </table>


                <div style="text-align: center;">{{ $sliders->links() }}</div>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        </div>
        <!-- /.row -->
@endsection

@section('scripts')

    <script>
    function performDestroy(id , reference){
        let url = '/cms/admin/sliders/' + id ;
        confirmDestroy(url , reference);
    }
        </script>

@endsection
