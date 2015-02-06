<script type="text/javascript" language="javascript" src="./js/redips-drag-min.js"></script>
<style>
    .drag{
        cursor: move;
        margin: auto;
        z-index: 10;
        color: #222;
        text-align: center;
        opacity: 0.9;
        filter: alpha(opacity=70);
        width: 280px;
        border: 1px solid #555;
        border-radius: 3px;
        -moz-border-radius: 3px; 
        font-size: 10px !important; 
    }
    .label2{
        font-weight: bolder;
        font-size: 12px !important;
    }
    .escuela {
        background-color: #dedddd;
    }

    .label1{
        font-weight: lighter;
        font-size: 8px !important;

    }

    .margen{
        margin-left: 50px;
    }
    .label3{
        text-align:center;
        float: right;
        width:100%;
        font-weight: lighter;
        font-size: 10px !important;
    }
    #tabla_escuelasacomparar td{
        height: 30px !important;
    }
    .ui-grid .ui-grid-footer {
        padding: 2px;
        text-align: center;
    }
    
    .celdaigual{
        height: 30px;
    }
    
    .nodisplay{
        display:none;
    }
    
    .botongraficar{
        width:100px !important;
    }
    
    .fg-button{
        width: 50px !important;
    }
    
    .fg-toolbar{
        width: 290px !important;
    }
    
    .odd{
        background-color: #FFFFFF !important;
    }
    
    .dataTables_length{
        width: 24px !important;
    }
    
    .dataTables_filter{
        float:left !important;
        width: 250px !important;
        height: 30px !important;
    }
    
    .dataTables_filter input[type="text"]{
        width: 250px !important;
    }
    
    .negritas{
        font-weight: bold !important;
    }
    
    .icono_busqueda{
        width: 24px !important;
        height: 22px !important;
    }
    .ui-icon-circle-arrow-w{
        float:right;
    }
    
    .grafica{
        height:550px !important;
        margin-top:30px !important;
    }
    
    #comparar_escuelas{
        width: 400px !important;
    }
    #content_compara{margin-top: 10px;}
