<style>

#flot-line-chart {
    width: 450px;
    height: 200px;
}



#flot-line-chart  div.xAxis div.tickLabel 
{    
   white-space: nowrap;
    transform: translate(-9px, 0) rotate(-90deg);
    text-indent: -100%;
    transform-origin: top right;
    text-align: right !important;
    color: black;
}

#flot-line-max  div.xAxis div.tickLabel 
{    
   white-space: nowrap;
    transform: translate(-9px, 0) rotate(-90deg);
    text-indent: -100%;
    transform-origin: top right;
    text-align: right !important;
    color: black;
}

#flot-line-mac  div.xAxis div.tickLabel 
{    
   white-space: nowrap;
    transform: translate(-9px, 0) rotate(-90deg);
    text-indent: -100%;
    transform-origin: top right;
    text-align: right !important;
    color: black;
}

#flot-line-fric  div.xAxis div.tickLabel 
{    
   white-space: nowrap;
    transform: translate(-9px, 0) rotate(-90deg);
    text-indent: -100%;
    transform-origin: top right;
    text-align: right !important;
    color: black;
}

#flot-line-def div.xAxis div.tickLabel 
{    
   white-space: nowrap;
    transform: translate(-9px, 0) rotate(-90deg);
    text-indent: -100%;
    transform-origin: top right;
    text-align: right !important;
    color: black;
}

#flot-line-det  div.xAxis div.tickLabel 
{    
   white-space: nowrap;
    transform: translate(-9px, 0) rotate(-90deg);
    text-indent: -100%;
    transform-origin: top right;
    text-align: right !important;
    color: black;
}
</style>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>    Grafica Auscultacion</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?=asset_url()?>panel">Inicio</a>
                        </li>
                        <li>
                            <a href="<?=asset_url()?>panel/tramos/">Tramos</a>
                        </li>
                        <li class="active">
                            <strong>     Auscultacion</strong>
                        </li>
                    </ol>
                </div>
</div>

 <div class="wrapper wrapper-content animated fadeInRight">
 <div class="col-lg-12">
                <div class="ibox collapsed">
                    <div class="ibox-title">
                        <h5>Opciones de Filtrado</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>                            
                            
                        </div>
                    </div>
                    <div class="ibox-content">
      <form method="get" class="form-horizontal">
                        <div class="form-group"><label class="col-sm-2 control-label">Resultados en: <br/><small class="text-navy"></small></label>

                                    <div class="col-sm-10">
                                        <div class="i-checks"><label> <input type="radio" name="check" id="check20" value="" <?php if($tipo==1) echo 'checked'?>> <i></i> 20 Mts </label></div>
                                        <div class="i-checks"><label> <input type="radio" name="check"  id="check100" value="" <?php if($tipo==2) echo 'checked'?>> <i></i> 100 Mts </label></div>
                                        <div class="i-checks"><label> <input type="radio" name="check"  id="check1" value="" <?php if($tipo==3) echo 'checked'?>> <i></i> 1 Km </label></div>
                                        
                                    </div>
                                    
                                </div>
                        </form>
                        <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Ver Graficas: <br/><small class="text-navy"></small></label>

                                    <div class="col-sm-10">
                                        <div class="i-checks"><label> <input type="checkbox" name="check" id="iri" <?php if($iri==1) echo 'checked'?>> <i></i> Promedio Iri </label></div>
                                        <div class="i-checks"><label> <input type="checkbox" name="check" id="max" <?php if($max==1) echo 'checked'?>> <i></i> Promedio PR_Max </label></div>
                                        <div class="i-checks"><label> <input type="checkbox" name="check" id="mac" <?php if($mac==1) echo 'checked'?>> <i></i> Promedio Mac </label></div>
                                        <div class="i-checks"><label> <input type="checkbox" name="check" id="fric" <?php if($fric==1) echo 'checked'?>> <i></i> Friccion </label></div>
                                        <div class="i-checks"><label> <input type="checkbox" name="check" id="def" <?php if($def==1) echo 'checked'?>> <i></i> Deflexion </label></div>
                                        <div class="i-checks"><label> <input type="checkbox" name="check" id="det" <?php if($det==1) echo 'checked'?>> <i></i> Deterioro </label></div>

                                        
                                    </div>
                                </div>
                        <button class="btn btn-primary"  onclick="filtrar()">Aplicar Filtro</button>
                        
                    </div>
                </div>
            </div>
     <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5 class="col-sm-3">Tramo <?php echo $clave; echo " "; echo $carretera; ?></h5>
                        <div class="ibox-tools">
                                                      
                            
                        </div>
                    </div>
                    <div class="ibox-content">
                    <div align="center">
                       <?php
            if($tipo==1){ 
            ?>
            <button class="btn btn-primary"  onclick="atrasd()"><<</button>
            <button class="btn btn-primary"  onclick="atras()"><</button>
            <button class="btn btn-primary"  onclick="siguiente()">></button>
            <button class="btn btn-primary"  onclick="siguiented()">>></button>
            <?php
            }
            ?>

            <?php
            if($tipo==2){ 
            ?>
            <button class="btn btn-primary"  onclick="atrasciend()"><<</button>
            <button class="btn btn-primary"  onclick="atrascien()"><</button>
            <button class="btn btn-primary"  onclick="sigucien()">></button>
            <button class="btn btn-primary"  onclick="siguciend()">>></button>
            <?php
            }
            ?>

            <?php
            if($tipo==3){ 
            ?>
            <button class="btn btn-primary"  onclick="atrasciend()"><<</button>
            <button class="btn btn-primary"  onclick="atrascien()"><</button>
            <button class="btn btn-primary"  onclick="sigucien()">></button>
            <button class="btn btn-primary"  onclick="siguciend()">>></button>
            <?php
            }
            ?>
                                    
                        
                      </div>
                        
                            
                        
                    </div>
                </div>
            </div>       

     <?php if($iri==1){ ?>        
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                        <h3>Iri</h3>
                </div>
                <div class="ibox-content">
                    
                          <div class="flot-chart-content" id="flot-line-chart" style="width: 100%;"></div>   
                          <div style="height: 20px;"></div>        
                </div>
            </div>
        </div>      
    </div>  
    <?php } ?>
    <?php if($max==1){ ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                        <h3>Profundidad de Rodera Máxima</h3>
                </div>
                <div class="ibox-content">
                    
                          <div class="flot-chart-content" id="flot-line-max" style="width: 100%; height: 200px;"></div>   
                          <div style="height: 20px;"></div>        
                </div>
            </div>
        </div>      
    </div>  
    <?php }?> 
