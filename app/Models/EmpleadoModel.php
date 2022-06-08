<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpleadoModel extends Model
{
    protected $table = 'empleado';
    protected $primaryKey = 'id_empleado';
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
        'id_puesto',
        'usuario',
        'contrasena',
        'status'
    ];

    public function obtenerEmpleado($usuario)
    {
        // burcar el primer registro en el que el nombre de usuario coincida
        $empleado = $this->where('usuario', $usuario)
            ->first();

        return $empleado;
    }
}
