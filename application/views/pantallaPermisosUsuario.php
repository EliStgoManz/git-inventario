<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>	Permisos Usuario</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?=asset_url()?>usuario">Inicio</a>
                        </li>
                        <li>
                            <a href="<?=asset_url()?>index.php/usuario/">Usuario</a>
                        </li>
                        <li class="active">
                            <strong>	 Permisos Usuario</strong>
                        </li>
                    </ol>
                </div>
</div>

 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                        <h3>Permisos de Tramo al Usuario</h3>
                </div>
                <div class="ibox-content">

                    <form class="form-horizontal form-border" id="form" action="<?=asset_url()?>index.php/usuario/insertarPermisos" method="post">
                        
                         <?php
                            foreach ($usuario as $valor) { ?>
                        <input type="hidden" id="id" name="id" value="<?php echo $valor->id;?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nombre:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="nombre" id="nombre" required="" placeholder="Campo Requerido" value="<?php echo $valor->nombre." ".$valor->paterno." ".$valor->materno?>">
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
                            <label class="col-sm-3 control-label">Tramos:</label>
                            <div class="col-sm-6">
                               <select class="form-control m-b chosen-select" data-placeholder="Seleccione los tramos permitidos..." name="tramos[]"  multiple style="width:350px;" >
                                    <option value=""></option>
                                    <?php
                                    foreach ($tramos as $tramo) { ?>
                                    <option value="<?php echo utf8_encode($tramo->id) ?>" <?php foreach ($permitidos as $permiso) { if($permiso->tramo_id==$tramo->id) echo "selected";  }?>><?php echo $tramo->clave_tramo." ".$tramo->carretera." Sentido ".$tramo->sentido ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>                        
                         <?php  } ?>
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-10">                                          
                               <button type="submit" class="btn btn-primary" >Actualizar Permisos</button>
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

</script>