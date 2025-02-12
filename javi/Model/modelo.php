<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    //

    const ESTADOS = [
        'CN' => 'Cancelado',
        'BR' => 'Borrador',
        'PB' => 'Publicado'
    ];

    const SECCIONES = [
        'PT' => 'Portada',
        'IN' => 'Interior',
        'FR' => 'Foros'
    ];
}