<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>..:MDC/TabletWoo:...</title>
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/webestilo.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript">
            $(document).ready(function(){

            
                $('#grabo').click(function (evento){
                    alert("EL REGISTRO FUE GRABADO EXITOSAMENTE");
                });
                $('#txtconsulta').change(function (evento){
                    var consulta= $(this).val();
                    if(consulta==1){
                        $("#otroo").css("display", "block");
                        $("#trconsulta").css("display", "block");
                      
                    }else{
                        $("#otroo").css("display", "none");
                        $("#trconsulta").css("display", "none");
                    }
                   })
//evento cambio del combo respuesta
                 $('#txtrespuesta').change(function (evento){
                     var respuesta=$(this).val();
                     if(respuesta==1){

                         $("#otrorespuesta").css("display", "block");
                         $("#trrespuestaotros").css("display", "block");
                         $("#trname").css("display", "none");
                         $("#trcorreo").css("display", "none");
                     }else if(respuesta=="mdc"){
                         $("#otrorespuesta").css("display", "block");
                         $("#trrespuestaotros").css("display", "block");
                         $("#trname").css("display", "block");
                         $("#trcorreo").css("display", "block");
                     }else{
                         $("#otrorespuesta").css("display", "none");
                         $("#trrespuestaotros").css("display", "none");
                         $("#trname").css("display", "none");
                         $("#trcorreo").css("display", "none");
                     }
                 })
            })
        </script>
    </head>
    <body>
<?php ?>

        <?php

            /*Importando la clase y creando variable de clase*/
            require_once 'clases/llamada.php';

            $llamada= new llamada();
            /*Variables locales*/
            $id=0;$anexo;$fecha=date("Y-m-d");$movil;$consulta;$respuesta;

            /*Inicio*/
            if(isset ($_REQUEST['Grabar'])){
                if(isset ($_REQUEST['txtanexo']) &&
                        isset ($_REQUEST['txtfecha']) &&
                        isset ($_REQUEST['txtmovil']) &&
                        isset ($_REQUEST['txtconsulta']) &&
                        isset ($_REQUEST['txtrespuesta']))
                {
                    $llamada->setANEXO($_REQUEST['txtanexo']);
                    $llamada->setFECHA($_REQUEST['txtfecha']);
                    $llamada->setMOVIL($_REQUEST['txtmovil']);
                    $con;
                    if($_REQUEST['txtconsulta']!=1){
                        $con=$_REQUEST['txtconsulta'];
                    }else{
                        $con=$_REQUEST['txtotros'];
                    }
                    $llamada->setCONSULTA($con);
                    
                    $rspt;$name="";$correo="";
                    if($_REQUEST['txtrespuesta']=="mdc"){
                        $rspt=$_REQUEST['txtrespuesta'].": [OBSERVACION] ".$_REQUEST['txtotrorespuesta'];
                        $name=$_REQUEST['NAME'];
                        $correo=$_REQUEST['correo'];
                    }elseif($_REQUEST['txtrespuesta']!=1){
                        $rspt=$_REQUEST['txtrespuesta'];
                    }else{
                        $rspt=$_REQUEST['txtotrorespuesta'];
                    }

                    $llamada->setRESPUESTA($rspt);
                    $llamada->setNAME($name);
                    $llamada->setEMAIL($correo);
                    $llamada->GRABAR();
                    header("Location:registra.php");
                }
            }
        ?>

        <div id="main">
		<center><h1>WELCOME TO THE JUNGLE... A CONTESTAR!!</h1><br>
			<h2>No se olvide de poner su anexo..DISCULPE</h2></center>
            <?php echo "<form name='frmllamada' method='post' action='registra.php?Grabar='".$id."'>"; ?>
            <fieldset id="flocal">

                <legend>...:Registrar llamada/Datos del operador:...</legend>
                <table id="table1">
                    <tr>
                        <td>OPERADOR!!¿Cu&aacute;l es tu anexo?</td>
                        <td>
                            <input type="text" id="txtanexo" name="txtanexo" value="50"/>
                            <input type="text" id="txtfecha" name ="txtfecha" value=" <?php echo $fecha; ?>" readonly/>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </table>
            </fieldset>
            <fieldset>
                <legend>...:Registrar llamada/Datos de la consulta:...</legend>
