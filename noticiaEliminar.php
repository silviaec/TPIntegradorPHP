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
        $sql = "DELETE FROM noticias WHERE IdNoticia = '".$_GET['id']."'";
        $con->exec($sql);
        echo "<p class='delete'>La noticia ".$_GET['id'].", fue eliminada con éxito.</p>";
        ?><h4><a class="btn btn-dark" href="index.php" class='delete'>Por favor regresa a la página principal</a></h4><?php
        ?>
        <?php } else {
                echo  "<div>Tenés que iniciar sesión
                <p><a href='noticias.php'><strong>Volver a Noticias</strong></a></p></div>";
            }
?>
