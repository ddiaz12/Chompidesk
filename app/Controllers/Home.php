<?php

namespace App\Controllers;

use App\Models\OrdenModel;
use App\Models\ServicioModel;
use App\Models\ClienteModel;
use App\Models\EmpleadoModel;
use App\Models\PiezaModel;
use App\Models\DetOrdPiezaModel;

class Home extends BaseController
{

    // * muestra vista de formulario de login
    public function index()
    {
        return view('auth/login');
    }

    //funcion para cargar vistas
    public function view($page = 'inicio')
    {
        //Este if checha si la vista existe, si no muesta un mensaje de error,
        // podemos diseñar una vista para que muestre el error, en lugar del error que muestra codeigniter
        if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        echo view('pages/head'); //carga el head de neustro HTML, aqui estan todos los links para CSS y scripts de JS 
        echo view('pages/navbar'); // carga el munu de navegacion de nuestra app
        echo view('pages/' . $page); // carga el contenido que tenemos en nuestra app
        echo view('pages/footer'); // carga el pie de pagina de la app
    }

    public function admin()
    {
        return view('admin');
    }

    public function reportes()
    {
        $clienteModel = new ClienteModel();
        $data['clientes'] = $clienteModel->findAll();
        $empleadoModel = new EmpleadoModel();
        $data['empleados'] = $empleadoModel->findAll();
        $servicioModel = new ServicioModel();
        $data['servicios'] = $servicioModel->findAll();
        $piezaModel = new PiezaModel();
        $data['piezas'] = $piezaModel->findAll();

        return view('/reportes/reportes', $data);
    }

    public function ordenesPorCliente()
    {
        $ordenModel = new OrdenModel();

        $data['ordenesPorCliente'] = $ordenModel
            ->select('orden.id_orden, orden.fecha, cliente.id_cliente, cliente.nombre, cliente.ap_paterno, estado.estado_ord')
            ->join('cliente', 'cliente.id_cliente = orden.id_cliente')
            ->join('estado', 'estado.id_estado = orden.id_estado')
            ->where('orden.id_cliente = ' . $this->request->getVar('id_cliente'))
            ->paginate(15);

        $data['pager'] = $ordenModel->pager;
        return view('/reportes/reportesOrdenesPorCliente', $data);

        //echo $this->request->getPost('id_cliente');
    }

    public function ordenesPorEmpleado()
    {
        $ordenModel = new OrdenModel();
        $data['ordenesPorEmpleado'] = $ordenModel
            ->select('orden.id_orden, orden.fecha, empleado.id_empleado, empleado.nombre, empleado.ap_paterno, estado.estado_ord')
            ->join('empleado', 'empleado.id_empleado = orden.id_empleado')
            ->join('estado', 'estado.id_estado = orden.id_estado')
            ->where('orden.id_empleado = ' . $this->request->getVar('id_empleado'))
            ->paginate(15);

        $data['pager'] = $ordenModel->pager;
        return view('/reportes/reportesOrdenesPorEmpleado', $data);
    }

    public function ordenesPorServicio()
    {
        $ordenModel = new OrdenModel();
        $data['ordenesPorServicio'] = $ordenModel
            ->select('orden.id_orden, orden.fecha, servicio.id_servicio, servicio.descripcion, orden.dispositivo, estado.estado_ord')
            ->join('servicio', 'servicio.id_servicio = orden.id_servicio')
            ->join('estado', 'estado.id_estado = orden.id_estado')
            ->where('orden.id_servicio = ' . $this->request->getVar('id_servicio'))
            ->paginate(15);


        $data['pager'] = $ordenModel->pager;
        return view('/reportes/reportesOrdenesPorServicio', $data);
    }

    public function ordenesPorPieza()
    {
        $detOrdModel = new DetOrdPiezaModel();
        $data['ordenesPorPieza'] = $detOrdModel
            ->select('orden.id_orden, orden.fecha, det_ord_pieza.id_pieza, det_ord_pieza.cantidad, pieza.nombre, orden.dispositivo, estado.estado_ord')
            ->join('orden', 'orden.id_orden = det_ord_pieza.id_orden')
            ->join('pieza', 'pieza.id_pieza = det_ord_pieza.id_pieza')
            ->join('estado', 'estado.id_estado = orden.id_estado')
            ->where('det_ord_pieza.id_pieza = ' . $this->request->getVar('id_pieza'))
            ->paginate(15);

        $data['pager'] = $detOrdModel->pager;
        return view('/reportes/reportesOrdenesPorPieza', $data);
    }

    public function ordenesPorFecha()
    {
        $ordenModel = new OrdenModel();
        $data['ordenesPorFecha'] = $ordenModel
            ->select('orden.id_orden, orden.fecha, orden.id_empleado, empleado.nombre, estado.estado_ord')
            ->join('empleado', 'empleado.id_empleado = orden.id_empleado')
            ->join('estado', 'estado.id_estado = orden.id_estado')
            ->where('orden.fecha >= ', $this->request->getVar('fechainicio'))
            ->where('orden.fecha <= ', $this->request->getVar('fechafin'))
            ->orderby('orden.fecha')
            ->paginate(15);



        $data['pager'] = $ordenModel->pager;

        $data['ordenesPorFechaPDF'] = $ordenModel
            ->select('orden.id_orden, orden.fecha, orden.id_empleado, empleado.nombre, estado.estado_ord')
            ->join('empleado', 'empleado.id_empleado = orden.id_empleado')
            ->join('estado', 'estado.id_estado = orden.id_estado')
            ->where('orden.fecha >= ', $this->request->getVar('fechainicio'))
            ->where('orden.fecha <= ', $this->request->getVar('fechafin'))
            ->orderby('orden.fecha')->findAll();

        return view('/reportes/reportesOrdenesPorFecha', $data);
    }
}
