@extends('layout')


@section('content')


    @php

        if (session('formData'))
            $item = session('formData');

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
    
    <form action="{{ route('item.almacenar') }}" method="POST">
        @csrf
        <input type="hidden" name="oper" value="{{ $oper }}" />
        <input type="hidden" name="id" value="{{ $item->id }}" />

    <!-- NO OLVIDES LOS CAMPOS NAME ni los campos VALUE, tú puedes, queda poco, no te desanimes-->


        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input {{ $disabled }} type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre',$item->nombre)}}" placeholder="nombre">
            @error('nombre') <p style="color: red;">{{ $message }}</p> @enderror
        </div>



        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input {{ $disabled }}  type="text" name="autor" class="form-control" id="autor" value="{{ old('autor',$item->autor)}}" placeholder="autor...">
            @error('autor') <p style="color: red;">{{ $message }}</p> @enderror
        </div>


        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido</label>
            <textarea {{ $disabled }}  name="contenido" class="form-control" id="contenido" placeholder="Contenido...">{{ old('contenido',$item->contenido) }}</textarea>
            @error('contenido') <p style="color: red;">{{ $message }}</p> @enderror
        </div>



        <div class="mb-3">
            <label for="fecha" class="form-label">fecha</label>
            <input {{ $disabled }}  type="text" name="fecha" class="form-control" id="fecha"  value="{{ old('fecha',$item->fecha)}}" placeholder="fecha">
            @error('fecha') <p style="color: red;">{{ $message }}</p> @enderror
        </div>



        <select {{ $disabled }}  name="estado" id="estado" class="form-select form-select-sm" aria-label=".form-select-sm example">

            <option value="">Selecciona un estado...</option>

                @foreach ($ESTADO as $clave_estado => $texto_estado)
        
                    @php
                        $selected = old('estado') == $clave_estado || $item->estado == $clave_estado ? 'selected="selected"' : '';
                    @endphp

                    <option value="{{ $clave_estado }}" {{ $selected }}>{{ $texto_estado }}</option>

                @endforeach

        </select>


        <div class="mb-3">
            <label for="secciones" class="form-label">Secciones</label>
                @foreach ($SECCIONES as $clave_secciones => $texto_secciones)

                    @php
                        $checked = old('secciones') == $clave_secciones || $item->secciones == $clave_secciones ? 'checked="checked"' : '';
                    @endphp
        
    
        
                    <input $disabled type="checkbox" value="{{ $clave_secciones }}" {{ $checked }} class="ml-2" name="secciones">{{ $texto_secciones }}

                @endforeach
          
            @error('secciones') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        @php

        echo $boton_guardar ;
    
        @endphp

    </form>

@endsection