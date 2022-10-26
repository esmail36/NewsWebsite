@extends('cms.parent')

@section('title' , 'Index Permission')

@section('styles')

@endsection

@section('mainTitle' , 'Index Permission')
@section('subTitle' , 'index permission')

@section('menu-permissions-active' , 'menu-open')
@section('main-permissions-active' , 'active')
@section('index-permissions-active' , 'active')

@section('content')
<!-- /.row -->
        <div class="row container-fluid">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <a type="button" href="{{ route('permissions.create') }}" class="btn btn-primary">Add New Permission</a>


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
                    <th>Permission Name</th>
                    <th>Guard Name</th>
                    <th>Settings</th>
                    </tr>
                </thead>
                <tbody>

            @foreach ($permissions as $permission)
                <tr>
                <td>{{$permission->id}}</td>
                <td>{{$permission->name}}</td>
                <td>{{$permission->guard_name}}</td>
                <td>
                    <div class="btn">
                        <a href="{{route('permissions.edit' , $permission->id)}}" type="button" class="btn btn-primary">
                        Edit
                        </a>
                        <a href="#" type="button" onclick="performDestroy({{ $permission->id }} , this)" class="btn btn-danger">
                        Delete
                        </a>


                    </div>
                </td>
                </tr>
            @endforeach
                </tbody>
                </table>


                {{-- <div style="text-align: center;">{{ $permissions->links() }}</div> --}}
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        </div>
        <!-- /.row -->

        {{ $permissions->links() }}
@endsection

@section('scripts')

    <script>
    function performDestroy(id , reference){
        let url = '/cms/admin/permissions/' + id ;
        confirmDestroy(url , reference);
    }
        </script>

@endsection
