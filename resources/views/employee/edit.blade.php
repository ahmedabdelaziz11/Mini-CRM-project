@extends('layouts.master')

@section('css')
@endsection

@section('title')
edit employee
@stop


@section('page-header')
add employee
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
                <form  action="{{ route('employees.update',$employee->id) }}" method="post" autocomplete="off">
                    {{ method_field('patch') }}
                    @csrf


                    <div class="row">
                        <div class="col">
                            <label class="control-label">first name</label>
                            <input type="text" class="form-control" name="first_name" value="{{$employee->first_name}}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="control-label">last name</label>
                            <input type="text" class="form-control" name="last_name" value="{{$employee->last_name}}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="control-label">company</label>
                            <select name="company_id" class="form-control">
                                <option value="" selected>select company</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" @if($company->id == $employee->company_id) selected @endif>{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="control-label">email</label>
                            <input type="email" class="form-control" name="email" value="{{$employee->email}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="control-label">phone</label>
                            <input type="text" class="form-control" name="phone" value="{{$employee->phone}}">
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