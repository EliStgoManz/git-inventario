<style>
div.dt-button-info {  
    z-index: 500 !important;
}
</style>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>	Elementos de la Categoria</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?=asset_url()?>inicio">Inicio</a>
                        </li>
                        <li>
                            <a href="<?=asset_url()?>index.php/catalogo/">Categorías</a>
                        </li>
                        <li class="active">
                            <strong>     Elementos de la Categoría</strong>
                        </li>
                    </ol>
                </div>
</div>

 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">  
                        <?php
                        foreach ($catalogo as $valor) { ?>                
                        <h3><?php echo $valor->descripcion ?></h3>                        
                        <a href="<?=asset_url()?>index.php/catalogo/altaItemClave?id=<?php echo utf8_decode($valor->id) ?>"><button class="btn btn-primary btn-sm " type="button"><i class="fa fa-plus"></i>&nbsp;Nuevo Elemento</button></a>
                        <?php  } ?>
                </div>
                <div class="ibox-content"
>                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Descripcion</th>
                                <th>Clave</th>
                                <th>Acciones</th>

                            </tr>   
                        </thead>
                        <tbody>
                            <?php
                            foreach ($itemsclave as $valor) { ?>
                            <tr class="gradeA">
                                <td><?php echo $valor->id ?></td>
                                <td><?php echo $valor->descripcion ?></td>
                                <td><?php echo $valor->clave ?></td>
                                <td><a href="<?=asset_url()?>index.php/catalogo/editarItem?id=<?php echo utf8_decode($valor->id) ?>"><button type="button" class="btn btn-info " data-placement="top" data-toggle="tooltip" title="Editar"><i class="fa fa-search"></i>Editar</button></a></td>
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