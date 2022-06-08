<?php echo $this->extend('plantilla'); ?>
<?php echo $this->section('contenido'); ?>

<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Servicios</h3>
        <div class="col-auto">
            <a href="<?php echo base_url('servicios/crear'); ?>" class="btn btn-primary btn-sm" title="Nuevo Servicio">
                <i class="bi bi-plus-circle"></i>
                Nuevo
            </a>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>#</td>
                <td>Descripcion</td>
                <td>Precio</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servicios as $i => $servicio) : ?>
                <tr>
                    <td><?= $i + 1; ?></td>
                    <td><?= $servicio->descripcion; ?></td>
                    <td><?= $servicio->precio; ?></td>
                    <td>
                        <a href="<?php echo base_url('servicios/editar/' . $servicio->id_servicio); ?>" class="btn btn-outline-primary btn-sm">Editar</a>
                        <a href="<?php echo base_url('servicios/eliminar/' . $servicio->id_servicio); ?>" class="btn btn-outline-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $pager->links(); ?>
</div>
</div>

<?php echo $this->endSection(); ?>