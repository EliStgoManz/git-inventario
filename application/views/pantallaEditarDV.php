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
                    <form class="form-horizontal form-border" enctype="multipart/form-data" id="form" action="<?=asset_url()?>index.php/dispositivoSeguridad/actualizarDV" method="post">
                        <input type="hidden" id="id" name="id" value="<?php echo $disp->id;?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Kilometro:</label>
                            <div class="col-sm-2">
                                    <input type="text" class="form-control" name="kminicial" id="kminicial"  value="<?php echo utf8_encode($kminicial) ?>" data-placement="top" data-toggle="tooltip" title="No se puede editar" readonly>
                            </div>
                         </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Ubicación:</label>
                            <div id="radiosubicaciondv" class="col-sm-6">
                               <input type="radio" name="radio" value="0" <?php if($disp->lado==0) echo "checked" ?> required>Lado Izquierdo<br>
                                <input type="radio" name="radio" value="1" <?php if($disp->lado==1) echo "checked" ?>>Lado Derecho<br>
                                <input type="radio" name="radio" value="2" <?php if($disp->lado==2) echo "checked" ?>>Ambos

                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>                       
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nombre del Dispositivo:</label>
                            <div class="col-sm-6">
                               <select class="form-control m-b chosen-select" data-placeholder="Seleccione una opcion..." name="nombredispositivodv" id="nombredispositivodv" style="width:350px;"  required>
                                    <option value=""></option>
                                    <optgroup label="Preventivas">
                                    <?php
                                    foreach ($preventivas as $valor) { ?>
                                    <option value="<?php echo utf8_encode($valor->id) ?>" clave="<?php echo $valor->clave?>" <?php if($disp->nombre_dispositivo==$valor->id) echo "selected" ?>><?php echo $valor->descripcion." ".$valor->clave ?></option>
                                    <?php } ?>
                                    </optgroup>

                                    <optgroup label="Restrictivas">
                                    <?php
                                    foreach ($restrictivas as $valor) { ?>
                                    <option value="<?php echo utf8_encode($valor->id) ?>" clave="<?php echo $valor->clave?>" <?php if($disp->nombre_dispositivo==$valor->id) echo "selected" ?>><?php echo $valor->descripcion." ".$valor->clave ?></option>
                                    <?php } ?>
                                    </optgroup>

                                    <optgroup label="Informativas de Identificacion">
                                    <?php
                                    foreach ($identificacion as $valor) { ?>
                                    <option value="<?php echo utf8_encode($valor->id) ?>" clave="<?php echo $valor->clave?>" <?php if($disp->nombre_dispositivo==$valor->id) echo "selected" ?>><?php echo $valor->descripcion." ".$valor->clave ?></option>
                                    <?php } ?>
                                    </optgroup>

                                    <optgroup label="Informativas de Destino">
                                    <?php
                                    foreach ($destino as $valor) { ?>
                                    <option value="<?php echo utf8_encode($valor->id) ?>" clave="<?php echo $valor->clave?>" <?php if($disp->nombre_dispositivo==$valor->id) echo "selected" ?>><?php echo $valor->descripcion." ".$valor->clave ?></option>
                                    <?php } ?>
                                    </optgroup>

                                    <optgroup label="Informativas de Recomendación">
                                    <?php
                                    foreach ($recomendacion as $valor) { ?>
                                    <option value="<?php echo utf8_encode($valor->id) ?>" clave="<?php echo $valor->clave?>" <?php if($disp->nombre_dispositivo==$valor->id) echo "selected" ?>><?php echo $valor->descripcion." ".$valor->clave ?></option>
                                    <?php } ?>
                                    </optgroup>

                                    <optgroup label="Información General">
                                    <?php
                                    foreach ($general as $valor) { ?>
                                    <option value="<?php echo utf8_encode($valor->id) ?>" clave="<?php echo $valor->clave?>" <?php if($disp->nombre_dispositivo==$valor->id) echo "selected" ?>><?php echo $valor->descripcion." ".$valor->clave ?></option>
                                    <?php } ?>
                                    </optgroup>

                                    <optgroup label="Señales de Servicios">
                                    <?php
                                    foreach ($servicios as $valor) { ?>
                                    <option value="<?php echo utf8_encode($valor->id) ?>" clave="<?php echo $valor->clave?>" <?php if($disp->nombre_dispositivo==$valor->id) echo "selected" ?>><?php echo $valor->descripcion." ".$valor->clave ?></option>
                                    <?php } ?>
                                    </optgroup>

                                    <optgroup label="Señales Turísticas">
                                    <?php
                                    foreach ($turisticas as $valor) { ?>
                                    <option value="<?php echo utf8_encode($valor->id) ?>" clave="<?php echo $valor->clave?>" <?php if($disp->nombre_dispositivo==$valor->id) echo "selected" ?>><?php echo $valor->descripcion." ".$valor->clave ?></option>
                                    <?php } ?>
                                    </optgroup>

                                    <optgroup label="Pendiente">
                                    <?php
                                    foreach ($pendiente as $valor) { ?>
                                    <option value="<?php echo utf8_encode($valor->id) ?>" clave="<?php echo $valor->clave?>" <?php if($disp->nombre_dispositivo==$valor->id) echo "selected" ?>><?php echo $valor->descripcion." ".$valor->clave ?></option>
                                    <?php } ?>
                                    </optgroup>
                                    <option value="155" clave="" <?php if($disp->nombre_dispositivo==$valor->id) echo "selected" ?>>Otro</option>
                                </select>                                                            
                            </div>
                            <?php
                            $attribute = array( 'width' => '300', 'height' => '300', 'scrollbars' => 'yes', 'status' => 'yes', 'resizable' => 'yes' );
                            echo anchor_popup('dispositivoSeguridad/prueba', 'Ayuda', '$attribute'); ?>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Clave:</label>
                            <div class="col-sm-6">
                                    <input type="text" class="form-control" name="clavedispositivodv" id="clavedispositivodv" value="<?php echo $disp->clave?>" required="" placeholder="Campo Requerido">
                            </div>
                         </div>
                        <div class="hr-line-dashed"></div>                                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">¿La ubicación longitudinal y lateral del dispositivo cumple con la normatividad?:</label>
                            <div id="radioslongnorm" class="col-sm-6">
                               <input type="radio" name="radiolongnorm" value="1" <?php if($disp->longnorm==1) echo "checked" ?>>Si<br>
                                <input type="radio" name="radiolongnorm" value="0" <?php if($disp->longnorm==0) echo "checked" ?>>No
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">¿El color del dispositivo cumple con la normatividad?:</label>
                            <div id="radioscolornorm" class="col-sm-6">
                               <input type="radio" name="radiocolornorm" value="1" <?php if($disp->color_cumple==1) echo "checked" ?>>Si<br>
                                <input type="radio" name="radiocolornorm" value="0" <?php if($disp->color_cumple==0) echo "checked" ?>>No
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">¿La forma del dispositivo cumple con la normatividad?:</label>
                            <div id="radiosformnorm" class="col-sm-6">
                               <input type="radio" name="radioformnorm" value="1" <?php if($disp->forma_cumple==1) echo "checked" ?>>Si<br>
                                <input type="radio" name="radioformnorm" value="0" <?php if($disp->forma_cumple==0) echo "checked" ?>>No
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">¿El pictogram,letras y numero que cumplen con la normatividad?:</label>
                            <div id="radiospictonorm" class="col-sm-6">
                               <input type="radio" name="radiopictonorm" value="1" <?php if($disp->pictograma_cumple==1) echo "checked" ?>>Si<br>
                                <input type="radio" name="radiopictonorm" value="0" <?php if($disp->pictograma_cumple==0) echo "checked" ?>>No
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">¿El estado físico y la reflejancia del dipositivo son las adecuadas?:</label>
                            <div id="radiosestfis" class="col-sm-6">
                               <input type="radio" name="radioestfis" value="1" <?php if($disp->estado_cumple==1) echo "checked" ?>>Si<br>
                                <input type="radio" name="radioestfis" value="0" <?php if($disp->estado_cumple==0) echo "checked" ?>>No
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">¿Las dimensiones del dispositivo son las adecuadas?:</label>
                            <div id="radiosdimdis" class="col-sm-6">
                               <input type="radio" name="radiodimdis" value="1" <?php if($disp->dimensiones_cumple==1) echo "checked" ?>>Si<br>
                                <input type="radio" name="radiodimdis" value="0" <?php if($disp->dimensiones_cumple==0) echo "checked" ?>>No
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">¿El mensaje es congruente con lo que señala?:</label>
                            <div id="radiosmsjcong" class="col-sm-6">
                               <input type="radio" name="radiomsjcong" value="1" <?php if($disp->mensaje_cumple==1) echo "checked" ?>>Si<br>
                                <input type="radio" name="radiomsjcong" value="0" <?php if($disp->mensaje_cumple==0) echo "checked" ?>>No
                            </div>
                        </div>                                                    
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Indique la caracteristica de la señal:</label>
                            <div id="radioscaracdv" class="col-sm-6">
                               <input type="radio" name="radioscaracdv" value="0" <?php if($disp->cumple_normativa==1) echo "checked" ?>>Señal que no cumple con la normativa<br>
                                <input type="radio" name="radioscaracdv" value="1" <?php if($disp->falta==1) echo "checked" ?>>Señal que falta
                            </div>
                        </div>                                                    
                        <div class="hr-line-dashed"></div>                                                    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Longitud de cerca o defensa que no cumple con la normativa(m):</label>
                            <div class="col-sm-6">
                                    <input type="text" class="form-control" name="longncumpledv" id="longncumpledv" value="<?php echo $disp->longncumple?>" required="" placeholder="Campo Requerido">
                            </div>
                         </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Longitud de cerca o defensa que falta(m):</label>
                            <div class="col-sm-6">
                                    <input type="text" class="form-control" name="longfaltadv" id="longfaltadv" value="<?php echo $disp->longfalta?>" required="" placeholder="Campo Requerido">
                            </div>
                         </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Observaciones de la irregularidad detectada:</label>
                            <div class="col-sm-6">
                               <textarea rows ="5" class="form-control" name="obsdv" id="obsdv" required="" ><?php echo $disp->obs?></textarea>
             
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Accion para corregir la irregularidad detectada:</label>
                            <div class="col-sm-6">
                               <textarea rows ="5" class="form-control" name="acciondv" id="acciondv" required="" ><?php echo $disp->accion?></textarea>
             
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
$(document).ready(function() {
    var config = {
                '.chosen-select'           : {width: "100%",no_results_text:'No se encontro ningun resultado!',allow_single_deselect:true},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-single' : {disable_search_threshold:10},
                '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                '.chosen-select-width'     : {width:"95%"}
                }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }
});
$(function() {
        $("#nombredispositivodv").change(function(){
            var option = $('option:selected', this).attr('clave');

            $('#clavedispositivodv').val(option);
        });
    });
</script>