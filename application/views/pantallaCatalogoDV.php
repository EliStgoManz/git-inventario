<style>
div.dt-button-info {  
    z-index: 500 !important;
}
</style>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2> Inventario de Irregularidades del Señalamiento Vertical</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?=asset_url()?>inicio">Inicio</a>
                        </li>
                        <li>
                            <a href="<?=asset_url()?>dispositivoSeguridad/">Tramos con Irregularidades</a>
                        </li>
                        <li class="active">
                            <strong>    Irregularidades del Señalamiento Vertical</strong>
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
                                <th class="text-center" colspan="2" >Coordenadas</th>
                                <th class="text-center" colspan="3">Localización</th>
                                <th class="text-center" colspan="2"></th>
                                <th class="text-center" colspan="2">La ubicación longitudinal  y lateral del dispositivo cumple con la normatividad</th>
                                <th class="text-center" colspan="2">El color del dispositivo cumple con la normatividad</th>
                                <th class="text-center" colspan="2">La forma del dispositivo cumple con la normatividad</th>
                                <th class="text-center" colspan="2">El pictograma cumple con la normatividad</th>
                                <th class="text-center" colspan="2">El estado físico y reflejancia del dispositivo es adecuada</th>
                                <th class="text-center" colspan="2">Las dimensiones del dipositivo son adecuadas</th>
                                <th class="text-center" colspan="2">El mensaje es congruente con lo que señala</th>
                                <th class="text-center" colspan="1"></th>
                                <th class="text-center" colspan="2">Indique la caracteristica de la señal</th>
                                
                            </tr>
                            <tr>
                                <th>Latitud</th>
                                <th>Longitud</th>
                                <th>KM.</th>
                                <th>Lado Izq.</th>
                                <th>Lado Der.</th>
                                <th>Nombre del Dispositivo</th>
                                <th>Clave</th>
                                <th>Si</th>
                                <th>No</th>
                                <th>Si</th>
                                <th>No</th>
                                <th>Si</th>
                                <th>No</th>
                                <th>Si</th>
                                <th>No</th>
                                <th>Si</th>
                                <th>No</th>
                                <th>Si</th>
                                <th>No</th>
                                <th>Si</th>
                                <th>No</th>
                                <th>FOTO No.</th>
                                <th>Señal que no cumple con la normativa</th>
                                <th>Señal que falta</th>
                                <th>Longitud de cerca o defensa que no cumple con la normatividad</th>
                                <th>Longitud de cerca o defensa que falta</th>
                                <th>Observaciones</th>
                                <th>Acción para corregir</th>
                                <th>Acciones</th>
                            </tr>   
                        </thead>
                        <tbody>
                            <?php
                            foreach ($dispositivos as $valor) { ?>
                            <tr class="gradeA">
                                <td><?php echo $valor->latini ?></td>
                                <td><?php echo $valor->longini ?></td>
                                <td><?php echo $valor->mtsini ?></td>
                                <td><?php  if($valor->lado==0)echo "✖"; else if($valor->lado==2)echo "✖"; ?></td>
                                <td><?php  if($valor->lado==1)echo "✖"; else if($valor->lado==2)echo "✖"; ?></td>
                                <td><?php echo $valor->nombremarca ?></td>
                                <td><?php echo $valor->clave ?></td>
                                <td><?php if($valor->longnorm==1)echo "✖"; else if($valor->longnorm==2)echo "✖";?></td>
                                <td><?php if($valor->longnorm==0)echo "✖"; else if($valor->longnorm==2)echo "✖";?></td>
                                <td><?php if($valor->color_cumple==1)echo "✖"; else if($valor->color_cumple==2)echo "✖";?></td>
                                <td><?php if($valor->color_cumple==0)echo "✖"; else if($valor->color_cumple==2)echo "✖";?></td>
                                <td><?php if($valor->forma_cumple==1)echo "✖"; else if($valor->forma_cumple==2)echo "✖";?></td>
                                <td><?php if($valor->forma_cumple==0)echo "✖"; else if($valor->forma_cumple==2)echo "✖";?></td>
                                <td><?php if($valor->pictograma_cumple==1)echo "✖"; else if($valor->pictograma_cumple==2)echo "✖";?></td>
                                <td><?php if($valor->pictograma_cumple==0)echo "✖"; else if($valor->pictograma_cumple==2)echo "✖";?></td>
                                <td><?php if($valor->estado_cumple==1)echo "✖"; else if($valor->estado_cumple==2)echo "✖";?></td>
                                <td><?php if($valor->estado_cumple==0)echo "✖"; else if($valor->estado_cumple==2)echo "✖";?></td>                                
                                <td><?php if($valor->dimensiones_cumple==1)echo "✖"; else if($valor->dimensiones_cumple==2)echo "✖";?></td>
                                <td><?php if($valor->dimensiones_cumple==0)echo "✖"; else if($valor->dimensiones_cumple==2)echo "✖";?></td> 
                                <td><?php if($valor->mensaje_cumple==1)echo "✖"; else if($valor->mensaje_cumple==-1)echo "✖";?></td>
                                <td><?php if($valor->mensaje_cumple==0)echo "✖"; else if($valor->mensaje_cumple==2)echo "✖";?></td>
                                 <td><?php echo $valor->imagen ?></td>
                                <td><?php if($valor->cumple_normativa==1)echo "✖"; ?></td>
                                <td><?php if($valor->falta==1)echo "✖";?></td> 
                                <td><?php echo $valor->longncumple ?></td>
                                <td><?php echo $valor->longfalta ?></td>
                                <td><?php echo $valor->obs ?></td>
                                <td><?php echo $valor->accion ?></td>
                                <td><div class="tooltip-demo"><?php if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){?><a href="<?=asset_url()?>index.php/dispositivoSeguridad/editarDV?id=<?php echo utf8_decode($valor->id) ?>"><button type="button" class="btn btn-info btn-circle" data-placement="top" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></button></a> <a href="#" onClick="eliminar(<?php echo utf8_decode($valor->id)?>);" ><button type="button" class="btn btn-danger btn-circle" data-placement="top" data-toggle="tooltip" title="Eliminar Tramo"><i class="fa fa-times"></i></button></a><?php }?></div></td>
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
                            window.location.replace("<?=asset_url()?>dispositivoSeguridad/eliminarDV?id="+id);
                        } else {
                            swal("Cancelado", "Accion Cancelada", "error");
                        }
                    });
        };

</script>