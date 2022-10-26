@extends('cms.parent')

@section('title' , 'Edit Article')

@section('styles')

@endsection

@section('mainTitle' , 'Edit Article')
@section('subTitle' , 'edit article')

@section('menu-author-active' , 'menu-open')
@section('main-author-active' , 'active')
@section('edit-article-active' , 'active')

@section('content')

<div class="container-fluid">

<div class="row">
<!-- left column -->
        <div class="col-lg-12">
            <!-- general form elements -->
            <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Article</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
            @csrf



            <div class="card-body">

                    <input type="text" name="author_id" id="author_id" value="{{ $articles->author_id }}" class="form-control form-control-solid" hidden/>

                <div class="form-group col-lg-12">
                    <label for="category_id">Category Name</label>
                    <select class="form-control" style="width: 100%;" name="category_id" id="category_id" aria-label=".form-select-sm example">
                                <option selected value="{{  $articles->category->id  }}">{{ $articles->category->name }}</option>
                            @foreach ($categories as $category) 
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach


                    </select>
                    </div>


                    <div class="form-group">
                        <label for="title">Article Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $articles->title }}" placeholder="Enter Title ">
                    </div>

                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <input type="short_description" class="form-control" name="short_description" id="short_description" value="{{ $articles->short_description }}" placeholder="Enter Title ">
                        
                    </div>
                    <div class="form-group">
                        <label for="full_description">Full Description</label>
                        <textarea class="form-control" style="resize : none;" name="full_description" id="full_description" value="{{ $articles->id }}" placeholder="Enter Full Description" cols="50" rows="4">{{ $articles->full_description }}</textarea>
                    </div>

                    <div class="form-group col-lg-12">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Enter Image">
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button onclick="performUpdate({{ $articles->id }})" type="button" class="btn btn-primary">Update</button>
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


        function performUpdate(id){
            let formData = new FormData();
            formData.append('title' , document.getElementById('title').value);
            formData.append('short_description' , document.getElementById('short_description').value);
            formData.append('full_description' , document.getElementById('full_description').value);
            formData.append('category_id' , document.getElementById('category_id').value);
            formData.append('author_id' , document.getElementById('author_id').value);
            formData.append('image' , document.getElementById('image').files[0]);

            store('/cms/admin/articlesUpdate/' + id ,formData);
        }
        </script>

@endsection
