<?= $this->extend('plantilla') ?>
<?= $this->section('contenido') ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Editar Servicio</h3>
        <div class="col-auto">
            <button form="formularioEmpleado" class="btn btn-primary btn-sm" title="Registrar servicio">
                Actualizar
            </button>
            <td>
                <a href="<?php echo base_url('servicios'); ?>" class="btn btn-outline-danger btn-sm">Regresar</a>
            </td>
        </div>
    </div>
    <form action="<?php echo base_url('servicios/actualizar/' . $servicio->id_servicio); ?>" method="post" class="row g-3" id="formularioEmpleado">
        <div class="col-md-6">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input required type="text" size="5" class="form-control" value="<?php echo $servicio->descripcion; ?>" name="descripcion" id="descripcion">
        </div>
        <div class="col-md-6">
            <label for="precio" class="form-label">Precio</label>
            <input required type="text" pattern="[0-9]{1,}" title="Solo debe contener caracteres numéricos" class="form-control" value="<?php echo $servicio->precio; ?>" name="precio" id=" precio">
        </div>
    </form>
</div>
<?= $this->endSection() ?>