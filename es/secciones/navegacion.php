<aside id="sidebar-left" class="sidebar-left">
				
	<div class="sidebar-header">
		<div class="sidebar-title">
			Menú principal
		</div>
		<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
			<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
		</div>
	</div>
				
	<div class="nano">
		<div class="nano-content">
			<nav id="menu" class="nav-main" role="navigation">
				<ul class="nav nav-main">
					<li class="nav-active">
						<a href="home.php">
							<i class="fa fa-home" aria-hidden="true"></i>
							<span>Inicio</span>
						</a>
					</li>
					<li class="nav-active">
						<a href="areas.php">
							<i class="fa fa-cubes" aria-hidden="true"></i>
							<span>Áreas</span>
						</a>
					</li>
					<li class="nav-parent">
						<a>
							<i class="fa fa-database" aria-hidden="true"></i>
							<span>S.O.P.A.</span>
						</a>
						<ul class="nav nav-children">
							<li>
								<a href="indice-general.php">
									<i class="fa fa-database" aria-hidden="true"></i>
									<span>Índice General</span>
								</a>
							</li>
							<li>
								<a href="sujetos.php">
									<i class="fa fa-flag-o" aria-hidden="true"></i>
									<span>Sujetos</span>
								</a>
							</li>
							<li>
								<a href="objetos.php">
									<i class="fa fa-puzzle-piece" aria-hidden="true"></i>
									<span>Objetivos</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-active">
						<a href="prioridades.php">
							<i class="fa fa-star" aria-hidden="true"></i>
							<span>Prioridades</span>
						</a>
					</li>
					<li class="nav-active">
						<a href="calendario.php">
							<i class="fa fa-calendar" aria-hidden="true"></i>
							<span>Calendario</span>
						</a>
					</li>
					<li class="nav-parent">
						<a>
							<i class="fa fa-header" aria-hidden="true"></i>
							<span>Historial</span>
						</a>
						<ul class="nav nav-children">
							<li>
								<a href="historial.php">
									<i class="fa fa-list-alt" aria-hidden="true"></i>
									<span>Por Sujeto - Objetivo</span>
								</a>
							</li>
							<li>
								<a href="historial-fechas.php">
									<i class="fa fa-calendar-o" aria-hidden="true"></i>
									<span>Por fecha</span>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</nav>

			<?php if( $usuario["id"] == 2 ) { ?>

			<hr class="separator" />

			<div class="sidebar-widget widget-tasks">
				<div class="widget-header">
					<h6>Administración</h6>
					<div class="widget-toggle">+</div>
				</div>
				<div class="widget-content">
					<ul class="list-unstyled m-none">
						<li>
							<a href="usuarios.php">
								<i class="fa fa-users" aria-hidden="true"></i>
								<span>Usuarios Registrados</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<?php } ?>
			
			<hr class="separator" />

			<div class="sidebar-widget widget-stats hidden">
				<div class="widget-header">
					<h6>Company Stats</h6>
					<div class="widget-toggle">+</div>
				</div>
				<div class="widget-content">
					<ul>
						<li>
							<span class="stats-title">Stat 1</span>
							<span class="stats-complete">85%</span>
							<div class="progress">
								<div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
									<span class="sr-only">85% Complete</span>
								</div>
							</div>
						</li>
						<li>
							<span class="stats-title">Stat 2</span>
							<span class="stats-complete">70%</span>
							<div class="progress">
								<div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
									<span class="sr-only">70% Complete</span>
								</div>
							</div>
						</li>
						<li>
							<span class="stats-title">Stat 3</span>
							<span class="stats-complete">2%</span>
							<div class="progress">
								<div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
									<span class="sr-only">2% Complete</span>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>

	</div>
				
</aside>