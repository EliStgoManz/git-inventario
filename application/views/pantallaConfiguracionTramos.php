<style>
div.dt-button-info {  
    z-index: 500 !important;
}
</style>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>	Catalogo de Tramos</h2>
                    <ol class="breadcrumb">
                        
                    </ol>
                </div>
</div>

 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">                   
                        <h3>Tramos</h3>
                         <?php if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){?>
                        <a href="<?=asset_url()?>tramo/alta"><button class="btn btn-primary btn-sm " type="button"><i class="fa fa-plus"></i>&nbsp;Nuevo Tramo</button></a>
                        <?php }?>
                </div>
                <div class="ibox-content">                 
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
   
                            <tr>
                                <th>Clave Tramo</th>
                                <th>Carretera</th>                                
                                <th>Tramo De:</th>
                                <th>Km:</th>
                                <th>Longitud Del Tramo</th>
                                <th>Sentido</th>
                                <th>Acciones</th>

                            </tr>   
                        </thead>
                        <tbody>
                            <?php
                            foreach ($tramos as $valor) { ?>
                            <tr class="gradeA">
                                <td><?php echo $valor->clave_tramo ?></td>
                                <td><?php echo $valor->carretera ?></td>                               
                                <td><?php echo $valor->ciudad_inicio ?></td>
                                <td><?php echo $valor->ciudad_fin ?></td>
                                 <td><?php echo $valor->longitud ?></td>
                                <td><?php echo $valor->sentido ?></td>
                                <td><div class="tooltip-demo"><?php if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){?><a href="<?=asset_url()?>index.php/tramo/editar?id=<?php echo utf8_decode($valor->id) ?>"><button type="button" class="btn btn-info btn-circle" data-placement="top" data-toggle="tooltip" title="Editar Tramo"><i class="fa fa-edit"></i></button></a> <a href="#" onClick="eliminar(<?php echo utf8_decode($valor->id)?>);" ><button type="button" class="btn btn-danger btn-circle" data-placement="top" data-toggle="tooltip" title="Eliminar Tramo"><i class="fa fa-times"></i></button></a> <a href="<?=asset_url()?>index.php/auscultacion/graficas?id=<?php echo utf8_decode($valor->id) ?>&tipo=2&iri=1&max=0&mac=0&fric=0&def=0&det=0"><button type="button" class="btn btn-primary btn-circle" data-placement="top" data-toggle="tooltip" title="Grafica Auscultacion"><i class="fa fa-bar-chart-o"></i></button></a> <a href="<?=asset_url()?>index.php/auscultacion/alta?id=<?php echo utf8_decode($valor->id) ?>"><button type="button" class="btn btn-info btn-circle" data-placement="top" data-toggle="tooltip" title="Subir Informacion Auscultacion"><i class="fa fa-cloud-upload"></i></button></a><?php }?></div></td>
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
</body>

</html>


