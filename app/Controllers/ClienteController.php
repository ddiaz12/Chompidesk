<?php

namespace App\Controllers;

use App\Models\ClienteModel;

class ClienteController extends BaseController
{
    public function index()
    {
        $clienteModel = new ClienteModel();

        $data['clientes'] = $clienteModel->where('status', 1)->paginate(15);
        $data['pager'] = $clienteModel->pager;
        return view('cliente/index', $data);
    }

    public function crear()
    {
        return view('cliente/crear');
    }

    public function registrar()
    {
        $clienteModel = new ClienteModel();

        $clienteModel->insert([
            'nombre' => strtoupper($this->request->getPost('nombre')),
            'ap_paterno' => strtoupper($this->request->getPost('ap_paterno')),
            'ap_materno' => strtoupper($this->request->getPost('ap_materno')),
            'telefono' => strtoupper($this->request->getPost('telefono')),
            'calle' => strtoupper($this->request->getPost('calle')),
            'num_ext' => strtoupper($this->request->getPost('num_ext')),
            'colonia' => strtoupper($this->request->getPost('colonia')),
            'lugar' => strtoupper($this->request->getPost('lugar')),
        ]);

        session()->setFlashdata('success', 'El cliente fue registrado');

        return redirect()->to(base_url('clientes'));
    }

    public function editar($id)
    {
        $clienteModel = new ClienteModel();
        $data['cliente'] = $clienteModel->find($id);
        return view('cliente/editar', $data);
    }

    public function actualizar($id)
    {
        $clienteModel = new ClienteModel();

        $clienteModel->update($id, [
            'nombre' => strtoupper($this->request->getPost('nombre')),
            'ap_paterno' => strtoupper($this->request->getPost('ap_paterno')),
            'ap_materno' => strtoupper($this->request->getPost('ap_materno')),
            'telefono' => strtoupper($this->request->getPost('telefono')),
            'calle' => strtoupper($this->request->getPost('calle')),
            'num_ext' => strtoupper($this->request->getPost('num_ext')),
            'colonia' => strtoupper($this->request->getPost('colonia')),
            'lugar' => strtoupper($this->request->getPost('lugar')),
        ]);

        session()->setFlashdata('success', 'El cliente fue actualizado');

        return redirect()->to(base_url('clientes'));
    }

    public function eliminar($id)
    {
        $clienteModel = new ClienteModel();
        $clienteModel->update($id, [
            'status' => 0
        ]);

        session()->setFlashdata('success', 'El cliente fue eliminado');

        return redirect()->to(base_url('clientes'));
    }
}
