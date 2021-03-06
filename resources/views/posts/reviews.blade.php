@extends('layout')

@section('content')

<div class="container pt-5 mt-5">

    @foreach ($posts as $post)
    <div class="card mb-4">
        <div class="card-header">
            {{ $post->title }}
        </div>
        <div class="card-body">
            <p class="card-text">
                {!! nl2br(e(Str::limit($post->body, 200))) !!}
            </p>
            <a href="{{route('posts.show',  ['post' => $post])}}" class="card-link">続きを読む</a>
        </div>
        <div class="card-footer">
            <span class="mr-4">
                {{$post->bookstore->name}}
            </span>
            <span class="mr-4">
                投稿者:{{$authUser->name}}
            </span>
            <span class="mr-4">
                投稿日時: {{ $post->created_at->format('Y.m.d') }}
            </span>
            @if ($post->comments->count())
            <span class="badge badge-primary">
                コメント {{ $post->comments->count() }}件
            </span>
            @endif
        </div>
    </div>
    @endforeach
    <div class="d-flex justify-content-center mb-5">
        {{$posts->links()}}
    </div>
</div>
@endsection