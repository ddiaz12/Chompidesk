<?= $this->extend('plantilla') ?>
<?= $this->section('contenido') ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Nuevo Servicio</h3>
        <div class="col-auto">
            <button form="formularioEmpleado" class="btn btn-primary btn-sm" title="Registrar servicio">
                Registrar
            </button>
            <td>
                <a href="<?php echo base_url('servicios'); ?>" class="btn btn-outline-danger btn-sm">Regresar</a>
            </td>
        </div>
    </div>
    <form action="<?php echo base_url('servicios/registrar'); ?>" method="post" class="row g-3" id="formularioEmpleado">
        <div class="col-md-6">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input required type="text" size="5" class="form-control" name="descripcion" id="descripcion">
        </div>
        <div class="col-md-6">
            <label for="precio" class="form-label">Precio</label>
            <input required type="text" pattern="[0-9]{1,}" title="Solo debe contener caracteres numéricos" class="form-control" name="precio" id=" precio">
        </div>
    </form>
</div>
<?= $this->endSection() ?>