<?php if($mac==1){ ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                        <h3>Macrotextura</h3>
                </div>
                <div class="ibox-content">
                    
                          <div class="flot-chart-content" id="flot-line-mac" style="width: 100%; height: 200px;"></div>   
                          <div style="height: 20px;"></div>        
                </div>
            </div>
        </div>      
    </div>  
    <?php }?>  
<?php if($fric==1){ ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                        <h3>Coeficiente de Fricción</h3>
                </div>
                <div class="ibox-content">
                    
                          <div class="flot-chart-content" id="flot-line-fric" style="width: 100%; height: 200px;"></div>   
                          <div style="height: 20px;"></div>        
                </div>
            </div>
        </div>      
    </div>  
    <?php }?> 
<?php if($def==1){ ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                        <h3>Deflexiones</h3>
                </div>
                <div class="ibox-content">
                    
                          <div class="flot-chart-content" id="flot-line-def" style="width: 100%; height: 200px;"></div>   
                          <div style="height: 20px;"></div>        
                </div>
            </div>
        </div>      
    </div>  
    <?php }?> 
<?php if($det==1){ ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                        <h3>Deterioros Superficiales</h3>
                </div>
                <div class="ibox-content">
                    
                          <div class="flot-chart-content" id="flot-line-det" style="width: 100%; height: 200px;"></div>   
                          <div style="height: 20px;"></div>        
                </div>
            </div>
        </div>      
    </div>  
    <?php }?>             
</div>


