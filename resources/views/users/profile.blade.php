@extends('users.main')

@section('bar-active', 'active')

@section('content')
    @include('users.nav')

    @foreach ($posts as $post)
        <div class="d-flex justify-content-between w-75 my-3">
            <div class="col-sm-6 offset-sm-4">
                <div class="d-flex">
                    <img src="https://ui-avatars.com/api/?name={{ $post->user != null ? $post->user->name : '' }}&rounded=true"
                        alt="" class="avatar-img">

                    <h5 class="post-name mt-1">{{ $post->user != null ? $post->user->name : '' }}</h5>
                </div>

                <p class="post-time text-muted"> {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
            </div>

            <div class="col-sm-2 d-flex">
                <a href="{{ route('posts.edit', $post->id) }}"><i class="fa-solid fa-edit fa-xl"
                        style="color: gold;"></i></a>

                <div>

                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-sm btn-default" style="margin-top:-2px;"><i
                                class="fa-solid fa-trash fa-xl" style="color: red;"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row my-3">
            <div class="col-sm-5 offset-sm-3">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h4>{{ $post->title }}</h4>

                        <p>
                            {{ $post->body }}
                        </p>
                    </div>

                    <div class="card-footer mb-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <i class="fa-solid fa-thumbs-up fa-xl"></i> Like
                            </div>

                            <div>
                                <i class="fa-regular fa-comment fa-xl"></i> Comment
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

@section('script')
    <script></script>
@endsection
