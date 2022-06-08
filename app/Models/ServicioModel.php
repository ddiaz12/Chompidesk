<?php

namespace App\Models;

use CodeIgniter\Model;

class ServicioModel extends Model
{
    protected $table = 'servicio';
    protected $primaryKey = 'id_servicio';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields =
    [
        'descripcion',
        'precio',
        'status'
    ];
}
