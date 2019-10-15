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
        $sql2 = "SELECT * FROM escritores";
        $escritores = $con->query($sql2);
    ?>
        <h3>Seleccioná el escritor que querés eliminar: </h3>
            <div>
                <form class="form-control form-control-lg" action="escritorEliminar.php" method="POST">
                <select name="idEscritor">
                <?php foreach($escritores as $escritor) { ?>
                    <option value="<?= $escritor['IdEscritor']; ?>"><?= $escritor['Nombre']; ?></option>
                    <?php } ?>
                </select>
                </div>
                <div><input class="btn btn-primary" type="submit" value="Eliminar Escritor" name="borrar"></div>
                </form>              
        <?php
        if(isset($_POST['borrar'])) {
            $idEscritor = $_POST['idEscritor'];
            $sql = "DELETE FROM escritores WHERE IdEscritor = '$idEscritor'";
            $con->exec($sql);
            echo "<p class='delete'> El escritor ".$_GET['id'].", fue eliminado con éxito.</p>";
            ?><h4><a class="btn btn-dark" href="index.php" class='delete'>Por favor presione aquí para recargar la página</a></h4><?php
            }
        }else {
            echo  "<div>Tenés que iniciar sesión
            <p><a href='noticiasEscritor.php'><strong>Volver</strong></a></p></div>";
        }
    
    ?>
