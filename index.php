<html xmlns="http://www.w3.org/1999/xhtml" lang="es-ES" prefix="og: http://ogp.me/ns#">
<head>
    <title>Matriculaciones EDLA</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="http://www.circulobellasartes.com/wp-content/uploads/2015/07/favicon.png?2fb0b6" type="image/x-icon" />
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
-->
</style></head>
<body>           
<?php include_once("../../at-cba.php") ?>
     <h1>Matriculaciones individuales EDLA 2016</h1>
            Ir a <a href=http://www.circulobellasartes.com/escueladelasartes/control/edla_cursos.php>conteo de matriculaciones agrupado por curso</a><br />
            Ir a <a href=http://www.circulobellasartes.com/escueladelasartes/control/edla_perfiles.php>listado de perfiles matriculados</a><br /><br />
			<?
				$link = mysql_connect("circulobellasartes.com","ab1064","bbddcbaweb01") or die ("No se ha podido conectar"); 
				mysql_select_db("ab5840") or die("Error al tratar de seleccionar esta base"); 
				$rstGenteT = mysql_query("select distinct email from edla") or die ("Algo falló. 3");
				$rstGenteC = mysql_query("select distinct email from edla where pagado='1'") or die ("Algo falló4.");
				$rstCantidadC = mysql_query("select sum(precio) from edla where pagado='1'") or die ("Algo falló5.");
				$filaCantidadC = mysql_fetch_row($rstCantidadC);
				$rstTotalC = mysql_query("select sum(precio) from edla where pagado='1'") or die ("Algo falló6.");
				$filaTotalC = mysql_fetch_row($rstTotalC);
				$rstTransC = mysql_query("select count(*) from edla where pagado='1'") or die ("Algo falló7.");
				$filaTransC = mysql_fetch_row($rstTransC);
				echo("&nbsp;&nbsp;&nbsp;<b>".number_format(mysql_num_rows($rstGenteC),0,",",".")."</b> personas diferentes han formalizado <b>".number_format($filaTransC[0],0,",",".")."</b> matr&iacute;culas por un total de <b>".number_format($filaTotalC[0],2,",",".")." &euro;</b>. Otros <b>".number_format(mysql_num_rows($rstGenteT)-mysql_num_rows($rstGenteC),0,",",".")."</b> no lo consiguieron.<br><br><br>");            
				$rsEntradas = mysql_query("select * from edla where pagado = '1' order by fecha desc") or die ("Algo falló. 3");
			?>
            <table width="100%">
			<tr><th align="left">Fecha de pago</th><th align="right">Importe&nbsp;</th><th align="left">Nombre y apellidos</th><th align="left">Curso o Taller</th><th align="left" nowrap>Fecha nacimiento&nbsp;</th><th align="left">Nacionalidad&nbsp;</th><th align="left" nowrap>DNI</th><th align="left">Teléfono</th><th align="left">E-mail</th><th align="left">Tarifa</th><th align="left">Justificante&nbsp;&nbsp;&nbsp;</th><th align="left">Estudios</th><th align="left">Titulación</th><th align="left">Ocupación</th><th align="left">Cómo nos conoció</th><th align="left">Comentarios</th></tr>
            <?
		echo("<tr><td colspan='17'><hr></td></tr>");
	while ($filaEntrada = mysql_fetch_array($rsEntradas)){
		if ($filaEntrada["adjunto"]!="_"){
			$ruta = "<a href='http://www.circulobellasartes.com/escueladelasartes/justificantes/".$filaEntrada["adjunto"]."' target=_blank><img border=0 src=../img/document.png></a>";
		} else {
			$ruta = "";
		}
		echo("<tr><td align=right nowrap>".substr($filaEntrada["fecha"],4,2)."/".substr($filaEntrada["fecha"],2,2)."/".substr($filaEntrada["fecha"],0,2)." ".substr($filaEntrada["fecha"],6,2).":".substr($filaEntrada["fecha"],8,2)."&nbsp;&nbsp;&nbsp;</td><td align=right>".$filaEntrada["precio"]." €&nbsp;&nbsp;</td><td nowrap>".$filaEntrada["nombre"]."&nbsp;".$filaEntrada["apellidos"]."&nbsp;&nbsp;&nbsp;</td><td nowrap>".$filaEntrada["curso"]."&nbsp;&nbsp;&nbsp;</td><td nowrap>".$filaEntrada["nacimiento"]."&nbsp;&nbsp;&nbsp;</td><td nowrap>".$filaEntrada["nacionalidad"]."&nbsp;&nbsp;&nbsp;</td><td nowrap>".$filaEntrada["dni"]."&nbsp;&nbsp;&nbsp;</td><td nowrap>".$filaEntrada["telefono"]."&nbsp;&nbsp;&nbsp;</td><td nowrap><a href=mailto:".$filaEntrada["email"].">".$filaEntrada["email"]."</a>&nbsp;&nbsp;&nbsp;</td><td nowrap>".$filaEntrada["tarifa"]."&nbsp;&nbsp;&nbsp;</td><td align=center nowrap>".$ruta."&nbsp;&nbsp;&nbsp;</td><td nowrap>".$filaEntrada["estudios"]."&nbsp;&nbsp;&nbsp;</td><td nowrap>".$filaEntrada["titulacion"]."&nbsp;".$filaEntrada["cursando"]."&nbsp;&nbsp;&nbsp;</td><td nowrap>".$filaEntrada["Ocupacion"]."&nbsp;".$filaEntrada["ocupando"]."&nbsp;&nbsp;&nbsp;</td><td nowrap>".$filaEntrada["referer"]."&nbsp;".$filaEntrada["prensa"]."&nbsp;&nbsp;&nbsp;</td><td nowrap>".$filaEntrada["comentarios"]."&nbsp;</td></tr>");
		echo("<tr><td colspan='17'><hr></td></tr>");
}	
?>
</table>
	<script LANGUAGE="JavaScript">
		function redireccionar() {
			location.href='http://www.circulobellasartes.com/escueladelasartes/control/'
			} 
	setTimeout ("redireccionar()", 300000);
    </script>
</body>
</html>
