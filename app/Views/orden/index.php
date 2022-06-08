<?php echo $this->extend('plantilla'); ?>
<?php echo $this->section('contenido'); ?>

<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Ordenes</h3>
        <div class="col-auto">
            <a href="<?php echo base_url('ordenes/crear'); ?>" class="btn btn-primary btn-sm" title="Nueva orden">
                <i class="bi bi-plus-circle"></i>
                Nueva
            </a>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>ID Orden</td>
                <td>Cliente</td>
                <td>Fecha</td>
                <td>Dispositivo</td>
                <td>Estado Orden</td>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($ordenes) and !is_null($ordenes)) : ?>
                <?php foreach ($ordenes as $orden) : ?>
                    <tr>
                        <td><?= $orden->id_orden; ?></td>
                        <td><?= $orden->cln_nombre . ' ' . $orden->ap_paterno; ?></td>
                        <td><?= $orden->fecha; ?></td>
                        <td><?= $orden->dispositivo; ?></td>
                        <td><?= $orden->estado_ord; ?></td>
                        <td>
                            <a href="<?php echo base_url('ordenes/detalles/' . $orden->id_orden); ?>" class="btn btn-outline-primary btn-sm">Ver detalle</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td>No hay datos para mostrar</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?= $pager->links(); ?>
</div>
</div>
<?php echo $this->endSection(); ?>