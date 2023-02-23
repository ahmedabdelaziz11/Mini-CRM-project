@extends('layouts.master')

@section('css')
@endsection

@section('title')
edit company
@stop


@section('page-header')
edit company
@endsection

@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>error</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session()->has('mss'))
<div class="alert alert-success">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>success</strong>
    <ul>
        {{session()->get('mss')}}
    </ul>
</div>
@endif

<div class="row row-sm p-3 m-3">
    <div class="col-xl-12">
        <div class="card mg-b-20" id="tabs-style2">
            <div class="card-body">
                <form  action="{{ route('companies.update',$company->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                    {{ method_field('patch') }}
                    @csrf


                    <div class="row">
                        <div class="col">
                            <label class="control-label">name</label>
                            <input type="text" class="form-control" name="name" value="{{$company->name}}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="control-label">email</label>
                            <input type="email" class="form-control" name="email" value="{{$company->email}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="control-label">logo</label>
                            <input type="file" class="form-control" name="logo" value="{{$company->logo}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="control-label">website</label>
                            <input type="text" class="form-control" name="website" value="{{$company->website}}">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary w-100 ">add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
@endsection