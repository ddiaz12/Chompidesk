<?php

namespace App\Models;

use CodeIgniter\Model;

class PuestoModel extends Model
{
    protected $table = 'puesto';
    protected $primaryKey = 'id_puesto';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields =
    [
        'puesto_emp'
    ];
}