@extends('cms.parent')

@section('title' , 'Create Article')

@section('styles')

@endsection

@section('mainTitle' , 'Create Article')
@section('subTitle' , 'create article')

@section('menu-author-active' , 'menu-open')
@section('main-author-active' , 'active')
@section('create-article-active' , 'active')

@section('content')

<div class="container-fluid">

<div class="row">
<!-- left column -->
        <div class="col-lg-12">
            <!-- general form elements -->
            <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Article</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
            @csrf



            <div class="card-body">


                    <input type="text" name="author_id" id="author_id" value="{{ $id }}" class="form-control form-control-solid" hidden/>

                    <div class="form-group col-lg-12">
                        <label for="category_id">Category Name</label>
                        <select class="form-control" style="width: 100%;" name="category_id" id="category_id" aria-label=".form-select-sm example">

                            @foreach ($categories as $category) 
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach


                    </select>
                    </div>
                    

                    <div class="form-group">
                        <label for="title">Article Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title ">
                    </div>

                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <input type="short_description" class="form-control" name="short_description" id="short_description" placeholder="Enter Title ">
                        
                    </div>
                    <div class="form-group">
                        <label for="full_description">Full Description</label>
                        <textarea class="form-control" style="resize : none;" name="short_description" id="full_description" placeholder="Enter Full Description" cols="50" rows="4"></textarea>
                    </div>

                    <div class="form-group col-lg-12">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Enter Image">
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button onclick="performStore()" type="button" class="btn btn-primary">Save</button>
                    <a href="{{ route('authors.index') }}" type="button" class="btn btn-primary">Return Back</a>
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


        function performStore(){
            let formData = new FormData();
            formData.append('title' , document.getElementById('title').value);
            formData.append('short_description' , document.getElementById('short_description').value);
            formData.append('full_description' , document.getElementById('full_description').value);
            formData.append('category_id' , document.getElementById('category_id').value);
            formData.append('author_id' , document.getElementById('author_id').value);
            formData.append('image' , document.getElementById('image').files[0]);

            store('/cms/admin/articles' , formData);
        }
        </script>

@endsection
