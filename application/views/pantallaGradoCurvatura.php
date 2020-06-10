<style>
#pac-input {
  background-color: #fff;
  font-family: Roboto;
  font-size: 20px;
  font-weight: 300;
  margin-left: 12px;
  margin-top: 10px;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width: 600px;
}


</style>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>Grado de Curvatura</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?=asset_url()?>">Inicio</a>
                        </li>
                        <li>
                            <a href="<?=asset_url()?>index.php/tramo/">Tramo</a>
                        </li>
                        <li class="active">
                            <strong>   Grado de Curvatura</strong>
                        </li>
                    </ol>
                </div>
</div>

 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                        <h3>Grado de Curvatura </h3>
                </div>
                <input id="pac-input" class="controls" type="text" placeholder="Buscar...">
                <div class="ibox-content">
                </br>
                    
                     <div class="row"> 
                      <div class="col-md-6" >
                            <h3>Instrucciones</h3>
                            <h3>1.- indicar dos puntos sobre la tangente de entrada y extender arrastrando los puntos.</h3>
                            <h3>2.- indicar dos puntos sobre la tangente de salida y extender arrastrando los puntos.</h3>
                            <h3>3.-Selecciona el inicio de la curva(PC) y el punto de tangencia donde termina(PT).</h3>
                            <h3>4.-Selecciona el punto medio de la curva (PM).</h3>
                            <h3>5.-Arrastra la circunferencia desde el marcador central hacia la direccion deseada.</h3>
                        </div>
                        <br>
                        <br>
                        <div><h3>Resultado</h3></div>
                        <div>----------------------------------------------------------------------------------------</div>
                        <div></div>
                        <div class="col-md-4" id="resultado"></div>
                        <br>
                        
                     </div> 
                     <br>
                     <div class="col-sm-10">                                          
                            <a onclick="clearOverlays();" ><button type="submit" id="submit_seguridad" class="btn btn-primary" ><i class="fa fa-repeat"></i> Reiniciar Mapa</button></a>
                        </div>
                     <br> 
                     <div class="row">    
                        <div class="col-md-8" >         
                                       
                        <div id="map" style="height:1000px;width:1400px;"></div>
                        

                        </div>
                        
                     </div>

                    
                </br>
                    


                </div>
            </div>
        </div>      
    </div>                 
