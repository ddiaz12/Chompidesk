<?php echo $this->extend('plantilla'); ?>

<?php echo $this->section('contenido'); ?>
<?= $this->extend('plantilla') ?>
<?= $this->section('contenido') ?>
<!-- DIV para un contenido o header de presentacion -->
<div class=" container mt-5 text-center">
    <h3 class="uppercase">Bienvenido a Chompidesk</h3>
    <h6>Sistema de gestion de ordenes de servicio para la empresa ChompiTech Inc.</h6>
</div>
<br>
<!-- DIV para contenido de ka app [tablas, forms, etc.] -->
<div class="container  px-4  gy-5 ">

</div>

<div class="container  px-4  gy-5">
    <h4>Equipo Técnico:</h4>
    <ul>
        <li>Mauricio Arellano Bayardo</li>
        <li>Diego Rodolfo Diaz Morfin</li>
        <li>Cristian Miguel Valladares Velasco</li>
    </ul>
</div>
<?= $this->endSection() ?>
<?php echo $this->endSection(); ?>