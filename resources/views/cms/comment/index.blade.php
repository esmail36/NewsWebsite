@extends('cms.parent')

@section('title' , 'Index Comment')

@section('styles')

@endsection

@section('mainTitle' , 'Index Comment')
@section('subTitle' , 'index comment')

@section('menu-comment-active' , 'menu-open')
@section('main-comment-active' , 'active')
@section('index-comment-active' , 'active')

@section('content')
<!-- /.row -->
        <div class="row">
        <div class="col-12">
            <div class="card countainer-fluid">
            <div class="card-header">
                <a type="button" href="{{ route('comments.create') }}" class="btn btn-primary">Add New Comment</a>


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
                    <th>Comment</th>
                    <th>Article Name</th>
                    <th>Settings</th>
                    </tr>
                </thead>
                <tbody>

            @foreach ($comments as $comment)
                <tr>
                <td>{{$comment->comment}}</td>
                <td>{{$comment->article->name}}</td>
                <td>
                    <div class="btn">
                        
                        <a href="#" type="button" onclick="performDestroy({{ $comment->id }} , this)" class="btn btn-danger">
                        Delete
                        </a>


                    </div>
                </td>
                </tr>
            @endforeach
                </tbody>
                </table>


                <div style="text-align: center;">{{ $comments->links() }}</div>
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
        let url = '/cms/admin/comments/' + id ;
        
        confirmDestroy(url , reference);
    }
        </script>

@endsection
