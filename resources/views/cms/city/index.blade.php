@extends('cms.parent')

@section('title' , 'Index City')

@section('styles')

@endsection

@section('mainTitle' , 'Index City')
@section('subTitle' , 'index city')

@section('menu-city-active' , 'menu-open')
@section('main-city-active' , 'active')
@section('index-city-active' , 'active')

@section('content')
<!-- /.row -->
        <div class="row">
        <div class="col-12">
            <div class="card countainer-fluid">
            <div class="card-header">
                <a type="button" href="{{ route('cities.create') }}" class="btn btn-primary">Add New City</a>


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
                    <th>ID</th>
                    <th>City Name</th>
                    <th>Country Name</th>
                    <th>street</th>
                    <th>Settings</th>
                    </tr>
                </thead>
                <tbody>

            @foreach ($cities as $city)
                <tr>
                <td>{{$city->id}}</td>
                <td>{{$city->city_name}}</td>
                <td>{{$city->country->country_name}}</td>
                <td>{{$city->street}}</td>
                <td>
                    <div class="btn">
                        <a href="{{route('cities.edit' , $city->id)}}" type="button" class="btn btn-primary">
                        Edit
                        </a>
                        <a href="#" type="button" onclick="performDestroy({{ $city->id }} , this)" class="btn btn-danger">
                        Delete
                        </a>


                    </div>
                </td>
                </tr>
            @endforeach
                </tbody>
                </table>


                <div style="text-align: center;">{{ $cities->links() }}</div>
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
        let url = '/cms/admin/cities/' + id ;
        confirmDestroy(url , reference);
    }
        </script>

@endsection