<script>
var id=<?php echo $id ?>;
var tipo=<?php echo $tipo ?>;
var iri=<?php echo $iri ?>;
var max=<?php echo $max ?>;
var mac=<?php echo $mac ?>;
var fric=<?php echo $fric ?>;
var def=<?php echo $def ?>;
var det=<?php echo $det ?>;
var arraycad = new Array();
var arrayiri= new Array();
var arraymax= new Array();
var arraymac= new Array();
var arrayfric= new Array();
var arraydef= new Array();
var arraydet= new Array();
var arrayops=new Array ();
var arrayopsc=new Array ();
var arraydatosiri= new Array();
var arraydatosmax= new Array();
var arraydatosmac= new Array();
var arraydatosfric= new Array();
var arraydatosdef= new Array();
var arraydatosdet= new Array();
var arraytotaliri= new Array();
var arraytotalmax= new Array();
var arraytotalmac= new Array();
var arraytotalfric= new Array();
var arraytotaldef= new Array();
var arraytotaldet= new Array();
var ini=0;
var finiri=201;
$(document).ready(function() {


var contador=1;
var datos=0;
var km=0;

$('#check20').change(function(){
    this.checked ? tipo=1 : alert('not set');
});

$('#check100').change(function(){
    this.checked ? tipo=2 : alert('not set');
});

$('#check1').change(function(){
    this.checked ? tipo=3 : alert('not set');
});

$('#iri').change(function(){
    this.checked ? iri=1 : iri=0;
});

$('#max').change(function(){
    this.checked ? max=1 : max=0;
});

$('#mac').change(function(){
    this.checked ? mac=1 : mac=0;
});

$('#fric').change(function(){
    this.checked ? fric=1 : fric=0;
});

$('#def').change(function(){
    this.checked ? def=1 : def=0;
});

$('#det').change(function(){
    this.checked ? det=1 : det=0;
});


$.ajax({
        type: 'GET',
        url: '<?=asset_url()?>index.php/auscultacion/json?id=<?php echo $id; ?>&tipo=<?php echo $tipo; ?>' ,
        dataType: "json",
        success: function (respose) {
            $.each( respose, function( i, row ) {
            arraycad[i] = row.km;
            arrayiri[i] = row.iri;
            arraymax[i] = row.max;
            arraymac[i] = row.mac;
            arrayfric[i] = row.fric;
            arraydef[i] = row.def;
            arraydet[i] = row.det;

    });
         if(tipo==1){
           kmopsv();
         }else if(tipo==2){
            kmops();
         }else if(tipo==3){
            kmopsk();
         }   
        
        },
        error: function (request,error) {
            alert('Network error has occurred please try again!');
        }
    });




function cops(){
var cont=0;
contador=1;
km=0;
var cad="";
var res;
for(i=1;i<arraycad.length;i++){
  if(i==1){
          cad+=parseInt(arraycad[0]/1000);
                 res=arraycad[0]%1000;
                 cad+="+"
                 if(res<100){
                    cad+=0;
                 }
                 if(res==0){
                    cad+=0;
                 } 
                 cad+=res;
                 arraytotaliri[cont]= arrayiri[i];
                 arraytotalmax[cont]= arraymax[i];
                 arraytotalmac[cont]= arraymac[i];
                 arraytotalfric[cont]= arrayfric[i];
                 arraytotaldef[cont]= arraydef[i];
                 arraytotaldet[cont]= arraydet[i];
                 arrayopsc[km] = cad;
                 cad="";
                 km++;
                 cont++;
        }
        if(contador==5){
                 cad+=parseInt(arraycad[i]/1000);
                 res=arraycad[i]%1000;
                 cad+="+"
                 if(res<100){
                    cad+=0;
                 }
                 if(res==0){
                    cad+=0;
                 } 
                 cad+=res;
                 arraytotaliri[cont]= arrayiri[i];
                 arraytotalmax[cont]= arraymax[i];
                 arraytotalmac[cont]= arraymac[i];
                 arraytotalfric[cont]= arrayfric[i];
                 arraytotaldef[cont]= arraydef[i];
                 arraytotaldet[cont]= arraydet[i];
                 arrayopsc[km] = cad;
                 cad="";
                 km++;
                 contador=0;
                 cont++;
            }
            contador++;
            
  }

}


function kops(){
var cont=0;
contador=1;
km=0;
var cad="";
var res;
for(i=1;i<arraycad.length;i++){
  if(i==1){
          cad+=parseInt(arraycad[0]/1000);
                 res=arraycad[0]%1000;
                 cad+="+"
                 if(res<100){
                    cad+=0;
                 }
                 if(res==0){
                    cad+=0;
                 } 
                 cad+=res;
                 arraytotaliri[cont]= arrayiri[i];
                 arraytotalmax[cont]= arraymax[i];
                 arraytotalmac[cont]= arraymac[i];
                 arraytotalfric[cont]= arrayfric[i];
                 arraytotaldef[cont]= arraydef[i];
                 arraytotaldet[cont]= arraydet[i];
                 arrayopsc[km] = cad;
                 cad="";
                 km++;
                 cont++;
        }
        if(contador==50){
                 cad+=parseInt(arraycad[i]/1000);
                 res=arraycad[i]%1000;
                 cad+="+"
                 if(res<100){
                    cad+=0;
                 }
                 if(res==0){
                    cad+=0;
                 } 
                 cad+=res;
                 arraytotaliri[cont]= arrayiri[i];
                 arraytotalmax[cont]= arraymax[i];
                 arraytotalmac[cont]= arraymac[i];
                 arraytotalfric[cont]= arrayfric[i];
                 arraytotaldef[cont]= arraydef[i];
                 arraytotaldet[cont]= arraydet[i];
                 arrayopsc[km] = cad;
                 cad="";
                 km++;
                 contador=0;
                 cont++;
            }
            contador++;
            
  }

}

function kmopsk(){
var cad="";
var res;
var poskm=0;
for(i=1;i<arraycad.length;i++){
        if(i==1){
          cad+=parseInt(arraycad[0]/1000);
                 res=arraycad[0]%1000;
                 cad+="+"
                 if(res<100){
                    cad+=0;
                 }
                 if(res==0){
                    cad+=0;
                 } 
                 cad+=res;

                 arrayops[km] = [poskm,cad];
                 cad="";
                 km++;
                 poskm+=1;
        }
        if(contador==50){
                 cad+=parseInt(arraycad[i]/1000);
                 res=arraycad[i]%1000;
                 cad+="+"
                 if(res<100){
                    cad+=0;
                 }
                 if(res==0){
                    cad+=0;
                 } 
                 cad+=res;

                 arrayops[km] = [poskm,cad];
                 cad="";
                 km++;
                 poskm+=1;
                 contador=0;
            }
            contador++;
            }
            kops();
            datoskm();
            
}

function kmops(){
var cad="";
var res;
var poskm=0;
for(i=1;i<arraycad.length;i++){
        if(i==1){
          cad+=parseInt(arraycad[0]/1000);
                 res=arraycad[0]%1000;
                 cad+="+"
                 if(res<100){
                    cad+=0;
                 }
                 if(res==0){
                    cad+=0;
                 } 
                 cad+=res;

                 arrayops[km] = [poskm,cad];
                 cad="";
                 km++;
                 poskm+=10;
        }
        if(contador==50){
                 cad+=parseInt(arraycad[i]/1000);
                 res=arraycad[i]%1000;
                 cad+="+"
                 if(res<100){
                    cad+=0;
                 }
                 if(res==0){
                    cad+=0;
                 } 
                 cad+=res;

                 arrayops[km] = [poskm,cad];
                 cad="";
                 km++;
                 poskm+=10;
                 contador=0;
            }
            contador++;
            }
            cops();
            datosc();
            
}

function kmopsv(){
var cad="";
var res;
var poskm=0;
for(i=1;i<arraycad.length;i++){
        if(i==1){
          cad+=parseInt(arraycad[0]/1000);
                 res=arraycad[0]%1000;
                 cad+="+"
                 if(res<100){
                    cad+=0;
                 }
                 if(res==0){
                    cad+=0;
                 } 
                 cad+=res;

                 arrayops[km] = [poskm,cad];
                 cad="";
                 km++;
                 poskm+=50;
        }
        if(contador==50){
                 cad+=parseInt(arraycad[i]/1000);
                 res=arraycad[i]%1000;
                 cad+="+"
                 if(res<100){
                    cad+=0;
                 }
                 if(res==0){
                    cad+=0;
                 } 
                 cad+=res;

                 arrayops[km] = [poskm,cad];
                 cad="";
                 km++;
                 poskm+=50;
                 contador=0;
            }
            contador++;
            }
            datosv();
            
}

function datosv(){
  for(i=0;i<arraycad.length;i++){
  
          
          if(i<201){               
              arraydatosiri[i]= [i,arrayiri[i]];
              arraydatosmax[i]= [i,arraymax[i]];    
              arraydatosmac[i]= [i,arraymac[i]];
              arraydatosfric[i]= [i,arrayfric[i]];
              arraydatosdef[i]= [i,arraydef[i]];
              arraydatosdet[i]= [i,arraydet[i]];   
              }
          
  
      }
  grafica();
  graficamax();
  graficamac(); 
graficafric();
graficadef();
graficadet(); 
  }

function datosc(){
contador=1;
for(i=1;i<arraycad.length;i++){
  

        if(i<505){
          if(i==1){
                    arraydatosiri[datos]= [datos,arrayiri[i]];
                    arraydatosmax[datos]= [datos,arraymax[i]];
                    arraydatosmac[datos]= [datos,arraymac[i]];
                    arraydatosfric[datos]= [datos,arrayfric[i]];
                    arraydatosdef[datos]= [datos,arraydef[i]];
                    arraydatosdet[datos]= [datos,arraydet[i]];
                      contador=0;
                      datos++;
                  }
                if(contador==5){
                    arraydatosiri[datos]= [datos,arrayiri[i]];
                    arraydatosmax[datos]= [datos,arraymax[i]];
                    arraydatosmac[datos]= [datos,arraymac[i]];
                    arraydatosfric[datos]= [datos,arrayfric[i]];
                    arraydatosdef[datos]= [datos,arraydef[i]];
                    arraydatosdet[datos]= [datos,arraydet[i]];
                    contador=0;
                    datos++;
                }
                
            }
            contador++;

    }
grafica();
graficamax();
graficamac();
graficafric();
graficadef();
graficadet();
}


function datoskm(){
contador=1;
for(i=1;i<arraycad.length;i++){
  

        if(i<2550){
          if(i==1){
                    arraydatosiri[datos]= [datos,arrayiri[i]];
                    arraydatosmax[datos]= [datos,arraymax[i]];
                    arraydatosmac[datos]= [datos,arraymac[i]];
                    arraydatosfric[datos]= [datos,arrayfric[i]];
                    arraydatosdef[datos]= [datos,arraydef[i]];
                    arraydatosdet[datos]= [datos,arraydet[i]];
                      contador=0;
                      datos++;
                  }
                if(contador==50){
                    arraydatosiri[datos]= [datos,arrayiri[i]];
                    arraydatosmax[datos]= [datos,arraymax[i]];
                    arraydatosmac[datos]= [datos,arraymac[i]];
                    arraydatosfric[datos]= [datos,arrayfric[i]];
                    arraydatosdef[datos]= [datos,arraydef[i]];
                    arraydatosdet[datos]= [datos,arraydet[i]];
                    contador=0;
                    datos++;
                }
                
            }
            contador++;

    }
grafica();
graficamax();
graficamac();
graficafric();
graficadef();
graficadet();
}





});

