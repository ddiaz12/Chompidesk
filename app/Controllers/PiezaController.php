<?php

namespace App\Controllers;

use App\Models\PiezaModel;

class PiezaController extends BaseController
{
    public function index()
    {
        $piezaModel = new PiezaModel();

        $data['piezas'] = $piezaModel->where('status', 1)->paginate(15);
        $data['pager'] = $piezaModel->pager;
        return view('pieza/index', $data);
    }

    public function crear()
    {
        return view('pieza/crear');
    }

    public function registrar()
    {
        $piezaModel = new PiezaModel();

        $piezaModel->insert([
            'nombre' => strtoupper($this->request->getPost('nombre')),
            'tipo_dispositivo' => strtoupper($this->request->getPost('tipo_dispositivo')),
            'marca' => strtoupper($this->request->getPost('marca')),
            'modelo' => strtoupper($this->request->getPost('modelo')),
            'precio_unitario' => $this->request->getPost('precio_unitario'),
            'precio_venta' => $this->request->getPost('precio_venta')
        ]);

        session()->setFlashdata('success', 'La pieza fue registrada');

        return redirect()->to(base_url('piezas'));
    }

    public function editar($id)
    {
        $piezaModel = new PiezaModel();
        $data['pieza'] = $piezaModel->find($id);
        return view('pieza/editar', $data);
    }

    public function actualizar($id)
    {
        $piezaModel = new PiezaModel();

        $piezaModel->update($id, [
            'nombre' => strtoupper($this->request->getPost('nombre')),
            'tipo_dispositivo' => strtoupper($this->request->getPost('tipo_dispositivo')),
            'marca' => strtoupper($this->request->getPost('marca')),
            'modelo' => strtoupper($this->request->getPost('modelo')),
            'precio_unitario' => $this->request->getPost('precio_unitario'),
            'precio_venta' => $this->request->getPost('precio_venta')
        ]);

        session()->setFlashdata('success', 'La pieza fue actualizada');

        return redirect()->to(base_url('piezas'));
    }

    public function eliminar($id)
    {
        $piezaModel = new PiezaModel();
        $piezaModel->update($id, [
            'status' => 0
        ]);

        session()->setFlashdata('success', 'La pieza fue eliminada');

        return redirect()->to(base_url('piezas'));
    }
}
