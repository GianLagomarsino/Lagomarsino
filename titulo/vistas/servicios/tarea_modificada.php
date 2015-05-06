<?PHP
$ruta = "../../";
$ruta_archivos= "../";


	//include ('../master_pages/header.php');
	include('../../includes/default.php');
    include('../../modelos/tarea.php');
	include('../../modelos/trabajador.php');
    $tarea = new tarea();
	//$trabajador = new trabajador();
		   
                
		
		
		
		
        $tarea->setTarea_id         	   ($_POST['tarea_id']);
        $tarea->setNombre_tarea		   ($_POST['nombre_tarea']);
		$tarea->setValor			          ($_POST['valor']);
		
		
         
		 
		  
       if(!$base_datos->sql_query($tarea->updateTareas()))
	{
        
		
									echo "<script language='JavaScript'>";
									echo "alert('ERROR, Los Registros no Se Modificaron Con Exito');";
									
									echo "location = 'listar_tareas.php'";
									echo "</script>";		
									
									}
                    else
                    {
                           {
									echo "<script language='JavaScript'>";
									echo "alert('Servicio Actualizado Correctamente');";
									echo "location = 'listar_tareas.php'";
									echo "</script>";

	
	} 
}


	
	/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
