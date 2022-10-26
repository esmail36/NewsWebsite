@extends('cms.parent')

@section('title' , 'Index Category')

@section('styles')

@endsection

@section('mainTitle' , 'Index Category')
@section('subTitle' , 'index category')

@section('menu-category-active' , 'menu-open')
@section('main-category-active' , 'active')
@section('index-category-active' , 'active')

@section('content')
<!-- /.row -->
        <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <a type="button" href="{{ route('categories.create') }}" class="btn btn-primary">Add New Category</a>


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
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Settings</th>
                    </tr>
                </thead>
                <tbody>

            @foreach ($categories as $category)
                <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>
                <td>
                    <div class="btn">
                        <a href="{{route('categories.edit' , $category->id)}}" type="button" class="btn btn-primary">
                        Edit
                        </a>
                        <a href="#" type="button" onclick="performDestroy({{ $category->id }} , this)" class="btn btn-danger">
                        Delete
                        </a>


                    </div>
                </td>
                </tr>
            @endforeach
                </tbody>
                </table>


                <div style="text-align: center;">{{ $categories->links() }}</div>
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
        let url = '/cms/admin/categories/' + id ;
        confirmDestroy(url , reference);
    }
        </script>

@endsection
