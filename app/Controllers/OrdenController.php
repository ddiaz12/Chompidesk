<?php

namespace App\Controllers;

use App\Models\OrdenModel;
use App\Models\ServicioModel;
use App\Models\ClienteModel;
use App\Models\EstadoOrdenModel;
use App\Models\PiezaModel;
use App\Models\DetOrdPiezaModel;

class OrdenController extends BaseController
{
    public function index()
    {
        $ordenModel = new OrdenModel();

        $data['ordenes'] = $ordenModel->select('orden.*, cliente.nombre as cln_nombre, cliente.ap_paterno, empleado.nombre,
         servicio.descripcion, estado.estado_ord')
            ->join('cliente', 'cliente.id_cliente = orden.id_cliente')
            ->join('empleado', 'empleado.id_empleado = orden.id_empleado')
            ->join('servicio', 'servicio.id_servicio = orden.id_servicio')
            ->join('estado', 'estado.id_estado = orden.id_estado')
            ->orderby('orden.id_orden')->paginate(15);
        $data['pager'] = $ordenModel->pager;
        return view('orden/index', $data);
    }

    public function crear()
    {
        $servicioModel = new ServicioModel();
        $data['servicios'] = $servicioModel->findAll();
        $clienteModel = new ClienteModel();
        $data['clientes'] = $clienteModel->findAll();
        $estadoOrdenModel = new EstadoOrdenModel();
        $data['estados'] = $estadoOrdenModel->findAll();

        return view('orden/crear', $data);
    }

    public function registrar()
    {
        $ordenModel = new OrdenModel();

        $data = [
            'dispositivo' => strtoupper($this->request->getPost('dispositivo')),
            'marca' => strtoupper($this->request->getPost('marca')),
            'modelo' => strtoupper($this->request->getPost('modelo')),
            'id_estado' => ('1'),
            'id_cliente' => $this->request->getPost('cliente'),
            'id_servicio' => $this->request->getPost('servicio'),
            'id_empleado' => session('empleado')->id_empleado
        ];

        $id_orden = $ordenModel->insert($data);

        session()->setFlashdata('success', 'La orden fue registrada');

        return redirect()->to(base_url('ordenes'));
    }

    public function detalles($id)
    {
        $ordenModel = new OrdenModel();
        $detOrdPiezaModel =  new DetOrdPiezaModel();

        $data['orden'] = $ordenModel
            ->select('orden.*, cliente.nombre as cln_nombre, cliente.ap_paterno, empleado.nombre, servicio.id_servicio, 
            servicio.descripcion, estado.estado_ord')
            ->join('cliente', 'cliente.id_cliente = orden.id_cliente')
            ->join('empleado', 'empleado.id_empleado = orden.id_empleado')
            ->join('servicio', 'servicio.id_servicio = orden.id_servicio')
            ->join('estado', 'estado.id_estado = orden.id_estado')
            ->find($id);


        $data['det_ord_pieza'] = $detOrdPiezaModel
            ->select('det_ord_pieza.*, pieza.id_pieza, pieza.nombre, pieza.tipo_dispositivo, pieza.precio_venta')
            ->join('pieza', 'pieza.id_pieza = det_ord_pieza.id_pieza')
            ->where('det_ord_pieza.id_orden', $id)
            ->findAll();

        $estadoOrdenModel = new EstadoOrdenModel();
        $data['estados'] = $estadoOrdenModel->findAll();

        return view('orden/detalles', $data);
    }

    public function agregar($id_orden)
    {

        $piezaModel = new PiezaModel();
        $ordenModel = new OrdenModel();

        $data['piezas'] = $piezaModel->findAll();
        $data['id_orden'] = $id_orden;

        $data['orden'] = $ordenModel
            ->select('orden.*, cliente.nombre as cln_nombre, cliente.ap_paterno, empleado.nombre, servicio.id_servicio, 
            servicio.descripcion, estado.estado_ord')
            ->join('cliente', 'cliente.id_cliente = orden.id_cliente')
            ->join('empleado', 'empleado.id_empleado = orden.id_empleado')
            ->join('servicio', 'servicio.id_servicio = orden.id_servicio')
            ->join('estado', 'estado.id_estado = orden.id_estado')
            ->find($id_orden);

        return view('orden/agregar', $data);
    }

    public function agregarPieza($id_orden)
    {
        $id_pieza = $this->request->getPost('id_pieza');
        $cantidad = $this->request->getPost('cantidad');
        $nombre = $this->request->getPost('nombre');

        $detOrdPiezaModel = new DetOrdPiezaModel();

        for ($index = 0; $index < count($id_pieza); $index++) {
            /*
            echo "<br>";
            echo $nombre[$index] . " - " . $cantidad[$index] ;
            */
            $detOrdPiezaModel->insert([
                'id_orden' => $id_orden,
                'id_pieza' => $id_pieza[$index],
                'cantidad' => $cantidad[$index]

            ]);
        }


        session()->setFlashdata('success', 'Pieza(s) agregada(s) a la orden');

        return redirect()->to(base_url('ordenes/detalles/' . $id_orden));
    }

    public function updateEstado($id)
    {
        $ordenModel = new OrdenModel();


        $ordenModel->update($id, [
            'id_estado' => $this->request->getPost('estado_ord'),
        ]);

        session()->setFlashdata('success', 'El status de la orden fue actualizado');

        return redirect()->to(base_url('ordenes/detalles/' . $id));
    }
}
