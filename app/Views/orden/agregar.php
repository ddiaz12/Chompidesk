<?= $this->extend('plantilla') ?>
<?= $this->section('contenido') ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Pieza Orden</h3>

        <div class="col-auto">
            <a href="<?php echo base_url('/ordenes/detalles/' . $id_orden); ?>" class="btn btn-outline-danger btn-sm">Regresar</a>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <td>No.Orden</td>
                    <td>Cliente</td>
                    <td>Atiende</td>
                    <td>Dispositivo</td>
                    <td>Modelo</td>
                    <td>Servicio</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $orden->id_orden; ?></td>
                    <td><?= $orden->cln_nombre . ' ' . $orden->ap_paterno; ?></td>
                    <td><?= $orden->nombre; ?></td>
                    <td><?= $orden->dispositivo; ?></td>
                    <td><?= $orden->modelo; ?></td>
                    <td><?= $orden->descripcion; ?></td>
                </tr>

            </tbody>
        </table>

    </div>
</div>


<div class="container">
    <div class="card">
        <div class="card-body">
            <label for="pieza" class="form-label">Piezas</label>
            <div class="input-group">
                <select required class="form-select" aria-label="Seleccionar pieza" name="pieza" id="pieza">
                    <option disabled selected value="">Seleccionar</option>
                    <?php foreach ($piezas as $pieza) : ?>
                        <option value-id_pieza="<?= $pieza->id_pieza ?>" value-nombre="<?= $pieza->nombre ?>"><?= $pieza->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
                <input required type="text" placeholder="Cantidad" name="cantidad" id="cantidad" class="form-control needs-validation" onkeypress="return valideKey(event);">
                <button class="btn btn-outline-primary" type="button" onclick="agregarPieza();">Agregar</button>
            </div>
        </div>
    </div>



    <div class="container">
        <form action="<?php echo base_url('ordenes/agregarPieza/' . $id_orden); ?>" method="post" class="row g-3" id="form">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-auto me-auto">
                            <h3>Piezas por agregar a la orden</h3>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-outline-primary" type="submit">Registrar</button>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush" id="ordenPiezas">

                    </ul>
                </div>
            </div>
        </form>
    </div>

    <script>
        function agregarPieza() {

            var cantidad = document.getElementById('cantidad').value;
            var i = document.getElementById('pieza');
            var id_pieza = i.options[i.selectedIndex].getAttribute('value-id_pieza');
            var pieza = i.options[i.selectedIndex].getAttribute('value-pieza');
            var nombre = i.options[i.selectedIndex].getAttribute('value-nombre');
            console.log(id_pieza)

            var numberList = document.getElementById("ordenPiezas");
            numberList.innerHTML += '<li class="list-group-item" id="' + id_pieza + '">' +
                '<input type="text" name="id_pieza[]" value="' + id_pieza + '" readonly>' +
                //'<input type="text" name="pieza[]" value="' + pieza + '" readonly>' +
                '<input type="text" name="cantidad[]" value="' + cantidad + '" readonly>' +
                '<input type="text" name="nombre[]" value="' + nombre + '" readonly>' +
                '<button class="btn btn-secondary" onclick = "eliminarItem (event, ' + id_pieza + ');">Eliminar </button>' +
                '</li>';
        }


        function eliminarItem(event, id) {
            event.preventDefault();
            console.log(id)


            var text = id.toString();

            console.log(text)
            var item = document.getElementById(text);
            item.parentNode.removeChild(item);

        }
    </script>

    <script type="text/javascript">
        function valideKey(evt) {

            // code is the decimal ASCII representation of the pressed key.
            var code = (evt.which) ? evt.which : evt.keyCode;

            if (code == 8) { // backspace.
                return true;
            } else if (code >= 48 && code <= 57) { // is a number.
                return true;
            } else { // other keys.
                return false;
            }
        }
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!--<br>
        <div class="col-auto">
            <button form="form" class="btn btn-primary btn-sm" title="Agregar">
                Agregar Pieza
            </button>
        </div>-->
</div>
<?= $this->endSection() ?>