function grafica() {
    
    
    var barOptions = {
        series: {
            lines: {
                show: true,
                lineWidth: 2,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.0
                    }, {
                        opacity: 0.0
                    }]
                }
            }
        },
        xaxis: {
            ticks: arrayops
           
        },yaxis: {
            tickDecimals: 2
        },
        colors: ["#1ab394"],
        grid: {
            color: "#999999",
            hoverable: true,
            clickable: true,
            tickColor: "#D4D4D4",
            borderWidth:0,
            markings: [
            {yaxis: { from: 0, to: 3 },color: "rgba(0, 255, 0, 0.3)"},
            {yaxis: { from: 3, to: 4.5},color: "rgba(255,255,0,0.3)"},
            {yaxis: { from: 4.5, to: 100},color: "rgba(255, 0, 0, 0.3)" }
        ]
        },

        legend: {
            show: false
        },
        tooltip: true,
        tooltipOpts: {
            content: function (label, xval, y) {
                if(tipo==1){
                      return "Kilometro:" + arraycad[xval] + "<br> Calificacion:" + y; 
                }else if(tipo==2){
                    return "Kilometro:" + arrayopsc[xval] + "<br> Calificacion:" + y; 
                }else if(tipo==3){
                    return "Kilometro:" + arrayopsc[xval] + "<br> Calificacion:" + y; 
                }
                      }
        }
    };


    
    var barData = [{
        label: "Iri",
        data: arraydatosiri,
        points:{show:true}
        }
        ];



    
    $.plot($("#flot-line-chart"), barData, barOptions);

};