</style>
<div id="drag">
    <div class="row-fluid">
        <div id="content_escuelas" class="span6"> 
            <div id="radio">
                <input type="radio" value="div_tabla_planteles" id="tipo_plantel" name="tipo_grafica" /><label for="tipo_plantel">Plantel</label>
                <input type="radio" value="div_tabla_sectores" id="sector_escuela" name="tipo_grafica" /><label for="sector_escuela">Sector</label>
                <input type="radio" value="div_tabla_escuelas" id="escuela" name="tipo_grafica" checked="checked" /><label for="escuela">Escuela</label>
            </div>
            <hr space>                    
            <div class="buttonsetdivs" id="div_tabla_escuelas">
                <table cellpadding="0" cellspacing="0" border="0" class="display" width="100%" id="tabla_escuelas">
                    <thead>
                        <tr>
                            <th class="mark blank">clave sep</th>
                            <th class="mark blank negritas">LISTA DE ESCUELAS</th>
                            <th class="mark blank">plantel</th>
                            <th class="mark blank">turno</th>
                            <th class="mark blank">estado</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
            <div class="nodisplay buttonsetdivs" id="div_tabla_planteles">
                <table cellpadding="0" cellspacing="0" border="0" class="display" width="100%" id="tabla_planteles">
                    <thead>
                        <tr>
                            <th class="mark blank">Id</th>                            
                            <th class="mark blank negritas">LISTA DE PLANTELES</th>                            
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
            <div class="nodisplay buttonsetdivs" id="div_tabla_sectores">
                <table cellpadding="0" cellspacing="0" border="0" class="display" width="100%" id="tabla_sectores">
                    <thead>
                        <tr>
                            <th class="mark blank">Codigo</th>                            
                            <th class="mark blank negritas">LISTA DE SECTORES</th>                            
                        </tr>
                    </thead>
                    <tbody>                               
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
            <br>            
        </div>
        <div class="row-fluid">                        
            <div id="content_compara" class="span18"> 
                <div id="datos_act_asign" class="ui-grid ui-widget ui-widget-content ui-corner-all margen" style=" width: 98%">
                                        
                        <!-- Escuelas -->
                        <div id="grid_div_tabla_escuelas" class="grid">
                            <table cellpadding="0" cellspacing="0" border="0" class="display hover ui-corner-top">
                                <tr><td class="trash ui-widget-header ui-corner-all" title="Eliminar Escuela de la comparaci&oacute;n"><center><img src="./images/trash.png"><br>Eliminar ITEM<br></center></td></tr>
                            </table>
                            <div class="ui-grid-header ui-widget-header ui-corner-top">Escuelas a comparar</div>
                                <table id="tabla_escuelasacomparar" class="ui-grid-content ui-widget-content" style=" width: 100%; float:left">
                                    <tbody>
                                        <tr>                               
                                            <td width="33.3%" class="ui-widget-content"></td>
                                            <td width="33.3%" class="ui-widget-content"></td>
                                            <td width="33.3%" class="ui-widget-content"></td>
                                        </tr>
                                        <tr>                                
                                            <td class="ui-widget-content"></td>
                                            <td class="ui-widget-content"></td>
                                            <td width="33.3%" class="ui-widget-content"></td>
                                        </tr>
                                        <tr>                                
                                            <td class="ui-widget-content"></td>
                                            <td class="ui-widget-content"></td>
                                            <td width="33.3%" class="ui-widget-content"></td>
                                        </tr>
                                    </tbody>
                                </table>                        
                                <div class="ui-grid-footer ui-widget-header ui-corner-bottom ui-helper-clearfix foot" style="">
                                    <button id="comparar_escuelas"  class="botongraficar" style="width:100px !important">Comparar</button>
                                    <button id="_escuelasacomparar" grafica="grafica_div_tabla_escuelas" class="borrargrid">Borrar</button>
                                </div>                    
                                <div id="grafica_div_tabla_escuelas" class="span24 grafica" ></div> 
                      </div>                
                      
                      
                      <!-- Planteles -->
                        <div id="grid_div_tabla_planteles" class="nodisplay grid">
                            <table cellpadding="0" cellspacing="0" border="0" class="display hover">
                                <tr><td class="trash ui-widget-header ui-corner-all" title="Eliminar Escuela de la comparaci&oacute;n"><center><img src="./images/trash.png"><br>Eliminar ITEM<br></center></td></tr>
                            </table>
                            <div class="ui-grid-header ui-widget-header ui-corner-top">Planteles a comparar</div>
                                <table id="tabla_plantelesacomparar" class="ui-grid-content ui-widget-content" style=" width: 100%; float:left">
                                    <tbody>
                                        <tr>                               
                                            <td width="33.3%" class="ui-widget-content celdaigual"></td>
                                            <td width="33.3%" class="ui-widget-content"></td>
                                            <td width="33.3%" class="ui-widget-content"></td>
                                        </tr>
                                        <tr>                                
                                            <td class="ui-widget-content celdaigual"></td>
                                            <td class="ui-widget-content"></td>
                                            <td width="33.3%" class="ui-widget-content"></td>
                                        </tr>
                                        <tr>                                
                                            <td class="ui-widget-content celdaigual"></td>
                                            <td class="ui-widget-content"></td>
                                            <td width="33.3%" class="ui-widget-content"></td>
                                        </tr>
                                    </tbody>
                                </table>                        
                                <div class="ui-grid-footer ui-widget-header ui-corner-bottom ui-helper-clearfix foot" style="">
                                        <button id="comparar_planteles"  class="botongraficar">Comparar</button>
                                        <button id="_plantelesacomparar"  grafica="grafica_div_tabla_planteles" class="borrargrid">Borrar</button>
                                </div>                    
                                <div id="grafica_div_tabla_planteles" class="span24 grafica" ></div>
                      </div> 
                      
                      <!-- Sectores -->
                        <div id="grid_div_tabla_sectores" class="nodisplay grid">
                            <table cellpadding="0" cellspacing="0" border="0" class="display hover">
                                <tr><td class="trash ui-widget-header ui-corner-all" title="Eliminar Escuela de la comparaci&oacute;n"><center><img src="./images/trash.png"><br>Eliminar ITEM<br></center></td></tr>
                            </table>
                            <div class="ui-grid-header ui-widget-header ui-corner-top">Sectores a comparar</div>
                                <table id="tabla_sectoresacomparar" class="ui-grid-content ui-widget-content" style=" width: 100%; float:left">
                                    <tbody>
                                        <tr>                               
                                            <td width="33.3%" class="ui-widget-content celdaigual"></td>
                                            <td width="33.3%" class="ui-widget-content"></td>
                                            <td width="33.3%" class="ui-widget-content"></td>
                                        </tr>
                                        <tr>                                
                                            <td class="ui-widget-content celdaigual" ></td>
                                            <td class="ui-widget-content"></td>
                                            <td width="33.3%" class="ui-widget-content"></td>
                                        </tr>
                                        <tr>                                
                                            <td class="ui-widget-content celdaigual" height="33px"></td>
                                            <td class="ui-widget-content"></td>
                                            <td width="33.3%" class="ui-widget-content"></td>
                                        </tr>
                                    </tbody>
                                </table>                        
                                <div class="ui-grid-footer ui-widget-header ui-corner-bottom ui-helper-clearfix foot" style="">
                                    <button id="comparar_sectores" class="botongraficar">Comparar</button>
                                    <button id="_sectoresacomparar" grafica="grafica_div_tabla_sectores" class="borrargrid">Borrar</button>
                                </div>                    
                                <div id="grafica_div_tabla_sectores" class="span24 grafica" ></div>
                      </div> 
                       
                      
                      
                  </div>
            </div>      
            
            
        </div>
    </div>
