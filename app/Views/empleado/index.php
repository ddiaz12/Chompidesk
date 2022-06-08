<?php echo $this->extend('plantilla'); ?>
<?php echo $this->section('contenido'); ?>

<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Empleados</h3>
        <div class="col-auto">
            <a href="<?php echo base_url('empleados/crear'); ?>" class="btn btn-primary btn-sm" title="Nuevo empleado">
                <i class="bi bi-plus-circle"></i>
                Nuevo
            </a>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>#</td>
                <td>Nombre</td>
                <td>Apellido Paterno</td>
                <td>Apellido Materno</td>
                <td>Telefono</td>
                <td>Calle</td>
                <td>Numero Exterior</td>
                <td>Puesto</td>
                <td>Usuario</td>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empleados as $i => $empleado) : ?>
                <tr>
                    <td><?= $i + 1; ?></td>
                    <td><?= $empleado->nombre; ?></td>
                    <td><?= $empleado->ap_paterno; ?></td>
                    <td><?= $empleado->ap_materno; ?></td>
                    <td><?= $empleado->telefono; ?></td>
                    <td><?= $empleado->calle; ?></td>
                    <td><?= $empleado->num_ext; ?></td>
                    <td><?= $empleado->puesto_emp; ?></td>
                    <td><?= $empleado->usuario; ?></td>
                    
                    <td>
                        <a href="<?php echo base_url('empleados/editar/' . $empleado->id_empleado); ?>" class="btn btn-outline-primary btn-sm">Editar</a>
                        <a href="<?php echo base_url('empleados/eliminar/' . $empleado->id_empleado); ?>" class="btn btn-outline-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $pager->links(); ?>
</div>


<?php echo $this->endSection(); ?>