<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>	Alta Tramo</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?=asset_url()?>tramo">Home</a>
                        </li>
                        <li>
                            <a href="<?=asset_url()?>index.php/tramo/">Tramos</a>
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

                    <form class="form-horizontal form-border" enctype="multipart/form-data" id="form" action="<?=asset_url()?>index.php/tramo/subir" method="post">
                     
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Excel:</label>
                            <div class="col-sm-6">
                                <input type="file"  name="file" id="file" accept=".zip" required="" placeholder="Campo Requerido">
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