<center>
                <table id="table2">
                    <tr>
                        <td>¿CU&Aacute;L ES EL M&Oacute;VIL CON EL QUE SE REGISTRO?</td>
                        <td><input type="text" id="txtmovil" name="txtmovil" value="9" maxlength="9"/></td>
                    </tr>
                </table>
            </fieldset>
            <fieldset>
                <legend>...:/Datos de la consulta:...</legend>
                <table>
                    <tr>
                        <td>¿CU&Aacute;L ES SU CONSULTA?</td>
                        <td>
                            <select name="txtconsulta" id="txtconsulta" size="1">
                                <option value="NO ME LLEGA EL SMS">NO ME LLEGA EL SMS</option>
                                 <option value="POR ERROR LE DESIGNARON UN TOTTUS QUE NO ELIGIO">POR ERROR LE DESIGNARON UN TOTTUS QUE NO ELIGIO</option>

                                <option value="SE LE PERDIO EL CODIGO DE RESERVA">SE LE PERDIO EL CODIGO DE RESERVA</option>
				<option value="SE LE PERDIO EL MOVIL">SE LE PERDIO EL MOVIL</option>
                                <option value="NO PUEDO CONSULTAR POR LA WEB">NO PUEDO CONSULTAR POR LA WEB</option>
				<option value="NO PUEDO IR A RECOGER MI TABLET...¿QU&Eacute; HAGO?">NO PUEDO IR A RECOGER MI TABLET...¿QU&Eacute; HAGO?</option>
                                <option value="WEB ARROJA COMBINACI&Oacute;N ERR&Oacute;NEA">WEB ARROJA COMBINACI&Oacute;N ERR&Oacute;NEA</option>
				<OPTION VALUE="MODALIDAD DE PAGO">MODALIDAD DE PAGO</OPTION>

                                <option value="HASTA QUE D&Iacute;A SE PUEDE RECOGER LA TABLET">HASTA QUE D&Iacute;A SE PUEDE RECOGER LA TABLET</option>
                                <option value="PORQUE ME SALE QUE TENGO QUE RECOGER EN SETIEMBRE">PORQUE ME SALE QUE TENGO QUE RECOGER EN SETIEMBRE</option>
				<OPTION VALUE="DESEA CONFIRMAR SI LA FECHA DE LA PAGINA WEB ES LA CORRECTA">DESEA CONFIRMAR SI LA FECHA DE LA PAGINA WEB ES LA CORRECTA</OPTION>
				<OPTION VALUE="QUIERE CONFIRMAR SI LA FECHA DE CANJE ES EN SETIEMBRE">QUIERE CONFIRMAR SI LA FECHA DE CANJE ES EN SETIEMBRE</OPTION>
                                <option value="NOS INSCRIBIMOS VARIOS CON UN MISMO CELULAR, ES UN SOLO CODIGO?">NOS INSCRIBIMOS VARIOS CON UN MISMO CELULAR, ES UN SOLO CODIGO?</option>
                                <OPTION VALUE="INDICA NO TENER CODIGO DE RESERVA Y SEINSCRIBIO SEGUN FECHA DE BASES ">INDICA NO TENER CODIGO DE RESERVA Y SE INSCRIBIO SEGUN FECHA DE BASES</OPTION>

				<OPTION VALUE="EN QUE HORARIO SE RECOGEN LOS TABLETS">EN QUE HORARIO SE RECOGEN LOS TABLETS</OPTION>
				<OPTION VALUE="YA ENVIO EMAIL A INFO@ Y NO LE BRINDAN RESPUESTAS">YA ENVIO EMAIL A INFO@ Y NO LE DAN RESPUESTAS</OPTION>
				<option value="1">OTROS</option>
                            </select>
                        </td>
                    </tr>

                    <div id="otroo" style="display:none;">
                       <tr id="trconsulta" style="display:none;">
                            <td>*solo si seleccionaste OTROS</td>
                            <td><textarea id="txtotros" name="txtotros" cols="85" rows="3"> </textarea>  </td>
                        </tr>
                    </div>

                </table>
            </fieldset>
            <fieldset>
                <legend>...:/Datos de la respuesta:...</legend>
                <table>
                    <tr>
                        <td>AQU&Iacute; LAS RESPUESTAS</td>
                        <td>
                            <select name="txtrespuesta" id="txtrespuesta" size="1">
                                <option value="ENVIAR MAIL A INFO@PROMOCIONES-WOO.COM">ENVIAR MAIL A INFO@PROMOCIONES-WOO.COM</option>
                                <option value="INGRESAR  A LA WEB PROMOCIONES-WOO.COM">INGRESAR  A LA WEB PROMOCIONES-WOO.COM</option>
                                <option value="PUEDE ENVIAR A CUALQUIER PERSONA DE SU ENTERA CONFIANZA">PUEDE ENVIAR A CUALQUIER PERSONA DE SU ENTERA CONFIANZA</option>
				<option value="DEBIDO AL EXITO DE LA PROMOCION, LAS FECHAS SE HAN EXTENDIDO">DEBIDO AL EXITO DE LA PROMOCION, LAS FECHAS SE HAN EXTENDIDO</option>
				<OPTION VALUE="DE ACUERDO AL HORARIO DE TOTTUS">DE ACUERDO AL HORARIO DE TOTTUS</OPTION>
				<OPTION VALUE="LE INDICAMOS QUE SI ES LA MISMA FECHA QUE RECIBIRA EN EL SMS">LE INDICAMOS QUE SI ES LA MISMA FECHA</OPTION>
				<OPTION VALUE="CADA TABLET TIENE UN CODIGO DE RESERVA; ENVIAR CORREO A INFO@">CADA TABLET TIENE UN CODIGO DE RESERVA; ENVIAR CORREO A INFO@</OPTION>
				<OPTION VALUE="LA FECHA DE CANJE ES LA QUE HA SIDO ASIGNADA ">LA FECHA DE CANJE ES LA QUE HA SIDO ASIGNADA</OPTION>
				<OPTION VALUE="SE ACEPTA TODA MODALIDAD DE PAGO">SE ACEPTA TODA MODALIDAD DE PAGO</OPTION>
                                <option value="mdc">ENVIAR CORREO A MDC</option>
                                <option value="1">OTROS</option>
                            </select>
                        </td>
                    </tr>
                    <div id="otrorespuesta" style="display:none;">
			<tr id="trcorreo"style="display:none;">
                            <td>correo electronico</td>
                            <td><input type="text" name="correo" id="correo"/></td>
                        </tr>
                        <tr id="trname"style="display:none;">
                            <td>NOMBRE COMPLETO</td>
                            <td><input type="text" name="NAME" id="NAME"/></td>
                        </tr>
			 <tr id="trrespuestaotros"style="display:none;">
                            <td>*solo si seleccionaste OTROS</td>
                            <td><textarea id="txtotrorespuesta" name="txtotrorespuesta" cols="70" rows="3"> </textarea>  </td>
                        </tr>
                    </div>
                </table>
</center>
            </fieldset>
            <fieldset id="f1">
                <legend>...:OPCIONES:...</legend>
<center>                <table id="table3">
                    <tr>
                    <input type="reset" value="Limpiar"/>
                    <input type="submit" value="Grabar" id="grabo"/>
                    <input type="button" value="Ver Excel" id="excel"onclick="location.href='excel.php'">
                    </tr>
                </table></center>
            </fieldset>
            
            <?php echo "</form>";
                include 'includes/footer.php';

?>
        </div>
    </body>
</html>