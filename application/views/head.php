<?php 
/*
if($_SESSION!=null){ */

	?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCT | Control de Tramos</title>

    <link href="<?=asset_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=asset_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?=asset_url()?>assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

    <link href="<?=asset_url()?>assets/css/animate.css" rel="stylesheet">
    <link href="<?=asset_url()?>assets/css/style.css" rel="stylesheet">

    <!-- Chosen -->
    <link href="<?=asset_url()?>assets/css/plugins/chosen/chosen.css" rel="stylesheet">
     <!-- 360 -->
    <link rel="stylesheet" href="<?=asset_url()?>assets/css/plugins/photoSphere/photo-sphere-viewer.css">

    
    <!-- Data Tables -->
    <link href="<?=asset_url()?>assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <!-- Mainly scripts -->
    <script src="<?=asset_url()?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?=asset_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=asset_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=asset_url()?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    
    <!-- Toastr -->
    <link href="<?=asset_url()?>assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

<!-- Custom and plugin javascript -->
    <script src="<?=asset_url()?>assets/js/inspinia.js"></script>
    <script src="<?=asset_url()?>assets/js/plugins/pace/pace.min.js"></script>
    <script src="<?=asset_url()?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Data Tables -->
    <script src="<?=asset_url()?>assets/js/plugins/dataTables/datatables.min.js"></script>
    

        <!-- easyzoom -->
    <script src="<?=asset_url()?>assets/js/plugins/easyzoom/jquery.elevatezoom.js"></script>
    <script src="<?=asset_url()?>assets/js/plugins/easyzoom/jquery.elevateZoom-3.0.8.min.js"></script>
    
    <!-- Toastr -->
    <script src="<?=asset_url()?>assets/js/plugins/toastr/toastr.min.js"></script>

    <!-- Flot -->
    <script src="<?=asset_url()?>assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?=asset_url()?>assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?=asset_url()?>assets/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?=asset_url()?>assets/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="<?=asset_url()?>assets/js/plugins/flot/jquery.flot.time.js"></script>

    <script type="text/javascript" src="https://cdn.rawgit.com/geocodezip/geoxml3/master/polys/geoxml3.js"></script>

    
    
    <!-- Chosen -->
    <script src="<?=asset_url()?>assets/js/plugins/chosen/chosen.jquery.js"></script>
     <!-- 360 -->
    <script src="<?=asset_url()?>assets/js/plugins/three/three.js"></script>
    <script src="<?=asset_url()?>assets/js/plugins/D/D.js"></script>
    <script src="<?=asset_url()?>assets/js/plugins/uevent/uevent.js"></script>
    <script src="<?=asset_url()?>assets/js/plugins/doT/doT.js"></script>
    <script src="<?=asset_url()?>assets/js/plugins/photoSphere/CanvasRenderer.js"></script>
    <script src="<?=asset_url()?>assets/js/plugins/photoSphere/Projector.js"></script>
    <script src="<?=asset_url()?>assets/js/plugins/photoSphere/DeviceOrientationControls.js"></script>
    <script src="<?=asset_url()?>assets/js/plugins/photoSphere/photo-sphere-viewer.js"></script>


</head>

<body class=" mini-navbar">

<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['nombre']?></strong>
                             </span> <span class="text-muted text-xs block">Opciones <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <?php if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){?>
                                <li><a href="<?=asset_url()?>usuario/perfil">Mi Perfil</a></li>
                                <?php }?>
                                <li><a href="<?=asset_url()?>login/logout">Cerrar Sesión</a></li>
                            </ul>
                    </div>
                    <div class="logo-element">
                    <a href="<?=asset_url()?>panel">SCT</a>
                    </div>
                </li>
                <li>
                <a href="<?=asset_url()?>inicio"><i class="fa fa-home"></i> <span class="nav-label">Inicio</span></a>
                </li>   
                <li>
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Catálogos</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?=asset_url()?>tramo">Tramos</a></li>
                        <?php if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){?>
                        <li><a href="<?=asset_url()?>catalogo">Categorías</a></li>
                        <?php }?>
                        <li>
                            <a href="<?=asset_url()?>dispositivoSeguridad">Inventario</a>     

                            
                        </li>

                    </ul>
                </li>
                <?php if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM'){?>
               <li>
                <a href="<?=asset_url()?>dispositivoSeguridad/reporte"><i class="fa fa-cog"></i> <span class="nav-label">Reporte</span></a>                
                </li>                            
                <?php }?>
                <?php if($_SESSION['privilegio']=='ADM' || $_SESSION['privilegio']=='SADM' || $_SESSION['gc']==1){?>
                <li>
                <a href="<?=asset_url()?>curva"><i class="fa fa-map-marker"></i> <span class="nav-label">Grado de Curvatura</span></a>
                </li> 
                <?php }?>
            </ul>

        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg"  role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="<?=asset_url()?>login/logout">
                            <i class="fa fa-sign-out"></i> Cerrar Sesión
                        </a>
                    </li>
                </ul>

            </nav>
        </div>


<?php /*}*/?><!--Llave todo el contenido con sesion-->