function graficamax() {
    
    
    var barOptions = {
        series: {
            lines: {
                show: true,
                lineWidth: 2,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.0
                    }, {
                        opacity: 0.0
                    }]
                }
            }
        },
        xaxis: {
            ticks: arrayops
           
        },yaxis: {
            tickDecimals: 2
        },
        colors: ["#1ab394"],
        grid: {
            color: "#999999",
            hoverable: true,
            clickable: true,
            tickColor: "#D4D4D4",
            borderWidth:0,
            markings: [
            {yaxis: { from: 0, to: 7.0 },color: "rgba(0, 255, 0, 0.3)"},
            {yaxis: { from: 7.1, to: 9.0},color: "rgba(255,255,0,0.3)"},
            {yaxis: { from: 9.1, to: 100},color: "rgba(255, 0, 0, 0.3)" }
        ]
        },

        legend: {
            show: false
        },
        tooltip: true,
        tooltipOpts: {
            content: function (label, xval, y) {
                      if(tipo==1){
                      return "Kilometro:" + arraycad[xval] + "<br> Calificacion:" + y; 
                }else if(tipo==2){
                    return "Kilometro:" + arrayopsc[xval] + "<br> Calificacion:" + y; 
                }else if(tipo==3){
                    return "Kilometro:" + arrayopsc[xval] + "<br> Calificacion:" + y; 
                }
                      }
        }
    };

    var datos=[
            [0, 1.49],
            [1, 1.68],
            [2, 3.03],
            [3, 1.54],
            [4, 1.68],
            [5, 2.46],
            [6, 1.88],
            [7, 1.60],
            [8, 2.220],
            [9, 2.44],
            [10, 3.09],
            [11, 5.07]
            
        ] ;

    
    var barData = [{
        label: "Iri",
        data: arraydatosmax,
        points:{show:true}
        }
        ];



    
    $.plot($("#flot-line-max"), barData, barOptions);

};

function graficamac() {
    
    
    var barOptions = {
        series: {
            lines: {
                show: true,
                lineWidth: 2,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.0
                    }, {
                        opacity: 0.0
                    }]
                }
            }
        },
        xaxis: {
            ticks: arrayops
           
        },yaxis: {
            tickDecimals: 2
        },
        colors: ["#1ab394"],
        grid: {
            color: "#999999",
            hoverable: true,
            clickable: true,
            tickColor: "#D4D4D4",
            borderWidth:0,
            markings: [
            {yaxis: { from: 0.75, to: 100 },color: "rgba(0, 255, 0, 0.3)"},
            
            {yaxis: { from: 0, to: 0.75},color: "rgba(255, 0, 0, 0.3)" }
        ]
        },

        legend: {
            show: false
        },
        tooltip: true,
        tooltipOpts: {
            content: function (label, xval, y) {
                if(tipo==1){
                      return "Kilometro:" + arraycad[xval] + "<br> Calificacion:" + y; 
                }else if(tipo==2){
                    return "Kilometro:" + arrayopsc[xval] + "<br> Calificacion:" + y; 
                }
                else if(tipo==3){
                    return "Kilometro:" + arrayopsc[xval] + "<br> Calificacion:" + y; 
                }
                      }
        }
    };

    var datos=[
            [0, 1.49],
            [1, 1.68],
            [2, 3.03],
            [3, 1.54],
            [4, 1.68],
            [5, 2.46],
            [6, 1.88],
            [7, 1.60],
            [8, 2.220],
            [9, 2.44],
            [10, 3.09],
            [11, 5.07]
            
        ] ;

    
    var barData = [{
        label: "Iri",
        data: arraydatosmac,
        points:{show:true}
        }
        ];



    
    $.plot($("#flot-line-mac"), barData, barOptions);

};

function graficafric() {
    
    
    var barOptions = {
        series: {
            lines: {
                show: true,
                lineWidth: 2,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.0
                    }, {
                        opacity: 0.0
                    }]
                }
            }
        },
        xaxis: {
            ticks: arrayops
           
        },yaxis: {
            tickDecimals: 2
        },
        colors: ["#1ab394"],
        grid: {
            color: "#999999",
            hoverable: true,
            clickable: true,
            tickColor: "#D4D4D4",
            borderWidth:0,
            markings: [
            {yaxis: { from: 0., to: 0.4},color: "rgba(255, 0, 0, 0.3)" },
            {yaxis: { from: 0.4, to: 0.6},color: "rgba(255,255,0,0.3)"},
            {yaxis: { from: 0.6, to: 0.9 },color: "rgba(0, 255, 0, 0.3)"},           
            {yaxis: { from: 0.9, to: 100},color: "rgba(255, 0, 0, 0.3)" }
        ]
        },

        legend: {
            show: false
        },
        tooltip: true,
        tooltipOpts: {
            content: function (label, xval, y) {
                if(tipo==1){
                      return "Kilometro:" + arraycad[xval] + "<br> Calificacion:" + y; 
                }else if(tipo==2){
                    return "Kilometro:" + arrayopsc[xval] + "<br> Calificacion:" + y; 
                }else if(tipo==3){
                    return "Kilometro:" + arrayopsc[xval] + "<br> Calificacion:" + y; 
                }
                      }
        }
    };

   
    
    var barData = [{
        label: "Iri",
        data: arraydatosfric,
        points:{show:true}
        }
        ];



    
    $.plot($("#flot-line-fric"), barData, barOptions);

};

