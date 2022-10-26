@extends('cms.parent')

@section('title' , 'Index Article')

@section('styles')

@endsection

@section('mainTitle' , 'Index Article')
@section('subTitle' , 'index article')

@section('menu-article-active' , 'menu-open')
@section('main-article-active' , 'active')
@section('index-article-active' , 'active')

@section('content')
<!-- /.row -->
        <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                {{-- <a type="button" href="{{ route('createArticle' , $id) }}" class="btn btn-primary">Add New Article</a> --}}


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
                    <th>Article Title</th>
                    <th>Category Name</th>
                    <th>Author Name</th>
                    <th>Image</th>
                    {{-- <th>Settings</th> --}}
                    </tr>
                </thead>
                <tbody>

            @foreach ($articles as $article)
                <tr>
                <td>{{$article->id}}</td>
                <td>{{$article->title}}</td>
                <td>{{$article->category->name}}</td>
                <td>{{$article->author ? $article->author->user->first_name . ' ' . $article->author->user->last_name : "Not Found"}}</td>
                <td><img class="img-circle img-borderd-sm" src="{{ asset('storage/images/article/'.$article->image)}}" width="50" height="50" alt="User Image"> </td>
                <td>
                    {{-- <div class="btn">
                        <a href="{{route('articles.edit' , $article->id)}}" type="button" class="btn btn-primary">
                        Edit
                        </a>
                        <a href="#" type="button" onclick="performDestroy({{ $article->id }} , this)" class="btn btn-danger">
                        Delete
                        </a>


                    </div> --}}
                </td>
                </tr>
            @endforeach
                </tbody>
                </table>


                <div style="text-align: center;">{{ $articles->links() }}</div>
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
        let url = '/cms/admin/articles' ;
        confirmDestroy(url , reference);
    }
        </script>

@endsection
