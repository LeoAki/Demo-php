<?php
//Exportar datos a excel
header("Content-Type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=Reportes.xls");
require_once 'clases/Coneccion.php';
$excel= new Coneccion();
?>
<HTML LANG="es">
<TITLE>::. Exportacion de Datos .::</TITLE>
</head>
<body>
<?php
$NombreBD = "woo";
$Servidor = "localhost";
$Usuario = "root";
$Password ="Yasmina0";
$IdConexion = mysql_connect($Servidor, $Usuario, $Password);
mysql_select_db($NombreBD, $IdConexion);

$consulta="SELECT anexo,fecha,movil,consulta,respuesta,name,email FROM woo.llamada ";


$result=mysql_query($consulta,$IdConexion);

?>

<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
<TR>
<TD>ANEXO</TD>
<TD>FECHA</TD>
<TD>MOVIL</TD>
<TD>CONSULTA</TD>
<TD>RESPUESTA</TD>
<TD>NAME</TD>
<TD>EMAIL</TD>

</TR>
<?php
while($row = mysql_fetch_array($result)) {
printf("<tr>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
</tr>", $row["anexo"],$row["fecha"],$row["movil"],$row["consulta"],$row["respuesta"],$row["name"],$row["email"]);
}
mysql_free_result($result);
mysql_close($IdConexion);
?>
</table>
</body>
</html>

