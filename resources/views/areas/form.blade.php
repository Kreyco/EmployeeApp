<div>
    <div>
        <h1>{{ $title }}</h1>
    </div>
</div>

<form id="area-form" method="POST" action="{{ $route }}" class="justify-content-center">
    @csrf
    @isset($update)
        @method("PUT")
    @endisset

    <div class="form-group row">
        <label class="col-sm-2 col-form-label @error('name') is-invalid @enderror"
               for="name">
            {{ __('areas.label.name') }}
        </label>
        <div class="col-sm-10">
            <input class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                   value="{{ old('name') ?? $area->name }}" required autocomplete="name" autofocus
                   placeholder="{{ __('areas.help.name') }}">

            @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label @error('description') is-invalid @enderror"
               for="notes">
            {{ __('areas.label.description') }}
        </label>
        <div class="col-sm-10">
                <textarea class="form-control @error('description') is-invalid @enderror"
                  id="description"
                  name="description"
                  placeholder="{{ __('areas.help.description') }}"
                >
                    {{ old('description') ?? $area->description }}
                </textarea>

            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">
                {{ $textButton }}
            </button>
            <a class="btn btn-secondary" href="{{ route('areas.index') }}" role="button">
                {{ __('areas.label.back') }}
            </a>
        </div>
    </div>
</form>
