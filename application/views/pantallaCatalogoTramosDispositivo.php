<style>
div.dt-button-info {  
    z-index: 500 !important;
}
</style>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>	Catalogo de Tramos con Irregularidades</h2>
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
                <div class="ibox-content"
>                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th>Clave Tramo</th>
                                <th>Carretera</th>                                
                                <th>Tramo De:</th>
                                <th>A:</th>
                                <th>Longitud del Tramo</th>
                                <th>Sentido</th>
                                <th>Lista de Inventario</th>
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
                                <td><div class="tooltip-demo"><a href="<?=asset_url()?>index.php/dispositivoSeguridad/dispositivos?id=<?php echo utf8_decode($valor->id) ?>"><button type="button" class="btn btn-info " data-placement="top" data-toggle="tooltip" title=" Ver Dispositivos de Seguridad">Dispositivos </br> de Seguridad</button></a> <a href="<?=asset_url()?>index.php/dispositivoSeguridad/dispositivosDH?id=<?php echo utf8_decode($valor->id) ?>"><button type="button" class="btn btn-primary " data-placement="top" data-toggle="tooltip" title=" Ver Señalamientos Horizontales">Señalamiento </br> Horizontal</button></a> <a href="<?=asset_url()?>index.php/dispositivoSeguridad/dispositivosDV?id=<?php echo utf8_decode($valor->id) ?>"><button type="button" class="btn btn-success " data-placement="top" data-toggle="tooltip" title=" Ver Señalamientos Verticales">Señalamiento </br> Vertical</button></a> <a href="<?=asset_url()?>index.php/dispositivoSeguridad/dispositivosML?id=<?php echo utf8_decode($valor->id) ?>"><button type="button" class="btn btn-success " data-placement="top" data-toggle="tooltip" title=" Ver Señalamientos Verticales">Tramos <br>con Maleza</button></a> <a href="<?=asset_url()?>index.php/dispositivoSeguridad/dispositivosSN?id=<?php echo utf8_decode($valor->id) ?>"><button type="button" class="btn btn-success " data-placement="top" data-toggle="tooltip" title=" Ver Señalamientos Verticales">Total </br> Señales</button></a></div></td>
                                 <?php } ?>
                            </tr>
                            
                        </tbody>
            
                        </table>

                    </div>
                </div>
            </div>
        </div>      
    </div>                 
</div>



<script src="<?=asset_url()?>js/table.js"></script>