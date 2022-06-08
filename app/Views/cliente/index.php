<?php echo $this->extend('plantilla'); ?>
<?php echo $this->section('contenido'); ?>

<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Clientes</h3>
        <div class="col-auto">
            <a href="<?php echo base_url('clientes/crear'); ?>" class="btn btn-primary btn-sm" title="Nueva pieza">
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
                <td>Colonia</td>
                <td>Lugar</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $i => $cliente) : ?>
                <tr>
                    <td><?= $i + 1; ?></td>
                    <td><?= $cliente->nombre; ?></td>
                    <td><?= $cliente->ap_paterno; ?></td>
                    <td><?= $cliente->ap_materno; ?></td>
                    <td><?= $cliente->telefono; ?></td>
                    <td><?= $cliente->calle; ?></td>
                    <td><?= $cliente->num_ext; ?></td>
                    <td><?= $cliente->colonia; ?></td>
                    <td><?= $cliente->lugar; ?></td>
                    <td>
                        <a href="<?php echo base_url('clientes/editar/' . $cliente->id_cliente); ?>" class="btn btn-outline-primary btn-sm">Editar</a>
                        <a href="<?php echo base_url('clientes/eliminar/' . $cliente->id_cliente); ?>" class="btn btn-outline-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $pager->links(); ?>
</div>
</div>

<?php echo $this->endSection(); ?>