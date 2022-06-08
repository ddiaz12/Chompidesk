<?php

namespace App\Models;

use CodeIgniter\Model;

class DetOrdPiezaModel extends Model
{
    protected $table = 'det_ord_pieza';
    protected $primaryKey = 'id_ord_pieza';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    //protected $useSoftDeletes   = true;
    protected $allowedFields =
    [
        'id_orden',
        'id_pieza',
        'cantidad',
    ];
}
