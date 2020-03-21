<!-- ======================= Menu Superior =========================== -->
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#navbar" aria-expanded="false"
					aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Sistema EVA</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<!--  FOTO DE PERFIL-->
					<li>
						<div class="placeholder">
							<!-- data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw== -->
							<!-- https://yt3.ggpht.com/-Z5maMphuUqc/AAAAAAAAAAI/AAAAAAAAAAA/b3MX3agOgLs/s88-c-k-no-mo-rj-c0xffffff/photo.jpg -->      
							<img
								src="http://graph.facebook.com/<?php echo $this->session->userdata('id_face'); ?>/picture"
								width="50" height="50" class="img-responsive "
								alt="Generic placeholder thumbnail">
						</div>
					</li>
					<li><a href="#"><?php echo $this->session->userdata('primeiro_nome'); ?></a></li>
					<li><a href="#"><?php //echo $this->session->userdata('id_face'); ?></a></li>
					<li><a href="<?php echo base_url() . 'home/logout'?>">Sair</a></li>
					<li><a href="#"><?php //echo $this->session->userdata('id_eve'); ?></a></li>
					<!-- <li><a href="#">Settings</a></li> -->
				</ul>
				
			</div>
		</div>
	</nav>
	<!-- ======================= Menu Lateral =========================== -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				<ul class="nav nav-sidebar">
					<li class="active"><a href="<?php echo base_url() . 'home'?>">Inicio <span class="sr-only">(current)</span></a></li>
					<li><a href="<?php echo base_url() . 'usuario'?>">Usuário</a></li>
					<li><a href="<?php echo base_url() . 'evento'?>">Evento</a></li>
    				<li><a href="<?php echo base_url() . 'evento/rel_evento'?>">Relatorios Evento</a></li>
					<!-- <li><a href="#">Link</a></li> -->
				</ul>

			</div>
		</div>
	</div>