<?php echo $this->extend('plantilla'); ?>

<?php echo $this->section('contenido'); ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Ordenes por Servicio</h3>
        <div class="col-auto">
            <td>
                <a href="<?php echo base_url('reportes'); ?>" class="btn btn-outline-danger btn-sm">Regresar</a>
            </td>
        </div>
    </div>
    <table id="myTable" class="table table-striped table-hover">
        <thead>
            <tr>
                <td>#</td>
                <td>Id Orden</td>
                <td>Fecha</td>
                <td>Servicio</td>
                <td>Dispositivo</td>
                <td>Status Orden</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ordenesPorServicio as $i => $orden) : ?>
                <tr>
                    <td><?= $i + 1; ?></td>
                    <td><?= $orden->id_orden; ?></td>
                    <td><?= $orden->fecha; ?></td>
                    <td><?= $orden->descripcion; ?></td>
                    <td><?= $orden->dispositivo; ?></td>
                    <td><?= $orden->estado_ord; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $pager->links(); ?>
</div>

<div class="col-md-2 text-center  container bg-light   form-floating">
    <button onclick="makePDF();" id="btnPDF" type="button" class="w-100 btn btn-lg btn-sm btn-secondary"> Descargar PDF</button>
</div>



<script type="text/javascript">
    function makePDF() {
        var options = {
            align: 'center'
        }



        /// formato del documento 
        var doc = new jsPDF({
            orientation: 'p',
            unit: 'cm',
            format: 'letter',
            putOnlyUsedFonts: true
        });




        //  AGREGA CHART AL DOCUMENTO
        //doc.addImage(dataURL, 'png', 2.5, 6.5, 17, 8);
        doc.setFont("times", "italic");
        doc.setFontSize(10);
        doc.autoTable({
            html: '#myTable',
            startY: 6,
            startX: 2.5,
            theme: 'grid',
            margin: {
                top: 5.5,
                bottom: 3
            },
            headStyles: {
                fillColor: [14, 148, 180],
                textColor: [255, 255, 255],
                lineWidth: 0.01
            },
            bodyStyles: {
                lineWidth: 0.01,
                fontSize: 8,
                columnStyles: {
                    0: {
                        cellWidth: 2,
                    },
                    1: {
                        cellWidth: 2,
                        align: 'left'
                    }
                },
                styles: {
                    font: 'Helvetica',
                    cellWidth: 'auto',
                    textColor: [150, 150, 150],
                    align: 'center'
                }
            }


        });


        doc = addWaterMark(doc);
        //var tableName = document.getElementById('titleConsulta').textContent.toUpperCase();
        //doc.output('dataurlnewwindow');
        doc.save("OrdenesPorServicio.pdf");
    }

    function addWaterMark(doc) {
        var options = {
            align: 'center'
        }

        //var tableName = document.getElementById('titleConsulta').textContent.toUpperCase();
        var totalPages = doc.internal.getNumberOfPages();
        //  content
        doc.setFontSize(12);
        doc.setTextColor(160, 160, 160);

        //  var img2 = new Image()
        //  img2.src = globalURL + 'assets/img/SINSAC_logo.jpeg';
        // doc.addImage(img2, 'jpeg', 17.5, 25.5, 3, 2.5);

        var docHeader = new Image()
        docHeader.src = base_URL + 'image/chompidesklogo.jpg';
        // doc.addImage(docHeader, 'jpg', 2, 1, 3, 2.5);

        var docFooter = new Image()
        docFooter.src = base_URL + 'image/piepagina.jpg';
        //doc.addImage(docFooter, 'jpg', 0, 25.19, 21.59, 2.75);


        for (i = 1; i <= totalPages; i++) {
            doc.setPage(i);
            // agrega el formato de la pagina como fondo
            const d = new Date();

            doc.addImage(docHeader, 'jpg', 1, 1, 8, 2.5);
            doc.addImage(docFooter, 'jpg', 0, 25.19, 21.59, 2.75);
            // Text headers
            doc.setFont("Helvetica", "bold");
            doc.setTextColor(0, 0, 0);
            //doc.setFontSize(20);
            //doc.text("Chompidesk", 10.8, 2, options);
            // footer
            doc.setFontSize(20);
            doc.text("Ordenes por Cliente", 10.8, 5, options);

            doc.setFont("Helvetica", "italic");
            doc.setFontSize(8);
            doc.text("Documento generado por ChompiTech", 10.8, 26, null, null, "center");
            doc.text("Creado el " + d.toLocaleDateString() + ' ' + d.toLocaleTimeString(), 10.8, 26.5, null, null, "center");

            doc.text("ChompiTech Inc. -  Plaza Sendera Local 20 ", 10.8, 27, null, null, "center");
            doc.text("C.P. 28978 Teléfono 312-155-8154 / 312-196-0451, ", 10.8, 27.5, null, null, "center");



        }

        return doc;
    }
</script>

<?php echo $this->endSection(); ?>