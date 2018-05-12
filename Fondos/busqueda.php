<?php
require_once("ClaseFondo.php");

if (!$_POST){
?>
<title>Búsqueda</title>
<form action='' method=post>
	<input type='text' name='nombre' class="form-control" placeholder="Título">
	<button class="btn btn-primary" type=submit>Enviar</button>
</form>
<?php
}else{
	$a=new Fondo(); ?>
	<title>Búsqueda de "<?php echo $_POST["nombre"] ?>"</title>
	<?php
	echo $a->busqueda($_POST["nombre"]);
	?>
	<?php } ?>