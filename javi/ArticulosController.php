<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use \App\Http\Controllers\CRUDController;

class ArticulosController extends CRUDController
{
    //
    public function __construct() {
        $this->modelClass   = Articulo::class;
        $this->viewPath     = 'articulos';
    }

    function formulario($oper = '', $id = '')
    {
        $item           = empty($id) ? new Articulo() : Articulo::find($id);
        $ESTADOS        = Articulo::ESTADOS;
        $SECCIONES      = Articulo::SECCIONES;

        return view("{$this->viewPath}.formulario", compact('item', 'oper','ESTADOS', 'SECCIONES'));
    }

    function almacenar(Request $request)
    {
        $validatedData = $request->validate([
            'titulo'            => 'required|string|max:255',
            'contenido'         => 'string|max:1000',
            'autor'             => 'string|max:255',
            'fecha_publicacion' => 'date',
            'estado'            => 'required',
            'secciones'         => 'required',
        ],[
            'titulo.required' => 'El título es obligatorio.',
            'titulo.string'   => 'El título debe ser una cadena de texto.',
            'titulo.max'      => 'El título no puede tener más de 255 caracteres.',
        
            'contenido.string' => 'El contenido debe ser una cadena de texto.',
            'contenido.max'    => 'El contenido no puede tener más de 1000 caracteres.',
        
            'autor.string' => 'El autor debe ser una cadena de texto.',
            'autor.max'    => 'El autor no puede tener más de 255 caracteres.',
        
            'fecha_publicacion.date' => 'Debe ser una fecha válida.',
        
            'estado.string' => 'El estado debe ser una cadena de texto.',
            'estado.max'    => 'El estado no puede tener más de 255 caracteres.',
        
            'secciones.string' => 'Las secciones deben ser una cadena de texto.',
            'secciones.max'    => 'Las secciones no pueden tener más de 255 caracteres.',
        ]);
        
        $item = empty($request->id) ? new Articulo() : Articulo::find($request->id);
        // AÑADIR MANUALMENTE LOS CAMPOS
        $item->titulo               = $request->titulo;
        $item->contenido            = $request->contenido;
        $item->autor                = $request->autor;
        $item->fecha_publicacion    = $request->fecha_publicacion;
        $item->estado               = $request->estado;
        $item->secciones            = $request->secciones;

        $item->save();

        return redirect()->route("{$this->viewPath}.listado")->with('success', 'Articulo guardado correctamente.');
    }
}