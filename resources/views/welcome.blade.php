@extends('layouts/master')

@section('title')
    Welcome!
@endsection

@section('body')
    @if(count($errors) > 0)
    <div class="row">
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <b>Oops! Something went wrong!</b>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('signin') }}" method="post">
                <h3>Sign in</h3>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                    <label for="email">Your E-mail</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <form action="{{ route('signup') }}" method="post">
                <h3>Sign up</h3>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                    <label for="email">Your E-mail</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                </div>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                    <label for="name">Your Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ Request::old('name') }}">
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection