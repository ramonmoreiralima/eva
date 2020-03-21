<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h3 class="page-header"><?php echo $titulo; ?></h3>
	<div class="col-md-12">
		<div class="row placeholders">
			<?php foreach($evento1 as $eve): ?>
				<!-- Lista de imagens Evento (BOLINHA) -->
				<div class="col-xs-6 col-sm-3 placeholder">
					<a title="Atividade" href="<?php echo base_url() . 'atividade/listar/' . $eve->id_evento; ?>" >
						<img src="<?php echo base_url() . 'public/img_upload/' . $eve->img_evento; ?>" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
					</a>
					<h4><?php echo $eve->nome_evento; ?></h4>
					
				</div>
				<!-- Fim da Lista de imagens Evento -->
			<?php endforeach ?>
				
			</div>
		<!-- Lista as Eventos Cadastradas -->
		<div class="col-md-12">
			<table class="table table-hover">
				<tr></tr>
				<tr class="active">
					<th>Nome</th>
					<th>Edição</th>
					<th>Status</th>
					<th>Inicio</th>
					<th>Fim</th>
					<th>
						
					</th>
					<th></th>
					<th></th>
				</tr>
				<?php foreach($evento as $eve): ?>
				<tr>
					<td> <?php echo $eve->nome_evento; ?> </td>
					<td> <?php echo $eve->edicao_evento; ?> </td>
					<td> <?php echo $eve->status_evento; ?> </td>
					<td> <?php echo $eve->inicio_evento; ?> </td>
					<td> <?php echo $eve->fim_evento; ?> </td>
					
					<td><a title="Explorar"
						href="<?php echo base_url() . 'atividade/listar_nao_inscrito/' . $eve->id_evento; ?>"
						class="btn btn-primary btn-xs">Explorar</a></td>
					
						
						
				</tr>
				<?php endforeach ?>
			  </table>
		</div>
	</div>
</div>
