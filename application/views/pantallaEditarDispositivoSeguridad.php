<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>	Editar Dispositivo de Seguridad</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?=asset_url()?>dispositivoSeguridad">Home</a>
                        </li>
                        <li>
                            <a href="<?=asset_url()?>index.php/dispositivoSeguridad/">Dispositivos de Seguridad</a>
                        </li>
                        <li class="active">
                            <strong>	 Editar Dispositivo</strong>
                        </li>
                    </ol>
                </div>
</div>

 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                        <h3>Editar Dispositivo de Seguridad</h3>
                </div>
                <div class="ibox-content tooltip-demo">
                    <?php
                        foreach ($dispositivo as $disp) { ?>
                    <form class="form-horizontal form-border" enctype="multipart/form-data" id="form" action="<?=asset_url()?>index.php/dispositivoSeguridad/actualizar" method="post">

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
                             <input type="hidden" id="id" name="id" value="<?php echo $disp->id;?>">
                            <label class="col-sm-3 control-label">Ubicación:</label>
                            <div id="radios" class="col-sm-6">
                               <input type="radio" name="radio" value="0" required <?php if($disp->lado==0) echo "checked" ?>>Lado Izquierdo<br>
                                <input type="radio" name="radio" value="1" <?php if($disp->lado==1) echo "checked" ?>>Lado Derecho<br>
                                <input type="radio" name="radio" value="2" <?php if($disp->lado==2) echo "checked" ?>>Ambos
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tipo de Dispositivo:</label>
                            <div class="col-sm-6">
                               <select class="form-control m-b" id="dispositivos" name="dispositivos" required>
                                    <option value=""></option>
                                    <?php
                                    foreach ($dispositivos as $valor) { ?>
                                    <option value="<?php echo utf8_encode($valor->id) ?>" <?php if($disp->tipo_dispositivo==$valor->id) echo "selected" ?>><?php echo $valor->descripcion ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Designacion:</label>
                            <div class="col-sm-6">
                                <select class="form-control m-b" id="designacion" name="designacion" required>
                                    <option value=""></option>
                                    <?php
                                    foreach ($designacion as $valor) { ?>
                                    <option value="<?php echo utf8_encode($valor->id) ?>" <?php if($disp->designacion==$valor->id) echo "selected" ?>><?php echo utf8_encode($valor->descripcion) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Descripcion del Sistema:</label>
                            <div class="col-sm-6">
                               <select class="form-control m-b" id="dsistema" name="dsistema" required>
                                    <option value=""></option>
                                    <?php
                                    foreach ($sistemas as $valor) { ?>
                                    <option value="<?php echo utf8_encode($valor->id) ?>" <?php if($disp->descripcion_sistema==$valor->id) echo "selected" ?>><?php echo utf8_encode($valor->descripcion) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tipo de Poste:</label>
                            <div class="col-sm-6">
                               <select class="form-control m-b" id="tposte" name="tposte" required>
                                    <option value=""></option>
                                    <?php
                                    foreach ($postes as $valor) { ?>
                                    <option value="<?php echo utf8_encode($valor->id) ?>" <?php if($disp->tipo_poste==$valor->id) echo "selected" ?>><?php echo $valor->descripcion ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Separacion entre Postes:</label>
                            <div class="col-sm-6">
                                    <input type="text" class="form-control" name="sepostes" id="sepostes" required="" value="<?php echo utf8_encode($disp->separacion_postes) ?>" placeholder="Campo Requerido">
                            </div>
                         </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Altura del Dispositivo:</label>
                            <div class="col-sm-6">
                                    <input type="text" class="form-control" name="altdisp" id="altdisp" required="" value="<?php echo utf8_encode($disp->altura_dispositivo) ?>" placeholder="Campo Requerido">
                            </div>
                         </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                      
                       <label class="col-sm-4 control-label"><h3>Tipo de Secciones Extremas</h3></label>
                    </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Al inicio:</label>
                            <div class="col-sm-6">
                               <select class="form-control m-b" id="secinicio" name="secinicio" required>
                                    <option value=""></option>
                                    <?php
                                    foreach ($secextremas as $valor) { ?>
                                    <option value="<?php echo utf8_encode($valor->id) ?>" <?php if($disp->ts_extremas_inicio==$valor->id) echo "selected" ?>><?php echo $valor->descripcion ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Al final:</label>
                            <div class="col-sm-6">
                               <select class="form-control m-b" id="secfinal" name="secfinal" required>
                                    <option value=""></option>
                                    <?php
                                    foreach ($secextremas as $valor) { ?>
                                    <option value="<?php echo utf8_encode($valor->id) ?>" <?php if($disp->ts_extremas_fin==$valor->id) echo "selected" ?>><?php echo $valor->descripcion ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tipo de Barreras de Transición:</label>
                            <div class="col-sm-6">
                               <select class="form-control m-b" id="tbtrans" name="tbtrans" required>
                                    <option value=""></option>
                                    <?php
                                    foreach ($bartransicion as $valor) { ?>
                                    <option value="<?php echo utf8_encode($valor->id) ?>" <?php if($disp->tb_transicion==$valor->id) echo "selected" ?>><?php echo $valor->descripcion ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Estado Físico:</label>
                            <div class="col-sm-6">
                               <select class="form-control m-b" name="estfisicods" id="estfisicods" required>
                                    <option value=""></option>
                                    <?php
                                    foreach ($estfisico as $valor) { ?>
                                    <option value="<?php echo utf8_encode($valor->id) ?>" <?php if($disp->estado_fisico==$valor->id) echo "selected" ?>><?php echo $valor->descripcion ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Observaciones:</label>
                            <div class="col-sm-6">
                               <textarea rows ="5" class="form-control" name="obs" id="obs" required="" ><?php echo $disp->observaciones ?></textarea>
             
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

