<?php
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=reporteClienteNatural.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo "<table width='200' border='0'>";
echo "<tr>";

echo "<th width='160' scope='col'><h1>''LAGOMARSINO''</h1></th>";

echo "</tr>";

echo "<tr>";

echo "<td> <div align='center'>Laboratorio Diesel</div></td>";

echo "</tr>";

echo "<tr>";

echo "<td> <div align='center'>Gran breta�a 281</div></td>";

echo "</tr>";

echo "</table>";

echo "<h1>Cliente</h1>";
echo "<table>";
echo $_POST['datos_a_enviar'];
echo "</table>";

echo "<h1>Servicios en curso</h1>";
echo "<table>";
echo $_POST['datos_a_enviar2'];
echo "</table>";

echo "<h1>Servicios Finalizados</h1>";
echo "<table>";
echo $_POST['datos_a_enviar3'];
echo "</table>";
?>