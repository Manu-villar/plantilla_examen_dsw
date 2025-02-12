@extends('layout')

@section('title', 'Listado de Marcas')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Gestión de Marcas</h2>
    </div>

    <div class="card shadow">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th style="width: 120px;">Acciones</th>
                            <th>Título</th>
                            <th>Contenido</th>
                            <th>Autor</th>
                            <th>Fecha de Publicación</th>
                            <th>Estado</th>
                            <th>Secciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $articulo)
                        <tr>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('articulos.mostrar', $articulo->id) }}" 
                                       class="btn btn-sm btn-outline-primary"
                                       data-bs-toggle="tooltip" 
                                       title="Ver detalle">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('articulos.actualizar', $articulo->id) }}" 
                                       class="btn btn-sm btn-outline-warning"
                                       data-bs-toggle="tooltip" 
                                       title="Editar">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="{{ route('articulos.eliminar', $articulo->id) }}" 
                                       class="btn btn-sm btn-outline-danger"
                                       data-bs-toggle="tooltip" 
                                       title="Eliminar">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </td>
                            <td>{{ $articulo->titulo }}</td>
                            <td>{{ $articulo->contenido }}</td>
                            <td>{{ $articulo->autor }}</td>
                            <td>{{ $articulo->fecha_publicacion }}</td>
                            <td>{{ $articulo->estado }}</td>
                            <td>{{ $articulo->secciones }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="card-footer bg-white">
            {{ $items->links() }}
        </div>
    </div>
    <a href="{{ route('articulos.alta') }}" class="btn btn-success">
        <i class="bi bi-plus-circle me-2"></i>Nueva Marca
    </a>
</div>

@endsection