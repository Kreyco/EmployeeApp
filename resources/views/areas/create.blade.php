@extends('layouts.app')

@section('content')
    @if(count($errors))
        <div class="alert alert-danger" role="alert">
            {{ __('general.errors') }}
        </div>
    @endif

    @include("areas.form")

    <script type="text/javascript">
        $(document).ready(function () {
            $("#area-form").validate();
        });
    </script>
@endsection
