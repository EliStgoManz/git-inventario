<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>    Alta Dispositivos de Seguridad</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?=asset_url()?>inicio">Inicio</a>
                        </li>
                        <li>
                            <a href="<?=asset_url()?>index.php/tramo/">Tramo</a>
                        </li>
                        <li class="active">
                            <strong>     Alta Dispositivo</strong>
                        </li>
                    </ol>
                </div>
</div>

<br>
<div class="row wrapper border-bottom white-bg page-heading" >
    <br>
       <div class="carretera tooltip-demo"  align="center" id="gallery">
                            <button class="btn btn-info btn-circle" id="back" name="back" type="button" data-placement="left" data-toggle="tooltip" title="Anterior"><i class="fa fa-chevron-left"></i></button>  
                            <img id="left" src='<?=asset_url()?>img/img/<?php echo $clave?>/izqS<?php echo $sentido?>/0000000001_S.jpeg' longdesc="0" data-zoom-image='<?=asset_url()?>img/img/<?php echo $clave?>/izqS<?php echo $sentido?>/0000000001_S.jpeg' >
                            <img id="center" src='<?=asset_url()?>img/img/<?php echo $clave?>/cenS<?php echo $sentido?>/0000000001_S.jpeg' longdesc="0" data-zoom-image='<?=asset_url()?>img/img/<?php echo $clave?>/cenS<?php echo $sentido?>/0000000001_S.jpeg' >
                            <img id="right" src='<?=asset_url()?>img/img/<?php echo $clave?>/derS<?php echo $sentido?>/0000000001_S.jpeg' longdesc="0" data-zoom-image='<?=asset_url()?>img/img/<?php echo $clave?>/derS<?php echo $sentido?>/0000000001_S.jpeg' >
                            <button class="btn btn-info btn-circle" id="next" name="next" type="button" data-placement="right" data-toggle="tooltip" title="Siguiente"><i class="fa fa-chevron-right"></i></button>
        </div> 
        <br>
        <div align="center"><h4><span id="kilometro"></span></h4></div>   
        <div align="center"><a align="center" data-toggle="modal" data-target="#myModal">Foto Trasera</a></div>         
