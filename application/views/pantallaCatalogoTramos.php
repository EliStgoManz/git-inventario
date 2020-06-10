<style>
div.dt-button-info {  
    z-index: 500 !important;
}
</style>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>    Catalogo de Tramos</h2>
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
                                <td><div class="tooltip-demo"><a href="<?=asset_url()?>index.php/tramo/dispositivo?id=<?php echo utf8_decode($valor->id) ?>&sentido=<?php echo utf8_decode($valor->sentido) ?>"><button type="button" class="btn btn-info btn-circle" data-placement="top" data-toggle="tooltip" title="Agregar Dispositivos"><i class="fa fa-paste"></i></button></a> <a href="<?=asset_url()?>index.php/tramo/dispositivo360?id=<?php echo utf8_decode($valor->id) ?>&sentido=<?php echo utf8_decode($valor->sentido) ?>"><button type="button" class="btn btn-success btn-circle" data-placement="top" data-toggle="tooltip" title="Agregar Dispositivos 360°"><i class="fa fa-eye"></i></button></a> <a href="<?=asset_url()?>index.php/tramo/mapa?id=<?php echo utf8_decode($valor->id) ?>"><button type="button" class="btn btn-primary btn-circle" data-placement="top" data-toggle="tooltip" title="Ver Mapa"><i class="fa fa-globe"></i></button></a> </div></td>
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

