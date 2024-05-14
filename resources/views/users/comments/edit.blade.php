@extends('users.main')

@section('content')
    <div class="d-flex justify-content-between my-3 border-bottom  pb-3">
        <div class="col-sm-1 offset-sm-3">
            <a href="{{ route('commentPage', $comment->post_id) }}">
                <i class="fa-solid fa-arrow-left fa-xl"></i>
            </a>
        </div>

        <div class="col-sm-4">
            <h5>Edit</h5>
        </div>

    </div>
    <div class="d-flex my-3 pb-3">
        <div class="col-sm-1 offset-sm-3 text-center comment-edit-avatar">
            <img src="https://ui-avatars.com/api/?name={{ $comment->user != null ? $comment->user->name : '' }}&rounded=true"
                alt="" class="avatar-img">
        </div>

        <div class="col-sm-4">
            <form action="{{ route('comments.update', $comment->id) }}" method="POST" id="comment-submit"
                autocomplete="off">
                @csrf
                @method('PUT')

                <input type="hidden" name="post_id" value="{{ $comment->post_id }}">

                <div class="form-group">
                    <input type="text" name="text" id="text" class="form-control" value="{{ $comment->text }}"
                        oninput="textLen()">
                </div>

                <div class="text-end mt-1">
                    <a href="{{ route('commentPage', $comment->post_id) }}"><button type="button"
                            class="btn btn-sm btn-danger">Cancel</button></a>


                    <button class="comment-create btn btn-sm btn-success" onclick="commentSubmit()">Update</button>
                </div>

            </form>

        </div>
    </div>

    {{-- <form action="{{ route('comments.store') }}" method="POST" id="comment-submit" autocomplete="off">
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
    </form> --}}
@endsection

@section('script')
    <script>
        var commentCreate = document.querySelector('.comment-create');
        commentCreate.disabled = true;

        function textLen() {
            var text = document.getElementById('text').value;

            if (text) {
                commentCreate.disabled = false;
                commentCreate.classList.add('btn-color');

            } else {
                document.querySelector('.comment-create').disabled = true;
                commentCreate.classList.remove('btn-color');
            }
        }

        function commentSubmit() {
            document.querySelector('#comment-submit').submit();
        }
    </script>
@endsection
