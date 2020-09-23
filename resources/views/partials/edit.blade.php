@extends('layouts.app')

@section('content')
    @if(count($errors))
        <div class="alert alert-danger" role="alert">
            {{ __('general.errors') }}
        </div>
    @endif

    <form method="POST" action="{{ route('employees.update', [$employee]) }}">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <label class="col-sm-2 col-form-label @error('name') is-invalid @enderror"
                   for="name">{{ __('employees.label.name') }}</label>
            <div class="col-sm-10">
                <input class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                       value="{{ $employee->name  }}" required autocomplete="name" autofocus
                       placeholder="{{ __('employees.help.name') }}">

                @error('name')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label @error('email') is-invalid @enderror"
                   for="exampleFormControlInput1">{{ __('employees.label.email') }}</label>
            <div class="col-sm-10">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                       value="{{ $employee->email  }}" required autocomplete="email" id="email"
                       placeholder="{{ __('employees.help.email') }}">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <fieldset class="form-group">
            <div class="row">
                <legend
                    class="col-form-label col-sm-2 pt-0 @error('gender') is-invalid @enderror">{{ __('employees.label.gender') }}</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender1"
                               value="M" {{ ($employee->gender == "M")? "checked" : "" }}>
                        <label class="form-check-label" for="genderRadio1">
                            {{ __('employees.label.male') }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender2"
                               value="F" {{ ($employee->gender == "F")? "checked" : "" }}>
                        <label class="form-check-label" for="genderRadio2">
                            {{ __('employees.label.female') }}
                        </label>
                    </div>

                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </fieldset>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label @error('area_id') is-invalid @enderror"
                   for="area_id">{{ __('employees.label.area') }}</label>
            <div class="col-sm-10">
                <select class="form-control" id="area_id" name="area_id">
                    @foreach($areas as $area)
                        <option
                            value="{{ $area->id  }}" {{ ($employee->area_id == $area->id)? "selected" : "" }}>{{ $area->name }}</option>
                    @endforeach
                </select>

                @error('area_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label @error('notes') is-invalid @enderror"
                   for="notes">{{ __('employees.label.notes') }}</label>
            <div class="col-sm-10">
                <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" rows="3" name="notes"
                          placeholder="{{ __('employees.help.notes') }}">
                    {{ $employee->notes  }}
                </textarea>

                @error('notes')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2 col-form-label"></div>
            <div class="col-sm-10">
                <input class="form-check-input" type="checkbox" id="bulletin" name="bulletin"
                       value="1" {{ ($employee->bulletin == "1")? "checked" : "" }}>
                <label class="col-sm-2 col-form-label form-check-label" for="bulletin">
                    {{ __('employees.label.bulletin') }}
                </label>
            </div>
        </div>
        <div class="form-group row">

            <div class="col-sm-2 @error('roles') is-invalid @enderror">{{ __('employees.label.roles') }}</div>
            <div class="col-sm-10">
                @foreach($roles as $key => $role)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="roles{{ $key }}" name="roles"
                               value="{{ $role->id }}" {{ in_array($role->id, $employee->roles->toArray()) ? "checked" : "" }}>
                        <label class="form-check-label" for="roles{{ $key }}">
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach

                @error('roles')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">{{ __('employees.label.save') }}</button>
                <a class="btn btn-secondary" href="{{ route('home') }}" role="button">
                    {{ __('employees.label.back') }}
                </a>
            </div>
        </div>
    </form>
@endsection
