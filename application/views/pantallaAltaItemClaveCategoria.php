<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>	Alta Elemento de Categoría</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?=asset_url()?>inicio">Home</a>
                        </li>
                        <li>
                            <a href="<?=asset_url()?>index.php/catalogo/">Categoría</a>
                        </li>
                        <li class="active">
                            <strong>	 Alta Elemento</strong>
                        </li>
                    </ol>
                </div>
</div>

 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                        <h3>Nueva Elemento de la Categoría</h3>
                </div>
                <div class="ibox-content">

                    <form class="form-horizontal form-border" id="form" action="<?=asset_url()?>index.php/catalogo/insertarItemClave" method="post">
                        <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Descripcion:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="descripcion" id="descripcion" required="" placeholder="Campo Requerido">
                            </div>

                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Clave:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="clave" id="clave" required="" placeholder="Campo Requerido">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-10">                                          
                               <button type="submit" class="btn btn-primary" >Crear Elemento</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>      
    </div>                 
</div>

