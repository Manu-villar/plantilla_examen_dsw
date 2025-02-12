@extends('layout')


@section('title', 'Alta de articulo')

@section('content')


    @php

        if (session('formData'))
            $libro = session('formData');

        $disabled = '';
        $boton_guardar = '<button type="submit" class="btn btn-primary">Guardar</button>';
        if (session('formData') || $oper == 'cons' || $oper == 'supr')
        {
            $disabled = 'disabled';

            if ($oper == 'supr')
                $boton_guardar = '<button type="submit" class="btn btn-danger">Eliminar</button>';
            else
                $boton_guardar = '';
        }
            



    @endphp

    <br />
    @if(session('success'))
        <p style="text-align:center;" class="alert alert-success">{{ session('success') }}</p>
    @endif
    
    <form action="{{ route('articulos.almacenar') }}" method="POST">
        @csrf
        <input type="hidden" name="oper" value="{{ $oper }}" />
        <input type="hidden" name="id" value="{{ $item->id }}" />
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input {{ $disabled }} type="text" name="titulo" class="form-control" id="titulo" value="{{ old('titulo',$item->titulo)}}" placeholder="Título">
            @error('titulo') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido</label>
            <input {{ $disabled }} type="textarea" name="contenido" class="form-control" id="contenido" value="{{ old('contenido',$item->contenido)}}" placeholder="Contenido">
            @error('contenido') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input {{ $disabled }} type="text" name="autor" class="form-control" id="autor" value="{{ old('autor',$item->autor)}}" placeholder="Autor">
            @error('autor') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="fecha_publicacion" class="form-label">Fecha de publicacion</label>
            <input {{ $disabled }} type="date" name="fecha_publicacion" class="form-control" id="fecha_publicacion" value="{{ old('fecha_publicacion',$item->fecha_publicacion)}}">
            @error('fecha_publicacion') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div class="mb-5">
            <label for="estado" class="form-label mb-3">Estado</label>
            <br>
            <div class="d-flex flex-column">
                @foreach ($ESTADOS as $clave_estado => $texto_estado)
                    <div class="d-flex flex-row">
                        @php
                            $checked = old('estado') == $clave_estado || $item->estado == $clave_estado ? 'checked="checked"' : '';
                        @endphp

                        <input type="checkbox" value="{{ $clave_estado }}" {{ $checked }} class="ml-2" name="estado">
                        {{ $texto_estado }}
                    </div>
                @endforeach
                @error('estado') <p style="color: red;">{{ $message }}</p> @enderror
            </div>
        </div>

        <br><br>

        <div class="mb-5">
            <label for="secciones" class="form-label mb-3">Secciones</label>
            <br>
            <div class="d-flex flex-column">
                @foreach ($SECCIONES as $clave_secciones => $texto_secciones)
                    <div class="d-flex flex-row">
                        @php
                        $checked = old('secciones') == $clave_secciones || $item->secciones == $clave_secciones ? 'checked="checked"' : '';
                        @endphp

                        <input type="checkbox" value="{{ $clave_secciones }}" {{ $checked }} class="ml-2" name="secciones">
                        {{ $texto_secciones }}
                    </div>
                @endforeach
                @error('secciones') <p style="color: red;">{{ $message }}</p> @enderror


                {{--  ESTO ES PARA LAS SELECT
                        
                        @foreach ($ESTADO as $clave_estado => $texto_estado)
                            @php
                                $selected = old('estado') == $clave_estado || $item->estado == $clave_estado ? 'selected="selected"' : '';
                            @endphp
        
                            <option value="{{ $clave_estado }}" {{ $selected }}>{{ $texto_estado }}</option>
                        @endforeach
                    --}}
            </div>
        </div>

        @php

        echo $boton_guardar ;
    
        @endphp

    </form>

@endsection