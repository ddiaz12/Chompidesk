<?= $this->extend('plantilla') ?>
<?= $this->section('contenido') ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Detalle Orden</h3>
        <div class="col-auto">
            <td>
                <a href="<?php echo base_url('ordenes'); ?>" class="btn btn-outline-danger btn-sm">Regresar</a>
            </td>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <td>No.Orden</td>
                    <td>Fecha</td>
                    <td>Cliente</td>
                    <td>Atiende</td>
                    <td>Dispositivo</td>
                    <td>Marca</td>
                    <td>Modelo</td>
                    <td>Servicio</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $orden->id_orden; ?></td>
                    <td><?= $orden->fecha; ?></td>
                    <td><?= $orden->cln_nombre . ' ' . $orden->ap_paterno; ?></td>
                    <td><?= $orden->nombre; ?></td>
                    <td><?= $orden->dispositivo; ?></td>
                    <td><?= $orden->marca; ?></td>
                    <td><?= $orden->modelo; ?></td>
                    <td><?= $orden->descripcion; ?></td>
                    <td><?= $orden->estado_ord; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <div>
        <div class="col-6">
            <form action="<?php echo base_url('ordenes/updateEstado/' . $orden->id_orden); ?>" method="post" class="row g-3" id="form">
                <h3 for="estado" class="form-h3">Actualizar status orden</h3>
                <div class="input-group">
                    <select required class="form-select" aria-label="Estado de la orden" name="estado_ord" id="estado_ord">
                        <option disabled selected value="">Seleccionar</option>
                        <?php foreach ($estados as $estado) : ?>
                            <option value="<?php echo $estado->id_estado; ?>"><?php echo $estado->estado_ord; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary " type="submit">Actualizar Estado</button>
                    </div>
                    <div >
                        <td>
                            <a href="<?php echo base_url('ordenes/detalles/agregar/' . $orden->id_orden); ?>" class="btn btn-outline-primary ">Agregar Pieza</a>
                        </td>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<br>

<div class="container">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>Id_orden</td>
                <td>Id_pieza</td>
                <td>Cantidad</td>
                <td>Nombre Pieza</td>
                <td>Tipo Dispositivo</td>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($det_ord_pieza) and !is_null($det_ord_pieza)) : ?>
                <?php foreach ($det_ord_pieza as $detalle) : ?>
                    <tr>
                        <td><?= $detalle->id_orden ?></td>
                        <td><?= $detalle->id_pieza ?></td>
                        <td><?= $detalle->cantidad ?></td>
                        <td><?= $detalle->nombre ?></td>
                        <td><?= $detalle->tipo_dispositivo ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td>No hay datos para mostrar</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>
<?= $this->endSection() ?>