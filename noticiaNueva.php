<head>
<link href="estilos.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"">
</head> 
<?php
	error_reporting(E_ERROR);
	include 'escritor.php';
    include 'noticia.php';
    include 'usuario.php';
	require 'conexion.php';
	session_start();

	if(isset($_SESSION['usuario'])){

		if(isset($_POST['envio'])) {
			$titulo = $_POST['titulo'];
			$subtitulo = $_POST['subtitulo'];
			$fecha = $_POST['fecha'];
			$noticiaDesarrollo = $_POST['noticiaDesarrollo'];
			$tema = $_POST['tema'];
			$idEscritor = $_POST['idEscritor'];
			$sql3 = "INSERT INTO noticias (Titulo, Subtitulo, Fecha, NoticiaDesarrollo, Tema, IdEscritor) VALUES ('".$titulo."','". $subtitulo."','".$fecha."','".$noticiaDesarrollo."','".$tema."','".$idEscritor."')";
			$con->exec($sql3);
			echo "<p class='insert'>La noticia ".$_GET['id'].", fue agregada con éxito.</p>";
			}

		?>
		<?php
			$sql2 = "SELECT * FROM escritores";
			$escritores = $con->query($sql2);
			$idEscritor = $_POST['idEscritor'];
		?>
			<form class="form-control form-control-lg" action="noticiaNueva.php" method="POST">
				<div><input class="form-control form-control-lg" type="text" name="titulo" placeholder="Titulo"></div>
				<div><input class="form-control form-control-lg" type="text" name="subtitulo"  placeholder="Subtitulo"></div>
				<div><input class="form-control form-control-lg" type="date" name="fecha"  placeholder="Fecha"></div>
				<div><textarea class="form-control form-control-lg" type="textarea" name="noticiaDesarrollo" placeholder="Desarrollo de la Noticia"></textarea></div>
				<div><input class="form-control form-control-lg" type="text" name="tema"  placeholder="Tema"></div>
				<div>
					<select name="idEscritor">
					<?php foreach($escritores as $escritor) { ?>
						<option value="<?= $escritor['IdEscritor']; ?>"><?= $escritor['Nombre']; ?></option>
					<?php } ?>
					</select>
				</div>
				<div><input class="btn btn-primary" type="submit" value="Agregar Noticia" name="envio"></div>
			</form>
			<a class="btn btn-dark" href="index.php">Volver a Index</a>
		<?php } else {
			echo  "<div>Tenés que iniciar sesión
            <p><a href='noticias.php'><strong>Volver a Noticias</strong></a></p></div>";
		}
?>