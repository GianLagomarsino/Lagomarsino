<?php
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=reporteTarea.xls");
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

echo "<td> <div align='center'>Gran bretaña 281</div></td>";

echo "</tr>";

echo "</table>";

echo "<h1>Tarea</h1>";
echo "<table>";
echo $_POST['datos_a_enviar'];
echo "</table>";

echo "<h1>Servicios Asociados</h1>";
echo "<table>";
echo $_POST['datos_a_enviar2'];
echo "</table>";

?>