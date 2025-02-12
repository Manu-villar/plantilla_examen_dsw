
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Clase CRUD para optimizar las acciones, faltan por definir funciones como almacenar y las redefiniciones de formulario

abstract class CRUDController extends Controller
{
    protected $modelClass;
    protected $viewPath;

    function listado()
    {
        $items = $this->modelClass::paginate(10);
        return view("{$this->viewPath}.listado", compact('items'));
    }

    function formulario($oper = '', $id = '')
    {
        $item = empty($id) ? new $this->modelClass() : $this->modelClass::find($id);
        return view("{$this->viewPath}.formulario", compact('item', 'oper'));
    }

    function mostrar($id)
    {
        return $this->formulario('cons', $id);
    }

    function actualizar($id)
    {
        return $this->formulario('actu', $id);
    }

    function eliminar($id)
    {
        return $this->formulario('supr', $id);
    }

    function alta()
    {
        return $this->formulario();
    }
}