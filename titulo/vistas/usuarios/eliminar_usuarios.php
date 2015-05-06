<?php
include ("../../includes/default.php");
include ("../../modelos/usuario.php");
//include ("../../modelos/juridico.php");

$usuario = new usuario();
//$juridico = new juridico();

$usuario_id = $_GET['usuario_id'];
//$juridico_id = $_GET['juridico_id']
$result = $base_datos->sql_query($usuario->eliminarUsuario($usuario_id));


      echo "<script language='JavaScript'>";
      echo "location = 'listar_usuarios.php'";
      echo "</script>";

?>
