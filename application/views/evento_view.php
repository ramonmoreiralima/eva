<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h3 class="page-header"><?php echo $titulo; ?></h3>
	<div class="col-md-12">
		
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
						<!-- Botão Cadastrar Novo Evento --> <a title="Editar"
						href="<?php echo base_url() . 'evento/cadastrar/'?>"
						class="btn btn-primary btn-block"
						style="background-color: #00CC00; border-color: #00CC00">Novo</a>
					</th>
					<th>
                                        <?php
                                        if($titulo <> "Meus Eventos"){ ?>
                                            <a title="Eventos Inscritos"
						href="<?php echo base_url() . 'evento/listar_inscrito/'?>"
						class="btn btn-primary btn-xs">Meus Eventos</a>
                                        <?php }
                                        ?>
					</th>
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
					<td><a title="Deletar"
						href="<?php echo base_url() . 'evento/deletar/' . $eve->id_evento; ?>"
						onclick="return confirm('Confirma a exclusão deste registro?')"
						class="btn btn-danger btn-xs">Deletar</a></td>
					<td><a title="Editar"
						href="<?php echo base_url() . 'evento/editar/' . $eve->id_evento; ?>"
						class="btn btn-primary btn-xs">Editar</a></td>
						
						
				</tr>
				<?php endforeach ?>
			  </table>
		</div>
	</div>
</div>
