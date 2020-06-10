<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>	Editar Señalamiento Horizontal</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?=asset_url()?>dispositivoSeguridad">Home</a>
                        </li>
                        <li>
                            <a href="<?=asset_url()?>index.php/dispositivoSeguridad/">Dispositivos de Seguridad</a>
                        </li>
                        <li class="active">
                            <strong>	 Editar Señalamiento Horizontal</strong>
                        </li>
                    </ol>
                </div>
</div>

 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                        <h3>Editar Señalamiento Horizontal</h3>
                </div>
                <div class="ibox-content tooltip-demo">
                    <?php
                        foreach ($dispositivo as $disp) { ?>
                    <form class="form-horizontal form-border" enctype="multipart/form-data" id="form" action="<?=asset_url()?>index.php/dispositivoSeguridad/actualizarDH" method="post">
                        <input type="hidden" id="id" name="id" value="<?php echo $disp->id;?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Kilometro Inicial:</label>
                            <div class="col-sm-2">
                                    <input type="text" class="form-control" name="kminicial" id="kminicial"  value="<?php echo utf8_encode($kminicial) ?>" data-placement="top" data-toggle="tooltip" title="No se puede editar" readonly>
                            </div>
                         </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Kilometro Final:</label>
                            <div class="col-sm-2">
                                    <input type="text" class="form-control" name="kmfinal" id="kmfinal"  value="<?php echo utf8_encode($kmfinal) ?>" data-placement="top" data-toggle="tooltip" title="No se puede editar" readonly>
                            </div>
                         </div>
                        <div class="hr-line-dashed"></div>                                              
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nombre de la Marca:</label>
                            <div class="col-sm-6">
                               <select class="form-control m-b" name="nombremarcadh" id="nombremarcadh" required>
                                    <option value=""></option>
                                    <?php
                                    foreach ($nombremarcas as $valor) { ?>
                                    <option value="<?php echo utf8_encode($valor->id) ?>" clave="<?php echo utf8_encode($valor->clave) ?>" <?php if($disp->nombre_marca==$valor->id) echo "selected" ?>><?php echo $valor->descripcion ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Clave de la marca:</label>
                            <div class="col-sm-6">
                                    <input type="text" class="form-control" name="clavemarcadh" id="clavemarcadh" value="<?php echo $disp->clave_marca?>" required="" placeholder="Campo Requerido">
                            </div>
                         </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Color de la marca instalada:</label>
                            <div class="col-sm-6">
                                <select class="form-control m-b" name="colormarcadh" id="colormarcadh" required>
                                    <option value=""></option>
                                    <?php
                                    foreach ($coloresmarca as $valor) { ?>
                                    <option value="<?php echo utf8_encode($valor->id) ?>" <?php if($disp->color_marca==$valor->id) echo "selected" ?> ><?php echo utf8_encode($valor->descripcion) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Ancho de la marca instalada(m):</label>
                            <div class="col-sm-6">
                                    <input type="text" class="form-control" name="anchomarcadh" id="anchomarcadh" value="<?php echo $disp->ancho_marca?>" placeholder="Campo Requerido">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">¿La marca es reflejante?:</label>
                            <div id="radiosreflejante" class="col-sm-6">
                               <input type="radio" name="radioref" value="1" <?php if($disp->marca_reflejante==1) echo "checked" ?>>Si<br>
                                <input type="radio" name="radioref" value="0" <?php if($disp->marca_reflejante==0) echo "checked" ?>>No
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">¿Cuenta con Botones?:</label>
                            <div id="radiosbotones" class="col-sm-6">
                               <input type="radio" name="radio" value="1" <?php if($disp->botones==1) echo "checked" ?>>Si<br>
                                <input type="radio" name="radio" value="0" <?php if($disp->botones==0) echo "checked" ?>>No
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Longitud que no cumple con la normativa(m):</label>
                            <div class="col-sm-6">
                                    <input type="text" class="form-control" name="longncumpledh" id="longncumpledh" value="<?php echo $disp->longncumple?>" required="" placeholder="Campo Requerido">
                            </div>
                         </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Longitud de marca que falta(m):</label>
                            <div class="col-sm-6">
                                    <input type="text" class="form-control" name="longfaltadh" id="longfaltadh" value="<?php echo $disp->longfalta?>" required="" placeholder="Campo Requerido">
                            </div>
                         </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Observaciones de la irregularidad detectada:</label>
                            <div class="col-sm-6">
                               <textarea rows ="5" class="form-control" name="obsdh" id="obsdh" required="" ><?php echo $disp->obs?></textarea>
             
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Accion para corregir la irregularidad detectada:</label>
                            <div class="col-sm-6">
                               <textarea rows ="5" class="form-control" name="acciondh" id="acciondh" required="" ><?php echo $disp->accion?></textarea>
             
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                         <?php  } ?>
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-10">                                          
                                <button type="submit" id="submit_seguridad" class="btn btn-primary" >Editar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>      
    </div>                 
</div>

<script>
$(function() {
        $("#nombremarcadh").change(function(){
            var option = $('option:selected', this).attr('clave');

            $('#clavemarcadh').val(option);
        });
    });
</script>