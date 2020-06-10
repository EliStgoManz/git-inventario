<style>
div.dt-button-info {  
    z-index: 500 !important;
}
</style>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>	Inventario de Irregularidades del Señalamiento Horizontal</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?=asset_url()?>inicio">Inicio</a>
                        </li>
                        <li>
                            <a href="<?=asset_url()?>dispositivoSeguridad/">Tramos con Irregularidades</a>
                        </li>
                        <li class="active">
                            <strong>    Irregularidades del Señalamiento Horizontal</strong>
                        </li>
                    </ol>
                </div>
</div>

 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">                   
                        <h2>Tramo <?php echo $clave?></h2>
                        
                </div>
                <div class="ibox-content"
>                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th class="text-center" colspan="2" >Coordenada INICIAL</th>
                                <th class="text-center" colspan="2">Coordenada FINAL</th>
                                <th class="text-center" colspan="2">Localización</th>
                                <th class="text-center" colspan="5"></th>
                                <th class="text-center" colspan="2">Cuenta con Botones</th>
                                <th class="text-center" colspan="6"></th>
                            </tr>
                            <tr>
                                <th>Latitud</th>
                                <th>Longitud</th>
                                <th>Latitud</th>
                                <th>Longitud</th>
                                <th>Km Inicial</th>
                                <th>km Final</th>
                                <th>Nombre de la Marca</th>
                                <th>Clave de la Marca</th>
                                <th>Color de la marca instalada</th>
                                <th>Ancho de la marca instalada</th>
                                <th>¿La marca es reflejante?</th>
                                <th>Si</th>
                                <th>No</th>
                                <th>FOTO No.</th>
                                <th>Longitud que no cumple con la normativa</th>
                                <th>Longitud de marca que falta</th>
                                <th>Observaciones</th>
                                <th>Accion para corregir</th>
                                <th>Acciones</th>
                            </tr>   
                        </thead>
                        <tbody>
                            <?php
                            foreach ($dispositivos as $valor) { ?>
                            <tr class="gradeA">
                                <td><?php echo $valor->latini ?></td>
                                <td><?php echo $valor->longini ?></td>
                                <td><?php echo $valor->latfin ?></td>
                                <td><?php echo $valor->longfin ?></td>
                                <td><?php echo $valor->mtsini ?></td>
                                <td><?php echo $valor->mtsfin ?></td>
                                <td><?php echo $valor->nombremarca ?></td>
                                <td><?php echo $valor->clave_marca ?></td>
                                <td><?php echo $valor->colormarca ?></td>
                                <td><?php echo $valor->ancho_marca ?></td>
                                <td><?php if($valor->marca_reflejante==0)echo "No"; else{ echo "Si";}  ?></td>
                                <td><?php if($valor->botones==1)echo "✖";?></td>
                                <td><?php if($valor->botones==0)echo "✖";?></td>
                                <td><?php echo $valor->imagen ?></td>
                                <td><?php echo $valor->longncumple ?></td>
                                <td><?php echo $valor->longfalta ?></td>
                                <td><?php echo $valor->obs ?></td>
                                <td><?php echo $valor->accion ?></td>
                                <td><div class="tooltip-demo"><?php if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){?><a href="<?=asset_url()?>index.php/dispositivoSeguridad/editarDH?id=<?php echo utf8_decode($valor->id) ?>"><button type="button" class="btn btn-info btn-circle" data-placement="top" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></button></a> <a href="#" onClick="eliminar(<?php echo utf8_decode($valor->id)?>);" ><button type="button" class="btn btn-danger btn-circle" data-placement="top" data-toggle="tooltip" title="Eliminar Tramo"><i class="fa fa-times"></i></button></a><?php }?></div></td>
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

<script >

function eliminar(id) {
            swal({
                        title: "Estas seguro?",
                        text: "Se eliminara este Dispositivo de Seguridad y no se podra recuperar",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Si, Eliminar!",
                        cancelButtonText: "No, Cancelar!",
                        closeOnConfirm: false,
                        closeOnCancel: false },
                    function (isConfirm) {
                        if (isConfirm) {
                            window.location.replace("<?=asset_url()?>dispositivoSeguridad/eliminarDH?id="+id);
                        } else {
                            swal("Cancelado", "Accion Cancelada", "error");
                        }
                    });
        };

</script>