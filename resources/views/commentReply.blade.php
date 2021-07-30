@foreach ($replys as $reply)
    
<ol class="children">
  <li class="single_comment_area">
    <!-- Comment Content -->
    <div class="comment-content d-flex">
      <!-- Comment Author -->
      <div class="comment-author">
        <img src="img/bg-img/27.jpg" alt="author">
      </div>
      <!-- Comment Meta -->
      <div class="comment-meta">
        <a href="#" class="post-author">{{ $reply->user->name}} / <span>{{ $comment->created_at->format('j F, Y \\a\\t h:i A')}}</span></a>
        <p>{{ $reply->body }}.</p>
        <a href="#" class="comment-reply">Reply</a>
      </div>
    </div>
  </li>
</ol>
@endforeach