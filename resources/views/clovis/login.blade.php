@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header text-success">
            <h3>Login</h3>
        </div>
        <br>

        <div class="form-group">
            <form action="{{ route('clovis.check') }}" method="POST">
                @if (Session::get('fail'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                {{ Session::get('fail') }}
            </div>
            @endif
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" >
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-secondary" type="submit">Submit</button>
                </div>
                I don't have access  to my account create<a href="{{ route('clovis.register') }}"> Register</a>
            </form>
        </div>
    </div>
@endsection
