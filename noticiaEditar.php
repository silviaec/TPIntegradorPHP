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
    $id = $_GET['id'];
    $sql = "SELECT * FROM escritores t1 INNER JOIN noticias t2 ON t1.IdEscritor = t2.IdEscritor WHERE IdNoticia = '$id'";;
    $resultado = $con->query($sql);

        if(isset($_POST['envio'])) {
            $idNoticia = $_POST['idNoticia'];
            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['subtitulo'];
            $fecha = $_POST['fecha'];
            $noticiaDesarrollo = $_POST['noticiaDesarrollo'];
            $tema = $_POST['tema'];
            $idEscritor = $_POST['idEscritor'];
            $nombre = $_POST['nombre'];
            $sql2 = "UPDATE noticias SET Titulo='$titulo', Subtitulo='$subtitulo', Fecha='$fecha', 
            NoticiaDesarrollo='$noticiaDesarrollo', Tema='$tema', IdEscritor='$idEscritor' WHERE IdNoticia = '$idNoticia'";
            $con->exec($sql2);
            echo "<p class='p'>La noticia ".$_GET['id'].", fue editada con éxito.</p>";
        }
    ?>
    <?php foreach ($resultado as $rows) { ?>
        <form class="form-row align-items-center"action="noticiaEditar.php" method="POST">
        <div class="col-sm-10">
            <div><label class="col-sm-2 col-form-label"> Id de Noticia: </label><input class="form-control" type="text" name="idNoticia" value= "<?php echo $rows['IdNoticia']; ?>"/></div>
            <div><label class="col-sm-2 col-form-label"> Título: </label><input class="form-control" type="text" name="titulo" value= "<?php echo $rows['Titulo']; ?>"/></div>
            <div><label class="col-sm-2 col-form-label"> Subtítulo: </label><input class="form-control" type="text" name="subtitulo" value="<?php echo $rows['Subtitulo']; ?>"/></div>
            <div><label class="col-sm-2 col-form-label"> Fecha: </label><input class="form-control" type="date" name="fecha" value="<?php echo $rows['Fecha']; ?>"/></div>
            <div><label class="col-sm-2 col-form-label"> Desarrollo de la noticia: </label><textarea class="form-control" type="textarea" name="noticiaDesarrollo"><?php echo $rows['NoticiaDesarrollo']?></textarea></div>
            <div><label class="col-sm-2 col-form-label"> Tema: </label><input class="form-control" type="text" name="tema"  value="<?php echo $rows['Tema']; ?>"/></div>
            <div><label class="col-sm-2 col-form-label"> Id de Escritor: </label><input class="form-control" type="text" name="idEscritor"  value="<?php echo $rows['IdEscritor']; ?>"/></div>
            <div><input class="btn btn-primary" type="submit" value="Modificar Noticia" name="envio"></div>
    </div>
        </form>
        <a class="btn btn-dark" href="index.php">Volver a Index</a>
            <?php } ?>
        <?php } else {
                echo  "<div>Tenés que iniciar sesión
                <p><a href='noticias.php'><strong>Volver a Noticias</strong></a></p></div>";
		}
    ?>
    