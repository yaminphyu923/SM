@extends('sm_auth.main')

@section('content')
    <div class="row mt-5">
        <div class="col-sm-4 offset-sm-4">
            <div class="card mt-3">
                <div class="card-body">
                    <h1 class="text-center header-color mt-4">SM</h1>
                    <form action="{{ route('register') }}" method="POST">

                        @csrf
                        <div class="form-group mt-5">
                            <label class="control-label" for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control">


                            @error('name')
                                <div class="text-danger">❗ {{ $message }}</div>
                            @enderror

                        </div>

                        <div class="form-group mt-3">
                            <label class="control-label" for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">

                            @error('email')
                                <div class="text-danger">❗ {{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group mt-4">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">

                            @error('password')
                                <div class="text-danger">❗ {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-4">
                            <label class="control-label" for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control">
                            @error('password_confirmation')
                                <div class="text-danger">❗ {{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-block w-100 mt-5 btn-color">Register</button>

                        <a class="btn btn-success btn-block w-100 mt-4 mb-5" href="{{ route('loginPage') }}">Already
                            Register?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
