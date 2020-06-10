<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>Mapa</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?=asset_url()?>tramo">Inicio</a>
                        </li>
                        <li>
                            <a href="<?=asset_url()?>index.php/tramo/">Tramo</a>
                        </li>
                        <li class="active">
                            <strong>	 Mapa</strong>
                        </li>
                    </ol>
                </div>
</div>

 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                        <h3>Tramo <?php echo $clave?></h3>
                </div>
                <div class="ibox-content">
                </br>
                    <div id="mapa" align="center">
                        <div id="canvas" align="center" style="width:500px; height:500px"></div>
                    </div>
                </br>
                    <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-10">                                          
                            <a href="<?=asset_url()?>/tramo/kml?id=<?php echo $id ?>"><button type="submit" id="submit_seguridad" class="btn btn-primary" ><i class="fa fa-repeat"></i> Actualizar Mapa</button></a>
                        </div>
                    </div>


                </div>
            </div>
        </div>      
    </div>                 
</div>


 <script>
  
        function initMap() {
            
          map = new google.maps.Map(document.getElementById('canvas'), {
            zoom: 15,
            center: new google.maps.LatLng(39.397, -100.644),
            mapTypeId: google.maps.MapTypeId.SATELLITE
          });

         
        infowindow = new google.maps.InfoWindow(
              { 
                size: new google.maps.Size(150,50)
              });

        var ctaLayer = new google.maps.KmlLayer({
    		url: '<?=asset_url()?>assets/mapas/<?php echo $clave?>.kml',
    		map: map
  		});

        var  geoXml = new geoXML3.parser({
      map: map
    });
    geoXml.parse('<?=asset_url()?>assets/mapas/<?php echo $clave?>.kml');
    geoXml.parse('<?=asset_url()?>assets/mapas/p2.kml');
      
  		
  	var ctaPaletas = new google.maps.KmlLayer({
    		url: '<?=asset_url()?>assets/mapas/p2.kml',
    		map: map
  		});


        }
      
    </script>
    
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSHKfuWcGCkY-GlAF8NqyR9esH4x9y82k&callback=initMap">
    </script>