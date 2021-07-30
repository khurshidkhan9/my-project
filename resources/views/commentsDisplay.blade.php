
    <ol>
      @foreach ($comments as $comment)
          
      <!-- Single Comment Area -->
      <li class="single_comment_area" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <!-- Comment Content -->
        <div class="comment-content d-flex">
          <!-- Comment Author -->
          <div class="comment-author">
            <img src="{{ asset($comment->user->img_path) }}" alt="author">
          </div>
          <!-- Comment Meta -->
          <div class="comment-meta">
            <a href="#" class="post-author">{{ $comment->user->name }} / <span>{{ $comment->created_at->format('j F, Y \\a\\t h:i A')}}</span></a>
            <p>{{ $comment->body }}.</p>
            <form method="post" action="{{ route('comments.store') }}">

              @csrf
              <div class="contact-form">

                
                <div class="form-group">
                  
                  <input type="text" name="body" class="form-control" style="box-sizing: unset;"/>
                  
                  <input type="hidden" name="post_id" value="{{ $post_id }}" />
                  
                  <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                  
                </div>
                
                <div class="form-group">
                  
                  <input type="submit" class="comment-reply" value="Reply" />
                  
                </div>
                
              </div>
          </form>
          </div>
        </div>
        @include('commentsDisplay', ['comments' => $comment->replies])
        {{-- @include('commentReply', ['replys' => $comment->replies]) --}}
      </li>
      @endforeach
    </ol>