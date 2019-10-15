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
	
    $usuario = $_POST['Usuario']; 
    $pass = $_POST['Pass'];
    $sql = "SELECT Usuario,Nombre,Pass FROM usuarios WHERE Usuario = '$usuario' AND Pass = '$pass'";
	$resultado = $con->query($sql);
	foreach($resultado as $rows){
	if (($rows['Usuario'] == $usuario) && ($rows['Pass'] == $pass)) {	
    	$_SESSION['loggedin'] = true;
		$_SESSION['name'] = $rows['Nombre'];
		$_SESSION['usuario'] = $rows['Usuario'];
		$_SESSION['pass'] = $rows['Pass'];
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (10 * 60);						
			
			echo
            "<div><h1><strong>¡Te damos la bienvenida $rows[Nombre]!</strong></h1><br></br>		
				<p><a class='btn btn-danger' href='noticias.php'>Volver a todas las Noticias</a></p>	
				<p><a class='btn btn-danger' href='noticiasEscritor.php'>Volver a Noticias de escritores</a></p>
				<p><a class='btn btn-dark' href='index.php'>Volver al Index</a></p>
				<p><a class='btn btn-warning' href='cerrarSesion.php?action=cerrar'>Cerrar Sesión</a></p></div>";
			 } else {
				echo "<div class='alerta' role='alert'>Usuario o Contraseña incorrecta!
				<p><a class='btn btn-dark' href='index.php'><strong>Por favor ingrese nuevamente los datos!</strong></a></p></div>";			
			}	
		}
		
		
?>
