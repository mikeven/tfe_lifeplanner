<?php
    /*
     * TFE Life Planner - Perfil de usuario
     * 
     */
    session_start();
    ini_set( 'display_errors', 1 );
    include( "database/bd.php" );
    include( "database/data-acceso.php" );
    include( "database/data-usuario.php" );
    checkSession( "" );
    $titulo_pagina = "Perfil de usuario";

    $idu = $_SESSION["user"]["id"];
    $usr = obtenerDatosUsuario( $dbh, $idu );
 	$breadcrumb = $titulo_pagina;
?>
<!doctype html>
<html class="fixed">
	<head>
		<!-- Título -->
		<title>Perfil de usuario | TFE Life Planner</title>
		<?php include( "secciones/meta-tags.html" );?>

		<?php include( "secciones/include-css.html" );?>
		
		<style type="text/css">
		    .alert{ display: none; margin-top: 20px; }
		</style>
	</head>
	
	<body>
		<section class="body">

			<!-- start: header -->
			<?php include( "secciones/header.php" ); ?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include( "secciones/navegacion.php" ); ?>
				<!-- end: sidebar -->
				<section role="main" class="content-body">
					<?php include( "secciones/titulo_pagina.php" ); ?>
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<section class="panel-group mb-xlg">
								<header class="panel-heading bg-primary">
									<div class="widget-profile-info">
										<div class="profile-info">
											<h4 class="name text-semibold">
												<?php echo $usr["nombre"]; ?>
											</h4>
											<h5 class="role"><?php echo $usr["email"]; ?></h5>
											
										</div>
									</div>
								</header>
								<div class="panel-body text-left">
									<p>	<i class="fa fa-clock-o"></i> Registrado: 
										<?php echo $usr["fregistro"]; ?> </p>
									<p>	<i class="fa fa-clock-o"></i> Último ingreso: 
										<?php echo $usr["ult_ingreso"]; ?> </p>
								</div>
							</section>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<section class="panel">
								<div class="tabs tabs-primary">
									<ul class="nav nav-tabs nav-justified">
										<li class="active">
											<a href="#tfe_dp" data-toggle="tab" class="text-center"><i class="fa fa-user"></i> Datos personales</a>
										</li>
										<li>
											<a href="#tfe_pwd" data-toggle="tab" class="text-center"><i class="fa fa-lock"></i> Contraseña</a>
										</li>
									</ul>
									<div class="tab-content">
										<div id="tfe_dp" class="tab-pane active">
											<p>Datos personales </p>
											<form id="frm_mdatos_pers" class="form-horizontal">
												<input type="hidden" name="idu" 
												value="<?php echo $idu ?>">
												<div class="row form-group">
													<div class="col-lg-12">
														<label control-label">Nombre 
														<span class="required">*</span></label>
														<input type="text" name="nombre" placeholder="Nombre" 
														class="form-control" required 
														value="<?php echo $usr['nombre']?>">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-lg-12">
														<label control-label">Email 
														<span class="required">*</span></label>
														<input type="email" name="email" placeholder="Email" class="form-control" required 
														value="<?php echo $usr['email']?>">
													</div>
												</div>
												<footer class="panel-footer">
													<div class="row">
														<div class="col-sm-9 col-sm-offset-3">
															<button class="btn btn-primary">Guardar</button>
														</div>
													</div>
												</footer>
											</form>
										</div>
										<div id="tfe_pwd" class="tab-pane">
											<p>Cambiar contraseña </p>
											<form id="frm_actpwd" class="form-horizontal">
												<input type="hidden" name="idu" 
												value="<?php echo $idu ?>">
												<div class="row form-group">
													<div class="col-lg-12">
														<label control-label">Contraseña 
														<span class="required">*</span></label>
														<input id="pwd1" type="password" name="pwd1" class="form-control" required>
													</div>
												</div>
												<div class="row form-group">
													<div class="col-lg-12">
														<label control-label">Confirmar contraseña 
														<span class="required">*</span></label>
														<input type="password" name="pwd2" class="form-control" required>
													</div>
												</div>
												
												<footer class="panel-footer">
													<div class="row">
														<div class="col-sm-9 col-sm-offset-3">
															<button type="submit" class="btn btn-primary">Guardar</button>
														</div>
													</div>
												</footer>
											</form>
										</div>
									</div>
								</div>
								<?php include( "secciones/notificaciones/alert.html" );?>
							</section>
						</div>
					</div>

				</section>
			</div>
			
		</section>

		<?php include( "secciones/include-js.html" ); ?>

		<script src="js/fn-ui.js"></script>
		<script src="js/fn-acceso.js"></script>
		<script src="js/fn-usuario.js"></script>
		<script src="js/validate-extend.js"></script>
		
	</body>
</html>