<img class="logoimagen" id="gadehnerlogo" hidden src="<?= ($BASE) ?>/assets/logos/logogadehner.png" alt="Logo Gabriel Dehner">
<div class="pagina_primera">
<h3 style="text-align: center; padding-top: 15px;">Generar Comprobante</h3>
<hr>
<div class="container" >
    <div class="row"><h3>Datos del Cliente</h3> </div>
    <hr>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Nombre y Apellido</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre y apellido">
            </div>     
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Direcci&oacute;n</label>
                <input type="text" class="form-control" name="direccion" placeholder="Ingrese dirección">
            </div>     
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Tel&eacute;fono</label>
                <input type="telephone" class="form-control" name="telefono" placeholder="Ingrese teléfono">
            </div>     
        </div>

    </div>

<hr>

    <div class="row"><h3>Datos del Equipo</h3> </div>
    <hr>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Nro. de Serie</label>
                <input type="text" class="form-control" name="serie" placeholder="Ingrese nombre y apellido">
            </div>     
        </div>
        <div class="col-lg-4">
            <label>Tipo de Equipo</label>
            <select class="form-control target" name="tipo_equipo" id="tipo_equipo" style="width: 100%" >
                <option  value="">Seleccione una Opci&oacute;n</option>
                <option  value="Notebook" >Notebook</option>
                <option  value="Netbook" >Netbook</option>
                <option  value="Pc de Escritorio" >Pc de Escritorio</option>
                <option  value="Chromebook" >Chromebook</option>
                <option  value="Otro" >Otro</option>
            </select>
        </div>
        <div class="col-lg-4" style="visibility: hidden;">
            <div class="form-group">
                <label for="">Especific&aacute; el Equipo</label>
                <input type="text" class="form-control" name="especificacion_tipo_equipo" id="especificacion_tipo_equipo" placeholder="Especifique el tipo de equipo">
            </div>     
        </div>

    </div>



    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Marca</label>
                <input type="text" class="form-control" name="marca" placeholder="Ingrese marca">
            </div>     
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Modelo</label>
                <input type="text" class="form-control" name="modelo" placeholder="Ingrese modelo">
            </div>     
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Accesorios Adicionales</label>
                <input type="text" class="form-control" name="accesorios" placeholder="Ingrese accesorios junto al equipo">
            </div>     
        </div>
        
    
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="">Falla/s</label>
                <input type="text" class="form-control" name="falla" placeholder="Ingrese falla/s">
            </div>     
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="">Entrega de Dinero</label>
                <input type="number" class="form-control" name="entrega" placeholder="">
            </div>     
        </div>
    </div>


    <div class="row"><button onclick="generar_pdf()" class="btn btn-success" style="float:right" value="Agregar"> Generar Comprobante </button>         </div>
</div>
</div>

<div class="pagina_segunda">


</div>

<br>
<script src="<?= ($BASE.'/') ?>assets/js/jspdf.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
$('input[name="entrega"]').val(0.00);

var t_e='';
$( "select" ).change(function() {
    t_e = this.value;
  if(this.value=='Otro'){
    //alert( 'asdasd' );
    $('#especificacion_tipo_equipo').attr("style", "visibility: visible");
  }else{
    $('#especificacion_tipo_equipo').attr("style", "visibility: hidden");
  }
  
});

