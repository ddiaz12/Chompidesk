<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdenModel extends Model
{
    protected $table = 'orden';
    protected $primaryKey = 'id_orden';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields =
    [
        'id_orden',
        'id_cliente',
        'id_empleado',
        'cln_nombre',
        'nombre',
        'dispositivo',
        'marca',
        'modelo',
        'id_servicio',
        'id_estado'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'fecha';
    protected $updatedField = false;
}