</div>
<br>
<div id="dialog-confirm" title="CONFIRMACION" class="nodisplay">
  <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>¿Esta seguro de borrar los datos actuales?</p>
</div>
<script type="text/javascript">
    var dt_tabla_escuelas;
    var dt_tabla_planteles;
    var dt_tabla_sectores;
    
    function get_datos_escuelas(){
        dt_tabla_escuelas.fnClearTable();//borro los datos del datatable
        var respuesta=get_object("comparacion/getDataEscuelas",'');
        if(respuesta!=false&&respuesta!=null){
            var a=[];
            $.each(respuesta, function(k,v){
                a[k]=[v.cls,
                    '<div id="'+v.id+'" identif="'+v.id+'" class="drag escuela clone"><div class="label1" style="margin-bottom:0px !important;">'+v.trn+'</div><div style="margin-top:0px !important;" class="label2">'+v.nom+'</div></div>'
                    ,v.tip,v.trn,v.est
                ];});
            dt_tabla_escuelas.fnAddData(a);
        }
    }
    
    function get_datos_planteles(){
        dt_tabla_planteles.fnClearTable();//borro los datos del datatable
        var respuesta=get_object("comparacion/getDataPlanteles",'');
        if(respuesta!=false&&respuesta!=null){
            var b=[];
            $.each(respuesta, function(k,v){
                b[k]=[
                    v.id,
                    '<div id="'+v.id+'" identif="'+v.id+'" class="drag escuela clone plantel" ><div class="label1" style="margin-bottom:0px !important;">&nbsp</div><div style="margin-top:0px !important;" class="label2">'+v.nom+'</div></div>'                 
                ];});
            dt_tabla_planteles.fnAddData(b);
        }
    }
    
     function get_datos_sectores(){
        dt_tabla_sectores.fnClearTable();//borro los datos del datatable
        var respuesta=get_object("comparacion/getDataSectores",'');
        if(respuesta!=false&&respuesta!=null){
            var b=[];
            $.each(respuesta, function(k,v){
                b[k]=[
                    v.id,
                    '<div id="'+v.id+'" identif="'+v.id+'" class="drag escuela clone plantel" ><div class="label1" style="margin-bottom:0px !important;">&nbsp</div><div style="margin-top:0px !important;" class="label2">'+v.nom+'</div></div>'                 
                ];});
            dt_tabla_sectores.fnAddData(b);
        }
    }
    
           
    $(document).ready(function(){   
        $("#radio").buttonset();
        $('#radio input:radio').click(function(){            
            var actual='#'+$(this).val();
            //alert(actual);
            $('.buttonsetdivs').hide();            
            $(actual).show();
            var gridactual='#grid_'+$(this).val();
            //alert(gridactual);
            $('#content_compara .grid').hide();
            $(gridactual).show();
            
            
            /*
            $('#tabla_escuelas_filter .buscar_dt').keydown(function(){rd.init();});            
            $('#tabla_escuelas_filter .buscar_dt').focus(function(){rd.init(); });
            $('#tabla_escuelas_wrapper .ui-button').click(function(){ rd.init(); });
            

            $('#tabla_sectores_filter .buscar_dt').keydown(function(){rd.init();});
            $('#tabla_sectores_filter .buscar_dt').focus(function(){rd.init(); });
            $('#tabla_sectores_wrapper .ui-button').click(function(){ rd.init(); });

            $('#tabla_planteles_filter .buscar_dt').keydown(function(){rd.init();});
            $('#tabla_planteles_filter .buscar_dt').focus(function(){rd.init(); });
            $('#tabla_planteles_wrapper .ui-button').click(function(){ rd.init(); });*/            
    });
        
       
        
        dt_tabla_escuelas=$('#tabla_escuelas').dataTable( {
            "bJQueryUI": true,
            "aoColumns": [ 
                /*0-.clave sep */{"bSortable": false,"bVisible": false},
                /*1-.escuela */{"bSortable": false},
                /*2 plantel*/ {"bSortable": false,"bVisible": false},
                /*3 turno*/ {"bSortable": false,"bVisible": false},
                /*4 estado*/ {"bSortable": false,"bVisible": false}
            ],
            "oLanguage":{
                "sProcessing":   "<div style=\"width=70%;\" class=\"ui-widget-header boxshadowround\"><strong>Cargando</strong></div>",
                "sLengthMenu":   "<img title=\"Ver Busqueda Avanzada\" class=\"ui-state-default ui-corner-all icono_busqueda\" id=\"b_avan\" src=\"./images/busqueda.png\"> ",
                "sZeroRecords":  "No hay resultados",
                "sInfo":         "_TOTAL_ Escuelas",
                "sInfoEmpty":    "0 Escuelas",
                "sInfoFiltered": "",
                "sInfoPostFix":  "",
                "sSearch":       "",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sPrevious": "Anterior",
                    "sNext":     "Siguiente",
                    "sLast":     "Último"
                } 
            },
            "aaSorting": [ [4,'asc']],           
            "iDisplayLength": 12,
            "aLengthMenu": [[10], [20]]
                
        } );
        get_datos_escuelas();
        
        
        /*Agregamos datos a la tabla de planteles arrastrables*/    
        dt_tabla_planteles=$('#tabla_planteles').dataTable( {
            "bJQueryUI": true,
            "aoColumns": [ 
                /*0-.id */{"bSortable": false,"bVisible": false},
                /*1-.plantel */{"bSortable": false}                
            ],
            "oLanguage":{
                "sProcessing":   "<div style=\"width=70%;\" class=\"ui-widget-header boxshadowround\"><strong>Cargando</strong></div>",
                "sLengthMenu":   "<img title=\"Ver Busqueda Avanzada\"  class=\"ui-state-default ui-corner-all icono_busqueda\" id=\"b_avan\" src=\"./images/busqueda.png\"> ",
                "sZeroRecords":  "No hay resultados",
                "sInfo":         "_TOTAL_ planteles",
                "sInfoEmpty":    "0 planteles",
                "sInfoFiltered": "",
                "sInfoPostFix":  "",
                "sSearch":       "",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sPrevious": "Anterior",
                    "sNext":     "Siguiente",
                    "sLast":     "Último"
                } 
            },
            "iDisplayLength": 12,
            "aLengthMenu": [[10], [20]]
                
        } );
        get_datos_planteles();
        
        /*Agregamos datos a la tabla de Sectores arrastrables*/    
        dt_tabla_sectores=$('#tabla_sectores').dataTable( {
            "bJQueryUI": true,
            "aoColumns": [ 
                /*0-.Codigo */{"bSortable": false,"bVisible": false},
                /*1-.Sector */{"bSortable": false}                
            ],
            "oLanguage":{
                "sProcessing":   "<div style=\"width=70%;\" class=\"ui-widget-header boxshadowround\"><strong>Cargando</strong></div>",
                "sLengthMenu":   "<img title=\"Ver Busqueda Avanzada\"  class=\"ui-state-default ui-corner-all icono_busqueda\" id=\"b_avan\" src=\"./images/busqueda.png\"> ",
                "sZeroRecords":  "No hay resultados",
                "sInfo":         "_TOTAL_ Sectores",
                "sInfoEmpty":    "0 Sectores",
                "sInfoFiltered": "",
                "sInfoPostFix":  "",
                "sSearch":       "",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sPrevious": "Anterior",
                    "sNext":     "Siguiente",
                    "sLast":     "Último"
                } 
            },
            "iDisplayLength": 12,
            "aLengthMenu": [[10], [20]]
                
        } );
       get_datos_sectores();
       
       
       $('#tabla_escuelas_filter input:text').keydown(function(){ rd.init() });
       $('#tabla_sectores_filter input:text').keydown(function(){ rd.init() });
       $('#tabla_planteles_filter input:text').keydown(function(){ rd.init() });       
       
       
        //$('#tabla_escuelas_filter .buscar_dt').keydown(function(){rd.init();});            
       // $('#tabla_escuelas_filter .buscar_dt').focus(function(){rd.init(); });
        $('#tabla_escuelas_wrapper .ui-button').click(function(){ rd.init(); });
            

       // $('#tabla_sectores_filter .buscar_dt').keydown(function(){rd.init();});
       // $('#tabla_sectores_filter .buscar_dt').focus(function(){rd.init(); });
        $('#tabla_sectores_wrapper .ui-button').click(function(){ rd.init(); });

       // $('#tabla_planteles_filter .buscar_dt').keydown(function(){rd.init();});
       // $('#tabla_planteles_filter .buscar_dt').focus(function(){rd.init(); });
        $('#tabla_planteles_wrapper .ui-button').click(function(){ rd.init(); });
               
        $('.borrargrid').click(function(){
            var actual=$(this).attr('id');
            var tabla='tabla'+actual;                        
            var grafica=$(this).attr('grafica');
            $( "#dialog-confirm" ).dialog({
            resizable: false,
            height:160,
            modal: true,
            buttons: {
              "Borrar": function() {
                $('#'+tabla+' .escuela').remove();            
                $('#'+grafica).empty();
                $( this ).dialog( "close" );
              },
              "Cancelar": function() {
                $( this ).dialog( "close" );
              }
            }
          });
        });
        
        $('.escuela').live("dblclick", function(){
            //alert($(this).attr('id'));
            $(this).remove();
        });
        
        
        
        $( ".botongraficar" ).click(function(){            
            var caso=$(this).attr('id');
            var tabla,datos,grafica,legend;
            var textomensaje='',headermensaje='',subtext='';;
           // alert(caso);
            switch(caso){
                case 'comparar_escuelas':
                    tabla='tabla_escuelasacomparar';
                    datos='getDataCompara';
                    grafica='grafica_div_tabla_escuelas';
                    legend='Escuelas';
                    headermensaje='Falta seleccionar una escuela! <b>';                    
                    textomensaje='Es necesario que selecciones 2 o m&aacute;s escuelas, para hacer la comparaci&oacute;n.</b>';
                    subtext='<hr class="boxshadowround">Para seleccionar una escuela sigue los siguientes pasos:<br><ul><li type="circle">Busca la escuela deseada en la lista actual, situada a la izquierda de esta p&aacute;gina.</li><li type="circle">Da click en la escuela y sin soltarla arrastrala a la tabla de comparaciones situada en la parte superior de esta p&aacute;gina.</li></ul>';
                    break;
                case 'comparar_planteles':
                    tabla='tabla_plantelesacomparar';
                    datos='getDataComparaPlanteles';
                    grafica='grafica_div_tabla_planteles';
                    legend='Planteles';
                    headermensaje='Falta seleccionar un plantel!<b>';
                    textomensaje='Es necesario que selecciones 2 o m&aacute;s planteles, para hacer la comparaci&oacute;n.</b>';
                    subtext='<hr class="boxshadowround">Para seleccionar un plantel sigue los siguientes pasos:<br><ul><li type="circle">Busca el plantel deseado en la lista actual, situada a la izquierda de esta p&aacute;gina.</li><li type="circle">Da click en el plantel y sin soltarlo arrastrala a la tabla de comparaciones situada en la parte superior de esta p&aacute;gina.</li></ul>';;
                    break;
                case 'comparar_sectores':
                    tabla='tabla_sectoresacomparar';
                    datos='getDataComparaSectores';
                    grafica='grafica_div_tabla_sectores';
                    legend='Sectores'
                    headermensaje='Falta seleccionar sector!<b>';
                    textomensaje='Es necesario que selecciones 2 o m&aacute;s sectores, para hacer la comparaci&oacute;n.</b>';
                    subtext='<hr class="boxshadowround">Para seleccionar un sector sigue los siguientes pasos:<br><ul><li type="circle">Busca el sector deseado en la lista actual, situada a la izquierda de esta p&aacute;gina.</li><li type="circle">Da click en el sector y sin soltarlo arrastrala a la tabla de comparaciones situada en la parte superior de esta p&aacute;gina.</li></ul>';
                    break;
            }
            
            var escuelas_ids='';
            if($('#'+tabla+' .escuela').length<2){
                mensaje($( "#mensaje" ),headermensaje,'',textomensaje,subtext,500,true);
            }else{
                var count=0,amp='&',escids='';
                $.each($('#'+tabla+' .escuela'), function(k,v){
                    count++;
                    if(count==$('#'+tabla+' .escuela').length){
                        amp='';
                    }                    
                    escids+='ids_escuelas[]='+$(this).attr('identif')+amp;                    
                });
                var r=get_object('comparacion/'+datos,escids);
                graficar(r,grafica,legend);
            }
        });        
        
        
        /*$('[aria-controls="tabla_escuelas"]').css('width','135px');
        $('[aria-controls="tabla_sectores"]').css('width','135px');
        $('[aria-controls="tabla_planteles"]').css('width','135px');*/
    });
    var bglobal;
    function graficar(result,divtorender,leyenda)
    {   
        var series_grafica='',b;                
        $.each(result, function(k,v){                                      
            series_grafica+='{'+'name:"'+v.nom+'",'+'data:'+'['+v.pesp+','+v.pmat+','+v.prlm+','+v.prv+','+v.ptic+']'+'},';                                    
        });        
        series_grafica=series_grafica.substring(0, series_grafica.length-1);        
        b=eval('([' + series_grafica + '])');        
        bglobal=b;
        // $("#datos").append(series_grafica);
        var chart;    
        chart = new Highcharts.Chart({
            chart: {
                renderTo: divtorender,
                type: 'line',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Comparativo',
                x: -20 //center
            },
            subtitle: {
                text: 'Entre '+leyenda,
                x: -20
            },
            xAxis: {
                categories: [
                    'Español',
                    'Matemáticas',
                    'Razonamiento lógico-matemático',                            
                    'Razonamiento Verbal',                            
                    'Tecnologías de información y comunicación'
                ]
            },
            yAxis: {
                title: {
                    text: 'Porcentaje'
                },
                plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y +'%';
                }
            },
            credits: {
                text: '',
                href: 'http://www.uv.mx'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: b
        });
    }
