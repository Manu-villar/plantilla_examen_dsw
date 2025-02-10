@extends('layout')


@section('content')
<div class="table-responsive">
    <table  class="table">
        <tr>
            <td>#</td>
            <td>nombre</td>
            <td>autor</td>
            <td>estado</td>
            <td>sección</td> 
            <td>fecha</td> 
        </tr>

    
    @foreach ($items as $item)
        

    <tr>
            <td>
                <div>
                    <a href="/item/{{ $item->id }}" class="btn btn-primary"><i class="bi bi-search"></i></a>
                    <a href="/item/actualizar/{{ $item->id }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    <a href="/item/eliminar/{{ $item->id }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                </div>

            </td>
            <td >{{ $item->nombre }}</td>
            <td>{{  $item->autor }}</td> 
            <td>{{ $ESTADO[$item->estado] }}</td> 
            <td>{{ $SECCIONES[$item->secciones] }}</td>
            <td >{{ $item->fecha }}</td>
    </tr>

    @endforeach

    </table>
    {{ $items->links() }}
</div>
    <a href="item" class="btn btn-success"><i class="bi bi-plus"></i> Nuevo Tarea</a>


@endsection