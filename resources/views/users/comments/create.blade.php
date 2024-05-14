@extends('users.main')

@section('content')
    <div class="d-flex justify-content-between my-3 border-bottom  pb-3">
        <div class="col-sm-1 offset-sm-3">
            <a href="{{ route('home') }}">
                <i class="fa-solid fa-arrow-left fa-xl"></i>
            </a>
        </div>

    </div>
    @foreach ($comments as $comment)
        <div class="d-flex my-3 pb-3">
            <div class="col-sm-1 offset-sm-3 text-center">
                <img src="https://ui-avatars.com/api/?name={{ $comment->user != null ? $comment->user->name : '' }}&rounded=true"
                    alt="" class="avatar-img">
            </div>

            <div class="col-sm-4">
                <div class="comment-body pb-3">
                    <div class="d-flex justify-content-between">
                        <p><b>{{ $comment->user != null ? $comment->user->name : '' }}</b></p>

                        <div class="d-flex comment-edit">
                            @if ($comment->user_id == auth()->user()->id)
                                <a href="{{ route('comments.edit', $comment->id) }}"><i class="fa-solid fa-edit fa-xl"
                                        style="color: gold;"></i></a>
                            @endif

                            @if ($comment->post->user_id == auth()->user()->id || $comment->user_id == auth()->user()->id)
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-default" style="margin-top:-2px;"><i
                                            class="fa-solid fa-trash fa-xl" style="color: red;"></i></button>
                                </form>
                            @endif
                        </div>
                    </div>



                    <p>{{ $comment->text }}</p>
                </div>

                <br>

                <div class="badge bg-secondary mt-1">
                    {{ Carbon\Carbon::parse($comment->created_at)->diffForHumans(null, true) }}
                </div>
            </div>
        </div>
    @endforeach

    <form action="{{ route('comments.store') }}" method="POST" id="comment-submit" autocomplete="off">
        @csrf
        <div class="d-flex">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="col-sm-6 offset-sm-4 comment-text">
                <div class="form-group mt-3">
                    <input type="text" name="text" id="text" class="form-control" oninput="textLen()"
                        placeholder="Comment..." required>
                </div>

            </div>

            <div class="col-sm-1 mt-3">
                <button class="comment-create btn btn-md btn-default" onclick="commentSubmit()"><i
                        class="fa-solid fa-paper-plane fa-xl"></i></button>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script>
        var commentCreate = document.querySelector('.comment-create');
        commentCreate.disabled = true;

        function textLen() {
            var text = document.getElementById('text').value;

            if (text) {
                commentCreate.disabled = false;
                commentCreate.classList.add('icon-color');

            } else {
                document.querySelector('.comment-create').disabled = true;
                commentCreate.classList.remove('icon-color');
            }
        }
    </script>
@endsection
