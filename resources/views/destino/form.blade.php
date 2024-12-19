<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="nombreCiudad" class="form-label">{{ __('Nombre Ciudad') }}</label>
            <input type="text" name="nombreCiudad" class="form-control @error('nombreCiudad') is-invalid @enderror" value="{{ old('nombreCiudad', $destinosel?->nombreCiudad) }}" id="nombreCiudad" placeholder="Nombre Ciudad">
            {!! $errors->first('nombreCiudad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label class="form-label">{{ __('Nombre Universidad') }}</label>
                <input type="text" name="nombreUniversidad" class="form-control @error('nombreUniversidad') is-invalid @enderror" value="{{ old('nombreUniversidad', $destinosel?->nombreUniversidad) }}" id="nombreUniversidad" placeholder="Nombre Universidad">
            {!! $errors->first('nombreUniversidad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label class="form-label">{{ __('Especialidad') }}</label>
            <input type="text" name="especialidad" class="form-control @error('especialidad') is-invalid @enderror" value="{{ old('especialidad', $destinosel?->especialidad) }}" id="especialidad" placeholder="Especialidad">
            {!! $errors->first('especialidad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="plan" class="form-label">{{ __('Plan de convalidación') }}</label>
            <select name="plan" class="form-control @error('plan') is-invalid @enderror" id="plan">
                <option value="" disabled selected>
                @if($destinosel->plan)
                    {{$destinosel->plan}}
                    @else
                        ------------------
                @endif


                </option>
                    <option value="{{ $destinosel->plan }}" {{ old('plan', $destinosel->plan)}}>
                        1 cuatrimestre
                    </option>
                    <option value="{{ $destinosel->plan }}" {{ old('plan', $destinosel->plan)}}>
                    Curso completo
                    </option>
            </select>
            {!! $errors->first('idCiudad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
