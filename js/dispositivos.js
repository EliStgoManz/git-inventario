var arrayimg= new Array();
var imgactual="";
$(document).ready(function() {
    


    $.ajax({
        type: 'GET',
        url: 'http://127.0.0.1/sct/index.php/tramo/json' ,
        dataType: "json",
        success: function (respose) {
            $.each( respose, function( i, row ) {
            arrayimg[i] = row.img_central;

    });
        },
        error: function (request,error) {
            alert('Network error has occurred please try again!');
        }
    });  


        });

$(function(){
        $( "#formdisp").submit(function(event)
        {
            event.preventDefault();//prevent auto submit data

            var nombre= $("#kminicial").val();

            //assign our rest of variables

            $.ajax(
                {
                    type:"POST",
                    url: "http://127.0.0.1/sct/index.php/dispositivoSeguridad/insertarx",//URL changed 
                    data:{ nombre:nombre},
                    success:function(data)
                    {
                        cleandisp();
                        alert('Dispositivo Agregado con Exito');
                    },       
                    error: function (request,error) {
                         cleandisp();
                        alert('Error del servidor');
                    }
                });
        });
    });


    $('#left').elevateZoom({
    zoomType: "inner",
cursor: "crosshair"

   }); 
        $('#center').elevateZoom({
    zoomType: "inner",
cursor: "crosshair"

   }); 
            $('#right').elevateZoom({
    zoomType: "inner",
cursor: "crosshair"

   }); 
var base="<?=asset_url()?>";
var ruta="img/<?php echo $clave?>";
var fotos="";


function cleandisp(){
    $("#kminicial").val("");
}


$(function() {

      $("#next").click( function()
           {
            fotos=arrayimg.length;
            var pos = parseInt($('#left').attr("longdesc"));

            if(pos<fotos-1){
              pos+=1;
            }
            imgactual=arrayimg[pos];
            var left=base+ruta+"/izq/"+imgactual;
            var cen=base+ruta+"/cen/"+imgactual;
            var der=base+ruta+"/der/"+imgactual;


            $('.zoomContainer').remove();
            $('#left').removeData('elevateZoom');
            $('#left').removeData('zoomImage');
            $('#center').removeData('elevateZoom');
            $('#center').removeData('zoomImage');
            $('#right').removeData('elevateZoom');
            $('#right').removeData('zoomImage');
            $('#left').attr('alt',arrayimg[pos]);
            $('#center').attr('alt',arrayimg[pos]);
            $('#right').attr('alt',arrayimg[pos]);
            $('#left').attr('data-zoom-image',left);
            $('#center').attr('data-zoom-image',cen);
            $('#right').attr('data-zoom-image',der);
            $('#left').attr('longdesc',pos);
            $('#left').attr('src',left);
            $('#center').attr('src',cen);
            $('#right').attr('src',der);

            $('#left').elevateZoom({
            zoomType: "inner",
            cursor: "crosshair"

             }); 

            $('#center').elevateZoom({
            zoomType: "inner",
            cursor: "crosshair"

             }); 

             $('#right').elevateZoom({
            zoomType: "inner",
            cursor: "crosshair"

            }); 



           }
      );
});

$(function() {

      $("#back").click( function()
           {
            
            var pos = parseInt($('#left').attr("longdesc"));
            if(pos>0){
              pos-=1;
            }
            imgactual=arrayimg[pos];
            var left=base+ruta+"/izq/"+imgactual;
            var cen=base+ruta+"/cen/"+imgactual;
            var der=base+ruta+"/der/"+imgactual;


            $('.zoomContainer').remove();
            $('#left').removeData('elevateZoom');
            $('#left').removeData('zoomImage');
            $('#center').removeData('elevateZoom');
            $('#center').removeData('zoomImage');
            $('#right').removeData('elevateZoom');
            $('#right').removeData('zoomImage');
            $('#left').attr('alt',arrayimg[pos]);
            $('#center').attr('alt',arrayimg[pos]);
            $('#right').attr('alt',arrayimg[pos]);
            $('#left').attr('data-zoom-image',left);
            $('#center').attr('data-zoom-image',cen);
            $('#right').attr('data-zoom-image',der);
            $('#left').attr('longdesc',pos);
            $('#left').attr('src',left);
            $('#center').attr('src',cen);
            $('#right').attr('src',der);

            $('#left').elevateZoom({
            zoomType: "inner",
            cursor: "crosshair"

             }); 

            $('#center').elevateZoom({
            zoomType: "inner",
            cursor: "crosshair"

             }); 
            
             $('#right').elevateZoom({
            zoomType: "inner",
            cursor: "crosshair"

            }); 

           }
      );
});