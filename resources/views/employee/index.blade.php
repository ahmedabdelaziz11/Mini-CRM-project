@extends('layouts.master')

@section('css')
@endsection

@section('title')
employees list
@stop


@section('page-header')
employees
@endsection

@section('content')
@if (session()->has('delete'))
<div class="alert alert-success">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>success</strong>
    <ul>
        {{session()->get('delete')}}
    </ul>
</div>
@endif
<div class="contaner">
    <div class="row p-3">
        <div class="col-12">
            <a class="btn btn-primary" href="{{route('employees.create')}}">add employee</a>
        </div>
    </div>

    <div class="row">
        <div class="col-10 mx-auto">
            <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <td>#</td>
                        <td>first name</td>
                        <td>last name</td>
                        <td>company name</td>
                        <td>email</td>
                        <td>phone</td>
                        <td>operations</td>
                    </tr>
                </thead>
                <tbody>
                @forelse ($employees as $employee)
                    <tr class="text-center">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$employee->first_name}}</td>
                        <td>{{$employee->last_name}}</td>
                        <td>{{$employee->company->name ?? '-'}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->phone}}</td>
                        <td>
                            <a href="{{route('employees.edit',$employee->id)}}" class="btn btn-sm btn-primary">edit</a>
                            
                            <form action="{{route('employees.destroy',$employee->id)}}" method="post" class="delete-form">
                                {{ method_field('delete') }}
								{{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                <tr class="text-center">
                    <td colspan="7">No employees</td>
                </tr>
                @endforelse
                </tbody>
            </table>
            <div class="row d-felx justify-content-center">
                {{ $employees->links('pagination-links') }} 
            </div>   
        </div>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {

        $('.delete-form').on('submit', function(e) {
            e.preventDefault();
            alert('are sure of the deleting process');
            e.currentTarget.submit();
        });

    
    });
</script>

@endsection