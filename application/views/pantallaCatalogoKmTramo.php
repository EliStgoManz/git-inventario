
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>	Catalogo de Kilometros por Tramo</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?=asset_url()?>inicio">Inicio</a>
                        </li>
                        <li>
                            <a href="<?=asset_url()?>index.php/tramo/">Tramo</a>
                        </li>
                        <li class="active">
                            <strong>     Detalles del Tramo</strong>
                        </li>
                    </ol>
                </div>
</div>

 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">                   
                        <h3>Tramo <?php echo $clave?></h3>
                         
                </div>
                <div class="ibox-content">                 
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
   
                            <tr>
                                <th>Cadenamiento Carretera</th>                                
                                <th>Cadenamiento Geometrico</th>
                                <th>Latitud</th>
                                <th>Longitud</th>
                                <th>Acciones</th>
                            </tr>   
                        </thead>
                        <tbody>
                            <?php
                            foreach ($detalles as $valor) { ?>
                            <tr class="gradeA">
                                <td><?php echo $valor->cadenamiento_carretera ?></td>
                                <td><?php echo $valor->cadenamiento_geometrico ?></td>                               
                                <td><?php echo $valor->latitud ?></td>
                                <td><?php echo $valor->longitud ?></td>
                                <td><a href="<?=asset_url()?>index.php/tramo/editarDetalle?id=<?php echo utf8_decode($valor->id) ?>"><button type="button" class="btn btn-info " data-placement="top" data-toggle="tooltip" title="Editar">Editar</button></a></td>
                            </tr>
                             <?php  } ?>
                        </tbody>
            
                        </table>

                    </div>
                </div>
            </div>
        </div>      
    </div>                 
</div>



<script src="<?=asset_url()?>js/table.js"></script>
<script>
function eliminar(id) {
            swal({
                        title: "Estas seguro?",
                        text: "Se eliminara toda la informacion vinculada a este tramo",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Si, Eliminar!",
                        cancelButtonText: "No, Cancelar!",
                        closeOnConfirm: false,
                        closeOnCancel: false },
                    function (isConfirm) {
                        if (isConfirm) {
                            window.location.replace("<?=asset_url()?>tramo/eliminar?id="+id);
                        } else {
                            swal("Cancelado", "Accion Cancelada", "error");
                        }
                    });
        };
</script>