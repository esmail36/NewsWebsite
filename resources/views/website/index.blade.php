
@extends('website.parent')

@section('style')

@endsection

@section('title' , 'Home')

@section('content')
<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            {{-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li> --}}
            {{-- @foreach ($sliders as $slider) --}}
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>

            {{-- @endforeach --}}
            {{-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li> --}}
            {{-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li> --}}
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            @foreach ($sliders as $slider)
            <div class="carousel-item @if ($loop->first) active @endif" style="background-image: url('{{ url('storage/images/slider/' . $slider->image) }}')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>{{ $slider->main_title }}</h3>
                    <p>{{ $slider->sub_title }}</p>
                </div>
            </div>
            @endforeach
            
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>

<!-- Page Content -->

<div class="container">

    <h3 class="my-4">last news</h3>

    <!-- Marketing Icons Section -->
    <div class="row">
        @foreach ($articles as  $article)
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <h4 class="card-header">{{ $article->title }}</h4>
                <div class="card-body">
                    <p class="card-text">{{ $article->short_description }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('news.detailes' , $article->id) }}" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
    <!-- /.row -->
</div>

{{-- @foreach ($categories as $category) --}}
{{-- @if ($category->id % 2 !== 0)  --}}
    {{-- <section class=""> --}}

    {{-- @else --}}
    <section class="gray-sec">
{{-- @endif --}}
{{-- @endforeach --}}
    <div class="container">
        <!-- category Section -->

        
            
        
        @foreach ($categories as $category)
        <h3 class="my-4">{{ $category->name }}</h3>

        <div class="row">
            @foreach ($category->articles as $article)
            
                @if ($article->category_id == $category->id)
                
                    <div class="col-lg-4 col-sm-6 portfolio-item">
                        <div class="card h-100">
                            <a href="{{ route('news.detailes' , $article->id) }}"><img class="card-img-top" src="{{ asset('storage/images/article/'.$article->image) }}" alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ route('news.detailes' , $article->id) }}">{{ $article->title }}</a>
                                </h4>
                                <p class="card-text">{{ $article->short_description }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('news.detailes' , $article->id) }}" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                    </div>

                @endif
                
            @endforeach
            
            
        </div>
        <div align="center"><a class="btn btn-success" href="{{ route('website.allNews' , $category->id) }}">more news</a></div>
        
        @endforeach
    </div>
</section>



<section>
    <div class="container">
        <!--  Section -->
        <div class="row">
            <div class="col-lg-6">
                <h3>main news title</h3>
                <p>The Modern Business template by Start Bootstrap includes:</p>
                <ul>
                    <li>
                        <strong>Bootstrap v4</strong>
                    </li>
                    <li>jQuery</li>
                    <li>Font Awesome</li>
                    <li>Working contact form with validation</li>
                    <li>Unstyled page elements for easy customization</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id
                    reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia
                    dolorum ducimus unde.</p>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded full-width" src="img/6.jpeg" alt="" style="">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="row mb-4">
            <div class="col-md-8">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum
                    deleniti
                    beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
            </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-secondary btn-block" href="#">contact us</a>
            </div>
        </div>
    </div>
    <!-- /.container -->

</section>

@endsection

@section('script')

@endsection