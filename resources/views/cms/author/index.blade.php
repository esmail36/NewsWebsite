@extends('cms.parent')

@section('title' , 'Index Author')

@section('styles')

@endsection

@section('mainTitle' , 'Index Author')
@section('subTitle' , 'index author')


@section('menu-author-active' , 'menu-open')
@section('main-author-active' , 'active')
@section('index-author-active' , 'active')

@section('content')
<div class="container-fluid">
<!-- /.row -->
        <div class="row">
        <div class="col-12">
            <div class="card countainer-fluid">
            <div class="card-header">
                <a type="button" href="{{ route('authors.create') }}" class="btn btn-primary">Add New Author</a>

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
                    <th>Full Name</th>
                    {{-- <th>Last Name</th> --}}
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Mobile</th>
                    <th>Country Name</th>
                    <th>Articles</th>
                    <th>Image</th>
                    </tr>
                </thead>
                <tbody>

            @foreach ($authors as $author)
                <tr>
                <td>{{$author->id}}</td>
                <td>{{$author->user ? $author->user->first_name . ' ' . $author->user->last_name : "Not Found"}}</td>
                {{-- <td>{{$author->user ? $author->user->last_name : "Not Found"}}</td> --}}
                <td>{{$author ? $author->email : "Not Found"}}</td>
                <td>{{$author->user ? $author->user->gender : "Not Found"}}</td>

                <td>{{$author->user ? $author->user->country->country_name : "Not Found"}}</td>
                <td><a href="{{ route('indexArticle',['id'=>$author->id]) }}" class="btn btn-info">({{ $author->articles_count }}) Article/s</a></td>

                <td>{{$author->user ? $author->user->mobile : "Not Found"}}</td>
                <td><img class="img-circle img-borderd-sm" src="{{ asset('storage/images/author/'.$author->user->image)}}" width="50" height="50" alt="User Image"> </td>
                <td>
                <td>
                    <div class="btn">
                        <a href="{{route('authors.edit' , $author->id)}}" type="button" class="btn btn-primary">
                        Edit
                        </a>
                        <a href="#" type="button" onclick="performDestroy({{ $author->id }} , this)" class="btn btn-danger">
                        Delete
                        </a>


                    </div>
                </td>
                </tr>
            @endforeach
                </tbody>
                </table>


                {{ $authors->links() }}
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        </div>
        <!-- /.row -->
</div>
@endsection

@section('scripts')

    <script>

    $('.country_id').select2({
        theme: 'bootstrap4'
        })


    function performDestroy(id , reference){
        let url = '/cms/admin/authors/' + id ;
        confirmDestroy(url , reference);
    }
        </script>

@endsection