function graficadef() {
    
    
    var barOptions = {
        series: {
            lines: {
                show: true,
                lineWidth: 2,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.0
                    }, {
                        opacity: 0.0
                    }]
                }
            }
        },
        xaxis: {
            ticks: arrayops
           
        },yaxis: {
            tickDecimals: 2
        },
        colors: ["#1ab394"],
        grid: {
            color: "#999999",
            hoverable: true,
            clickable: true,
            tickColor: "#D4D4D4",
            borderWidth:0,
            markings: [
            {yaxis: { from: 0, to: 0.5 },color: "rgba(0, 255, 0, 0.3)"},
            {yaxis: { from: 0.5, to: 0.8},color: "rgba(255,255,0,0.3)"},
            {yaxis: { from: 0.8, to: 100},color: "rgba(255, 0, 0, 0.3)" }
        ]
        },

        legend: {
            show: false
        },
        tooltip: true,
        tooltipOpts: {
            content: function (label, xval, y) {
                if(tipo==1){
                      return "Kilometro:" + arraycad[xval] + "<br> Calificacion:" + y; 
                }else if(tipo==2){
                    return "Kilometro:" + arrayopsc[xval] + "<br> Calificacion:" + y; 
                }else if(tipo==3){
                    return "Kilometro:" + arrayopsc[xval] + "<br> Calificacion:" + y; 
                }
                      }
        }
    };

   
    
    var barData = [{
        label: "Iri",
        data: arraydatosdef,
        points:{show:true}
        }
        ];



    
    $.plot($("#flot-line-def"), barData, barOptions);

};

function graficadet() {
    
    
    var barOptions = {
        series: {
            lines: {
                show: true,
                lineWidth: 2,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.0
                    }, {
                        opacity: 0.0
                    }]
                }
            }
        },
        xaxis: {
            ticks: arrayops
           
        },yaxis: {
            tickDecimals: 2
        },
        colors: ["#1ab394"],
        grid: {
            color: "#999999",
            hoverable: true,
            clickable: true,
            tickColor: "#D4D4D4",
            borderWidth:0,
            markings: [
            {yaxis: { from: 0, to: 3 },color: "rgba(0, 255, 0, 0.3)"},
            {yaxis: { from: 3, to: 4.5},color: "rgba(255,255,0,0.3)"},
            {yaxis: { from: 4.5, to: 100},color: "rgba(255, 0, 0, 0.3)" }
        ]
        },

        legend: {
            show: false
        },
        tooltip: true,
        tooltipOpts: {
            content: function (label, xval, y) {
                if(tipo==1){
                      return "Kilometro:" + arraycad[xval] + "<br> Calificacion:" + y; 
                }else if(tipo==2){
                    return "Kilometro:" + arrayopsc[xval] + "<br> Calificacion:" + y; 
                }else if(tipo==3){
                    return "Kilometro:" + arrayopsc[xval] + "<br> Calificacion:" + y; 
                }
                      }
        }
    };

    var datos=[
            [0, 1.49],
            [1, 1.68],
            [2, 3.03],
            [3, 1.54],
            [4, 1.68],
            [5, 2.46],
            [6, 1.88],
            [7, 1.60],
            [8, 2.220],
            [9, 2.44],
            [10, 3.09],
            [11, 5.07]
            
        ] ;

    
    var barData = [{
        label: "Iri",
        data: arraydatosdet,
        points:{show:true}
        }
        ];



    
    $.plot($("#flot-line-det"), barData, barOptions);

};

function filtrar(){

    window.location.replace("<?=asset_url()?>/auscultacion/graficas?id="+id+"&tipo="+tipo+"&iri="+iri+"&max="+max+"&mac="+mac+"&fric="+fric+"&def="+def+"&det="+det); 
}

///////
function siguiente(){
  ini+=1;
  finiri+=1;
  if(finiri>=arrayiri.length){
    finiri=arrayiri.length-1;
    ini-=1;
  }
  
  var irinuevo= new Array();
  var maxnuevo= new Array();
  var macnuevo= new Array();
  var fricnuevo= new Array();
  var defnuevo= new Array();
  var detnuevo= new Array();
  irinuevo=arrayiri.slice(ini,finiri);
  maxnuevo=arraymax.slice(ini,finiri);
  macnuevo=arraymac.slice(ini,finiri);
  fricnuevo=arrayfric.slice(ini,finiri);
  defnuevo=arraydef.slice(ini,finiri);
  detnuevo=arraydet.slice(ini,finiri);
  arraydatosiri= new Array();
  arraydatosmax= new Array();
  arraydatosmac= new Array();
  arraydatosfric= new Array();
  arraydatosdef= new Array();
  arraydatosdet= new Array();

  for(i=0;i<irinuevo.length;i++){

    arraydatosiri[i]= [i+ini,irinuevo[i]];
    arraydatosmax[i]= [i+ini,maxnuevo[i]];
    arraydatosmac[i]= [i+ini,macnuevo[i]];
    arraydatosfric[i]= [i+ini,fricnuevo[i]];
    arraydatosdef[i]= [i+ini,defnuevo[i]];
    arraydatosdet[i]= [i+ini,detnuevo[i]];
  }
  grafica();
  graficamax();
  graficamac();
graficafric();
graficadef();
graficadet();

}

