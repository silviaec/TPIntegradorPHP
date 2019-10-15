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
    session_destroy();

    $sql = "SELECT t1.*, MAX(t2.`Fecha`), COUNT(t2.`IdNoticia`) FROM escritores t1 LEFT JOIN noticias t2 ON t1.`IdEscritor` = t2.`IdEscritor` GROUP BY t1.`IdEscritor`";
    $resultado = $con->query($sql);

?>
    <div class= "titulo"><h2>Bienvenido al gestor de Noticias<h2></div><br>
    <h4>Clickeando en cada escritor podrás ver sus noticias y opciones de creación, modificación y eliminación (para usuarios registrados):<h4>
        
    <table class="table table-hover" border="3">
        <tr>
            <td>Id de Escritor</td>
            <td>Nombre</td>
            <td>Edad</td>
            <td>Última publicación</td>
            <td>Cantidad de publicaciones</td>
        </tr>
        <?php foreach ($resultado as $rows) { ?>
            <tr>
            <td><?=$rows["IdEscritor"];?></td>
            <td><strong><a href="noticiasEscritor.php?action=listar&id=<?=$rows["IdEscritor"];?>"><?=$rows["Nombre"];?></a></strong></td>
            <td><?=$rows["Edad"];?></td>
            <td><?=$rows["MAX(t2.`Fecha`)"];?></td>
            <td><?=$rows["COUNT(t2.`IdNoticia`)"];?></td>
            </tr> 
            <?php } ?>
    </table>
<h4>Presione sobre el escritor si quiere ver sus noticias ordenadas por fecha de última publicación</h4>
<h4>Por cada modificación realizada, por una cuestión de seguridad, deberás regresar a la página principal y volver a iniciar la sesión.<h4>
<h4><a href="noticiaNueva.php?action=crear&id=<?php echo $rows["IdNoticia"];?>">Click aquí para ingresar y crear una noticia nueva</a></h4> 
<h4><a href="noticias.php">Click aquí para ver y/o modificar todas las noticias</a></h4>     

