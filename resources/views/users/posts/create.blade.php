@extends('users.main')

@section('content')
    <form action="{{ route('posts.store') }}" method="POST" id="post-submit">
        @csrf

        <div class="d-flex justify-content-between my-3 border-bottom  pb-3">
            <div class="col-sm-1 offset-sm-3">
                <a href="{{ route('home') }}">
                    <i class="fa-solid fa-arrow-left fa-xl"></i>
                </a>
            </div>

            <div class="col-sm-4">
                <h5>Create post</h5>
            </div>

            <div class="col-sm-4">
                <button class="btn btn-md btn-color post-create" onclick="postSubmit()">POST</button>
            </div>

        </div>
        <div class="d-flex my-3 border-bottom border-5 pb-3">
            <div class="col-sm-1 offset-sm-3">
                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&rounded=true" alt=""
                    class="avatar-img">
            </div>

            <div class="col-sm-5">
                <h3 class="post-auth-name">{{ auth()->user()->name }}</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="form-group mt-3">
                    <input type="text" name="title" id="title" class="form-control" oninput="textLen()"
                        placeholder="Enter title...">
                </div>

                <div class="form-group mt-3">
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control" oninput="textLen()"
                        placeholder="What's on your mind?"></textarea>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script>
        document.querySelector('.post-create').disabled = true;

        function textLen() {
            var title = document.getElementById('title').value;
            var body = document.getElementById('body').value;
            console.log(body);

            if (title || body) {
                document.querySelector('.post-create').disabled = false;
            } else {
                document.querySelector('.post-create').disabled = true;
            }
        }

        function postSubmit() {
            document.querySelector('#post-submit').submit();
        }
    </script>
@endsection
