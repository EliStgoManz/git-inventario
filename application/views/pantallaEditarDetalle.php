<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>	Editar Kilometro</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?=asset_url()?>tramo">Inicio</a>
                        </li>
                        <li>
                            <a href="<?=asset_url()?>index.php/tramo/">Tramo</a>
                        </li>
                        <li class="active">
                            <strong>	 Editar Kilometro</strong>
                        </li>
                    </ol>
                </div>
</div>

 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                        <h3>Editar Kilometro</h3>
                </div>
                <div class="ibox-content">

                    <form class="form-horizontal form-border" id="form" action="<?=asset_url()?>index.php/tramo/actualizarDetalle" method="post">
                        
                         <?php
                            foreach ($detalle as $valor) { ?>
                        <input type="hidden" id="id" name="id" value="<?php echo $valor->id;?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Cadenamiento Carretera:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="cadca" id="cadca" required="" placeholder="Campo Requerido" value="<?php echo $valor->cadenamiento_carretera?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Cadenamiento Geometrico:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="cadgeo" id="cadgeo" required="" placeholder="Campo Requerido" value="<?php echo $valor->cadenamiento_geometrico?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                         <?php  } ?>
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-10">                                          
                               <button type="submit" class="btn btn-primary" >Editar Kilometro</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>      
    </div>                 
</div>