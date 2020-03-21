<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h3 class="page-header"><?php echo $titulo; ?></h3>
    <div class="col-md-12">
		 <?php 
		 echo form_open('usuario/inserir', 'id="form-usuario"');   
		 //echo form_fieldset($titulo); ?>
		  	
		  	<div class="row"><!-- Inicio da linha -->
				<div class="col-md-6">
					<div class="form-group">
						<label for="nome">Nome:</label><br/>
		    			<input type="text" name="nome" class="form-control" value="<?php echo set_value('nome'); ?>"/>
		   				<div class="error"><?php echo form_error('nome'); ?></div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="email">Email:</label><br/>
		    			<input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>"/>
		    			<div class="error"><?php echo form_error('email'); ?></div>
					</div>
				</div>
			</div>
		  	<div class="row"><!-- Inicio da linha -->
		  		<div class="col-md-6">
					<div class="form-group">
						<input type="submit" name="cadastrar" class="btn btn-default" value="Cadastrar" />
					</div>
				</div>	
		  	</div>   
	    <?php 
	    echo form_fieldset_close();
	    echo form_close(); ?>
	</div>
<!-- Lista as Usuario Cadastradas -->
<div class="col-md-12">
    <table class="table table-hover">
    	<tr></tr>
    	<tr class="active">
    		<th>Id Face</th>
    		<th>Nome</th>
    		<th>Email</th>
			<th></th>
			<th></th>
    	</tr>
	<?php foreach($usuario as $usu): ?>
	<tr>
		<td> <?php echo $usu->id_face; ?> </td>
		<td> <?php echo $usu->primeiro_nome; ?> </td>
		<td> <?php echo $usu->email; ?> </td>
		<td>
	    	<a title="Deletar" href="<?php echo base_url() . 'usuario/deletar/' . $usu->id_face; ?>" onclick="return confirm('Confirma a exclusão deste registro?')" class="btn btn-danger btn-xs">Deletar</a>

	    </td>
	    <td>
	    	<a title="Editar" href="<?php echo base_url() . 'usuario/editar/' . $usu->id_face; ?>" class="btn btn-primary btn-xs">Editar</a>

	    </td>
	</tr>
	<?php endforeach ?>
    </table>
</div>
</div>
