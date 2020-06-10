
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>	Alta Sección</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?=asset_url()?>panel">Inicio</a>
                        </li>   
                        <li>
                            <a href="<?=asset_url()?>seccion/">Secciones</a>
                        </li>                     
                        <li class="active">
                            <strong>	 Alta Sección</strong>
                        </li>
                    </ol>
                </div>
</div>

 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                        <h3>Nueva Sección</h3>
                </div>
                <div class="ibox-content">

                    <form class="form-horizontal form-border" id="form" action="<?=asset_url()?>index.php/seccion/insertar" method="post">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Descripción:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="descripcion" id="descripcion" required="" placeholder="Campo Requerido">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-10">                                          
                               <button type="submit" class="btn btn-primary" >Crear Sección</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>      
    </div>                 
</div>              
</div>
   
</body>

</html>