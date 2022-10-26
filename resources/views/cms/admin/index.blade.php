@extends('cms.parent')

@section('title' , 'Index Admin')

@section('styles')

@endsection

@section('mainTitle' , 'Index Admin')
@section('subTitle' , 'index admin')


@section('menu-admin-active' , 'menu-open')
@section('main-admin-active' , 'active')
@section('index-admin-active' , 'active')

@section('content')
<div class="container-fluid">
<!-- /.row -->
        <div class="row">
        <div class="col-12">
            <div class="card countainer-fluid">
            <div class="card-header">
                <a type="button" href="{{ route('admins.create') }}" class="btn btn-primary">Add New Admin</a>


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
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Mobile</th>
                    <th>Country Name</th>
                    <th>Image</th>
                    </tr>
                </thead>
                <tbody>

            @foreach ($admins as $admin)
                <tr>
                <td>{{$admin->id}}</td>
                <td>{{$admin->user ? $admin->user->first_name : "Not Found"}}</td>
                <td>{{$admin->user ? $admin->user->last_name : "Not Found"}}</td>
                <td>{{$admin ? $admin->email : "Not Found"}}</td>
                <td>{{$admin->user ? $admin->user->gender : "Not Found"}}</td>
                <td>{{$admin->user ? $admin->user->mobile : "Not Found"}}</td>
                <td>{{$admin->user ? $admin->user->country->country_name : "Not Found"}}</td>
                <td><img class="img-circle img-borderd-sm" src="{{ asset('storage/images/admin/'.$admin->user->image)}}" width="50" height="50" alt="User Image"> </td>
                
                @canAny(['Edit-Admin' , 'Delete-Admin'])
                <td>
                    <div class="btn">
                        @can('Edit-Admin')
                        <a href="{{route('admins.edit' , $admin->id)}}" type="button" class="btn btn-primary">
                            Edit
                            </a>
                        @endcan

                        @can('Delete-Admin')
                        <a href="#" type="button" onclick="performDestroy({{ $admin->id }} , this)" class="btn btn-danger">
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


                {{ $admins->links() }}
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
        let url = '/cms/admin/admins/' + id ;
        confirmDestroy(url , reference);
    }
        </script>

@endsection
