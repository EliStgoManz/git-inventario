<style>
div.dt-button-info {  
    z-index: 500 !important;
}
</style>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>	Catalogo de Secciones</h2>
                    <ol class="breadcrumb">
                        
                    </ol>
                </div>
</div>

 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">                   
                        <h3>Secciones</h3>
                        <a href="<?=asset_url()?>seccion/alta"><button class="btn btn-primary btn-sm " type="button"><i class="fa fa-plus"></i>&nbsp;Nueva Seccion</button></a>
                </div>
                <div class="ibox-content"
>                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th>Descripcion</th>
                                <th>Acciones</th>

                            </tr>   
                        </thead>
                        <tbody>
                            <?php
                            foreach ($secciones as $valor) { ?>
                            <tr class="gradeA">
                                <td><?php echo $valor->descripcion ?></td>
                                <td><div class="tooltip-demo"> <?php if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){?><a href="<?=asset_url()?>seccion/tramo?id=<?php echo utf8_decode($valor->id) ?>"><button type="button" class="btn btn-info btn-circle" data-placement="top" data-toggle="tooltip" title="Asignar Tramo"><i class="fa fa-paste"></i></button></a> <a href="<?=asset_url()?>index.php/seccion/editar?id=<?php echo utf8_decode($valor->id) ?>"><button type="button" class="btn btn-info btn-circle" data-placement="top" data-toggle="tooltip" title="Editar Tramo"><i class="fa fa-edit"></i></button></a> <a href="#" onClick="eliminar(<?php echo utf8_decode($valor->id)?>);" ><button type="button" class="btn btn-danger btn-circle" data-placement="top" data-toggle="tooltip" title="Eliminar Seccion"><i class="fa fa-times"></i></button></a> <?php }?></div></td>
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
                        text: "Se eliminara toda la informacion vinculada a esta seccion y no se podra recuperar",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Si, Eliminar!",
                        cancelButtonText: "No, Cancelar!",
                        closeOnConfirm: false,
                        closeOnCancel: false },
                    function (isConfirm) {
                        if (isConfirm) {
                            window.location.replace("<?=asset_url()?>seccion/eliminar?id="+id);
                        } else {
                            swal("Cancelado", "Accion Cancelada", "error");
                        }
                    });
        };
</script>
</body>

</html>