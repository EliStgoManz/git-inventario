<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>	Editar Usuario</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?=asset_url()?>tramo">Inicio</a>
                        </li>
                        <li>
                            <a href="<?=asset_url()?>index.php/usuario/">Usuario</a>
                        </li>
                        <li class="active">
                            <strong>	 Editar Usuario</strong>
                        </li>
                    </ol>
                </div>
</div>

 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                        <h3>Editar Usuario</h3>
                </div>
                <div class="ibox-content">

                    <form class="form-horizontal form-border" id="form" action="<?=asset_url()?>index.php/usuario/modificar" method="post">
                        
                         <?php
                            foreach ($usuario as $valor) { ?>
                        <input type="hidden" id="id" name="id" value="<?php echo $valor->id;?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nombre:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="nombre" id="nombre" required="" placeholder="Campo Requerido" value="<?php echo $valor->nombre?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Apellido Paterno:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="paterno" id="paterno" required="" placeholder="Campo Requerido" value="<?php echo $valor->paterno?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Apellido Materno:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="materno" id="materno" required="" placeholder="Campo Requerido" value="<?php echo $valor->materno?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Usuario:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="usuario" id="usuario" required="" placeholder="Campo Requerido" value="<?php echo $valor->user?>" readonly>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Contraseña:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="pass" id="pass" required="" placeholder="Campo Requerido" value="<?php echo $valor->pass?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Permisos:</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Dispositivos de Seguridad</label>
                            <div class="col-sm-1">
                                <input type="checkbox" class="form-control" name="ds" id="ds" value='1' <?php if($valor->dh==1){echo 'checked';}?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Señalamiento Horizontal</label>
                            <div class="col-sm-1">
                                <input type="checkbox" class="form-control" name="dh" id="dh" value='1' <?php if($valor->dh==1){echo 'checked';}?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Señalamiento Vertical</label>
                            <div class="col-sm-1">
                                <input type="checkbox" class="form-control" name="dv" id="dv" value='1' <?php if($valor->dh==1){echo 'checked';}?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Maleza</label>
                            <div class="col-sm-1">
                                <input type="checkbox" class="form-control" name="ml" id="ml" value='1' <?php if($valor->ml==1){echo 'checked';}?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Contar Señales</label>
                            <div class="col-sm-1">
                                <input type="checkbox" class="form-control" name="sn" id="sn" value='1' <?php if($valor->sn==1){echo 'checked';}?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Grado de Curvatura</label>
                            <div class="col-sm-1">
                                <input type="checkbox" class="form-control" name="gc" id="gc" value='1' <?php if($valor->gc==1){echo 'checked';}?>>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                         <?php  } ?>
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-10">                                          
                               <button type="submit" class="btn btn-primary" >Editar Usuario</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>      
    </div>                 
</div>