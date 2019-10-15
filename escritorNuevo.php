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
    ?>
    
    <div class="container">
    <div class="abs-center">
            <form class="form-control form-control-lg" action="escritorNuevo.php" method="POST">
                <div><input class="form-control form-control-lg" type="text" name="nombre" placeholder="Ingrese Escritor"></div>
                <div><input class="col-sm-2 col-form-label" type="text" name="edad"  placeholder="Ingrese la edad"></div>
                <div><input class="btn btn-primary" type="submit" value="Agregar Escritor" name="envio"></div>


    <?php 
        if(isset($_POST['envio'])) {
            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            $sql3 = "INSERT INTO escritores (Nombre, Edad) VALUES ('".$nombre."','". $edad."')";
            $con->exec($sql3);
            echo "<p class='insert'>El escritor ".$_GET['id'].", fue agregado con éxito.</p>";?>
            <h4><a class="btn btn-dark" href="index.php" class='delete'>Por favor presione aquí para recargar la página</a></h4><?php
        }
    ?>
                </form>
                    </div>
                    </div>
    <?php } else {
			echo  "<div>Tenés que iniciar sesión
            <p><a href='noticiasEscritor.php'><strong>Volver</strong></a></p></div>";
		}
    ?>

    