function generar_pdf(){
    var bandera=false;
    var nombre = $('input[name="nombre"]').val();
    var direccion = $('input[name="direccion"]').val();
    var telefono = $('input[name="telefono"]').val();
    var serie = $('input[name="serie"]').val();
    var tipo_equipo = t_e;//$('input[name="tipo_equipo"]').val();
    var especificacion_tipo_equipo = $('input[name="especificacion_tipo_equipo"]').val();
    var marca = $('input[name="marca"]').val();
    var modelo = $('input[name="modelo"]').val();
    var accesorios = $('input[name="accesorios"]').val();
    var falla = $('input[name="falla"]').val();
    var entrega = $('input[name="entrega"]').val();

    if(nombre!=='' && direccion!=='' && telefono!=='' 
    && serie!=='' && tipo_equipo!=='' && marca!=='' && modelo!=='' 
    && accesorios!=='' && falla!=='' && entrega!==''){
        bandera = true;
        if(tipo_equipo==='Otro'){
            if(especificacion_tipo_equipo===''){
                bandera=false;
            }
        }
    }else{
        bandera=false;
    }
// bandera=true;//deshabilitar desp
    if(bandera){
        //alert('A imprimir  '+ tipo_equipo);
        date = new Date((new Date()).getTime());
        datevalues = [
            date.getFullYear(),
            date.getMonth()+1,
            date.getDate(),
            date.getHours(),
            date.getMinutes(),
            date.getSeconds(),
        ];
        var format_datevalues = datevalues[2]+'/'+datevalues[1]+'/'+datevalues[0]+' '+datevalues[3]+':'+datevalues[4]+':'+datevalues[5];

        // var id = guardar_datos(nombre, direccion, telefono, serie, 
        // tipo_equipo, especificacion_tipo_equipo, 
        // marca, modelo, accesorios, falla, entrega, format_datevalues);
        var tipo_e = '';
        if(tipo_equipo=='Otro'){
        tipo_e = especificacion_tipo_equipo;
        }else{
            tipo_e = tipo_equipo;
        }
        var datos={
            nombre:nombre,
            direccion:direccion,
            telefono: telefono,
            serie:serie,
            tipo_e: tipo_e,
            /*tipo_equipo:tipo_equipo,
            especificacion_tipo_equipo:especificacion_tipo_equipo,*/
            marca:marca,
            modelo:modelo,
            accesorios:accesorios,
            falla:falla,
            entrega:entrega,
            fecha:format_datevalues
        };
        $.ajax({
            type: 'POST',
            url: 'guardar_comprobante',
            data: (datos),
            success: function(data){
                //Cuando la interacción sea exitosa, se ejecutará esto.
                //console.log(JSON.parse(data));
            data=String(data).replace('"','');
            data=String(data).replace('"','');
            var MARGEN_IZQUIERDA = 20;
            var CONTROL_ALTURA = 10;
            var FINAL_PAGINA_MARGEN = 190;
            var pdf = new jsPDF('p', 'mm', 'a4');
            
            var retorno = dibujar_pdf(nombre, direccion, telefono, serie, 
            tipo_equipo, especificacion_tipo_equipo, 
            marca, modelo, accesorios, falla, entrega, format_datevalues,
            MARGEN_IZQUIERDA, CONTROL_ALTURA, FINAL_PAGINA_MARGEN, pdf,data,tipo_e);

            
            
            MARGEN_IZQUIERDA = retorno.m_i;
            CONTROL_ALTURA = retorno.c_a+10;
            FINAL_PAGINA_MARGEN = retorno.f_p_m;

            retorno = dibujar_pdf(nombre, direccion, telefono, serie, 
            tipo_equipo, especificacion_tipo_equipo, 
            marca, modelo, accesorios, falla, entrega, format_datevalues,
            MARGEN_IZQUIERDA, CONTROL_ALTURA, FINAL_PAGINA_MARGEN, pdf,data,tipo_e)

            var d = new Date();
            pdf.save(String(d.getTime()) + '.pdf');
            location.reload();
            },
            error: function(data){
                //Cuando la interacción retorne un error, se ejecutará esto.
            }
        });

        // var MARGEN_IZQUIERDA = 20;
        // var CONTROL_ALTURA = 10;
        // var FINAL_PAGINA_MARGEN = 190;
        // var pdf = new jsPDF('p', 'mm', 'a4');
        
        // var retorno = dibujar_pdf(nombre, direccion, telefono, serie, 
        // tipo_equipo, especificacion_tipo_equipo, 
        // marca, modelo, accesorios, falla, entrega, format_datevalues,
        // MARGEN_IZQUIERDA, CONTROL_ALTURA, FINAL_PAGINA_MARGEN, pdf);

        
        
        // MARGEN_IZQUIERDA = retorno.m_i;
        // CONTROL_ALTURA = retorno.c_a+10;
        // FINAL_PAGINA_MARGEN = retorno.f_p_m;

        // retorno = dibujar_pdf(nombre, direccion, telefono, serie, 
        // tipo_equipo, especificacion_tipo_equipo, 
        // marca, modelo, accesorios, falla, entrega, format_datevalues,
        // MARGEN_IZQUIERDA, CONTROL_ALTURA, FINAL_PAGINA_MARGEN, pdf)

        // var d = new Date();
        // pdf.save(String(d.getTime()) + '.pdf');
        
    }else{
        alert('Ingrese todos los datos solicitados en pantalla');
    }



    // alert('generar pdfasd'+ $('input[name="nombre"]').val());
    
}
// function guardar_datos(nombre, direccion, telefono, serie, 
//     tipo_equipo, especificacion_tipo_equipo, 
//     marca, modelo, accesorios, falla, entrega, format_datevalues){
    


