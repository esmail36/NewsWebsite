@extends('website.parent')

@section('title' , 'All-News')

@section('style')
  
@endsection

@section('content')
    <!-- Page Content -->
    <div class="container">

      <input type="text" name="category_id" id="category_id" value="{{ $id }}" class="form-control form-control-solid" hidden/>

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">{{ $categories->name }}
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('website.home') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Portfolio 1</li>
      </ol>

      <!-- news title One -->
      @foreach ($articles as $article)
      <div class="row">
        <div class="col-md-7">
          <a href="{{ route('news.detailes' , $article->id) }}">
            <img class="img-fluid full-width h-200 rounded mb-3 mb-md-0" src="{{ asset('storage/images/article/'. $article->image) }}" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3>{{ $article->title }}</h3>
          <p>{{ $article->short_description }}</p>
          <a class="btn btn-primary" href="{{ route('news.detailes' , $article->id) }}">View {{ $article->title }}
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
      </div>
        <hr>
      @endforeach
      <!-- /.row -->


  
    <div style="display: flex; justify-content: center;">
      {{ $articles->links() }}
    </div>

    </div>
    <!-- /.container -->

@endsection

@section('script')
  
@endsection