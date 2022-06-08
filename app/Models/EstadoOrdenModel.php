<?php

namespace App\Models;

use CodeIgniter\Model;

class EstadoOrdenModel extends Model
{
    protected $table = 'estado';
    protected $primaryKey = 'id_estado';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields =
    [
        'estado_ord'
    ];
}