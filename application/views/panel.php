
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-10 col-md-offset-1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center m-t-lg">
                        <h1 class="logo-name">SCT</h1>
                        <medium>
                            Sistema de Control de Tramos con Irregularidades
                        </medium>
                    </div>
                </div>
            </div>
            <br>
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                    <h3>PANEL DE INICIO</h3>
            </div>
            <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="file-manager">    
                                <h3>                            
                                <i class="fa fa-user"></i> <?php echo $_SESSION['nombre']?>
                                </h3>
                                <div class="hr-line-dashed"></div>
                                <h5>Configuracion</h5>
                                 <?php if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){?>
                                <div id="jstree1">
                                    <ul>
                            
                               
                                    
                                    <li data-jstree='{"type":"html"}'><a href="<?=asset_url()?>seccion"> Secciones</a></li>
                                    <li data-jstree='{"type":"html"}'><a href="<?=asset_url()?>panel/tramos"> Tramos</a></li>
                                    <li data-jstree='{"type":"html"}'><a href="<?=asset_url()?>usuario"> Usuarios</a></li>
                                    

                          
                                     </ul>
                                 </div>
                                 <?php }?>
                                
                               
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                        <?php
                            foreach ($secciones as $valor) { ?>
                            <div class="file-box">
                                <div class="file">
                                    <a href="<?=asset_url()?>seccion/select?sc=<?php echo $valor->id ?>">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i style="font-style:normal"><?php echo $valor->descripcion ?></i>
                                        </div>
                                        <div class="file-name">
                                        <?php echo $valor->descripcion ?>
                                            <br/>
                                            <small>Total de Tramos: <?php echo $valor->total ?> </small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php }?>

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
    .jstree-open > .jstree-anchor > .fa-folder:before {
        content: "\f07c";
    }

    .jstree-default .jstree-icon.none {
        width: 0;
    }
</style>

<script>
    $(document).ready(function(){

        $('#jstree1').jstree({
            'core' : {
                'check_callback' : true
            },
            'plugins' : [ 'types', 'dnd' ],
            'types' : {
                'default' : {
                    'icon' : 'fa fa-folder'
                },
                'html' : {
                    'icon' : 'fa fa-cog'
                },
                'svg' : {
                    'icon' : 'fa fa-file-picture-o'
                },
                'css' : {
                    'icon' : 'fa fa-file-code-o'
                },
                'img' : {
                    'icon' : 'fa fa-file-image-o'
                },
                'js' : {
                    'icon' : 'fa fa-file-text-o'
                }

            }
        }).on("activate_node.jstree", function(e,data){
   window.location.href = data.node.a_attr.href;
 });

        
    });
</script>

</body>

</html>