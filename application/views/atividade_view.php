<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h3 class="page-header"><?php echo $titulo; ?></h3>
        <?php// $botao = $data ['status_botao'];?>
	<div class="col-md-12">
		<!-- Lista as Eventos Cadastradas -->
		<div class="col-md-12">
			<table class="table table-hover">
				<tr>
				
				<tr class="active">
					<th>Id Atividade</th>
					<th>Nome</th>
					<th>Data</th>
					<th>Hora</th>
					<th>Status</th>
                                        <th>--</th>
                                        <th>--</th>
					<th>
						<!-- Botão Cadastrar Nova Atividade --> 
						<a title="Novo" href="<?php echo base_url() . 'atividade/cadastrar/';?>" class="btn btn-primary btn-block" style="background-color: #00CC00; border-color: #00CC00">Novo</a>
					</th>
					<th>
                                        <?php if($titulo <> "Minhas Atividades"){ ?>
                                            <a title="Atividade Inscrita"
						href="<?php echo base_url() . 'atividade/listar_inscrito/'.$this->session->userdata('id_eve');?>"
						class="btn btn-primary btn-xs">Minhas Atividades</a>
                                        <?php }
                                        ?>
					</th>
                                        
				</tr>
				<?php foreach($atividade as $ativ): ?>
				<tr>
					<td> <?php echo $ativ->id_atividade; ?> </td>
					<td> <?php echo $ativ->nome_atividade; ?> </td>
					<td> <?php echo $ativ->data_atividade; ?> </td>
					<td> <?php echo $ativ->hora_atividade; ?> </td>
					<td> <?php echo $ativ->status_atividade; ?> </td>
                                        				
					
					<td><a title="Deletar"
						href="<?php echo base_url() . 'atividade/deletar/' . $ativ->id_atividade; ?>"
						onclick="return confirm('Confirma a exclusão deste registro?')"
						class="btn btn-danger btn-xs">Deletar</a></td>
					<td><a title="Editar"
						href="<?php echo base_url() . 'atividade/editar/' . $ativ->id_atividade; ?>"
						class="btn btn-primary btn-xs">Editar</a></td>
                                        <td>     
                                        <?php if( $titulo == "Atividades Disponiveis Para Inscricao"){ ?>
                                            <a title="Inscrever-se"
						href="<?php echo base_url() . 'evento/inscricao/' . $ativ->id_atividade; ?>"
						class="btn btn-primary btn-xs">Inscrever-se</a>
                                        <?php } else{?>
                                            <td><a title="Desinscrever"
                                                    href="<?php echo base_url() . 'evento/desinscricao/' . $ativ->id_atividade; ?>"
                                                    class="btn btn-primary btn-xs">Desinscrever</a></td>
                                        <?php
                                        
                                        }?> </td>

				</tr>
				<?php endforeach ?>
				
			  </table>
		</div>
	</div>
	<!-- <ul class="nav nav-tabs responsive" id="myTab">
  		<li class="active"><a href="#home">Home</a></li>
  		<li><a href="#profile">Profile</a></li>
  		<li><a href="#messages">Messages</a></li>
	</ul>

	<div class="tab-content responsive">
	  <div class="tab-pane active" id="home">...content1...</div>
	  <div class="tab-pane" id="profile">...conten2t...</div>
	  <div class="tab-pane" id="messages">...content3...</div>
	</div>
	 -->

</div>
