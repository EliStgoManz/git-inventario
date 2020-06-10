<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>	Alta Tramo</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?=asset_url()?>panel">Inicio</a>
                        </li>
                        <li>
                            <a href="<?=asset_url()?>panel/tramos/">Tramos</a>
                        </li>
                        <li class="active">
                            <strong>	 Alta Tramo</strong>
                        </li>
                    </ol>
                </div>
</div>

 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                        <h3>Nuevo Tramo</h3>
                </div>
                <div class="ibox-content">

                    <form class="form-horizontal form-border" enctype="multipart/form-data" id="form" action="<?=asset_url()?>index.php/tramo/insertar" method="post">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Clave Tramo:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="clave" id="clave" required="" placeholder="Campo Requerido">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Carretera:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="carretera" id="carretera" required="" placeholder="Campo Requerido">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Ruta:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="ruta" id="ruta" required="" placeholder="Campo Requerido">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Carril:</label>
                            <div class="col-sm-6">
                               <select class="form-control m-b" name="carril" id="carril" required>
                                    <option value=""></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Sentido:</label>
                            <div class="col-sm-6">
                               <select class="form-control m-b" name="sentido" id="sentido" required>
                                    <option value=""></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Clasificacion:</label>
                            <div class="col-sm-6">
                               <select class="form-control m-b" name="clasificacion" id="clasificacion" required>
                                    <option value=""></option>
                                    <?php
                                    foreach ($clasificaciones as $valor) { ?>
                                    <option value="<?php echo utf8_encode($valor->id) ?>"><?php echo $valor->descripcion ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Cuerpo:</label>
                            <div class="col-sm-6">
                               <select class="form-control m-b"  name="cuerpo" id="cuerpo" required>
                                    <option value=""></option>
                                    <?php
                                    foreach ($cuerpos as $valor) { ?>
                                    <option value="<?php echo utf8_encode($valor->id) ?>"><?php echo $valor->descripcion ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tramo De:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="origen" id="origen" required="" placeholder="Campo Requerido">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tramo A:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="destino" id="destino" required="" placeholder="Campo Requerido">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Excel:</label>
                            <div class="col-sm-6">
                                <input type="file"  name="file" id="file" accept=".xls,.xlsx" required="" placeholder="Campo Requerido"> <?php echo anchor_popup('excel/FormatoTramo.xlsx', 'Descargar Formato', '$attribute'); ?>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-10">                                          
                                <button type="submit" class="btn btn-primary" >Crear Tramo</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>      
    </div>                 
</div>