</div>


 <script type="text/javascript">
        var poly;
        var polytan1;
        var polytan2;
        var map;
        var infowindow;
        var spherical;
        var cityCircle;
        var F; 
        var T;
        var Z;
        var P;
        var tan1=1;
        var tan2=1;
        var cuerda;
        var flecha;
        var C;
        var M;
        var P2;
        var rad;
        var punto;
        var gc;
        var markers = [];
        var circles= [];
        var lines=[];
        var result;
        var path;
        function toRadians (n) { return n * Math.PI / 180; };
        function toDegrees (n) { return n * (180/Math.PI) }


        function initMap() {
           
          map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: {lat: 17.025042, lng: -96.709047},
            mapTypeId: google.maps.MapTypeId.SATELLITE
          });
    var ctaPaletas = new google.maps.KmlLayer({
        url: '<?=asset_url()?>assets/mapas/p2.kml',
        map: map
      });
          poly = new google.maps.Polyline({
            strokeColor: '#000000',
            strokeOpacity: 1.0,
            strokeWeight: 3
          });

          polytan1 = new google.maps.Polyline({
            strokeColor: '#FDFF00',
            strokeOpacity: 1.0,
            strokeWeight: 1,
            draggable: true,
             editable: true
          });

          polytan2 = new google.maps.Polyline({
            strokeColor: '#FDFF00',
            strokeOpacity: 1.0,
            strokeWeight: 1,
            draggable: true,
             editable: true
          });

        infowindow = new google.maps.InfoWindow(
              { 
                size: new google.maps.Size(150,50)
              });
          poly.setMap(map);
          polytan1.setMap(map);
          polytan2.setMap(map);
         ////Busqueda****
            // Create the search box and link it to the UI element.
          var input = document.getElementById('pac-input');
          var searchBox = new google.maps.places.SearchBox(input);
          map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

          // Bias the SearchBox results towards current map's viewport.
          map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
          });

          var markers = [];
          // [START region_getplaces]
          // Listen for the event fired when the user selects a prediction and retrieve
          // more details for that place.
          searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
              return;
            }

            // Clear out the old markers.
            markers.forEach(function(marker) {
              marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
              var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
              };

              // Create a marker for each place.
              markers.push(new google.maps.Marker({
                map: map,
                icon: icon,
                title: place.name,
                position: place.geometry.location
              }));

              if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
              } else {
                bounds.extend(place.geometry.location);
              }
            });
            map.fitBounds(bounds);
          });
          // [END region_getplaces]
          ////Busqueda****

          // Add a listener for the click event
          map.addListener('click', addLatLng);

        }

        // Handles click events on a map, and adds a new point to the Polyline.
        function addLatLng(event) {
          if(tan1==1){
            path = polytan1.getPath();
          console.log({lat:event.latLng.lat(), lng:event.latLng.lng(),});
          // Because path is an MVCArray, we can simply append a new coordinate
          // and it will automatically appear.

          path.push(event.latLng);


          if(path.getLength()>1){
            tan1=0;
          }


          }else if (tan2==1) {
          path = polytan2.getPath();
          console.log({lat:event.latLng.lat(), lng:event.latLng.lng(),});
          // Because path is an MVCArray, we can simply append a new coordinate
          // and it will automatically appear.

          path.push(event.latLng);

          if(path.getLength()>1){
            tan2=0;
          }



          }
            else if (poly.getPath().getLength() < 2){
          path = poly.getPath();
          console.log({lat:event.latLng.lat(), lng:event.latLng.lng(),});
          // Because path is an MVCArray, we can simply append a new coordinate
          // and it will automatically appear.
          path.push(event.latLng);

          // Add a new marker at the new plotted point on the polyline.
          var marker = new google.maps.Marker({
            position: event.latLng,
            title: '#' + path.getLength(),
            map: map
          });
          var titulo='PT';
          if(path.getLength()==1){
            titulo='PC';
          }

          infomarker(marker,'<h3>'+titulo+'</h3>'+'<h5>Latitud: '+event.latLng.lat()+'</h5>'+'<h5>Longitud: '+event.latLng.lng()+'</h5>');
          markers.push(marker);
          verificarDosPuntos();
        }else if (poly.getPath().getLength() == 2 && punto==true){
            flecha=google.maps.geometry.spherical.computeDistanceBetween (Z,event.latLng);
            
            var heading = google.maps.geometry.spherical.computeHeading(F, T);
            P =google.maps.geometry.spherical.computeOffset(Z, flecha, heading+90);
            P2 =google.maps.geometry.spherical.computeOffset(Z, flecha, heading+270);

             

            var marker = new google.maps.Marker({
            position: P,
            title: '#',
            map: map
          });
          infomarker(marker,'<h3>PM</h3>'+'<h5>Latitud: '+P.lat()+'</h5>'+'<h5>Longitud: '+P.lng()+'</h5>'+'<h5>Cuerda Larga(m): '+flecha+'</h5>');

            markers.push(marker);
            var marker = new google.maps.Marker({
            position: P2,
            title: '#',
            map: map
          });
            infomarker(marker,'<h3>PM</h3>'+'<h5>Latitud: '+P2.lat()+'</h5>'+'<h5>Longitud: '+P2.lng()+'</h5>'+'<h5>Cuerda Larga(m): '+flecha+'</h5>');
             markers.push(marker);
            rad=(Math.pow(cuerda, 2)/(8*flecha)+(flecha/2));
            gc=1145.92/rad;
            var restante;
            var hrs=parseInt(gc);
            var restante=gc-hrs;
            restante=restante*60;
            var mins=parseInt(restante);
            restante=restante-mins;
            var secs=restante*60;
            secs=secs.toFixed(2);
            result='<h3>Cuerda Larga(m):'+cuerda+'</h3><h3>Flecha(m):'+flecha+'</h3><h3>Radio(m):'+rad+'</h3><h3>Gc:'+gc+' // '+hrs+'° '+mins+'‘ '+secs+'""</h3>';
            document.getElementById("resultado").innerHTML= result;
            //clearOverlays();
            
            var markercircle = new google.maps.Marker({
      map: map,
      position: Z,
      draggable: true,
      title: 'Arrastrame!'
    });

    infomarker(markercircle,'<h3>Circunferencia</h3>'+'<h5>Latitud: '+P2.lat()+'</h5>'+'<h5>Radio: '+rad+'</h5>'+'<h5>Gc(m): '+gc+'</h5>');
    markers.push(markercircle);
    cityCircle = new google.maps.Circle({
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.35,
      map: map,
      radius: rad
    });   

        cityCircle.bindTo('center', markercircle, 'position');
         cityCircle.setEditable(true);
        }
       
        google.maps.event.addListener(cityCircle, 'radius_changed', function () {
           cambiorad();
        });
        circles.push(cityCircle);    

        }

        function verificarDosPuntos(){
            if (path.length == 2){
                //latitudes originales en grados
                var lat1 = path.getAt(0).lat();
                var lat2 = path.getAt(1).lat();
                var lon1 = path.getAt(0).lng();
                var lon2 = path.getAt(1).lng();
                //variable para algo de la tierra
                var R = 6371000; // metres
                //variables en radianes
                var o1 = toRadians(lat1);
                var o2 = toRadians(lat2);
                var L1 = toRadians(lon1);
                var L2 = toRadians(lon2);
                var Ao = toRadians(lat2-lat1);
                var AL = toRadians(lon2-lon1);

                //calculos para la distancia "d"
                var a = Math.sin(Ao/2) * Math.sin(Ao/2) +
                        Math.cos(o1) * Math.cos(o2) *
                        Math.sin(AL/2) * Math.sin(AL/2);
                var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));

                var d = R * c;

                var tp = midPoint(lat1, lon1, lat2,lon2);
                console.log(tp);
                var marker = new google.maps.Marker({
                    position: tp,
                    title: 'mitad',
                    map: map
                });
                markers.push(marker);
                F = new google.maps.LatLng(lat1, lon1); 
                T = new google.maps.LatLng(lat2, lon2);
                Z = new google.maps.LatLng(tp.lat, tp.lng);
                
                // Get direction of the segment
                var heading = google.maps.geometry.spherical.computeHeading(F, T);
                var dist = 1000; // distance in meters
             
                var A =google.maps.geometry.spherical.computeOffset(Z, dist, heading+90);
                var B =google.maps.geometry.spherical.computeOffset(Z, dist, heading+270);

                var perpendicularCoordinates = [Z, A];
                var perpendicular = new google.maps.Polyline({
                    path: perpendicularCoordinates,
                    geodesic: true,
                    strokeColor: '#000000',
                    strokeOpacity: 1.0,
                    strokeWeight: 3,
                    map: map
                  });
                lines.push(perpendicular);
                cuerda=google.maps.geometry.spherical.computeDistanceBetween (F, T);
                infomarker(marker,'<h3>Centro</h3>'+'<h5>Latitud: '+Z.lat()+'</h5>'+'<h5>Longitud: '+Z.lng()+'</h5>'+'<h5>Cuerda Larga(m): '+cuerda+'</h5>');
                  var perpendicularCoordinatesB = [Z, B];
                  var perpendicular = new google.maps.Polyline({
                    path: perpendicularCoordinatesB,
                    geodesic: true,
                    strokeColor: '#000000',
                    strokeOpacity: 1.0,
                    strokeWeight: 3,
                    map: map
                  });  
                  lines.push(perpendicular);
                 punto=true;
                 C=Math.pow(cuerda, 2);
                


            }
            
        }

        function midPoint(lat1,lon1,lat2,lon2){

            var dLon = toRadians(lon2 - lon1);

            //convert to radians
            lat1 = toRadians(lat1);
            lat2 = toRadians(lat2);
            lon1 = toRadians(lon1);

            var Bx = Math.cos(lat2) * Math.cos(dLon);
            var By = Math.cos(lat2) * Math.sin(dLon);
            var lat3 = Math.atan2(Math.sin(lat1) + Math.sin(lat2), Math.sqrt((Math.cos(lat1) + Bx) * (Math.cos(lat1) + Bx) + By * By));
            var lon3 = lon1 + Math.atan2(By, Math.cos(lat1) + Bx);

            return {lat: toDegrees(lat3), lng: toDegrees(lon3)};
        }

  function clearOverlays() {
  for (var i = 0; i < markers.length; i++ ) {
    markers[i].setMap(null);
  }
    markers = new Array();

  for (var i = 0; i < circles.length; i++ ) {
    circles[i].setMap(null);
  }
    circles = new Array();
   for (var i = 0; i < lines.length; i++ ) {
    lines[i].setMap(null);
  }
    lines = new Array();
    poly.setMap(null);
    polytan1.setMap(null);
    polytan2.setMap(null);
    punto=false;
    poly = new google.maps.Polyline({
            strokeColor: '#000000',
            strokeOpacity: 1.0,
            strokeWeight: 3
          });
    poly.setMap(map);
    polytan1 = new google.maps.Polyline({
             strokeColor: '#FDFF00',
            strokeOpacity: 1.0,
            strokeWeight: 1,
            draggable: true,
             editable: true
          });
    polytan1.setMap(map);
    polytan2 = new google.maps.Polyline({
             strokeColor: '#FDFF00',
            strokeOpacity: 1.0,
            strokeWeight: 1,
            draggable: true,
             editable: true
          });
    polytan2.setMap(map);
    tan1=1;
    tan2=1;
    document.getElementById("resultado").innerHTML='';
}

function cambiorad(){

rad=circles[0].getRadius();
gc=1145.92/rad;
var restante;
var hrs=parseInt(gc);
var restante=gc-hrs;
restante=restante*60;
var mins=parseInt(restante);
restante=restante-mins;
var secs=restante*60;
secs=secs.toFixed(2);
result='<h3>Cuerda Larga(m): '+cuerda+'</h3><h3>Flecha(m): '+flecha+'</h3><h3>Radio(m): '+rad+'</h3><h3>Gc: '+gc+' || '+hrs+'� '+mins+'" '+secs+'""</h3>';
document.getElementById("resultado").innerHTML= result;
alert('Resultado Actualizado');
 }
function infomarker(marker,contentString){
google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(contentString); 
        infowindow.open(map,marker);
        });
}
    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhPXM0o4o-B0b7CFapN2IfC4x9MncpyCU&v=3.22&libraries=places&callback=initMap">
    </script>