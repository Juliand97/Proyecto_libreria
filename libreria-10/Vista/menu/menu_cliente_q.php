<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="../css/menu/menu-cliente.css">
	<script>
		function redireccionar()
		{
			var elemento
			elemento=document.getElementById('lista').text;
			alert(elemento);
		}
	</script>
</head>
</head>
<body>
	<header>
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/prin_s1.css">
<ul>		
		<li>
			<div class="Tp" id="posH"><a href="../pag_cliente.php">
			<input type="image" src="../img/botones/inicio.png" class="btnI"></a>
			<span class="Tptxt">Inicio</span>
			</div>
		</li>		
		<li><a href="quienes somos/Quienes Somos_cli.php">Quiénes Somos</a></li>
		</li>
		<li><a href="../../Controlador/busqueda/busqueda_ctrl.php">Libros<span class="fa fa-angle-down"></span></a>
			<li>
				<a href="../../Controlador/clientes/perfil_clientes_con_ctrl.php">
					<h1>
						<?php
						session_start();
					 echo $_SESSION['usuario'];
					 ?>
					</h1>
					
				 	
				 </a>
			
				 <ul>	
			</ul>
			</li>
			<li>
			<div class="Tp"><a><form action="../../Controlador/logout/cerrar_sesion_ctrl.php" method="post" >
				<input type="image" src="../img/botones/log_out.png" value="Cerrar sesion" class="btnS"></form></a>
				<span class="Tptxt">Cerrar Sesión</span>
			</div>
			</li>
			</ul>
				
	</ul>
</body>
</html>