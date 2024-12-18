<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $asignatura?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_ciudad" class="form-label">{{ __('Ciudad') }}</label>
            <select name="idCiudad" class="form-control @error('idCiudad') is-invalid @enderror" id="id_ciudad">
                <option value="" disabled selected>Selecciona una ciudad</option>
                @foreach($ciudades as $ciudad)
                    <option value="{{ $ciudad->id }}" {{ old('idCiudad', $asignatura?->idCiudad) == $ciudad->id ? 'selected' : '' }}>
                        {{ $ciudad->nombreCiudad }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('idCiudad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
