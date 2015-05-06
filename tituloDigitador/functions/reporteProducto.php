<?php
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=reporteProductos.xls");
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

echo "<h1>Producto</h1>";
echo "<table>";
echo $_POST['datos_a_enviar'];
echo "</table>";

echo "<h1>Proveedor</h1>";
echo "<table>";
echo $_POST['datos_a_enviar2'];
echo "</table>";

echo "<h1>Usados en los siguintes servicios activos</h1>";
echo "<table>";
echo $_POST['datos_a_enviar3'];
echo "</table>";

echo "<h1>Usado en los siguientes servicios finalizados</h1>";
echo "<table>";
echo $_POST['datos_a_enviar4'];
echo "</table>";

echo "<h1>Venta de productos</h1>";
echo "<table>";
echo $_POST['datos_a_enviar5'];
echo "</table>";

echo "<h1>Compra de productos pendientes</h1>";
echo "<table>";
echo $_POST['datos_a_enviar6'];
echo "</table>";

echo "<h1>Compra de productos finalizadas</h1>";
echo "<table>";
echo $_POST['datos_a_enviar7'];
echo "</table>";

?>