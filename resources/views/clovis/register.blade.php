@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header text-success">
            <h3>Register</h3>
        </div>
        <br>
       @if (Session::get('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                {{ Session::get('success')}}
            </div>
       @elseif (Session::get('fail'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                {{ Session::get('fail')}}
            </div>
       @endif
        <form action="{{ route('clovis.save') }}" method="post">
            @csrf
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" name=" fname" class="form-control" placeholder="Enter Your first Name"
                        value="{{ old('fname') }}" >
                        <span class="text-danger">@error('fname') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <input type="text" name=" lname" class="form-control" placeholder="Enter Your last Name" value="{{ old('lname') }}">
                        <span class="text-danger">@error('lname') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <input type="email" name=" email" class="form-control" placeholder="Enter Your Email" value="{{ old('email') }}">
                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password"  id="password" placeholder="Enter your Password" class="form-control">
                        <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-secondary" type="submit">Register</button>
                    </div>
                    have an account already <a href="{{ route('clovis.login') }}">Login</a>
                </div>
            </div>
        </form>
    </div>
@endsection
