<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h3 class="page-header"><?php echo $titulo; ?></h3>
	<div class="col-md-12">
		
		<!-- Lista as Eventos Cadastradas -->
		<div class="col-md-12">
			<table class="table table-hover">
				<tr class="active">
					<th>Cod</th>
					<th>Nome</th>
					<th>Edição</th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
				<?php foreach($evento as $eve): ?>
				<tr>
					<td> <?php echo $eve->id_evento; ?> </td>
					<td> <?php echo $eve->nome_evento; ?> </td>
					<td> <?php echo $eve->edicao_evento; ?> </td>
					<td><a title="Relatorio"
							href="<?php echo base_url() . 'evento/rel_part_evento/' .  $eve->id_evento; ?>"
							class="btn btn-primary btn-xs">Relatorio Participantes Evento</a>
					</td>
					<td><a title="Relatorio"
							href="<?php echo base_url() . 'evento/rel_ativ_total_expec/' .  $eve->id_evento; ?>"
							class="btn btn-primary btn-xs">Relatorio Atividades com Total Expectadores</a>
					</td>
					<td><a title="Relatorio"
							href="<?php echo base_url() . 'evento/rel_gasto_evento/' .  $eve->id_evento; ?>"
							class="btn btn-primary btn-xs">Relatorio Gastos por Evento</a>
					</td>
				</tr>
				<?php endforeach ?>
			  </table>
		</div>
	</div>
</div>
