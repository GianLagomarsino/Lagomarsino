<?php

include "titulo/includes/default.php";
include "titulo/modelos/usuario.php";

$usuario = new usuario();
$usuario->logout();

echo "<script language='JavaScript'>";
echo "location = 'sign-in.php'";
echo "</script>";

?>