///////
function siguiented(){
  ini+=50;
  finiri+=50;
  if(finiri>=arrayiri.length){
    finiri=arrayiri.length-1;
    ini-=50;
  }
  
  var irinuevo= new Array();
  var maxnuevo= new Array();
  var macnuevo= new Array();
  var fricnuevo= new Array();
  var defnuevo= new Array();
  var detnuevo= new Array();
  irinuevo=arrayiri.slice(ini,finiri);
  maxnuevo=arraymax.slice(ini,finiri);
  macnuevo=arraymac.slice(ini,finiri);
  fricnuevo=arrayfric.slice(ini,finiri);
  defnuevo=arraydef.slice(ini,finiri);
  detnuevo=arraydet.slice(ini,finiri);
  arraydatosiri= new Array();
  arraydatosmax= new Array();
  arraydatosmac= new Array();
  arraydatosfric= new Array();
  arraydatosdef= new Array();
  arraydatosdet= new Array();

  for(i=0;i<irinuevo.length;i++){

    arraydatosiri[i]= [i+ini,irinuevo[i]];
    arraydatosmax[i]= [i+ini,maxnuevo[i]];
    arraydatosmac[i]= [i+ini,macnuevo[i]];
    arraydatosfric[i]= [i+ini,fricnuevo[i]];
    arraydatosdef[i]= [i+ini,defnuevo[i]];
    arraydatosdet[i]= [i+ini,detnuevo[i]];
  }
  grafica();
  graficamax();
  graficamac();
graficafric();
graficadef();
graficadet();

}

//////
function sigukm(){
    console.log( arraydatosiri );
    console.log( arrayiri );
    console.log( arrayops );
}

function sigucien(){
 
  ini+=1;
  finiri+=1;
  if(finiri>=arrayiri.length){
    finiri=arrayiri.length-1;
    ini-=1;
    
  }
  

  var irinuevo= new Array();
  var maxnuevo= new Array();
  var macnuevo= new Array();
  var fricnuevo= new Array();
  var defnuevo= new Array();
  var detnuevo= new Array();
  irinuevo=arraytotaliri.slice(ini,finiri);
  maxnuevo=arraytotalmax.slice(ini,finiri);
  macnuevo=arraytotalmac.slice(ini,finiri);
  fricnuevo=arraytotalfric.slice(ini,finiri);
  defnuevo=arraytotaldef.slice(ini,finiri);
  detnuevo=arraytotaldet.slice(ini,finiri);
  arraydatosiri= new Array();
  arraydatosmax= new Array();
  arraydatosmac= new Array();
  arraydatosfric= new Array();
  arraydatosdef= new Array();
  arraydatosdet= new Array();

  for(i=0;i<irinuevo.length;i++){

    arraydatosiri[i]= [i+ini,irinuevo[i]];
    arraydatosmax[i]= [i+ini,maxnuevo[i]];
    arraydatosmac[i]= [i+ini,macnuevo[i]];
    arraydatosfric[i]= [i+ini,fricnuevo[i]];
    arraydatosdef[i]= [i+ini,defnuevo[i]];
    arraydatosdet[i]= [i+ini,detnuevo[i]];
  }

  grafica();
  graficamax();
  graficamac();
graficafric();
graficadef();
graficadet();
}

//////

function siguciend(){
    console.log(arraycad)
  ini+=10;
  finiri+=10;
  if(finiri>=arrayiri.length){
    finiri=arrayiri.length-1;
    ini-=10;
    
  }
  
  var irinuevo= new Array();
  var maxnuevo= new Array();
  var macnuevo= new Array();
  var fricnuevo= new Array();
  var defnuevo= new Array();
  var detnuevo= new Array();
  irinuevo=arraytotaliri.slice(ini,finiri);
  maxnuevo=arraytotalmax.slice(ini,finiri);
  macnuevo=arraytotalmac.slice(ini,finiri);
  fricnuevo=arraytotalfric.slice(ini,finiri);
  defnuevo=arraytotaldef.slice(ini,finiri);
  detnuevo=arraytotaldet.slice(ini,finiri);
  arraydatosiri= new Array();
  arraydatosmax= new Array();
  arraydatosmac= new Array();
  arraydatosfric= new Array();
  arraydatosdef= new Array();
  arraydatosdet= new Array();

  for(i=0;i<irinuevo.length;i++){

    arraydatosiri[i]= [i+ini,irinuevo[i]];
    arraydatosmax[i]= [i+ini,maxnuevo[i]];
    arraydatosmac[i]= [i+ini,macnuevo[i]];
    arraydatosfric[i]= [i+ini,fricnuevo[i]];
    arraydatosdef[i]= [i+ini,defnuevo[i]];
    arraydatosdet[i]= [i+ini,detnuevo[i]];
  }

  grafica();
  graficamax();
  graficamac();
graficafric();
graficadef();
graficadet();

}

//////

