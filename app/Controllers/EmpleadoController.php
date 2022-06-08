<?php

namespace App\Controllers;

use App\Models\EmpleadoModel;
use App\Models\PuestoModel;

class EmpleadoController extends BaseController
{
    public function index()
    {
        $empleadoModel = new EmpleadoModel();

        $data['empleados'] = $empleadoModel->select('empleado.*,puesto.id_puesto,
        puesto.puesto_emp')
            ->join('puesto', 'puesto.id_puesto = empleado.id_puesto')
            ->where('status', 1)->paginate(15);
        $data['pager'] = $empleadoModel->pager;
        return view('empleado/index', $data);
    }

    public function crear()
    {
        $puestoModel = new PuestoModel();
        $data['puestos'] = $puestoModel->findAll();

        return view('empleado/crear', $data);
    }

    public function registrar()
    {
        $empleadoModel = new EmpleadoModel();

        $empleadoModel->insert([
            'nombre' => strtoupper($this->request->getPost('nombre')),
            'ap_paterno' => strtoupper($this->request->getPost('ap_paterno')),
            'ap_materno' => strtoupper($this->request->getPost('ap_materno')),
            'telefono' => strtoupper($this->request->getPost('telefono')),
            'calle' => strtoupper($this->request->getPost('calle')),
            'num_ext' => strtoupper($this->request->getPost('num_ext')),
            'id_puesto' => strtoupper($this->request->getPost('puesto_emp')),
            'usuario' => $this->request->getPost('usuario'),
            'contrasena' => $this->request->getPost('contrasena'),
        ]);

        session()->setFlashdata('success', 'El empleado fue registrado');

        return redirect()->to(base_url('empleados'));
    }

    public function editar($id)
    {
        $empleadoModel = new EmpleadoModel();
        $puestoModel = new PuestoModel();
        $data['puestos'] = $puestoModel->findAll();

        $data['empleado'] = $empleadoModel->select('empleado.*,puesto.id_puesto,
        puesto.puesto_emp')
            ->join('puesto', 'puesto.id_puesto = empleado.id_puesto')
            ->find($id);


        return view('empleado/editar', $data);
    }

    public function actualizar($id)
    {
        $empleadoModel = new EmpleadoModel();

        $empleadoModel->update($id, [
            'nombre' => strtoupper($this->request->getPost('nombre')),
            'ap_paterno' => strtoupper($this->request->getPost('ap_paterno')),
            'ap_materno' => strtoupper($this->request->getPost('ap_materno')),
            'telefono' => strtoupper($this->request->getPost('telefono')),
            'calle' => strtoupper($this->request->getPost('calle')),
            'num_ext' => strtoupper($this->request->getPost('num_ext')),
            'id_puesto' => strtoupper($this->request->getPost('puesto_emp')),
            'usuario' => $this->request->getPost('usuario'),
            'contrasena' => $this->request->getPost('contrasena'),
        ]);

        session()->setFlashdata('success', 'El empleado fue actualizado');

        return redirect()->to(base_url('empleados'));
    }

    public function eliminar($id)
    {
        $empleadoModel = new EmpleadoModel();
        $empleadoModel->update($id, [
            'status' => 0
        ]);

        session()->setFlashdata('success', 'El empleado fue eliminado');

        return redirect()->to(base_url('empleados'));
    }
}
