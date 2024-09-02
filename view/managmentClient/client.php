<div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Listado casos</h6>
        </div>
    </div>
    <div class="card-body">
        <div class="">
            <div class="row">
                <table id="tabla_casos" class="display" style="padding: 10% !important;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Usuario</th>
                            <th>Empresa</th>
                            <th>Telefono</th>
                            <th>Estatus</th>
                            <th>notas</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        listCase();
    });
</script>