</script>
<script type="text/javascript">
    "use strict";

    var redips_init; // definir la variable redips_init
    var rd;
    //redips inicializacion
    
    redips_init = function () {
        // referencia al objeto REDIPS.drag 
        rd = REDIPS.drag; 
        rd.init('drag');        
        rd.drop_option = 'single';	
        rd.clonedDIV = true;	// cloned flag set in event.moved
        rd.hover.color_td = '#9BB3DA';
        rd.counter=0;
        rd.trash_ask = false;    
        
        
        
        rd.myhandler_dropped = function () {
            
            
            //alert(rd.counter);
            
            /* //obtener la posicion 
            try {       
                var pos = rd.get_position();
                //alert(rd.obj.id + '_' + pos.join('_'));
                var respuesta=ajax_peticion('index.php/ubicacion_equipos/actualizarSalaEquipo?p=' + rd.obj.id + '_' + pos.join('_'),'id_sala='+sala_select);
                if (respuesta=='ok'){
                    notificacion_tip("./images/msg/ok.png","Ubicacion de equipos","La actualizaci&oacute;n se realiz&oacute;, de manera correcta.");
                }else{
                    mensaje($( "#mensaje" ),'Ubicar equipo ','./images/msg/error.png',respuesta,'<span class="ui-icon ui-icon-lightbulb"></span>Error al ubicar equipo, Intenta de nuevo. Si el <b>Error</b> persiste consulta al administrador. <br><b>Se procederá a recargar la p&aacute;gina al cerrar este cuadro de dialogo.</d>',400,true);
                    //window.setTimeout(redirect_to('ubicacion_equipos'),40000);
                    $( "#mensaje" ).dialog({
                        close:function(){
                            redirect_to('ubicacion_equipos');
                        }
                    });
                }
                get_datos_almacen();
                rd.init('drag');
                $("tbody tr").find('.row_selected').addClass('ui-state-highlight');
            } catch(e) {
                alert(e.name + " - "+e.message);
            }*/
        };
        // borrar de la tabla de tiempos
        rd.myhandler_deleted = function () {/*
            $('#mensaje').html('<div id="mover_almacen_dialog" title="Mover a almacen" style="display:none;">'+
                '<p><span  style="float:left; margin:0 7px 20px 0;"><img src="./images/msg/warning.png"/></span>'+
                '&nbsp;&nbsp;Se mover&aacute; el equipo seleccionado al almac&eacute;n. ¿Deseas Continuar?</p></div>');
            $("#dialog:ui-dialog").dialog( "destroy" );
            $("#mover_almacen_dialog").dialog({
                autoOpen: false,
                resizable: false,
                modal: true,
                buttons: {
                    "Mover a almacén": function() {
                        //obtener la posicion del elemento
                        var pos = rd.get_position(),
                        row = pos[4],
                        col = pos[5];
                        try {  
                            var respuesta=ajax_peticion('index.php/ubicacion_equipos/moverAlmacen?p=' + rd.obj.id + '_' + row + '_' + col,'id_sala='+sala_select);
                            if (respuesta=='ok'){
                                get_datos_almacen();
                                rd.init('drag');
                                notificacion_tip("./images/msg/ok.png","Mover Equipo a Almac&eacute;n","Se movi&oacute; el equipo "+rd.obj.id+' al almac&eacute;');
                            }else{
                                mensaje($( "#mensaje" ),'Error ! ','./images/msg/error.png',respuesta,'<span class="ui-icon ui-icon-lightbulb"></span>Actualiza la p&aacute;gina e intenta de nuevo. Si el <b>Error</b> persiste consulta al administrador.',400,false);
                            }
                        } catch(e) {
                            alert(e.name + " - "+e.message);
                        }
                        $( this ).dialog( "close" );
                    },
                    Cancelar: function() {
                        redirect_to('ubicacion_equipos');
                        $( this ).dialog( "close" );
                    }
                }
            }).dialog("open"); */
        };
        
        rd.myhandler_clicked = function () {
        
        };
    };
    
    // agregar onload listener
    if (window.addEventListener) {
        window.addEventListener('load', redips_init, false);
    }
    else if (window.attachEvent) {
        window.attachEvent('onload', redips_init);
    }
</script>
