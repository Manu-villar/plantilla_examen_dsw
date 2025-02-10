<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    const  ESTADO  = [
        "p" => "publicado",
        "d" => "descartado",
        "b"  => "borrador"
    ];
    const  SECCIONES  = [
        "p" => "portada",
        "i" => "interior",
        "f"  => "foro"
    ];

}
