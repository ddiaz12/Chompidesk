<?php

namespace App\Models;

use CodeIgniter\Model;

class ClienteModel extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'id_cliente';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields =
    [
        'nombre',
        'ap_paterno',
        'ap_materno',
        'telefono',
        'calle',
        'num_ext',
        'colonia',
        'lugar',
        'status'
    ];
}
