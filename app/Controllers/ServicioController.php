<?php

namespace App\Controllers;

use App\Models\ServicioModel;

class ServicioController extends BaseController
{
    public function index()
    {
        $servicioModel = new ServicioModel();

        $data['servicios'] = $servicioModel->where('status', 1)->paginate(15);
        $data['pager'] = $servicioModel->pager;
        return view('servicio/index', $data);
    }

    public function crear()
    {
        return view('servicio/crear');
    }

    public function registrar()
    {
        $servicioModel = new ServicioModel();

        $servicioModel->insert([
            'descripcion' => strtoupper($this->request->getPost('descripcion')),
            'precio' => $this->request->getPost('precio')
        ]);

        session()->setFlashdata('success', 'El servicio fue registrado');

        return redirect()->to(base_url('servicios'));
    }

    public function editar($id)
    {
        $servicioModel = new ServicioModel();
        $data['servicio'] = $servicioModel->find($id);
        return view('servicio/editar', $data);
    }

    public function actualizar($id)
    {
        $servicioModel = new ServicioModel();

        $servicioModel->update($id, [
            'descripcion' => strtoupper($this->request->getPost('descripcion')),
            'precio' => $this->request->getPost('precio')
        ]);

        session()->setFlashdata('success', 'El servicio fue actualizado');

        return redirect()->to(base_url('servicios'));
    }

    public function eliminar($id)
    {
        $servicioModel = new ServicioModel();
        $servicioModel->update($id, [
            'status' => 0
        ]);

        session()->setFlashdata('success', 'El servicio fue eliminado');

        return redirect()->to(base_url('servicios'));
    }
}
