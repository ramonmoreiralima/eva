
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<div class="col-md-10">
		<h1 class="page-header">Novo Usuario</h1>
			<label for="titulo">Titulo:</label> <?php echo $titulo; ?>
	</div>
	 
	<div class="col-md-12">
		<?php echo form_open('usuario/atualizar', 'id="form-usuario"'); ?>
		<input type="hidden" name="id_face" value="<?php echo $dados_usuario[0]->id_face; ?>"/>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
			    		<label for="nome">Nome</label>
			    		<input type="text" class="form-control" name="primeiro_nome" id="primeiro_nome" value="<?php echo $dados_usuario[0]->primeiro_nome; ?>" placeholder="Primeiro Nome" required >
			  			<div class="error"><?php echo form_error('primeiro_nome'); ?></div>
			  		</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
			    		<label for="nome">Ultimo Nome</label>
			    		<input type="text" class="form-control" name="ultimo_nome" id="ultimo_nome" value="<?php echo $dados_usuario[0]->ultimo_nome; ?>" placeholder="Ultimo Nome" required >
			  			<div class="error"><?php echo form_error('ultimo_nome'); ?></div>
			  		</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
				    	<label for="email">Email address</label>
				    	<input type="text" class="form-control" name="email" id="email" value="<?php echo $dados_usuario[0]->email; ?>" placeholder="Email" required >
				  		<div class="error"><?php echo form_error('email'); ?></div>
				  	</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<button type="submit" class="btn btn-success">Enviar</button>
					<button type="reset" class="btn btn-default">Cancelar</button>
				</div>
			</div>
		<?php echo form_close(); ?>
	</div>
</div>
