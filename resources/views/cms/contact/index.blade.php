@extends('cms.parent')

@section('title' , 'Index Contact')

@section('styles')

@endsection

@section('mainTitle' , 'Index Contact')
@section('subTitle' , 'index contact')

@section('menu-contact-active' , 'menu-open')
@section('main-contact-active' , 'active')
@section('index-contact-active' , 'active')

@section('content')
<!-- /.row -->
        <div class="row">
        <div class="col-12">
            <div class="card countainer-fluid">
            <div class="card-header">
                <a type="button" href="{{ route('cities.create') }}" class="btn btn-primary">Add New Contact</a>


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
                    
                    <th>Full Name</th>
                    <th>Phone Number</th>
                    <th>Email Address</th>
                    <th>Message</th>
                    </tr>
                </thead>
                <tbody>

            @foreach ($contacts as $contact)
                <tr>
                
                <td>{{$contact->Full_name}}</td>
                <td>{{$contact->phone}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->message}}</td>
                
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
