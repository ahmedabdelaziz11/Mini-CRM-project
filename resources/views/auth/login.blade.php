@extends('layouts.master')

@section('css')
@endsection

@section('title')
login
@stop


@section('page-header')
@endsection

@section('content')

<dev class="container">

    <h1 class="text-center display-3 p-3">MIN-CRM App</h1>
    <h4 class="text-center display-3 p-3">Welcome</h4>
    <div class="row">
        <div class="col-8 offset-sm-2">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="col-12">
                    <div class="form-group">
                        <label>email</label>
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>password</label>
                        <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <button class="btn btn-success btn-block" type="submit">login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</dev>
@endsection

@section('js')
@endsection