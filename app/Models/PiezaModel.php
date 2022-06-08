<?php

namespace App\Models;

use CodeIgniter\Model;

class PiezaModel extends Model
{
    protected $table = 'pieza';
    protected $primaryKey = 'id_pieza';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields =
    [
        'nombre',
        'tipo_dispositivo',
        'marca',
        'modelo',
        'precio_unitario',
        'precio_venta',
        'status'
    ];
}
