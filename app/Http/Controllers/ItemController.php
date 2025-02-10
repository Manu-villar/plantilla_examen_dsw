<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{


    // primera funcion para la tabla 
    function listado()
    {

        $items = Item::paginate(7);

        $ESTADO     = Item::ESTADO;
        $SECCIONES  = Item::SECCIONES;

        return view('items.tabla',compact('items','ESTADO','SECCIONES'));
    }


    // con la que te sale el formulario


    function formulario($oper='', $id='')
    {
        $item = empty($id)? new Item() : Item::find($id);
        
        $ESTADO     = Item::ESTADO;
        $SECCIONES  = Item::SECCIONES;

        return view('items.formulario',compact('ESTADO','item','oper','SECCIONES'));
    }




    //-------------------- propias del crud que redirigen  a formulario --------------------// copiarlas tal cual

    function alta()
    {
        return $this->formulario();
    }


    function mostrar($id)
    {
        return $this->formulario('cons', $id);
    }


    function actualizar($id)
    {
        return $this->formulario('modi', $id);

    }

    function eliminar($id)
    {
        return $this->formulario('supr', $id);

    }


    // la que hace todas las funciones

    function almacenar(Request $request)
    {

        if ($request->oper == 'supr')
        {

            $item = Item::find($request->id);
            $item->delete();

            $salida = redirect()->route('items.listado');
        }
        else
        {
            
            $request->validate([
                'nombre'         => 'required|string|max:255|unique:items,nombre',
                'autor'          => 'required|string|max:255',
                'contenido'      => 'required',
                'estado'         => 'required',
                'secciones'      => 'required',
                'fecha'          => 'required'
            ], [
                'nombre.required' => 'El nombre es obligatorio.',
                'nombre.string'   => 'Debe ser de tipo cadena de texto.',
                'nombre.max'      => 'Máximo 255 caracteres',
                'nombre.unique'   => 'El nombre ya está registrado. Debe ser único.',

                'autor.required' => 'El nombre es obligatorio.',
                'autor.string'   => 'Debe ser de tipo cadena de texto.',
                'autor.max'      => 'Máximo 255 caracteres',
                

                'estado.required' => 'La descripción es obligatoria.',


                'secciones.required'      => 'El estado es obligatorio.',
                'fecha.required'   => 'la fecha es obligatoria.',
        


            ]);

            
        
        

            $item = empty($request->id) ? new Item() : Item::find($request->id);

            $item->nombre      = $request->nombre;
            $item->autor       = $request->autor;
            $item->contenido   = $request->contenido;
            $item->estado      = $request->estado;
            $item->secciones   = $request->secciones;
            $item->fecha       = $request->fecha;
            $item->save();
            $salida = redirect()->route('items.alta')->with([
                     'success'  => 'La ### se ha insertado correctamente.'
                    ,'formData' => $item
                ]
            );

        }

        return $salida;
    }
}