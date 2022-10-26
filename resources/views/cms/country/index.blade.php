@extends('cms.parent')

@section('title' , 'Index Country')

@section('styles')

@endsection

@section('mainTitle' , 'Index Country')
@section('subTitle' , 'index country')

@section('menu-country-active' , 'menu-open')
@section('main-country-active' , 'active')
@section('index-country-active' , 'active')

@section('content')
<!-- /.row -->
        <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <a type="button" href="{{ route('countries.create') }}" class="btn btn-primary">Add New Country</a>


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
                    <th>Country Name</th>
                    <th>Code</th>
                    <th>Number Of Cities</th>
                    <th>Settings</th>
                    </tr>
                </thead>
                <tbody>

            @foreach ($countries as $country)
                <tr>
                <td>{{$country->id}}</td>
                <td>{{$country->country_name}}</td>
                <td>{{$country->code}}</td>
                <td span class="badge bg-success">{{$country->cities_count}}</td>
                <td>
                    <div class="btn" style="display : flex; gap : 10px" >
                        <a href="{{route('countries.edit' , $country->id)}}" type="button" class="btn btn-primary">
                            Edit
                        </a>
                        <form action="{{route('countries.destroy' , $country->id)}} " method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                        </form>

                    </div>
                </td>

                </tr>
            @endforeach
                </tbody>
                </table>

                {{ $countries->links() }}
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        </div>
        <!-- /.row -->
@endsection

@section('scripts')

@endsection
