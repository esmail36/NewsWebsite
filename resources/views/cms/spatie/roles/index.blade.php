@extends('cms.parent')

@section('title' , 'Index Role')

@section('styles')

@endsection

@section('mainTitle' , 'Index Role')
@section('subTitle' , 'index role')

@section('menu-roles-active' , 'menu-open')
@section('main-roles-active' , 'active')
@section('index-roles-active' , 'active')

@section('content')
<!-- /.row -->
        <div class="row container-fluid">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <a type="button" href="{{ route('roles.create') }}" class="btn btn-primary">Add New Role</a>


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
                    <th>Role Name</th>
                    <th>Permissions</th>
                    <th>Guard Name</th>
                    <th>Settings</th>
                    </tr>
                </thead>
                <tbody>

            @foreach ($roles as $role)
                <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>
                    <a href="{{ route('roles.permissions.index' , $role->id)}}" class="btn btn-primary" >({{ $role->permissions_count }}) Permission/s</a>
                </td>
                <td>{{$role->guard_name}}</td>
                <td>
                    <div class="btn">
                        <a href="{{route('roles.edit' , $role->id)}}" type="button" class="btn btn-primary">
                        Edit
                        </a>
                        <a href="#" type="button" onclick="performDestroy({{ $role->id }} , this)" class="btn btn-danger">
                        Delete
                        </a>


                    </div>
                </td>
                </tr>
            @endforeach
                </tbody>
                </table>


                {{-- <div style="text-align: center;">{{ $roles->links() }}</div> --}}
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        </div>
        <!-- /.row -->
        {{ $roles->links() }}
@endsection

@section('scripts')

    <script>
    function performDestroy(id , reference){
        let url = '/cms/admin/roles/' + id ;
        confirmDestroy(url , reference);
    }
        </script>

@endsection
