<?= $this->extend('plantilla') ?>
<?= $this->section('contenido') ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Editar Empleado</h3>
        <div class="col-auto">
            <button form="formularioEmpleado" class="btn btn-primary btn-sm" title="Registrar empleado">
                Actualizar
            </button>
            <td>
                <a href="<?php echo base_url('empleados'); ?>" class="btn btn-outline-danger btn-sm">Regresar</a>
            </td>
        </div>
    </div>
    <form action="<?php echo base_url('empleados/actualizar/' . $empleado->id_empleado); ?>" method="post" class="row g-3" id="formularioEmpleado">
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input required type="text" size="5" class="form-control" value="<?php echo $empleado->nombre; ?>" name="nombre" id="nombre">
        </div>
        <div class="col-md-6">
            <label for="ap_paterno" class="form-label">Apellido Paterno</label>
            <input required type="text" class="form-control" value="<?php echo $empleado->ap_paterno; ?>" name="ap_paterno" id=" ap_paterno">
        </div>
        <div class="col-md-6">
            <label for="ap_materno" class="form-label">Apellido Materno</label>
            <input required type="text" class="form-control" value="<?php echo $empleado->ap_materno; ?>" name="ap_materno" id=" ap_materno">
        </div>
        <div class="col-md-6">
            <label for="telefono" class="form-label">Telefono</label>
            <input required type="text" pattern="[0-9]{10}" title="Debe ser de 10 digitos y contener solo caracteres numéricos" class="form-control" value="<?php echo $empleado->telefono; ?>" name="telefono" id=" telefono">
        </div>
        <div class="col-md-6">
            <label for="calle" class="form-label">Calle</label>
            <input required type="text" class="form-control" value="<?php echo $empleado->calle; ?>" name="calle" id=" calle">
        </div>
        <div class="col-md-6">
            <label for="num_ext" class="form-label">Numero Exterior</label>
            <input required type="text" class="form-control" value="<?php echo $empleado->num_ext; ?>" name="num_ext" id=" num_ext">
        </div>
        <div class="col-md-6">
            <label for="puesto" class="form-label">Puesto</label>
            <select required class="form-select" aria-label="Puesto del empleado" name="puesto_emp" id="puesto_emp">
                <option disabled selected value=""><?php echo $empleado->puesto_emp; ?></option>
                <?php foreach ($puestos as $puesto) : ?>
                    <option value="<?php echo $puesto->id_puesto; ?>"><?php echo $puesto->puesto_emp; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="colonia" class="form-label">Usuario</label>
            <input required type="text" pattern="[a-z]{3,6}" title="El usuario debe contener solo minusculas y un minimo de 3 y maximo de 6 letras" class="form-control" value="<?php echo $empleado->usuario; ?>" name="usuario" id=" usuario">
        </div>
        <div class="col-md-6">
            <label for="colonia" class="form-label">Contraseña</label>
            <input required type="text" class="form-control" minlength="6" maxlength="8" value="<?php echo $empleado->contrasena; ?>" name="contrasena" id=" contrasena">
        </div>
    </form>
</div>
<?= $this->endSection() ?>