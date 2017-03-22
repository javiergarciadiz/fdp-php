<html xmlns="http://www.w3.org/1999/xhtml" lang="es-ES" prefix="og: http://ogp.me/ns#">
<head>
    <title>FDP | Planes de formación</title>
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
     <h1>FDP | Planes de formación</h1>
		<?
            $link = mysql_connect("173.194.85.219","root","Intelygenz01") or die ("No se ha podido conectar"); 
            mysql_select_db("np01_cursos") or die("Error al tratar de seleccionar esta base"); 
            $rstPlanes = mysql_query("select nombre, marco_finalidades from np01_plan") or die ("Algo falló. 3");
        ?>
        <table width="100%">
        <tr><th align="left">Nombre</th><th align="right">Marco finalidades</th></tr>
        <?
			while ($filaPlanes = mysql_fetch_array($rstPlanes)){
				echo("<tr><td align=right nowrap>".$filaPlanes["nombre"]."</td><td align=right>".$filaPlanes["marco_finalidades"]."</td></tr>");
				}	
		?>
</table>
</body>
</html>
