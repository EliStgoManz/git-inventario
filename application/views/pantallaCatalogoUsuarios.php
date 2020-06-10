<style>
div.dt-button-info {  
    z-index: 500 !important;
}
</style>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>	Catálogo de Usuarios</h2>
                    <ol class="breadcrumb">
                        
                    </ol>
                </div>
</div>

 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">                   
                        <h3>Usuarios</h3>
                        <a href="<?=asset_url()?>index.php/usuario/alta"><button class="btn btn-primary btn-sm " type="button"><i class="fa fa-plus"></i>&nbsp;Nuevo Usuario</button></a>
                </div>
                <div class="ibox-content"
>                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>DS</th>
                                <th>SH</th>
                                <th>SV</th>
                                <th>ML</th>
                                <th>SN</th>
                                <th>Acciones</th>
                            </tr>   
                        </thead>
                        <tbody>
                            <?php
                            foreach ($usuarios as $valor) { ?>
                            <tr class="gradeA">
                                <td><?php echo $valor->nombre." ".$valor->paterno." ".$valor->materno ?></td>
                                <td><?php echo $valor->user?></td>
                                <td><?php if($valor->ds==1){echo '✓';} else{echo '✖';} ?></td>
                                <td><?php if($valor->dh==1){echo '✓';} else{echo '✖';} ?></td>
                                <td><?php if($valor->dv==1){echo '✓';} else{echo '✖';} ?></td>
                                <td><?php if($valor->ml==1){echo '✓';} else{echo '✖';} ?></td>
                                <td><?php if($valor->sn==1){echo '✓';} else{echo '✖';} ?></td>
                                <td><a href="<?=asset_url()?>index.php/usuario/editar?id=<?php echo utf8_decode($valor->id) ?>"><button type="button" class="btn btn-info " data-placement="top" data-toggle="tooltip" title="Editar">Ver</button></a> <a href="<?=asset_url()?>index.php/usuario/permisos?id=<?php echo utf8_decode($valor->id) ?>"><button type="button" class="btn btn-primary " data-placement="top" data-toggle="tooltip" title="Editar">Permisos</button></a></td>
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