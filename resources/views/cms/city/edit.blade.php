@extends('cms.parent')

@section('title' , 'Edit City')

@section('styles')

@endsection

@section('mainTitle' , 'Edit City')
@section('subTitle' , 'Edit city')

@section('content')

<div class="container-fluid">

<div class="row">
<!-- left column -->
        <div class="col-lg-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit City</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                @csrf

                <div class="form-group">
                    <label for="country_id">Country name</label>
                    <select class="form-control" style="width: 100%;" name="country_id" id="country_id" aria-label=".form-select-sm example">
                            <option value="{{ $cities->country->id }}">{{ $cities->country->country_name }}</option>

                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="card-body">
                  <div class="form-group">
                    <label for="city_name">City Name</label>
                    <input type="text" class="form-control" name="city_name" id="city_name" value="{{$cities->city_name}}" placeholder="Enter City Name">
                  </div>
                  <div class="form-group">
                    <label for="street">street</label>
                    <input type="text" class="form-control" name="street" id="street" value="{{$cities->street}}" placeholder="Enter Street Name">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a type="button" href="#" onclick="performUpdate({{ $cities->id }} , this)" class="btn btn-primary">Update</a>
                  <a href="{{ route('cities.index') }}" type="button" class="btn btn-primary">Return Back</a>
                </div>
              </form>
            </div>
            <!-- /.card -->

        </div>
        <!--/.col (left) -->
</div>
</div>
@endsection

@section('scripts')

<script>

        {{-- $('.country_id').select2({
        theme: 'bootstrap4'
        }) --}}

        function performUpdate(id){
            let formData = new FormData();
            formData.append('city_name' , document.getElementById('city_name').value);
            formData.append('street' , document.getElementById('street').value);
            formData.append('country_id' , document.getElementById('country_id').value);

            storeRoute('/cms/admin/citiesUpdate/' + id , formData);
        }
        </script>

@endsection
