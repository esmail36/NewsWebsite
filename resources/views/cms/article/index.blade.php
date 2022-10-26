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
                <a type="button" href="{{ route('createArticle' , $id) }}" class="btn btn-primary">Add New Article</a>


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
                    <th>Article Title</th>
                    <th>Description</th>
                    <th>Settings</th>
                    </tr>
                </thead>
                <tbody>

            @foreach ($articles as $article)
                <tr>
                <td>{{$article->id}}</td>
                <td>{{$article->category->name}}</td>
                <td>{{$article->title}}</td>
                <td>{{$article->short_description}}</td>
                
                @canAny(['Edit-Article' , 'Delete-Article'])
                <td>
                    <div class="btn">
                        @can('Edit-Article')
                        <a href="{{route('articles.edit' , $article->id , $id)}}" type="button" class="btn btn-primary">
                            Edit
                            </a>
                        @endcan
                        
                        @can('Delete-Article')
                        <a href="#" type="button" onclick="performDestroy({{ $article->id }} , this)" class="btn btn-danger">
                            Delete
                            </a>
                        @endcan


                    </div>
                </td>
                @endCanAny
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
        let url = '/cms/admin/articles/' + id ;
        confirmDestroy(url , reference);
    }
        </script>

@endsection
