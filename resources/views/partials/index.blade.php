@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-10">
            <h1>{{ __('employees.title.index') }}</h1>
        </div>
        <div class="col-sm-2">
            <a class="btn btn-primary btn-lg" href="{{ route('employees.create') }}"
               role="button">{{ __('employees.label.add_new') }}</a>
        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('employees.title.name') }}</th>
            <th scope="col">{{ __('employees.title.email') }}</th>
            <th scope="col">{{ __('employees.title.gender') }}</th>
            <th scope="col">{{ __('employees.title.department') }}</th>
            <th scope="col">{{ __('employees.title.bulletin') }}</th>
            <th scope="col">{{ __('employees.title.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
        <tr>
            <th scope="row">{{ $employee->id }}</th>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->gender }}</td>
            <td>{{ $employee->bulletin ? 'Sí' : 'No' }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
