<head>
<link href="estilos.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
</head> 
<?php
	error_reporting(E_ERROR);
	include 'escritor.php';
    include 'noticia.php';
    include 'usuario.php';
	require 'conexion.php';
	session_start();

	$sql = "SELECT * FROM escritores t1 INNER JOIN noticias t2 ON t1.IdEscritor = t2.IdEscritor ";;
    $resultado = $con->query($sql);
?>
	<table class="table table-hover" border="3">
	<tr>
		<td>Id Noticia</td>
		<td>Titulo</td>
		<td>Subtitulo</td>
		<td>Fecha</td>
		<td>Desarrollo de la Noticia</td>
        <td>Tema</td>
		<td>Id de Escritor</td>
		<td>Nombre del Escritor</td>
		<td>Editar</td>
		<td>Eliminar</td>
	</tr>
	<?php foreach ($resultado as $rows) { ?>
		<tr>
			<td><?=$rows["IdNoticia"];?></td>
			<td><?=$rows["Titulo"];?></td>
			<td><?=$rows["Subtitulo"];?></td>
			<td><?=$rows["Fecha"];?></td>
			<td><?=$rows["NoticiaDesarrollo"];?></td>
			<td><?=$rows["Tema"];?></td>
			<td><?=$rows["IdEscritor"];?></td>
			<td><?=$rows["Nombre"];?></td>
			<td><a href="noticiaEditar.php?action=editar&id=<?php echo $rows["IdNoticia"];?>" class="glyphicon glyphicon-pencil"></a></td>
			<td><a href="noticiaEliminar.php?action=borrar&id=<?=$rows["IdNoticia"];?>" class= "glyphicon glyphicon-trash"></a></td>
		</tr>
	<?php } ?>
	</table>
	<h4><a href="noticiaNueva.php?action=crear&id=<?=$rows["IdNoticia"];?>">Crear Noticia</a></h4>
    
    <html>
    <head>
        <link href="popup.css" rel="stylesheet" type="text/css" />        
    </head>
    <body>
        <p>Para poder CREAR, ELIMINAR o MODIFICAR deberás: <a class="btn btn-success" href="#popup">Iniciar sesión</a></p>
        <div id="popup" class="overlay">
            <div id="popupBody">
                    <form action="sesiones.php" method="post">                           	
                            <div class="form-group">									
                            <input type="text" class="form-control input-lg" name="Usuario" placeholder="Usuario" required>        
                            </div>							
                            <div class="form-group">        
                            <input type="password" class="form-control input-lg" name="Pass" placeholder="Contraseña" required>       
                            </div>		
                            <input type="hidden" class="form-control input-lg" name="id" required>        
                            <input type="hidden" class="form-control input-lg" name="editar" required>        
                            <input type="hidden" class="form-control input-lg" name="borrar" required>        						    
                            <button type="submit" class="btn btn-success btn-block">Ingresar</button>
                        </form>
                <a id="cerrar" href="#">&times;</a>
            </div>
        </div>
    </body>
</html>
<a class="btn btn-warning" href='cerrarSesion.php?action=cerrar'>Cerrar Sesión</a>
<a class="btn btn-dark" href="index.php">Volver a Index</a>