// }
function dibujar_pdf(nombre, direccion, telefono, serie, 
        tipo_equipo, especificacion_tipo_equipo, 
        marca, modelo, accesorios, falla, entrega, format_datevalues,
        MARGEN_IZQUIERDA, CONTROL_ALTURA, FINAL_PAGINA_MARGEN, pdf, id,tipo_e){
    

   

    // $('.pagina_primera').attr("style", "visibility: hidden");
    
    var logo = document.getElementById("gadehnerlogo");
    //console.log(logo);

    //console.log(logo_primera_pagina.width + 'x' + logo_primera_pagina.height);
    //773 x 360 coeficiente = 0,465717982
    //700 x 326
    //185 x 86
    //x, y, ancho, alto
    
    pdf.addImage(logo, 'PNG', MARGEN_IZQUIERDA, CONTROL_ALTURA, 30, 30*0.85415);

    pdf.setFontSize(25);
    pdf.setFontType('bold');//normal bold
    pdf.setFont('Helvetica');//times
    pdf.text(MARGEN_IZQUIERDA+40, CONTROL_ALTURA+17, "Reparación de Pc's");
    pdf.setFontSize(13);
    pdf.setFontType('normal');//normal bold
    pdf.setFont('Helvetica');
    pdf.text(MARGEN_IZQUIERDA+123, CONTROL_ALTURA+17, "| Gabriel Dehner");
    CONTROL_ALTURA += 26;
    
    pdf.setLineWidth(0.50);
    pdf.line(MARGEN_IZQUIERDA, CONTROL_ALTURA, FINAL_PAGINA_MARGEN, CONTROL_ALTURA, 'FD');
    CONTROL_ALTURA += 5;


    pdf.setFontSize(12);
    pdf.setFontType('bold');//normal bold
    pdf.setFont('Helvetica');//times
  
    

    pdf.text(MARGEN_IZQUIERDA, CONTROL_ALTURA, 'Orden Nro: '+id);
    pdf.text(MARGEN_IZQUIERDA+113, CONTROL_ALTURA, 'Fecha: '+ format_datevalues);
    CONTROL_ALTURA += 2.5;
    pdf.line(MARGEN_IZQUIERDA, CONTROL_ALTURA, FINAL_PAGINA_MARGEN, CONTROL_ALTURA, 'FD');
    /*
     * Datos del Cliente
     */
    CONTROL_ALTURA += 6;
    pdf.text(MARGEN_IZQUIERDA, CONTROL_ALTURA, 'Datos del Cliente');
    pdf.setFontType('normal');
    CONTROL_ALTURA += 6;
    pdf.text(MARGEN_IZQUIERDA+10, CONTROL_ALTURA, 'Nombre: '+nombre);
    CONTROL_ALTURA += 6;
    pdf.text(MARGEN_IZQUIERDA+10, CONTROL_ALTURA, 'Dirección: '+direccion);
    CONTROL_ALTURA += 6;
    pdf.text(MARGEN_IZQUIERDA+10, CONTROL_ALTURA, 'Teléfono: '+telefono);
    CONTROL_ALTURA += 2.5;
    pdf.line(MARGEN_IZQUIERDA, CONTROL_ALTURA, FINAL_PAGINA_MARGEN, CONTROL_ALTURA, 'FD');

    /*
     * Datos del Equipo
     */
    CONTROL_ALTURA += 6;
    pdf.setFontType('bold');
    pdf.text(MARGEN_IZQUIERDA, CONTROL_ALTURA, 'Datos del Equipo');
    pdf.setFontType('normal');
    CONTROL_ALTURA += 6;
    pdf.text(MARGEN_IZQUIERDA+10, CONTROL_ALTURA, 'Nro. de Serie: '+serie);
    CONTROL_ALTURA += 6;
    pdf.text(MARGEN_IZQUIERDA+10, CONTROL_ALTURA, 'Tipo de Equipo: '+tipo_e);
    CONTROL_ALTURA += 6;
    pdf.text(MARGEN_IZQUIERDA+10, CONTROL_ALTURA, 'Marca: '+marca);
    CONTROL_ALTURA += 6;
    pdf.text(MARGEN_IZQUIERDA+10, CONTROL_ALTURA, 'Modelo: '+modelo);
    CONTROL_ALTURA += 6;
    pdf.text(MARGEN_IZQUIERDA+10, CONTROL_ALTURA, 'Falla: '+falla);
    CONTROL_ALTURA += 6;
    pdf.text(MARGEN_IZQUIERDA+10, CONTROL_ALTURA, 'Accesorios: '+accesorios);
    CONTROL_ALTURA += 6;
    pdf.text(MARGEN_IZQUIERDA+10, CONTROL_ALTURA, 'Entrega: '+entrega);
    CONTROL_ALTURA += 2.5;
    pdf.line(MARGEN_IZQUIERDA, CONTROL_ALTURA, FINAL_PAGINA_MARGEN, CONTROL_ALTURA, 'FD');

    CONTROL_ALTURA += 4;
    pdf.setFontSize(8.5);
    pdf.setFontType('normal');//normal bold
    pdf.setFont('Helvetica');//times

    pdf.text(MARGEN_IZQUIERDA, CONTROL_ALTURA, 'Este local no se responsabiliza por daños y/o pérdidas por fuerza mayor y/o fortuitos que pueda/n producirse al/ a los equipo/s');
    pdf.text(MARGEN_IZQUIERDA, CONTROL_ALTURA+3, 'durante el proceso de reparación.');
    
    
    CONTROL_ALTURA += 15;
    pdf.setLineWidth(2);
    pdf.line(MARGEN_IZQUIERDA, CONTROL_ALTURA, FINAL_PAGINA_MARGEN, CONTROL_ALTURA, 'FD');
    //pdf.text(+88, CONTROL_ALTURA, fecha_letras);
    //pdf.text(direccion_h2, SEGUNDO_MARGEN_IZQUIERDA + 47, ALTURA_DIRECCION, {maxWidth: 92, align:'center'});
   
    
    
    return ({
                m_i: MARGEN_IZQUIERDA,
                c_a: CONTROL_ALTURA,
                f_p_m: FINAL_PAGINA_MARGEN
            });
}


</script>