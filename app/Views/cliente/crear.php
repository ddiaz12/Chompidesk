<?= $this->extend('plantilla') ?>
<?= $this->section('contenido') ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Nuevo Cliente</h3>
        <div class="col-auto">
            <button form="formularioEmpleado" class="btn btn-primary btn-sm" title="Registrar empleado">
                Registrar
            </button>
            <td>
                <a href="<?php echo base_url('clientes'); ?>" class="btn btn-outline-danger btn-sm">Regresar</a>
            </td>
        </div>
    </div>
    <form action="<?php echo base_url('clientes/registrar'); ?>" method="post" class="row g-3" id="formularioEmpleado">
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input required type="text" size="5" class="form-control" name="nombre" id="nombre">
        </div>
        <div class="col-md-6">
            <label for="ap_paterno" class="form-label">Apellido Paterno</label>
            <input required type="text" class="form-control" name="ap_paterno" id=" ap_paterno">
        </div>
        <div class="col-md-6">
            <label for="ap_materno" class="form-label">Apellido Materno</label>
            <input required type="text" class="form-control" name="ap_materno" id=" ap_materno">
        </div>
        <div class="col-md-6">
            <label for="telefono" class="form-label">Telefono</label>
            <input required type="text" pattern="[0-9]{10}" title="Debe ser de 10 digitos y contener solo caracteres numéricos" class="form-control" name="telefono" id=" telefono">
        </div>
        <div class="col-md-6">
            <label for="calle" class="form-label">Calle</label>
            <input required type="text" class="form-control" name="calle" id=" calle">
        </div>
        <div class="col-md-6">
            <label for="num_ext" class="form-label">Numero Exterior</label>
            <input required type="text" class="form-control" name="num_ext" id=" num_ext">
        </div>
        <div class="col-md-6">
            <label for="colonia" class="form-label">Colonia</label>
            <input required type="text" class="form-control" name="colonia" id=" colonia">
        </div>
        <div class="col-md-6">
            <label for="lugar" class="form-label">Lugar</label>
            <input required type="text" class="form-control" name="lugar" id=" lugar">
        </div>
    </form>
</div>
<?= $this->endSection() ?>