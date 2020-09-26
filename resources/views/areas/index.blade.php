@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-10">
            <h1>{{ __('areas.title.index') }}</h1>
        </div>
        <div class="col-sm-2">
            <a class="btn btn-primary btn-lg" href="{{ route('areas.create') }}"
               role="button">{{ __('areas.label.add_new') }}</a>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('areas.title.name') }}</th>
            <th scope="col">{{ __('areas.title.description') }}</th>
            <th scope="col">{{ __('areas.title.created_at') }}</th>
            <th scope="col">{{ __('areas.title.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @forelse($areas as $area)
            <tr>
                <th scope="row">{{ $area->id }}</th>
                <td>{{ $area->name }}</td>
                <td>{{ $area->description }}</td>
                <td>{{ date_format($area->created_at, "d/m/Y") }}</td>
                <td>
                    <a class="btn btn-success btn-sm" href="{{ route('areas.edit', [$area]) }}"
                       role="button" title="edit">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square"
                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd"
                                  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </a>
                    <a class="btn btn-danger btn-sm" href="#"
                       role="button" onclick="event.preventDefault();
                        document.getElementById('delete-employee-{{ $area->id }}-form').submit();">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                        </svg>
                    </a>

                    <form method="POST" id="delete-employee-{{ $area->id }}-form"
                          action="{{ route('areas.destroy', [$area]) }}"
                          class="hidden"
                    >
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">
                    <div class="bg-red">
                        <p>
                            <strong>{{ __("There are not Areas yet") }}</strong>
                            <span>{{ __("There are nothing to show") }}</span>
                        </p>
                    </div>
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
