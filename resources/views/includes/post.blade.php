<article class="post" data-postid="{{ $post->id }}">
    <h4 class="day">Day <span>{{ $post->day }}</span></h4>
    <p class="post-body">{{ $post->body }}</p>
    <div class="info">Posted by {{ $post->user->name }} on {{ date_format($post->created_at, 'l jS F Y') }}</div>
    <div class="interaction">
        @if(Auth::user() == $post->user)
            <a class="post-edit" href="#">Edit</a> |
            <a class="post-delete" href="{{ route('post.delete', ['post_id' => $post->id]) }}">Delete</a>
        @else
            <a class="post-like" href="#">Like</a> |
            <a class="post-dislike" href="#">Dislike</a>
        @endif
    </div>
</article>