@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('employees.store') }}">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label"
                   for="name">{{ __('employees.label.name') }}</label>
            <div class="col-sm-10">
                <input class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                       value="{{ old('name') }}" required autocomplete="name" autofocus
                       placeholder="{{ __('employees.help.name') }}">

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label"
                   for="exampleFormControlInput1">{{ __('employees.label.email') }}</label>
            <div class="col-sm-10">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email" id="email"
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
                <legend class="col-form-label col-sm-2 pt-0">{{ __('employees.label.gender') }}</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender1"
                               value="M">
                        <label class="form-check-label" for="genderRadio1">
                            {{ __('employees.label.male') }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender2"
                               value="F">
                        <label class="form-check-label" for="genderRadio2">
                            {{ __('employees.label.female') }}
                        </label>
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label"
                   for="area_id">{{ __('employees.label.department') }}</label>
            <div class="col-sm-10">
                <select class="form-control" id="area_id" name="area_id">
                    <option value="1">Administración</option>
                    <option value="2">Recursos humanos</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label"
                   for="notes">{{ __('employees.label.notes') }}</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="notes" rows="3" name="notes"
                          placeholder="{{ __('employees.help.notes') }}"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3"></div>
            <div class="col-sm-1">
                <input class="form-check-input" type="checkbox" id="bulletin" name="bulletin" value="1" checked>
            </div>
            <label class="col-sm-8 col-form-label" for="bulletin"
                   class="form-check-label">{{ __('employees.label.bulletin') }}</label>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">{{ __('employees.label.roles') }}</div>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                    <label class="form-check-label" for="gridCheck1">
                        {{ __('employees.label.professional_develop') }}
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">{{ __('employees.label.save') }}</button>
            </div>
        </div>
    </form>
@endsection
