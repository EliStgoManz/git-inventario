<style>
div.dt-button-info {  
    z-index: 500 !important;
}
</style>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>	Catalogo de Categorias</h2>
                    <ol class="breadcrumb">
                        
                    </ol>
                </div>
</div>

 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">                   
                        <h3>Categorias</h3>
                        <a href="<?=asset_url()?>index.php/catalogo/alta"><button class="btn btn-primary btn-sm " type="button"><i class="fa fa-plus"></i>&nbsp;Nueva Categoria</button></a>
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
                            foreach ($catalogos as $valor) { ?>
                            <tr class="gradeA">
                                <td><?php echo $valor->descripcion ?></td>
                                <td><a href="<?=asset_url()?>index.php/catalogo/items?id=<?php echo utf8_decode($valor->id) ?>&tipo=<?php echo utf8_decode($valor->tipo_catalogo_id) ?>"><button type="button" class="btn btn-info " data-placement="top" data-toggle="tooltip" title="Editar"><i class="fa fa-search"></i>Ver</button></a></td>
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


   
