        <div class="wrapper wrapper-content animated fadeInRight">
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
        </br>
            <div class="row">
            <div class="col-lg-1">
              
            </div>
            <div class="col-lg-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">-</span>
                        <h5>Usuarios</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $usuarios?></h1>
                        <div class="stat-percent font-bold text-success"><i class="fa fa-user"></i></div>
                        <small>Usuarios Totales</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right">-</span>
                        <h5>Tramos</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $tramos?></h1>
                        <div class="stat-percent font-bold text-info"><i class="fa fa-road"></i></div>
                        <small>Tramos Totales</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right">-</span>
                        <h5>Totales</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-2">
                                <h1 class="no-margins"><?php echo $ds?></h1>
                                <div class="font-bold text-navy"><i class="fa fa-level-up"></i> <small>Dispositivos de Seguridad</small></div>
                            </div>
                            <div class="col-md-2">
                                <h1 class="no-margins"><?php echo $dh?></h1>
                                <div class="font-bold text-navy"><i class="fa fa-level-up"></i> <small>Señalamientos Horizontales</small></div>
                            </div>
                            <div class="col-md-2">
                                <h1 class="no-margins"><?php echo $dv?></h1>
                                <div class="font-bold text-navy"> <i class="fa fa-level-up"></i> <small>Señalamientos Verticales</small></div>
                            </div>
                            <div class="col-md-2">
                                <h1 class="no-margins"><?php echo $ml?></h1>
                                <div class="font-bold text-navy"> <i class="fa fa-level-up"></i> <small>Tramos con Maleza</small></div>
                            </div>
                            <div class="col-md-2">
                                <h1 class="no-margins"><?php echo $sn?></h1>
                                <div class="font-bold text-navy"><i class="fa fa-level-up"></i> <small>Total de Senales</small></div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
  
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
             <div class="ibox-title">                   
                        <h3>Resumen por Tramo</h3>
                        
                </div>
            <div class="ibox-content">                 
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
   
                            <tr>
                                <th>Clave Tramo</th>
                                <th>Carretera</th>                                
                                <th>Tramo De:</th>
                                <th>A:</th>
                                <th>Longitud Del Tramo</th>
                                <th>Sentido</th>
                                <th>TOTAL Ausencia de <br>marcas en <br>pavimento</th>
                                <th>TOTAL Marcas que no <br>cumplen con<br> la norma</th>
                                <th>TOTAL <br>Señales evaluadas</th>
                                <th>TOTAL Señales que no <br>cumplen con<br> la normativa</th>





                            </tr>   
                        </thead>
                        <tbody>
                            <?php
                            foreach ($arraytramos as $valor) { ?>
                            <tr class="gradeA">
                                <td><?php echo $valor['clave'] ?></td>
                                <td><?php echo $valor['carretera'] ?></td>                               
                                <td><?php echo $valor['de'] ?></td>
                                <td><?php echo $valor['a'] ?></td>
                                 <td><?php echo $valor['longitud'] ?></td>
                                <td><?php echo $valor['sentido'] ?></td>
                                <td><?php echo $valor['totalncumple'] ?></td>
                                <td><?php echo $valor['totalfalta'] ?></td>
                                <td><?php echo $valor['totalsenales'] ?></td>
                                <td><?php echo $valor['totalncumplev'] ?></td>
                            </tr>
                             <?php  } ?>
                        </tbody>
            
                        </table>

                    </div>
                </div>
              </div>
        </div>      
    </div>                 
</div>

        </div>
        </div>
        
        <script src="<?=asset_url()?>js/table.js"></script>