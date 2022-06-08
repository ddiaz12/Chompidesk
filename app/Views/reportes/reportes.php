<?php echo $this->extend('plantilla'); ?>

<?php echo $this->section('contenido'); ?>
<?= $this->extend('plantilla') ?>
<?= $this->section('contenido') ?>
<!-- DIV para un contenido o header de presentacion -->
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Reportes</h3>
    </div>
    <div class="row my-3 mx-1 gap-2">
        <div class="card bg-light border-0 shadow-sm col-md-3">
            <div class="card-body">
                <h5 class="card-title">Ordenes por cliente</h5>
                <br>
                <form action="<?php echo base_url('reportes/ordenes-por-cliente'); ?>" method="get" class="row g-3" id="ordenCliente">
                    <select class="form-select" name="id_cliente" id="id_cliente">
                        <option disabled selected value="">Selecciona cliente</option>
                        <?php foreach ($clientes as $cliente) : ?>
                            <option value="<?php echo $cliente->id_cliente; ?>"><?php echo $cliente->nombre . ' ' . $cliente->ap_paterno; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <br>
                    <button form="ordenCliente" class="btn btn-primary btn-sm" title="">
                        Reporte
                    </button>
                </form>
            </div>
        </div>
        <div class="card bg-light border-0 shadow-sm col-md-3">
            <div class="card-body">
                <h5 class="card-title">Ordenes por empleado</h5>
                <br>
                <form action="<?php echo base_url('reportes/ordenes-por-empleado'); ?>" method="get" class="row g-3" id="ordenEmpleado">
                    <select class="form-select" name="id_empleado" id="id_empleado">
                        <option disabled selected value="">Selecciona empleado</option>
                        <?php foreach ($empleados as $empleado) : ?>
                            <option value="<?php echo $empleado->id_empleado; ?>"><?php echo $empleado->nombre . ' ', $empleado->ap_paterno; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <button form="ordenEmpleado" class="btn btn-primary btn-sm" title="">
                        Reporte
                    </button>
                </form>
            </div>
        </div>
        <div class="card bg-light border-0 shadow-sm col-md-3">
            <div class="card-body">
                <h5 class="card-title">Ordenes por servicio</h5>
                <br>
                <form action="<?php echo base_url('reportes/ordenes-por-servicio'); ?>" method="get" class="row g-3" id="ordenServicio">
                    <select class="form-select" name="id_servicio" id="id_servicio">
                        <option disabled selected value="">Selecciona servicio</option>
                        <?php foreach ($servicios as $servicio) : ?>
                            <option value="<?php echo $servicio->id_servicio; ?>"><?php echo $servicio->descripcion; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <button form="ordenServicio" class="btn btn-primary btn-sm" title="">
                        Reporte
                    </button>
                </form>
            </div>
        </div>
        <div class="card bg-light border-0 shadow-sm col-md-3">
            <div class="card-body">
                <h5 class="card-title">Ordenes por pieza</h5>
                <br>
                <form action="<?php echo base_url('reportes/ordenes-por-pieza'); ?>" method="get" class="row g-3" id="ordenPieza">
                    <select class="form-select" name="id_pieza" id="id_pieza">
                        <option disabled selected value="">Selecciona pieza</option>
                        <?php foreach ($piezas as $pieza) : ?>
                            <option value="<?php echo $pieza->id_pieza; ?>"><?php echo $pieza->nombre; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <button form="ordenPieza" class="btn btn-primary btn-sm" title="">
                        Reporte
                    </button>
                </form>
            </div>
        </div>

        <div class="card bg-light border-0 shadow-sm col-md-3">
            <div class="card-body">
                <h5 class="card-title">Ordenes por fecha</h5>
                <br>
                <form action="<?php echo base_url('reportes/ordenes-por-fecha'); ?>" method="get" class="row g-3" id="ordenFecha">
                    <label for="fechainicio">Fecha Inicio</label>
                    <input type="date" name="fechainicio">
                    <label for="fechafin">Fecha Fin</label>
                    <input type="date" name="fechafin">
                    <br>
                    <button form="ordenFecha" class="btn btn-primary btn-sm" title="">
                        Reporte
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?php echo $this->endSection(); ?>