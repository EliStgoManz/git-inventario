<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>	Editar Tramo</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?=asset_url()?>panel">Inicio</a>
                        </li>
                        <li>
                            <a href="<?=asset_url()?>panel/tramos/">Tramos</a>
                        </li>
                        <li class="active">
                            <strong>	 Editar Tramo</strong>
                        </li>
                    </ol>
                </div>
</div>

 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                        <h3>Editar Tramo</h3>
                </div>
                <div class="ibox-content">

                    <form class="form-horizontal form-border" enctype="multipart/form-data" id="form" action="<?=asset_url()?>index.php/tramo/actualizar" method="post">
                            <?php
                            foreach ($tramo as $valor) { ?>
                        <input type="hidden" id="id" name="id" value="<?php echo $valor->id;?>">
                        <input type="hidden" id="dir" name="dir" value="<?php echo $valor->clave_tramo;?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Clave Tramo:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="clave" id="clave" required="" value="<?php echo $valor->clave_tramo?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Carretera:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="carretera" id="carretera" required="" value="<?php echo $valor->carretera?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Ruta:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="ruta" id="ruta" required="" value="<?php echo $valor->ruta?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Clasificacion:</label>
                            <div class="col-sm-6">
                               <select class="form-control m-b" name="clasificacion" id="clasificacion" required>
                                    <option value=""></option>
                                    <?php
                                    foreach ($clasificaciones as $clasificacion) { ?>
                                    <option value="<?php echo utf8_encode($clasificacion->id) ?>" <?php if($clasificacion->id==$valor->clasificacion_camino)echo "selected"?>><?php echo $clasificacion->descripcion ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Cuerpo:</label>
                            <div class="col-sm-6">
                               <select class="form-control m-b" name="cuerpo" id="cuerpo" required>
                                    <option value=""></option>
                                    <?php
                                    foreach ($cuerpos as $cuerpo) { ?>
                                    <option value="<?php echo utf8_encode($cuerpo->id) ?>" <?php if($cuerpo->id==$valor->cuerpo)echo "selected"?>><?php echo $cuerpo->descripcion ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tramo De:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="origen" id="origen" required="" value="<?php echo $valor->ciudad_inicio?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tramo A:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="destino" id="destino" required="" value="<?php echo $valor->ciudad_fin?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <?php  } ?>
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-10">                                          
                                <button type="submit" class="btn btn-primary" >Editar Tramo</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>      
    </div>                 
</div>

