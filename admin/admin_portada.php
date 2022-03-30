<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Multiusuarios PHP MySQL: Niveles de Usuarios</title>
		
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../js/jquery-1.12.4-jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 20px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
	<body>
<?php include("../header.php");?>
	
	<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
		 
			<center>
				<h1>Pagina Administrativa</h1>
				
				<h3>
				<?php
				session_start();

				if(!isset($_SESSION['admin_login']))	
				{
					header("location: ../index.php");  
				}

				if(isset($_SESSION['personal_login']))	
				{
					header("location: ../personal/personal_portada.php");	
				}

				if(isset($_SESSION['usuarios_login']))	
				{
					header("location: ../usuarios/usuarios_portada.php");
				}
				
				if(isset($_SESSION['admin_login']))
				{
				?>
					Bienvenido,
				<?php
						echo $_SESSION['admin_login'];
				}
				?>
				</h3>
					
			</center>
			<a href="../cerrar_sesion.php"><button class="btn btn-danger text-left"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar Sesion</button></a>
            <hr>
		</div>
		
		<br><br><br>
		<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Panel de usuarios
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="4%">ID</th>
                                            <th width="18%">Usuario</th>
                                            <th width="24%">Email</th>
                                            <th width="19%">Rol</th>
                                            <th width="24%">Password</th>
											<th colspan="2">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									require_once '../DBconect.php';
									$select_stmt=$db->prepare("SELECT id,username,email,role FROM mainlogin");
									$select_stmt->execute();
									
									while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
									{
									?>
                                        <tr>
                                            <td><?php echo $row["id"]; ?></td>
                                            <td><?php echo $row["username"]; ?></td>
                                            <td><?php echo $row["email"]; ?></td>
                                            <td><?php echo $row["role"]; ?></td>
                                            <td>*******</td>
											<td width="4%"><button class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></td>
											<td width="7%"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
                                        </tr>
									<?php 
									}
									?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
		
	</div>
			
	</div>
	<?php include("../facturacion/menu.php");?>							
	</body>
</html>