</div>

 <!-- Foto Trasera -->
                      <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                        
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Foto Trasera</h4>
                            </div>
                            <div class="trasera modal-body">
                              <img id="tras" src='<?=asset_url()?>img/img/<?php echo $clave?>/trasS<?php echo $sentido?>/0000000001_S.jpeg' longdesc="0" data-zoom-image='<?=asset_url()?>img/<?php echo $clave?>/trasS<?php echo $sentido?>/0000000001_S.jpeg' >
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                          
                        </div>
                      </div>

 <div class="wrapper wrapper-content animated fadeInRight" >
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">  
                         <div class="form-group">
                            <h3 class="col-sm-3">Tramo <?php echo $clave; echo " "; echo $carretera; ?></h3>
                            <div >
                                <label class="col-xs-2 control-label"><h3>Ir a Kilometro:</h3></label> 
                                <div class="col-xs-2">                               
                                    <div class="input-group"><input type="text" id="txttr" class="form-control"> <span class="input-group-btn"> <button type="button" id="searchtr"class="btn btn-primary">Ir!
                                            </button> </span></div>
                                </div>
                            </div>
                        </br>
                        </div>

                </div>
                    


                    <div class="ibox-content tooltip-demo" id="contenido">
                        <div class="hr-line-dashed"></div>
                        <div class="row m-t-lg">
                            <div class="col-lg-12">
                                <?php
                                foreach ($usuario as $valor) { ?>
                                <div class="tabs-container">
                                        <ul class="nav nav-tabs">
                                            <?php if($valor->ds==1 || $_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){?>
                                            <li ><a data-toggle="tab" href="#tab-1">
                                                Dispositivo de Seguridad
                                            </a>
                                            </li>
                                            <?php }?>
                                            <?php if($valor->dh==1 || $_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){?>
                                            <li ><a data-toggle="tab" href="#tab-2">
                                                Señalamiento Horizontal
                                            </a>
                                            </li>
                                            <?php }?>
                                            <?php if($valor->dv==1 || $_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){?>
                                            <li ><a data-toggle="tab" href="#tab-3">
                                                Señalamiento Vertical
                                            </a>
                                            </li>
                                            <?php }?>
                                            <?php if($valor->ml==1 || $_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){?>
                                            <li ><a data-toggle="tab" href="#tab-4">
                                                Maleza
                                            </a>
                                            </li>
                                            <?php }?>
                                            <?php if($valor->sn==1 || $_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){?>
                                            <li ><a data-toggle="tab" href="#tab-5">
                                                Contar Señales
                                            </a>
                                            </li>
                                            <?php }?>
                                        </ul>
                                <?php } ?>
                                    <div class="tab-content">
                                        <div id="tab-1" class="tab-pane">
                                            <div class="panel-body">
                                                <form class="form-horizontal form-border" id="formdisp"  method="post">
                                                   <div class="form-group">
                                                        <label class="col-sm-3 control-label">Selección Ubicación Inicial:</label>
                                                        <div class="col-sm-2">
                                                            <div class="input-group m-b"><span class="input-group-btn">
                                                                <button type="button" id="btniniciod" name="" class="btn btn-primary" >KM+</button> </span> <input type="text" class="form-control" name="kminicial" id="kminicial" required="true" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Selección Ubicación Final:</label>
                                                        <div class="col-sm-2">
                                                            <div class="input-group m-b"><span class="input-group-btn">
                                                                <button type="button" id="btnfinald" class="btn btn-primary">KM+</button> </span> <input type="text" class="form-control" name="kmfinal" id="kmfinal" required="true" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Ubicación:</label>
                                                        <div id="radios" class="col-sm-6">
                                                           <input type="radio" name="radio" value="0" required>Lado Izquierdo<br>
                                                            <input type="radio" name="radio" value="1">Lado Derecho<br>
                                                            <input type="radio" name="radio" value="2">Ambos
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Longitud:</label>
                                                        <div class="col-sm-2">
                                                            <div class="input-group m-b"><span class="input-group-btn">
                                                                <button type="button" id="btnlong" class="btn btn-primary">+</button> </span> <input type="text" class="form-control" name="longitud" id="longitud" required="true" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Tipo de Dispositivo:</label>
                                                        <div class="col-sm-6">                                                            
                                                           <select class="form-control m-b" id="dispositivos" required>
                                                                <option value=""></option>
                                                                <?php
                                                                foreach ($dispositivos as $valor) { ?>
                                                                <option value="<?php echo utf8_encode($valor->id) ?>" ><?php echo $valor->descripcion ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Designacion:</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control m-b" id="designacion" required>
                                                                <option value=""></option>
                                                                <?php
                                                                foreach ($designacion as $valor) { ?>
                                                                <option value="<?php echo utf8_encode($valor->id) ?>" clave="<?php echo utf8_encode($valor->clave) ?>"><?php echo utf8_encode($valor->descripcion) ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Descripcion del Sistema:</label>
                                                        <div class="col-sm-6">
                                                           <select class="form-control m-b" id="dsistema" required>
                                                                <option value=""></option>
                                                                <?php
                                                                foreach ($sistemas as $valor) { ?>
                                                                <option value="<?php echo utf8_encode($valor->id) ?>"><?php echo utf8_encode($valor->descripcion) ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Tipo de Poste:</label>
                                                        <div class="col-sm-6">
                                                           <select class="form-control m-b" id="tposte" required>
                                                                <option value=""></option>
                                                                <?php
                                                                foreach ($postes as $valor) { ?>
                                                                <option value="<?php echo utf8_encode($valor->id) ?>"><?php echo utf8_encode($valor->descripcion) ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Separacion entre Postes:</label>
                                                        <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="sepostes" id="sepostes"  >
                                                        </div>
                                                     </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Altura del Dispositivo:</label>
                                                        <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="altdisp" id="altdisp"  >
                                                        </div>
                                                     </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                  
                                                   <label class="col-sm-4 control-label"><h3>Tipo de Secciones Extremas</h3></label>
                                                </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Al inicio:</label>
                                                        <div class="col-sm-6">
                                                           <select class="form-control m-b" id="secinicio" required>
                                                                <option value=""></option>
                                                                <?php
                                                                foreach ($secextremas as $valor) { ?>
                                                                <option value="<?php echo utf8_encode($valor->id) ?>"><?php echo utf8_encode($valor->descripcion) ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Al final:</label>
                                                        <div class="col-sm-6">
                                                           <select class="form-control m-b" id="secfinal" required>
                                                                <option value=""></option>
                                                                <?php
                                                                foreach ($secextremas as $valor) { ?>
                                                                <option value="<?php echo utf8_encode($valor->id) ?>"><?php echo utf8_encode($valor->descripcion) ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Tipo de Barreras de Transición:</label>
                                                        <div class="col-sm-6">
                                                           <select class="form-control m-b" id="tbtrans" required>
                                                                <option value=""></option>
                                                                <?php
                                                                foreach ($bartransicion as $valor) { ?>
                                                                <option value="<?php echo utf8_encode($valor->id) ?>"><?php echo utf8_encode($valor->descripcion) ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Estado Físico:</label>
                                                        <div class="col-sm-6">
                                                           <select class="form-control m-b" id="estfisicods" required>
                                                                <option value=""></option>
                                                                <?php
                                                                foreach ($estfisico as $valor) { ?>
                                                                <option value="<?php echo utf8_encode($valor->id) ?>"><?php echo utf8_encode($valor->descripcion) ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Observaciones:</label>
                                                        <div class="col-sm-6">
                                                           <textarea rows ="5" class="form-control" name="obs" id="obs"></textarea>
                                         
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                    <input type="hidden" class="form-control" name="tramo" id="tramo" required="" value="<?php echo $clave?>" >
                                                        <div class="col-sm-offset-5 col-sm-10">                                          
                                                            <button type="submit" id="submit_seguridad" class="btn btn-primary" >Capturar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div id="tab-2" class="tab-pane">
                                            <div class="panel-body">
                                                <form class="form-horizontal form-border" id="formdispdh"  method="post">
                                                   <div class="form-group">
                                                        <label class="col-sm-3 control-label">Selección Ubicación Inicial:</label>
                                                        <div class="col-sm-2">
                                                            <div class="input-group m-b"><span class="input-group-btn">
                                                                <button type="button" id="btniniciodh" name="" class="btn btn-primary">KM+</button> </span> <input type="text" class="form-control" name="kminicialdh" id="kminicialdh" required="true" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Selección Ubicación Final:</label>
                                                        <div class="col-sm-2">
                                                            <div class="input-group m-b"><span class="input-group-btn">
                                                                <button type="button" id="btnfinaldh" class="btn btn-primary">KM+</button> </span> <input type="text" class="form-control" name="kmfinaldh" id="kmfinaldh" required="true" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>                        
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Nombre de la Marca:</label>
                                                        <div class="col-sm-6">
                                                           <select class="form-control m-b" id="nombremarcadh" required>
                                                                <option value=""></option>
                                                                <?php
                                                                foreach ($nombremarcas as $valor) { ?>
                                                                <option value="<?php echo utf8_encode($valor->id) ?>" clave="<?php echo utf8_encode($valor->clave) ?>"><?php echo $valor->descripcion ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Clave de la marca:</label>
                                                        <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="clavemarcadh" id="clavemarcadh" required="" placeholder="Campo Requerido">
                                                        </div>
                                                     </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Color de la marca instalada:</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control m-b" id="colormarcadh" required>
                                                                <option value=""></option>
                                                                <?php
                                                                foreach ($coloresmarca as $valor) { ?>
                                                                <option value="<?php echo utf8_encode($valor->id) ?>"><?php echo utf8_encode($valor->descripcion) ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Ancho de la marca instalada(m):</label>
                                                        <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="anchomarcadh" id="anchomarcadh" placeholder="Campo Requerido">
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">¿La marca es reflejante?:</label>
                                                        <div id="radiosreflejante" class="col-sm-6">
                                                           <input type="radio" name="radioref" value="1">Si<br>
                                                            <input type="radio" name="radioref" value="0">No
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">¿Cuenta con Botones?:</label>
                                                        <div id="radiosbotones" class="col-sm-6">
                                                           <input type="radio" name="radio" value="1">Si<br>
                                                            <input type="radio" name="radio" value="0">No
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Longitud que no cumple con la normativa(m):</label>
                                                        <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="longncumpledh" id="longncumpledh" required="" placeholder="Campo Requerido">
                                                        </div>
                                                     </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Longitud de marca que falta(m):</label>
                                                        <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="longfaltadh" id="longfaltadh" required="" placeholder="Campo Requerido">
                                                        </div>
                                                     </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Observaciones de la irregularidad detectada:</label>
                                                        <div class="col-sm-6">
                                                           <textarea rows ="5" class="form-control" name="obsdh" id="obsdh" required="" ></textarea>
                                         
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Accion para corregir la irregularidad detectada:</label>
                                                        <div class="col-sm-6">
                                                           <textarea rows ="5" class="form-control" name="acciondh" id="acciondh" required="" ></textarea>
                                         
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                    <input type="hidden" class="form-control" name="tramo" id="tramo" required="" value="<?php echo $clave?>" >
                                                        <div class="col-sm-offset-5 col-sm-10">                                          
                                                            <button type="submit" id="submit_seguridadh" class="btn btn-primary" >Capturar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>


                                        <div id="tab-3" class="tab-pane">
                                            <div class="panel-body">
                                                <form class="form-horizontal form-border" id="formdispdv"  method="post">
                                                   <div class="form-group">
                                                        <label class="col-sm-3 control-label">Selección de Ubicación:</label>
                                                        <div class="col-sm-2">
                                                            <div class="input-group m-b"><span class="input-group-btn">
                                                                <button type="button" id="btniniciodv" name="" class="btn btn-primary">KM+</button> </span> <input type="text" class="form-control" name="kminicialdv" id="kminicialdv" required="true" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Ubicación:</label>
                                                        <div id="radiosubicaciondv" class="col-sm-6">
                                                           <input type="radio" name="radio" value="0" required>Lado Izquierdo<br>
                                                            <input type="radio" name="radio" value="1">Lado Derecho<br>
                                                            <input type="radio" name="radio" value="2">Ambos

                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>                       
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Nombre del Dispositivo:</label>
                                                        <div class="col-sm-6">
                                                           <select class="form-control m-b chosen-select" data-placeholder="Seleccione una opcion..." id="nombredispositivodv" style="width:350px;"  required>
                                                                <option value=""></option>
                                                                <optgroup label="Preventivas">
                                                                <?php
                                                                foreach ($preventivas as $valor) { ?>
                                                                <option value="<?php echo utf8_encode($valor->id) ?>" clave="<?php echo $valor->clave?>"><?php echo $valor->descripcion." ".$valor->clave ?></option>
                                                                <?php } ?>
                                                                </optgroup>

                                                                <optgroup label="Restrictivas">
                                                                <?php
                                                                foreach ($restrictivas as $valor) { ?>
                                                                <option value="<?php echo utf8_encode($valor->id) ?>" clave="<?php echo $valor->clave?>"><?php echo $valor->descripcion." ".$valor->clave ?></option>
                                                                <?php } ?>
                                                                </optgroup>

                                                                <optgroup label="Informativas de Identificacion">
                                                                <?php
                                                                foreach ($identificacion as $valor) { ?>
                                                                <option value="<?php echo utf8_encode($valor->id) ?>" clave="<?php echo $valor->clave?>"><?php echo $valor->descripcion." ".$valor->clave ?></option>
                                                                <?php } ?>
                                                                </optgroup>

                                                                <optgroup label="Informativas de Destino">
                                                                <?php
                                                                foreach ($destino as $valor) { ?>
                                                                <option value="<?php echo utf8_encode($valor->id) ?>" clave="<?php echo $valor->clave?>"><?php echo $valor->descripcion." ".$valor->clave ?></option>
                                                                <?php } ?>
                                                                </optgroup>

                                                                <optgroup label="Informativas de Recomendación">
                                                                <?php
                                                                foreach ($recomendacion as $valor) { ?>
                                                                <option value="<?php echo utf8_encode($valor->id) ?>" clave="<?php echo $valor->clave?>"><?php echo $valor->descripcion." ".$valor->clave ?></option>
                                                                <?php } ?>
                                                                </optgroup>

                                                                <optgroup label="Información General">
                                                                <?php
                                                                foreach ($general as $valor) { ?>
                                                                <option value="<?php echo utf8_encode($valor->id) ?>" clave="<?php echo $valor->clave?>"><?php echo $valor->descripcion." ".$valor->clave ?></option>
                                                                <?php } ?>
                                                                </optgroup>

                                                                <optgroup label="Señales de Servicios">
                                                                <?php
                                                                foreach ($servicios as $valor) { ?>
                                                                <option value="<?php echo utf8_encode($valor->id) ?>" clave="<?php echo $valor->clave?>"><?php echo $valor->descripcion." ".$valor->clave ?></option>
                                                                <?php } ?>
                                                                </optgroup>

                                                                <optgroup label="Señales Turísticas">
                                                                <?php
                                                                foreach ($turisticas as $valor) { ?>
                                                                <option value="<?php echo utf8_encode($valor->id) ?>" clave="<?php echo $valor->clave?>"><?php echo $valor->descripcion." ".$valor->clave ?></option>
                                                                <?php } ?>
                                                                </optgroup>

                                                                <optgroup label="Pendiente">
                                                                <?php
                                                                foreach ($pendiente as $valor) { ?>
                                                                <option value="<?php echo utf8_encode($valor->id) ?>" clave="<?php echo $valor->clave?>"><?php echo $valor->descripcion." ".$valor->clave ?></option>
                                                                <?php } ?>
                                                                </optgroup>
                                                                <option value="155" clave="">Otro</option>
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
                                                                <input type="text" class="form-control" name="clavedispositivodv" id="clavedispositivodv" required="" placeholder="Campo Requerido">
                                                        </div>
                                                     </div>
                                                    <div class="hr-line-dashed"></div>                                        
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">¿La ubicación longitudinal y lateral del dispositivo cumple con la normatividad?:</label>
                                                        <div id="radioslongnorm" class="col-sm-6">
                                                           <input type="radio" name="radiolongnorm" value="1">Si<br>
                                                            <input type="radio" name="radiolongnorm" value="0">No
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">¿El color del dispositivo cumple con la normatividad?:</label>
                                                        <div id="radioscolornorm" class="col-sm-6">
                                                           <input type="radio" name="radiocolornorm" value="1">Si<br>
                                                            <input type="radio" name="radiocolornorm" value="0">No
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">¿La forma del dispositivo cumple con la normatividad?:</label>
                                                        <div id="radiosformnorm" class="col-sm-6">
                                                           <input type="radio" name="radioformnorm" value="1">Si<br>
                                                            <input type="radio" name="radioformnorm" value="0">No
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">¿El pictogram,letras y numero que cumplen con la normatividad?:</label>
                                                        <div id="radiospictonorm" class="col-sm-6">
                                                           <input type="radio" name="radiopictonorm" value="1">Si<br>
                                                            <input type="radio" name="radiopictonorm" value="0">No
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">¿El estado físico y la reflejancia del dipositivo son las adecuadas?:</label>
                                                        <div id="radiosestfis" class="col-sm-6">
                                                           <input type="radio" name="radioestfis" value="1">Si<br>
                                                            <input type="radio" name="radioestfis" value="0">No
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">¿Las dimensiones del dispositivo son las adecuadas?:</label>
                                                        <div id="radiosdimdis" class="col-sm-6">
                                                           <input type="radio" name="radiodimdis" value="1">Si<br>
                                                            <input type="radio" name="radiodimdis" value="0">No
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">¿El mensaje es congruente con lo que señala?:</label>
                                                        <div id="radiosmsjcong" class="col-sm-6">
                                                           <input type="radio" name="radiomsjcong" value="1">Si<br>
                                                            <input type="radio" name="radiomsjcong" value="0">No
                                                        </div>
                                                    </div>                                                    
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Indique la caracteristica de la señal:</label>
                                                        <div id="radioscaracdv" class="col-sm-6">
                                                           <input type="radio" name="radioscaracdv" value="0">Señal que no cumple con la normativa<br>
                                                            <input type="radio" name="radioscaracdv" value="1">Señal que falta
                                                        </div>
                                                    </div>                                                    
                                                    <div class="hr-line-dashed"></div>                                                    
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Longitud de cerca o defensa que no cumple con la normativa(m):</label>
                                                        <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="longncumpledv" id="longncumpledv" required="" placeholder="Campo Requerido">
                                                        </div>
                                                     </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Longitud de cerca o defensa que falta(m):</label>
                                                        <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="longfaltadv" id="longfaltadv" required="" placeholder="Campo Requerido">
                                                        </div>
                                                     </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Observaciones de la irregularidad detectada:</label>
                                                        <div class="col-sm-6">
                                                           <textarea rows ="5" class="form-control" name="obsdv" id="obsdv" required="" ></textarea>
                                         
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Accion para corregir la irregularidad detectada:</label>
                                                        <div class="col-sm-6">
                                                           <textarea rows ="5" class="form-control" name="acciondv" id="acciondv" required="" ></textarea>
                                         
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                    <input type="hidden" class="form-control" name="tramo" id="tramo" required="" value="<?php echo $clave?>" >
                                                        <div class="col-sm-offset-5 col-sm-10">                                          
                                                            <button type="submit" id="submit_seguridadv" class="btn btn-primary" >Capturar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div id="tab-4" class="tab-pane">
                                            <div class="panel-body">
                                                <form class="form-horizontal form-border" id="formdispml"  method="post">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Selección Ubicación Inicial:</label>
                                                        <div class="col-sm-2">
                                                            <div class="input-group m-b"><span class="input-group-btn">
                                                                <button type="button" id="btninicioml" name="" class="btn btn-primary">KM+</button> </span> <input type="text" class="form-control"  geo="" maleza="" name="kminicialml" id="kminicialml" required="true" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Selección Ubicación Final:</label>
                                                        <div class="col-sm-2">
                                                            <div class="input-group m-b"><span class="input-group-btn">
                                                                <button type="button" id="btnfinalml" class="btn btn-primary">KM+</button> </span> <input type="text" class="form-control" geo="" maleza="" name="kmfinalml" id="kmfinalml" required="true" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Ubicación:</label>
                                                        <div id="radiosubicacionml" class="col-sm-6">
                                                            <input type="radio" name="radioml" value="0" required>Izquierda<br>
                                                            <input type="radio" name="radioml" value="1">Derecha<br>
                                                            <input type="radio" name="radioml" value="2">Ambos

                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                    <input type="hidden" class="form-control" name="tramo" id="tramo" required="" value="<?php echo $clave?>" >
                                                        <div class="col-sm-offset-5 col-sm-10">                                          
                                                            <button type="submit" id="submit_seguridadml" class="btn btn-primary" >Capturar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div id="tab-5" class="tab-pane">
                                            <div class="panel-body">
                                                <form class="form-horizontal form-border" id="formdispsn"  method="post">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Selección Ubicación:</label>
                                                        <div class="col-sm-2">
                                                            <div class="input-group m-b"><span class="input-group-btn">
                                                                <button type="button" id="btniniciosn" name="" class="btn btn-primary">KM+</button> </span> <input type="text" class="form-control"  geo="" maleza="" name="kminicialsn" id="kminicialsn" required="true" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Ubicación:</label>
                                                        <div id="radiosubicacionsn" class="col-sm-6">
                                                            <input type="radio" name="radioml" value="0" required>Izquierda<br>
                                                            <input type="radio" name="radioml" value="1">Derecha<br>
                                                            <input type="radio" name="radioml" value="2">Ambos

                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Numero de señales observadas en la foto:</label>
                                                        <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="totalsn" id="totalsn" required="" placeholder="Campo Requerido">
                                                        </div>
                                                     </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group">
                                                    <input type="hidden" class="form-control" name="tramo" id="tramo" required="" value="<?php echo $clave?>" >
                                                        <div class="col-sm-offset-5 col-sm-10">                                          
                                                            <button type="submit" id="submit_seguridadsn" class="btn btn-primary" >Capturar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
    </div>                 


<style>
.fixed {
    position: fixed;
    top: 0;
    right: 100;
    z-index: 500 !important;


}

.carretera img {
    width: 29%;
    height: auto;
}

.trasera img {
    width: 100%;
    height: auto;
}


</style>



<script>
var arrayimg= new Array();
var arraycad= new Array();
var arraygeo= new Array();
var maleza=0;
var seccion=<?php echo $_SESSION['sc']; ?>;
var imgactual="0000000001_S.jpeg";
$(document).ready(function() {


    $("#designacion").children('option:gt(0)').hide();
    $("#dispositivos").change(function() {
        var option = $('option:selected', this).val();

        $("#designacion").children('option').hide();
        $("#designacion").children("option[clave^=" + option + "]").show()

    })

 
 $('body').on('keydown',function(e){
    
      if(e.which==37){
         back();
      }else if(e.which==39){
        next();

      }
    });   
    
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

    $.ajax({
        type: 'GET',
        url: '<?=asset_url()?>index.php/tramo/json?id=<?php echo $id; ?>' ,
        dataType: "json",
        success: function (respose) {
            $.each( respose, function( i, row ) {
            arrayimg[i] = row.img_central;
            arraycad[i] = row.cadenamiento_carretera;
            arraygeo[i] = row.cadenamiento_geometrico;
    });
            $('#kilometro').text("KM: "+arraycad[0]);
        },
        error: function (request,error) {
            alert('Network error has occurred please try again!');
        }
    });  


        });


$(function(){
        $( "#formdisp").submit(function(event)
        {
            event.preventDefault();//prevent auto submit data
            var fecha = new Date();
            var ano = fecha.getFullYear(); 
            var tramoini=String($('#kminicial').attr('name'));
            var tramofinal=String($('#kmfinal').attr('name'));
            var selected = $("#radios input[type='radio']:checked");
            var ubicacion = selected.val();
            var longitud = $( "#longitud" ).val();
            var tdispositivo= $( "#dispositivos" ).val();
            var designacion= $( "#designacion" ).val();
            var dsistema= $( "#dsistema" ).val();
            var tposte= $( "#tposte" ).val();
            var sepostes=$( "#sepostes" ).val();
            var altdisp=$( "#altdisp" ).val();
            var secinicio=$( "#secinicio" ).val();
            var secfinal=$( "#secfinal" ).val();
            var tbtrans=$( "#tbtrans" ).val();
            var estfisicods=$( "#estfisicods" ).val();
            var observacion=$( "#obs" ).val();
            var sentidods=sentido;
            var clave=String($("#tramo").val());
            //assign our rest of variables

            $.ajax(
                {
                    type:"POST",
                    url: "<?=asset_url()?>index.php/dispositivoSeguridad/insertar",//URL changed 
                    data:{ tramoini:tramoini,sentidods:sentidods,tramofinal:tramofinal,ubicacion:ubicacion,longitud:longitud,tdispositivo:tdispositivo,designacion:designacion,dsistema:dsistema,tposte:tposte,sepostes:sepostes,altdisp:altdisp,secinicio:secinicio,secfinal:secfinal,tbtrans:tbtrans,estfisicods:estfisicods,observacion:observacion,clave:clave,ano:ano,seccion:seccion},
                    success:function(data)
                    {
                        cleandisp();
                        alerta("Exito!","Dispositivo agregado correctamente","success");
                    },       
                    error: function (request,error) {
                        alerta("Error","Error de conexion con el servidor!","error");

                    }
                });
        });
    });

$(function(){
        $( "#formdispdh").submit(function(event)
        {
            event.preventDefault();//prevent auto submit data
            var fecha = new Date();
            var ano = fecha.getFullYear();
            var tramoini=String($('#kminicialdh').attr('name'));
            var tramofinal=String($('#kmfinaldh').attr('name'));
            var nombremarca=$( "#nombremarcadh" ).val();
            var clavemarca=$( "#clavemarcadh" ).val();
            var colormarca=$( "#colormarcadh" ).val();
            var anchomarca=$( "#anchomarcadh" ).val();
            var selected = $("#radiosreflejante input[type='radio']:checked");
            var reflejante = selected.val();
            if(reflejante==null){
                reflejante=-1;
            }
            var selected2 = $("#radiosbotones input[type='radio']:checked");
            var botones = selected2.val();
            if(botones==null){
                botones=-1;
            }
            var longncumple=$( "#longncumpledh" ).val();
            var longfalta=$( "#longfaltadh" ).val();
            var obs=$( "#obsdh" ).val();
            var accion=$( "#acciondh" ).val();
            var sentidods=sentido;
            var clave=String($("#tramo").val());
            //assign our rest of variables

            $.ajax(
                {
                    type:"POST",
                    url: "<?=asset_url()?>index.php/dispositivoSeguridad/insertarDH",//URL changed 
                    data:{ tramoini:tramoini,sentidods:sentidods,tramofinal:tramofinal,nombremarca:nombremarca,clavemarca:clavemarca,colormarca:colormarca,anchomarca:anchomarca,reflejante:reflejante,botones:botones,longncumple:longncumple,longfalta:longfalta,obs:obs,accion:accion,clave:clave,ano:ano,seccion:seccion},
                    success:function(data)
                    {
                        cleandispdh();
                        alerta("Exito!","Dispositivo Horizontal agregado correctamente","success");
                    },       
                    error: function (request,error) {
                        alerta("Error","Error de conexion con el servidor!","error");

                    }
                });
        });
    });

$(function(){
        $( "#formdispdv").submit(function(event)
        {
            event.preventDefault();//prevent auto submit data
            var fecha = new Date();
            var ano = fecha.getFullYear();
            var tramoini=String($('#kminicialdv').attr('name'));
            var nombredispositivo=$( "#nombredispositivodv" ).val();
            var selected = $("#radioslongnorm input[type='radio']:checked");
            var longnorm = selected.val();
            if(longnorm==null){
                longnorm=-1;
            }
            var selected = $("#radioscolornorm input[type='radio']:checked");
            var colornorm = selected.val();
            if(colornorm==null){
                colornorm=-1;
            }
            var selected = $("#radiosubicaciondv input[type='radio']:checked");
            var ubicacion = selected.val();
            var selected = $("#radiosformnorm input[type='radio']:checked");
            var formnorm = selected.val();
            if(formnorm==null){
                formnorm=-1;
            }
            var selected = $("#radiospictonorm input[type='radio']:checked");
            var pictonorm = selected.val();
            if(pictonorm==null){
                pictonorm=-1;
            }
            var selected = $("#radiosestfis input[type='radio']:checked");
            var estfisico = selected.val();
            if(estfisico==null){
                estfisico=-1;
            }
            var selected = $("#radiosdimdis input[type='radio']:checked");
            var dimdis = selected.val();
            if(dimdis==null){
                dimdis=-1;
            }
            var selected = $("#radiosmsjcong input[type='radio']:checked");
            var msjcong = selected.val();
            if(msjcong==null){
                msjcong=-1;
            }
            var selected = $("#radioscaracdv input[type='radio']:checked");
            var caracdv = selected.val();
            var senalncumple="";
            var senalfalta="";
            if(caracdv!=null){
                if(caracdv==0){
                    senalncumple=1;
                    senalfalta=0
                }else{
                    senalncumple=0;
                    senalfalta=1;
                }
            }else{
                senalncumple=-1;
                senalfalta=-1;
            }
            var clavedispdv = $( "#clavedispositivodv" ).val();
            var longncumple=$( "#longncumpledv" ).val();
            var longfalta=$( "#longfaltadv" ).val();
            var obs=$( "#obsdv" ).val();
            var accion=$( "#acciondv" ).val();
            var sentidods=sentido;
            var clave=String($("#tramo").val());
            //assign our rest of variables

            $.ajax(
                {
                    type:"POST",
                    url: "<?=asset_url()?>index.php/dispositivoSeguridad/insertarDV",//URL changed 
                    data:{ tramoini:tramoini,sentidods:sentidods,nombredispositivo:nombredispositivo,longnorm:longnorm,colornorm:colornorm,formnorm:formnorm,pictonorm:pictonorm,clavedispdv:clavedispdv,ubicacion:ubicacion,
                    estfisico:estfisico,dimdis:dimdis,msjcong:msjcong,senalncumple:senalncumple,senalfalta:senalfalta,longncumple:longncumple,longfalta:longfalta,obs:obs,accion:accion,clave:clave,ano:ano,seccion:seccion},
                    success:function(data)
                    {
                        cleandispdv();
                        alerta("Exito!","Dispositivo Vertical agregado correctamente","success");
                    },       
                    error: function (request,error) {
                        alerta("Error","Error de conexion con el servidor!","error");

                    }
                });
        });
    });

$(function(){
        $( "#formdispml").submit(function(event)
        {
            event.preventDefault();
            var fecha = new Date();
            var ano = fecha.getFullYear();
            var tramoini=String($('#kminicialml').attr('name'));
            var tramofinal=String($('#kmfinalml').attr('name'));
            var selected = $("#radiosubicacionml input[type='radio']:checked");
            var ubicacion = selected.val();
            var sentidods=sentido;
            var longitud=$('#kmfinalml').attr('geo')-$('#kminicialml').attr('geo');
            var clave=String($("#tramo").val());
            

            $.ajax(
                {
                    type:"POST",
                    url: "<?=asset_url()?>index.php/dispositivoSeguridad/insertarML",//URL changed 
                    data:{ tramoini:tramoini,tramofinal:tramofinal,longitud:longitud,sentidods:sentidods,ubicacion:ubicacion,clave:clave,ano:ano,seccion:seccion},
                    success:function(data)
                    {
                        cleandispml();
                        alerta("Exito!","Tramo con Maleza agregado correctamente","success");
                    },       
                    error: function (request,error) {
                        alerta("Error","Error de conexion con el servidor!","error");

                    }
                });
        });
    });


$(function(){
        $( "#formdispsn").submit(function(event)
        {
            event.preventDefault();
            var fecha = new Date();
            var ano = fecha.getFullYear();
            var tramoini=String($('#kminicialsn').attr('name'));
            var selected = $("#radiosubicacionsn input[type='radio']:checked");
            var ubicacion = selected.val();
            var sentidods=sentido;
            var nsenales= $( "#totalsn" ).val();
            var clave=String($("#tramo").val());
            

            $.ajax(
                {
                    type:"POST",
                    url: "<?=asset_url()?>index.php/dispositivoSeguridad/insertarSN",//URL changed 
                    data:{ tramoini:tramoini,nsenales:nsenales,sentidods:sentidods,ubicacion:ubicacion,clave:clave,ano:ano,seccion:seccion},
                    success:function(data)
                    {
                        cleandispsn();
                        alerta("Exito!","Numero de señales agregado correctamente","success");
                    },       
                    error: function (request,error) {
                        alerta("Error","Error de conexion con el servidor!","error");

                    }
                });
        });
    });


    $('#left').elevateZoom({
    zoomType: "inner",
cursor: "crosshair"

   }); 
        $('#center').elevateZoom({
    zoomType: "inner",
cursor: "crosshair"

   }); 
            $('#right').elevateZoom({
    zoomType: "inner",
cursor: "crosshair"

   }); 


function zoomimg(){
            $('.zoomContainer').remove();
            $('#left').removeData('elevateZoom');
            $('#left').removeData('zoomImage');
            $('#center').removeData('elevateZoom');
            $('#center').removeData('zoomImage');
            $('#right').removeData('elevateZoom');
            $('#right').removeData('zoomImage');
            $('#left').elevateZoom({
    zoomType: "inner",
cursor: "crosshair"

   }); 
        $('#center').elevateZoom({
    zoomType: "inner",
cursor: "crosshair"

   }); 
            $('#right').elevateZoom({
    zoomType: "inner",
cursor: "crosshair"

   }); 
}
var base="<?=asset_url()?>";
var ruta="img/img/<?php echo $clave?>";
var minicial=<?php echo $minicio?>;
var sentido=<?php echo $sentido?>;
var fotos="";

var num = 500; //number of pixels before modifying styles

$(window).bind('scroll', function () {
    if ($(window).scrollTop() > num) {
        $('#gallery').addClass('fixed');
    } else if($(window).scrollTop()<200) {
        $('#gallery').removeClass('fixed');
    }
});


function cleandisp(){
    $("#dispositivos").val("");
    $('#kminicial').val("");
    $('#longitud').val("");
    $('#kmfinal').val("");
    $( "#dispositivos" ).val("");
    $( "#designacion" ).val("");
    $( "#dsistema" ).val("");
    $( "#tposte" ).val("");
    $( "#sepostes" ).val("");
    $( "#altdisp" ).val("");
    $( "#secinicio" ).val("");
    $( "#secfinal" ).val("");
    $( "#tbtrans" ).val("");
    $( "#estfisicods" ).val("");
    $( "#obs" ).val("");
}

function cleandispdh(){
    $("#formdispdh input[type='radio']").removeAttr("checked");
    $('#kminicialdh').val("");
    $('#kmfinaldh').val("");
    $('#nombremarcadh').val("");
    $('#clavemarcadh').val("");
    $('#colormarcadh').val("");
    $('#anchomarcadh').val("");
    $('#longncumpledh').val("");
    $('#longfaltadh').val("");
    $( "#obsdh" ).val("");
    $( "#acciondh" ).val("");
}

function cleandispdv(){
    $("#formdispdv input[type='radio']").removeAttr("checked");
    $('#kminicialdv').val("");
    $('#nombredispositivodv').val("");
    $('#clavedispositivodv').val("");
    $('#defectuosadv').val("");
    $('#senalncumpledv').val("");
    $('#senalfaltadv').val("");
    $('#longncumpledv').val("");
    $('#longfaltadv').val("");
    $( "#acciondv" ).val("");
    $( "#obsdv" ).val("");
}

function cleandispml(){
    $("#formdispml input[type='radio']").removeAttr("checked");
    $('#kminicialml').val("");
    $('#kmfinalml').val("");
    $('#kmfinalml').attr('maleza',"");
    $('#kmfinalml').attr('geo',"");
    $('#kminicialml').attr('maleza',"");
    $('#kminicialml').attr('geo',"");

}

function cleandispsn(){
    $("#formdispsn input[type='radio']").removeAttr("checked");
    $('#kminicialsn').val("");
    $('#totalsn').val("");

}


function alerta(titulo,msj,tipo){

    swal({
                title: titulo,
                text: msj,
                type: tipo
            });

    }




$(function() {

      $("#next").click( function()
           {
            
                next();


           }
      );
});

function back(){

var pos = parseInt($('#left').attr("longdesc"));
            if(pos>0){
              pos-=1;
            }
            imgactual=arrayimg[pos];
            var left=base+ruta+"/izqS"+sentido+"/"+imgactual;
            var cen=base+ruta+"/cenS"+sentido+"/"+imgactual;
            var der=base+ruta+"/derS"+sentido+"/"+imgactual;
            var tras=base+ruta+"/trasS"+sentido+"/"+imgactual;
            $('#kilometro').text("KM: "+arraycad[pos]);

            $('.zoomContainer').remove();
            $('#left').removeData('elevateZoom');
            $('#left').removeData('zoomImage');
            $('#center').removeData('elevateZoom');
            $('#center').removeData('zoomImage');
            $('#right').removeData('elevateZoom');
            $('#right').removeData('zoomImage');
            $('#left').attr('alt',arrayimg[pos]);
            $('#center').attr('alt',arrayimg[pos]);
            $('#right').attr('alt',arrayimg[pos]);
            $('#tras').attr('alt',arrayimg[pos]);
            $('#left').attr('data-zoom-image',left);
            $('#center').attr('data-zoom-image',cen);
            $('#right').attr('data-zoom-image',der);
            $('#left').attr('longdesc',pos);
            $('#left').attr('src',left);
            $('#center').attr('src',cen);
            $('#right').attr('src',der);
            $('#tras').attr('src',tras);

            $('#left').elevateZoom({
            zoomType: "inner",
            cursor: "crosshair"

             }); 

            $('#center').elevateZoom({
            zoomType: "inner",
            cursor: "crosshair"

             }); 
            
             $('#right').elevateZoom({
            zoomType: "inner",
            cursor: "crosshair"

            }); 


}

function next(){

fotos=arrayimg.length;
            var pos = parseInt($('#left').attr("longdesc"));

            if(pos<fotos-1){
              pos+=1;
            }
            imgactual=arrayimg[pos];
            var left=base+ruta+"/izqS"+sentido+"/"+imgactual;
            var cen=base+ruta+"/cenS"+sentido+"/"+imgactual;
            var der=base+ruta+"/derS"+sentido+"/"+imgactual;
            var tras=base+ruta+"/trasS"+sentido+"/"+imgactual;
            $('#kilometro').text("KM: "+arraycad[pos]);

            $('.zoomContainer').remove();
            $('#left').removeData('elevateZoom');
            $('#left').removeData('zoomImage');
            $('#center').removeData('elevateZoom');
            $('#center').removeData('zoomImage');
            $('#right').removeData('elevateZoom');
            $('#right').removeData('zoomImage');
            $('#left').attr('alt',arrayimg[pos]);
            $('#center').attr('alt',arrayimg[pos]);
            $('#right').attr('alt',arrayimg[pos]);
            $('#tras').attr('alt',arrayimg[pos]);
            $('#left').attr('data-zoom-image',left);
            $('#center').attr('data-zoom-image',cen);
            $('#right').attr('data-zoom-image',der);
            $('#left').attr('longdesc',pos);
            $('#left').attr('src',left);
            $('#center').attr('src',cen);
            $('#right').attr('src',der);
            $('#tras').attr('src',tras);
            $('#left').elevateZoom({
            zoomType: "inner",
            cursor: "crosshair"

             }); 

            $('#center').elevateZoom({
            zoomType: "inner",
            cursor: "crosshair"

             }); 

             $('#right').elevateZoom({
            zoomType: "inner",
            cursor: "crosshair"

            }); 

}
$(function() {

      $("#back").click( function()
           {
            back();
            

           }
      );
});

 $(function() {
        $("#nombremarcadh").change(function(){
            var option = $('option:selected', this).attr('clave');

            $('#clavemarcadh').val(option);
        });
    });

 $(function() {
        $("#nombredispositivodv").change(function(){
            var option = $('option:selected', this).attr('clave');

            $('#clavedispositivodv').val(option);
        });
    });


$('#btniniciod').click(function () {
    var pos = $('#left').attr("longdesc");    
    $("#kminicial").val(arraycad[pos]);
    $('#kminicial').attr('name',imgactual);
});

$('#btnfinald').click(function () {
    var pos = $('#left').attr("longdesc");
    $("#kmfinal").val(arraycad[pos]);
    $('#kmfinal').attr('name',imgactual);
});

$('#btnlong').click(function () {
    var fin=arraycad.indexOf($("#kmfinal").val());
    var inicio=arraycad.indexOf($("#kminicial").val());
    var longitud=arraygeo[fin]-arraygeo[inicio];
    $('#longitud').val(longitud);
});

$('#btniniciodh').click(function () {
    var pos = $('#left').attr("longdesc");   
    $("#kminicialdh").val(arraycad[pos]);
    $('#kminicialdh').attr('name',imgactual);
});

$('#btnfinaldh').click(function () {
    var pos = $('#left').attr("longdesc");
    $("#kmfinaldh").val(arraycad[pos]);
    $('#kmfinaldh').attr('name',imgactual);
});

$('#btniniciodv').click(function () {
    var pos = $('#left').attr("longdesc");   
    $("#kminicialdv").val(arraycad[pos]);
    $('#kminicialdv').attr('name',imgactual);
});

$('#btniniciosn').click(function () {
    var pos = $('#left').attr("longdesc");   
    $("#kminicialsn").val(arraycad[pos]);
    $('#kminicialsn').attr('name',imgactual);
});

$('#prueba').click(function () {
    var pos = $('#left').attr("longdesc");   
    var malezapos=parseInt(arraycad[pos].split('+')[0]);
    
 
    alert(maleza);

});

$('#btninicioml').click(function () {
    var pos = $('#left').attr("longdesc"); 
    var malezapos=parseInt(arraycad[pos].split('+')[0]);
    maleza=parseInt(malezapos/10);
    if($('#kmfinalml').attr('maleza')=="" || arraygeo[pos]<=$('#kminicialml').attr('geo')){
        $("#kminicialml").val(arraycad[pos]);
        $('#kminicialml').attr('name',imgactual);
        $('#kminicialml').attr('geo',arraygeo[pos]);    
        $('#kminicialml').attr('maleza',maleza);
    }else{
        alerta("Error","El kilometro inicial no puede ser mayor al final","error");
    }
   
});

$('#btnfinalml').click(function () {
    var pos = $('#left').attr("longdesc");
    var malezapos=parseInt(arraycad[pos].split('+')[0]);
    maleza=parseInt(malezapos/10);
    if(malezapos!=0 && arraygeo[pos]%10000==0){
        maleza-=1;
    }
    if($('#kminicialml').attr('maleza')!=""){ 
        if(maleza==$('#kminicialml').attr('maleza')){
            $("#kmfinalml").val(arraycad[pos]);
            $('#kmfinalml').attr('name',imgactual);
            $('#kmfinalml').attr('geo',arraygeo[pos]);     
            $('#kmfinalml').attr('maleza',maleza);
           
        }else{

            alerta("Error","El kilometro excede el rango limite de 10km","error");
        }
    }else{
       alerta("Error","Seleccione primero el kilometro principal","error");

    }
});

$('#searchtr').click(function () {
    var val= $("#txttr").val();
    var imagen=arraycad.indexOf(val+".0");
    if(imagen!=-1){
        var pos = imagen;
        imgactual=arrayimg[pos];
        var left=base+ruta+"/izqS"+sentido+"/"+imgactual;
        var cen=base+ruta+"/cenS"+sentido+"/"+imgactual;
        var der=base+ruta+"/derS"+sentido+"/"+imgactual;
        $('#kilometro').text("KM: "+arraycad[pos]);

        $('.zoomContainer').remove();
        $('#left').removeData('elevateZoom');
        $('#left').removeData('zoomImage');
        $('#center').removeData('elevateZoom');
        $('#center').removeData('zoomImage');
        $('#right').removeData('elevateZoom');
        $('#right').removeData('zoomImage');
        $('#left').attr('alt',arrayimg[pos]);
        $('#center').attr('alt',arrayimg[pos]);
        $('#right').attr('alt',arrayimg[pos]);
        $('#left').attr('data-zoom-image',left);
        $('#center').attr('data-zoom-image',cen);
        $('#right').attr('data-zoom-image',der);
        $('#left').attr('longdesc',pos);
        $('#left').attr('src',left);
        $('#center').attr('src',cen);
        $('#right').attr('src',der);
        $("#txttr").val("");

        $('#left').elevateZoom({
        zoomType: "inner",
        cursor: "crosshair"

         }); 

        $('#center').elevateZoom({
        zoomType: "inner",
        cursor: "crosshair"

         }); 
        
         $('#right').elevateZoom({
        zoomType: "inner",
        cursor: "crosshair"

        });
    }else{
        alerta("Error","Error el kilometro indicado no existe!","error");
    }
});

</script>