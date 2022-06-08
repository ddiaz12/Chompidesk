<?= $this->extend('plantilla') ?>
<?= $this->section('contenido') ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Editar Piezas</h3>
        <div class="col-auto">
            <button form="formularioEmpleado" class="btn btn-primary btn-sm" title="Registrar pieza">
                Actualizar
            </button>
            <td>
                <a href="<?php echo base_url('piezas'); ?>" class="btn btn-outline-danger btn-sm">Regresar</a>
            </td>
        </div>
    </div>
    <form action="<?php echo base_url('piezas/actualizar/' . $pieza->id_pieza); ?>" method="post" class="row g-3" id="formularioEmpleado">
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input required type="text" size="5" class="form-control" value="<?php echo $pieza->nombre; ?>" name="nombre" id="nombre">
        </div>
        <div class="col-md-6">
            <label for="tipo_dispositivo" class="form-label">Tipo Dispositivo</label>
            <input required type="text" class="form-control" value="<?php echo $pieza->tipo_dispositivo; ?>" name="tipo_dispositivo" id=" tipo_dispositivo">
        </div>
        <div class="col-md-6">
            <label for="marca" class="form-label">Marca</label>
            <input required type="text" class="form-control" value="<?php echo $pieza->marca; ?>" name="marca" id=" marca">
        </div>
        <div class="col-md-6">
            <label for="modelo" class="form-label">Modelo</label>
            <input required type="text" class="form-control" value="<?php echo $pieza->modelo; ?>" name="modelo" id=" modelo">
        </div>
        <div class="col-md-6">
            <label for="precio_unitario" class="form-label">Precio Unitario</label>
            <input required type="text" pattern="[0-9]{1,}" title="Solo debe contener caracteres numéricos" class="form-control" value="<?php echo $pieza->precio_unitario; ?>" name="precio_unitario" id=" precio_unitario">
        </div>
        <div class="col-md-6">
            <label for="precio_venta" class="form-label">Precio Venta</label>
            <input required type="text" pattern="[0-9]{1,}" title="Solo debe contener caracteres numéricos" class="form-control" value="<?php echo $pieza->precio_venta; ?>" name="precio_venta" id=" precio_venta">
        </div>
    </form>
</div>
<?= $this->endSection() ?>