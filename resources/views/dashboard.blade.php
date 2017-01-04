@extends('layouts/master')

@section('title')
    Dashboard
@endsection

@section('body')
    @include('includes.message-block')
    <section class="row new-post">
        <div class="col-md-10 col-md-offset-1">
            <header><h3>What did you do today?</h3></header>
            <form method="post" action="{{ route('post.create') }}">
                <div class="form-group">
                    <label for="day">Day #</label>
                    <input type="number" class="form-control" name="day" id="day">
                </div>
                <div class="form-group">
                    <label for="body">Post</label>
                    <textarea class="form-control" name="body" id="new-post"  rows="3" placeholder="Tell me what you did..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
                <input type="hidden" value="{{ Session::token()}}" name="_token">
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-10 col-md-offset-1">
            <header><h3>What other people did...</h3></header>
            @foreach($posts as $post)
                @include('includes.post', ['post'=>$post])
            @endforeach
        </div>
    </section>
    <script>
        var token = '{{ Session::token() }}'
        var url = '{{ route('post.edit') }}'
    </script>
@endsection

{{--Edit Modal--}}
@include('includes.modals.base', ['id'=>'edit-post-modal', 'title'=>'Edit Post', 'dismiss'=>null, 'save'=>null, 'variables'=>[]])