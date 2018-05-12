<?php
require_once("ClaseFondo.php");
$a=new Fondo();
if (isset($_GET["id"])&&is_numeric($_GET["id"])){
	$id=$_GET["id"];
		$a=new Fondo();
	echo $a->fondodepelicula($id);
		?><br><br><a href="index.php">Volver</a>
		<?php
}else{
	?>
	ID incorrecto.
	<br>
	<a href="index.php">Volver</a>
	
	<?php } ?>