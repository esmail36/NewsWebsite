@extends('website.parent')

@section('title' , 'News Details')

@section('style')
  
@endsection

@section('content')

    <!-- Page Content -->
    <div class="container">

      <input type="text" name="article_id" id="article_id" value="{{ $id }}" class="form-control form-control-solid" hidden/>

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">{{ $articles->title }}

      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('website.home') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">news deatiles</li>
      </ol>

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="{{ asset('storage/images/article/'. $articles->image) }}" alt="">

          <hr>

          <!-- Date/Time -->
          <p>Posted on {{ $articles->created_at }}</p>

          <hr>

          <!-- Post Content -->
          <p class="lead">{{ $articles->short_description }}</p>

          <p>{{ $articles->full_description }}</p>

          <hr>

          <!-- Comments Form -->
          @if (Auth::user())
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                    <input type="text" name="article_id" id="article_id" value="{{ $id }}" class="form-control form-control-solid" hidden/>

                      <input type="text" name="visitor_id" id="visitor_id" value="{{ Auth::user()->id }}" class="form-control form-control-solid" hidden/>

                      
                </div>
                <button type="button" onclick="performStore()" class="btn btn-primary">Comment</button>
              </form>
            </div>
          </div>
          @else
          <span>You Have To Be <a href="{{ route('login') }}" style="color: rgb(218, 3, 3); text-transform: capitalize;">Login</a> To Comment</span>
          <div class="card my-4">
            
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <textarea class="form-control" rows="3" data-toggle="modal" data-target="#exampleModal"></textarea>

                  
                </div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Comment
                </button>
                
                {{-- <button type="button"class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Comment</button> --}}
              </form>
            </div>
          </div>
          @endif
          <hr>

          <!-- Single Comment -->
          @foreach ($comments as $comment )
          <div class="media mb-4" style="margin-top: 40px">

            @if ($comment->visitor->image != null)
            <img class="d-flex mr-3 rounded-circle" src="{{ asset('storage/images/visitor/'.$comment->visitor->image) }}" alt="" width="60" height="60">
            <div class="media-body">

              @else
              <img class="d-flex mr-3 rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" width="60" height="60">
              <div class="media-body">
            @endif
            
              <div class="comment" style="display: flex;
              justify-content: space-between; align-items: center;">
                <div class="content">
                  <h5 class="mt-0">{{ $comment->visitor->full_name }}</h5>
                <p>{{ $comment->comment }}</p>
                </div>
                <div class="time">
                  <span style="color: rgb(112, 107, 107); font-size: 14px">{{ $comment->created_at->diffForHumans()
                  }}</span>
                </div>
              </div>
              <div class="btn-reply">
                @if (Auth::user())
                <button type="button" id="reply" class="reply">Reply</button>
                {{-- <button class="replybutton" class="reply" data-commentbox="panel1">Reply</button> --}}
                @else
                <button type="button" id="reply" class="reply" data-toggle="modal" data-target="#exampleModal">Reply</button>
                
                @endif
              </div>

              

              {{-- <div class="replybox" id="panel1" style="display:none">
              <textarea cols="35" rows="8"></textarea><br/>
              <button class="cancelbutton">Cancel</button><br/><br/>
              </div> --}}
              
              {{-- <div class="reply-comment" id="reply-comment">
                <textarea placeholder="Reply to comment" class="reply-txt col-md-12" rows="4"></textarea>
              <button type="submit" style="display: block">Submit</button>
              <button type="button" data-toggle="reply-form" data-target="comment-2-reply-form">Cancel</button>
              </div> --}}
            </div>
              <!-- Reply form start -->
            
              
          
          <!-- Reply form end -->
          </div>
          @endforeach



          
          <!-- Comment with nested comments -->
          {{-- <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>

              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>

            </div>
          </div> --}}

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-lg-4 col-sm-10 col-sm-offset-2">
          <h4 style="margin-bottom: 1em ;">Related Articles</h4>
        
            

          
          @foreach ($allArticles as $allArticle)
            @if ($allArticle->category_id == $articles->category_id)
              {{-- @for ($allArticle->id = 1 ; $allArticle->id < 4 ; $allArticle->id++) --}}

                <div class="card article-box">
                  <div class="article-img"><a href="{{ route('news.detailes' , $allArticle->id) }}"><img class="card-img-top" src="{{ asset('storage/images/article/'.$allArticle->image) }}" alt=""></a></div>
                  <div class="card-body">
                      <h4 class="card-title">
                          <a href="{{ route('news.detailes' , $allArticle->id) }}">{{ $allArticle->title }}</a>
                      </h4>
                      <p class="card-text short-des">{{ $allArticle->short_description }}</p>
                  </div>
                  {{-- <div class="card-footer">
                      
                  </div> --}}
              </div>
              
              {{-- @endfor --}}
                        
                    
              @endif
            @endforeach

          </div>

        </div>

        {{-- <div class="col-md-4">
          <h3 style="margin-bottom: 1em;
          text-align: center">Related Articles</h3>
          <!-- Side Widget -->
          @foreach ($allArticles as $allArticle)
            @if ($allArticle->category_id == $articles->category_id)
            <div class="card my-4">
            
              <h5 class="card-header">{{ $allArticle->title }}</h5>
              <div class="card-body row">
                <div class="col-lg-4">
                  <img src="{{ asset('storage/images/article/'.$allArticle->image) }}" style="width: auto;
                  height: auto;" alt="">
                </div>
              </div>
            </div>
            @endif
          @endforeach

        </div> --}}

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Didn't Login Yet ! <i class="fas fa-grin-beam"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          
        </button>
      </div>
      <div class="modal-body">
        <i class="fas fa-sign-in-alt"></i>
        <p><q>Login To Comment , And access to other advanced settings</q></p>
        <span>So What Are You Waiting! Click Down Below and Join us <i class="fas fa-arrow-down" style="font-size: 14px;"></i></span>
        
      </div>
      <div class="modal-footer">
        <a href="{{ route('login') }}" class="btn btn-primary btn-block">Login</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
  
<script>

  function performStore(){
      let formData = new FormData();
      formData.append('comment' , document.getElementById('comment').value);
      formData.append('article_id' , document.getElementById('article_id').value);
      formData.append('visitor_id' , document.getElementById('visitor_id').value);

      store('/home/comment',formData);
  }
  </script>

@endsection
