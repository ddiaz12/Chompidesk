<?= $this->extend('plantilla') ?>
<?= $this->section('contenido') ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Nueva orden</h3>
        <div class="col-auto">
            <button form="form" class="btn btn-primary btn-sm" title="Registrar orden">
                Registrar
            </button>
            <td>
                <a href="<?php echo base_url('ordenes'); ?>" class="btn btn-outline-danger btn-sm">Regresar</a>
            </td>
        </div>
    </div>
    <form action="<?php echo base_url('ordenes/registrar'); ?>" method="post" class="row g-3" id="form">
        <div class="col-md-6">
            <label for="servicio" class="form-label">Servicios</label>
            <select required class="form-select" aria-label="Selección de servicios" name="servicio" id="servicio">
                <option disabled selected value="">Seleccionar</option>
                <?php foreach ($servicios as $servicio) : ?>
                    <option value="<?php echo $servicio->id_servicio; ?>"><?php echo $servicio->descripcion; ?></option>
                <?php endforeach; ?>

            </select>
        </div>
        <div class="col-md-6">
            <label for="dispositivo" class="form-label">Dispositivo</label>
            <input required type="text" class="form-control" name=" dispositivo" id=" dispositivo">
        </div>
        <div class="col-md-6">
            <label for="marca" class="form-label">Marca</label>
            <input required type="text" class="form-control" name="marca" id="marca">
        </div>
        <div class="col-md-6">
            <label for="modelo" class="form-label">Modelo</label>
            <input required type="text" class="form-control" name="modelo" id="modelo">
        </div>
        <!--<div class="col-md-6">
            <label for="estado" class="form-label">Status</label>
            <select required class="form-select" aria-label="Estado de la orden" name="estado_ord" id="estado_ord">
                <option disabled selected value="">Seleccionar</option>
                <?php foreach ($estados as $estado) : ?>
                    <option value="<?php echo $estado->estado_ord; ?>"><?php echo $estado->estado_ord; ?></option>
                <?php endforeach; ?>

            </select>
        </div>-->
        <div class="col-md-6">
            <label for="cliente" class="form-label">Clientes</label>
            <select required class="form-select" aria-label="Selección de clientes" name="cliente" id="cliente">
                <option disabled selected value="">Seleccionar</option>
                <?php foreach ($clientes as $cliente) : ?>
                    <option value="<?php echo $cliente->id_cliente; ?>"><?php echo $cliente->nombre . ' ' . $cliente->ap_paterno; ?></option>
                <?php endforeach; ?>

            </select>
        </div>

    </form>
</div>
</div>
<?= $this->endSection() ?>