function atras(){
  ini-=1;
  finiri-=1;

  if(ini<0){
    ini=0;
    finiri+=1;
  }
  var irinuevo= new Array();
  var maxnuevo= new Array();
  var macnuevo= new Array();
  var fricnuevo= new Array();
  var defnuevo= new Array();
  var detnuevo= new Array();
  irinuevo=arrayiri.slice(ini,finiri);
  maxnuevo=arraymax.slice(ini,finiri);
  macnuevo=arraymac.slice(ini,finiri);
  fricnuevo=arrayfric.slice(ini,finiri);
  defnuevo=arraydef.slice(ini,finiri);
  detnuevo=arraydet.slice(ini,finiri);
  arraydatosiri= new Array();
  arraydatosmax= new Array();
  arraydatosmac= new Array();
  arraydatosfric= new Array();
  arraydatosdef= new Array();
  arraydatosdet= new Array();

  for(i=0;i<irinuevo.length;i++){
    arraydatosiri[i]= [i+ini,irinuevo[i]];
    arraydatosmax[i]= [i+ini,maxnuevo[i]];
    arraydatosmac[i]= [i+ini,macnuevo[i]];
    arraydatosfric[i]= [i+ini,fricnuevo[i]];
    arraydatosdef[i]= [i+ini,defnuevo[i]];
    arraydatosdet[i]= [i+ini,detnuevo[i]];
  }
  grafica();
  graficamax();
  graficamac();
graficafric();
graficadef();
graficadet();
}

//////

function atrasd(){
  ini-=50;
  finiri-=50;

  if(ini<0){
    ini=0;
    finiri+=50;
  }
  var irinuevo= new Array();
  var maxnuevo= new Array();
  var macnuevo= new Array();
  var fricnuevo= new Array();
  var defnuevo= new Array();
  var detnuevo= new Array();
  irinuevo=arrayiri.slice(ini,finiri);
  maxnuevo=arraymax.slice(ini,finiri);
  macnuevo=arraymac.slice(ini,finiri);
  fricnuevo=arrayfric.slice(ini,finiri);
  defnuevo=arraydef.slice(ini,finiri);
  detnuevo=arraydet.slice(ini,finiri);
  arraydatosiri= new Array();
  arraydatosmax= new Array();
  arraydatosmac= new Array();
  arraydatosfric= new Array();
  arraydatosdef= new Array();
  arraydatosdet= new Array();

  for(i=0;i<irinuevo.length;i++){
    arraydatosiri[i]= [i+ini,irinuevo[i]];
    arraydatosmax[i]= [i+ini,maxnuevo[i]];
    arraydatosmac[i]= [i+ini,macnuevo[i]];
    arraydatosfric[i]= [i+ini,fricnuevo[i]];
    arraydatosdef[i]= [i+ini,defnuevo[i]];
    arraydatosdet[i]= [i+ini,detnuevo[i]];
  }
  grafica();
  graficamax();
  graficamac();
graficafric();
graficadef();
graficadet();
}

//////

function atrascien(){
  ini-=1;
  finiri-=1;
  if(ini<0){
    ini=0;
    finiri+=1;
  }
  
  var irinuevo= new Array();
  var maxnuevo= new Array();
  var macnuevo= new Array(); 
  var fricnuevo= new Array();
  var defnuevo= new Array();
  var detnuevo= new Array(); 
  irinuevo=arraytotaliri.slice(ini,finiri);
  maxnuevo=arraytotalmax.slice(ini,finiri);
  macnuevo=arraytotalmac.slice(ini,finiri);
  fricnuevo=arraytotalfric.slice(ini,finiri);
  defnuevo=arraytotaldef.slice(ini,finiri);
  detnuevo=arraytotaldet.slice(ini,finiri);
  arraydatosiri= new Array();
  arraydatosmax= new Array();
  arraydatosmac= new Array();
  arraydatosfric= new Array();
  arraydatosdef= new Array();
  arraydatosdet= new Array();

  for(i=0;i<irinuevo.length;i++){

    arraydatosiri[i]= [i+ini,irinuevo[i]];
    arraydatosmax[i]= [i+ini,maxnuevo[i]];
    arraydatosmac[i]= [i+ini,macnuevo[i]];
    arraydatosfric[i]= [i+ini,fricnuevo[i]];
    arraydatosdef[i]= [i+ini,defnuevo[i]];
    arraydatosdet[i]= [i+ini,detnuevo[i]];
  }

  grafica();
  graficamax();
  graficamac();
graficafric();
graficadef();
graficadet();
}

//////

function atrasciend(){
  ini-=10;
  finiri-=10;
  if(ini<0){
    ini=0;
    finiri+=10;
  }
  
  var irinuevo= new Array();
  var maxnuevo= new Array();
  var macnuevo= new Array();
  var fricnuevo= new Array();
  var defnuevo= new Array();
  var detnuevo= new Array();
  irinuevo=arraytotaliri.slice(ini,finiri);
  maxnuevo=arraytotalmax.slice(ini,finiri);
  macnuevo=arraytotalmac.slice(ini,finiri);
  fricnuevo=arraytotalfric.slice(ini,finiri);
  defnuevo=arraytotaldef.slice(ini,finiri);
  detnuevo=arraytotaldet.slice(ini,finiri);
  arraydatosiri= new Array();
  arraydatosmax= new Array();
  arraydatosmac= new Array();
  arraydatosfric= new Array();
  arraydatosdef= new Array();
  arraydatosdet= new Array();

  for(i=0;i<irinuevo.length;i++){

    arraydatosiri[i]= [i+ini,irinuevo[i]];
    arraydatosmax[i]= [i+ini,maxnuevo[i]];
    arraydatosmac[i]= [i+ini,macnuevo[i]];
    arraydatosfric[i]= [i+ini,fricnuevo[i]];
    arraydatosdef[i]= [i+ini,defnuevo[i]];
    arraydatosdet[i]= [i+ini,detnuevo[i]];
  }

  grafica();
  graficamax();
  graficamac();
graficafric();
graficadef();
graficadet();
}
</script>