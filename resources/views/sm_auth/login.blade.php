@extends('sm_auth.main')

@section('content')
    <div class="row mt-5">
        <div class="col-sm-4 offset-sm-4">
            <div class="card mt-5">
                <div class="card-body">
                    <h1 class="text-center header-color mt-5">SM</h1>
                    <form action="{{ route('login') }}" method="POST">

                        @csrf
                        <div class="form-group mt-5">
                            <label class="control-label" for="email">Email</label>
                            <input type="email" required="" name="email" id="email" class="form-control">

                        </div>
                        <div class="form-group mt-4">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" required="" name="password" id="password" class="form-control">
                        </div>

                        <button class="btn btn-block w-100 mt-5 btn-color">Login</button>

                        <a class="btn btn-success btn-block w-100 mt-4 mb-5" href="{{ route('registerPage') }}">Create New
                            Account</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
