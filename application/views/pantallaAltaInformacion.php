<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>    Alta Informacion Auscultacion</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?=asset_url()?>panel">Inicio</a>
                        </li>
                        <li>
                            <a href="<?=asset_url()?>panel/tramos/">Tramo</a>
                        </li>
                        <li class="active">
                            <strong>     Alta Informacion Auscultacion</strong>
                        </li>
                    </ol>
                </div>
</div>

 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                        <h3>Alta Informacion </h3><?php echo anchor_popup('excel/ausc.pdf', 'Ayuda', '$attribute'); ?>
                </div>
                <div class="ibox-content">
                    
                    <form class="form-horizontal form-border" enctype="multipart/form-data" id="form" action="<?=asset_url()?>index.php/auscultacion/subirInformacion" method="post">
                        
                        <div class="form-group">
                            <input type="hidden" id="id" name="id" value="<?php echo $id;?>">                         
                            <label class="col-sm-3 control-label">Excel:</label>
                            <div class="col-sm-6">
                                <input type="file"  name="file" id="file" accept=".xls,.xlsx" required="" placeholder="Campo Requerido"><?php echo anchor_popup('excel/FormatoAusc.xlsx', 'Descargar Formato', '$attribute'); ?>
                                
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Cadenamiento cada:</label>
                            <div id="radioscad" class="col-sm-6">
                               <input type="radio" name="radio" value="0" required>20 mts<br>
                                <input type="radio" name="radio" value="1">100 mts<br>
                                <input type="radio" name="radio" value="2">150 mts<br>
                                <input type="radio" name="radio" value="3">500 mts<br>
                                <input type="radio" name="radio" value="4">1 km<br>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Seleccione la informacion a actualizar:</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Iri</label>
                            <div class="col-sm-1">
                                <input type="checkbox" class="form-control" name="iri" id="iri" value='1'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Profundidad de Roderas</label>
                            <div class="col-sm-1">
                                <input type="checkbox" class="form-control" name="max" id="max" value='1'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Macrotextura</label>
                            <div class="col-sm-1">
                                <input type="checkbox" class="form-control" name="mac" id="mac" value='1'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Coeficiente de Friccion</label>
                            <div class="col-sm-1">
                                <input type="checkbox" class="form-control" name="fric" id="fric" value='1'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Deflexiones</label>
                            <div class="col-sm-1">
                                <input type="checkbox" class="form-control" name="def" id="def" value='1'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Deterioros Superficiales</label>
                            <div class="col-sm-1">
                                <input type="checkbox" class="form-control" name="det" id="det" value='1'>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-10">                                          
                                <button type="submit" class="btn btn-primary" >Subir</button>
                            </div>
                        </div>


                    </form>                    
                </div>
            </div>
        </div>      
    </div>                 
</div>

<script>

</script>