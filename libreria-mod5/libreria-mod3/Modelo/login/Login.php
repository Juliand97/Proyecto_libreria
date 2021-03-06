<?php 
session_start();//variable de sesion permite mantener una sesion activa
 ?>
<?php 
Class Login
{
	Private $db;
	private $activo;
	private $inactivo;
	private $semilla;

	public function __construct()
	{
		require_once '../../Modelo/Conexion.php';
		$this->db=Conexion::conm();
		$this->activo=1;
		$this->inactivo=0;
		$this->semilla='2018';
	}

	public function logueo($id,$pass)
	{
		$_SESSION['admin']=0;
		$_SESSION['cliente']=0;
		$_SESSION['proveedor']=0;
		$_SESSION['default']=0;

		$consulta="SELECT * FROM usuarios WHERE identificacion='$id' and contrasena=aes_encrypt('$pass','$this->semilla') ";
			#echo $consulta;
		$ejecutar=$this->db->query($consulta);
		$fila= mysqli_fetch_array($ejecutar);
		$ide=$fila['identificacion'];
		$nom = $fila['p_nombre'];
		$pass=$fila['contrasena'];
		$_SESSION['id']=$ide;
		$_SESSION['usuario']=$nom;
		$_SESSION['pass']=$pass;

		$consulta2="SELECT identificacion,p_nombre,contrasena,roles.u_rol,roles.t_permiso FROM usuarios INNER JOIN roles INNER JOIN permisos WHERE identificacion='$ide'and id_usuario=identificacion and u_rol=id_rol";
		#echo $consulta2;
		$ejecutar2=$this->db->query($consulta2);
		while ($fila2=mysqli_fetch_array($ejecutar2))
		{
			$t_permiso=$fila2['t_permiso'];
			if ($t_permiso=="admin")
			{
				$_SESSION['admin']=1;
				$_SESSION['default']=1;
			}
			if ($t_permiso=="cliente")
			{
				$_SESSION['cliente']=1;
			}
			if ($t_permiso=="proveedor")
			{
				$_SESSION['proveedor']=1;
				$_SESSION['default']=1;

			}
		}

		if(empty($nom))
		{
				
			header("location:../../Vista/pag_visitante.php");
		}

		if (!empty($_SESSION['usuario'])) 
		{
			
			
				header("location:../../Vista/pag_cliente.php");
		}			
	}

	public function logout()
	{
		$_SESSION['admin']=0;
		$_SESSION['default']=0;	
		$_SESSION['cliente']=0;
		$_SESSION['proveedor']=0;
		header("location:../../Vista/pag_visitante.php");

	}

	
}
 ?>