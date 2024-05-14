@extends('users.main')

@section('home', 'active')

@section('content')
    @include('users.nav')
    <div class="d-flex my-3 border-bottom border-5 pb-3">
        <div class="col-sm-1 offset-sm-3">
            <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&rounded=true" alt=""
                class="avatar-img">
        </div>

        <div class="col-sm-5">
            <a href="{{ route('posts.create') }}">
                <span class="post-page">What's on your mind?</span>
            </a>
        </div>
    </div>

    @foreach ($posts as $post)
        <div class="d-flex justify-content-between w-75">
            <div class="col-sm-6 offset-sm-4">
                <div class="d-flex">
                    <img src="https://ui-avatars.com/api/?name={{ $post->user != null ? $post->user->name : '' }}&rounded=true"
                        alt="" class="avatar-img">

                    <h5 class="post-name mt-1">{{ $post->user != null ? $post->user->name : '' }}</h5>
                </div>

                <p class="post-time text-muted"> {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
            </div>

            <div class="col-sm-2">
                <i class="fa-solid fa-ellipsis fa-xl"></i>
            </div>
        </div>

        <div class="row my-3">
            <div class="col-sm-5 offset-sm-3">
                <div class="card bg-dark text-white">
                    @if (Str::length($post->body) > 100)
                        <a href="{{ route('homeDetail', $post->id) }}" style="color: #fff;">
                    @endif

                    <div class="card-body">
                        <h4>{{ $post->title }}</h4>


                        <p>
                            {{ Str::limit($post->body, 100) }}
                        </p>

                    </div>
                    @if (Str::length($post->body) > 100)
                        </a>
                    @endif

                    <div class="card-footer mb-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <i class="fa-solid fa-thumbs-up fa-xl"></i> Like
                            </div>

                            <div>
                                <a href="{{ route('commentPage', $post->id) }}" style="color: #fff;"><i
                                        class="fa-regular fa-comment fa-xl"></i>
                                    Comment</a>
                            </div>

                            <div>
                                <i class="fa-brands fa-facebook-messenger fa-xl"></i> Send
                            </div>

                            <div>
                                <i class="fa-solid fa-share fa-xl"></i> Share
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
