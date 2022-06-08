<?php echo $this->extend('plantilla'); ?>
<?php echo $this->section('contenido'); ?>

<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Piezas</h3>
        <div class="col-auto">
            <a href="<?php echo base_url('piezas/crear'); ?>" class="btn btn-primary btn-sm" title="Nueva pieza">
                <i class="bi bi-plus-circle"></i>
                Nueva
            </a>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>#</td>
                <td>Nombre</td>
                <td>Tipo Dispositivo</td>
                <td>Marca</td>
                <td>Modelo</td>
                <td>Precio Unitario</td>
                <td>Precio Venta</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($piezas as $i => $pieza) : ?>
                <tr>
                    <td><?= $i + 1; ?></td>
                    <td><?= $pieza->nombre; ?></td>
                    <td><?= $pieza->tipo_dispositivo; ?></td>
                    <td><?= $pieza->marca; ?></td>
                    <td><?= $pieza->modelo; ?></td>
                    <td><?= $pieza->precio_unitario; ?></td>
                    <td><?= $pieza->precio_venta; ?></td>
                    <td>
                        <a href="<?php echo base_url('piezas/editar/' . $pieza->id_pieza); ?>" class="btn btn-outline-primary btn-sm">Editar</a>
                        <a href="<?php echo base_url('piezas/eliminar/' . $pieza->id_pieza); ?>" class="btn btn-outline-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $pager->links(); ?>
</div>
</div>

<?php echo $this->endSection(); ?>