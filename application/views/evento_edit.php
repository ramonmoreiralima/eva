
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-md-15">
        <!-- ======= TITILO TABS =========== -->    
	    <?php
			echo form_open ( 'evento/atualizar', 'id="form-evento"' );
			$tipo ="";
			$texto ="";
                        $tipo = $dados_evento[0]->tp_evento;
                        
                        if($tipo == "Fórum"){
                            $texto = "<a href='#resp-tab2' data-toggle='tab'><span class='glyphicon' ></span> Forum >> </a>";
                        }
                        if($tipo == "Congresso"){
                            $texto = "<a href='#resp-tab3' data-toggle='tab'><span class='glyphicon' ></span> Congresso >> </a>";
                        }                                                                        
                        if($tipo == "Simpósio"){
                            $texto = "<a href='#resp-tab4' data-toggle='tab'><span class='glyphicon' ></span> Simpósio >> </a>";
                        }                                                                        
                        if($tipo == "Semana Acadêmica"){
                            $texto = "<a href='#resp-tab5' data-toggle='tab'><span class='glyphicon' ></span> Semana Acadêmica >> </a>";
                        }  
                        ?>	  
                        <ul class="nav nav-tabs">
                            <div class="col-md-2"><a href='#resp-tab1' data-toggle='tab'> Evento >> </a></div>
                            <div class="col-md-2"><?php echo $texto;?></div>
						</ul> 

	        <!-- ======= TAB PRINCIPAL =========== --><br>
	      	<div class="tab-content responsive"> 
	            <!-- Inicio Tab 01 -->
	            <div class="tab-pane fade in active" id="resp-tab1">
	            
	                <div class="row"><!-- Inicio da linha -->
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <label for="nome_evento"><font class="danger">*</font> Nome:</label><br /> 
                                    <input type="text"
						class="form-control" name="nome_evento" id="nome_evento"
						value="<?php echo $dados_evento[0]->nome_evento; ?>"
						placeholder="nome_evento" required>
					<div class="error"><?php echo form_error('nome_evento'); ?></div>
	                        </div>
	                    </div>
	                    <div class="col-md-3">
	                        <div class="form-group">
	                            <label for="edicao_evento"><font class="danger">*</font> Edição:</label><br /><input type="text"
						class="form-control" name="edicao_evento" id="edicao_evento"
						value="<?php echo $dados_evento[0]->edicao_evento; ?>"
						placeholder="edicao_evento" required>
					<div class="error"><?php echo form_error('edicao_evento'); ?></div>
	                        </div>
	                    </div>
                            
	                    <div class="col-md-3">
	                        <div class="form-group">
	                            <label for="tp_evento"><font class="danger">*</font> Tipo:</label><br />
	                            <input type="text"
						class="form-control" name="tp_evento" id="tp_evento"
						value="<?php echo $dados_evento[0]->tp_evento; ?>"
						placeholder="tp_evento" required readonly="readonly" >
	                            <div class="error"><?php echo form_error('tp_evento'); ?></div>
	                        </div>
	                    </div>
                            
	                </div><!-- Fim da linha -->
	                
	                <div class="row"><!-- Inicio da linha -->
	                    <div class="col-md-3">
	                        <div class="form-group">
	                            <label for="inicio_evento"><font class="danger">*</font> Inicio:</label><br /><input type="text"
						class="form-control" name="inicio_evento" id="inicio_evento"
						value="<?php echo $dados_evento[0]->inicio_evento; ?>"
						placeholder="inicio_evento" required>
					<div class="error"><?php echo form_error('inicio_evento'); ?></div>
	                        </div>
	                    </div>
	                    <div class="col-md-3">
	                        <div class="form-group">
	                            <label for="fim_evento"><font class="danger">*</font> Fim:</label><br /><input type="text"
						class="form-control" name="fim_evento" id="fim_evento"
						value="<?php echo $dados_evento[0]->fim_evento; ?>"
						placeholder="fim_evento" required>
					<div class="error"><?php echo form_error('fim_evento'); ?></div>
	                        </div>
	                    </div>
	                    <div class="col-md-3">
	                        <div class="form-group">
	                            <label for="dia_up_mat_evento"><font class="danger">*</font> Dia Upload:</label><br /> <input
						type="text" class="form-control" name="dia_up_mat_evento"
						id="dia_up_mat_evento"
						value="<?php echo $dados_evento[0]->dia_up_mat_evento; ?>"
						placeholder="dia_up_mat_evento" required>
					<div class="error"><?php echo form_error('dia_up_mat_evento'); ?></div>
	                        </div>
	                    </div>
	                    <div class="col-md-3">
	                        <div class="form-group">
	                            <label for="ambito_evento"><font class="danger">*</font> Âmbito:</label><br />  
	                            <select class="form-control" name="ambito_evento" id="ambito_evento" required>
							<option value="<?php echo $dados_evento[0]->ambito_evento; ?>"><?php echo $dados_evento[0]->ambito_evento; ?></option>
							<option value="Regional">Regional</option>
							<option value="Nacional">Nacional</option>
							<option value="Internacional">Internacional</option>
						</select>
						<div class="error"><?php echo form_error('ambito_evento'); ?></div>
	                        </div>
	                    </div>
	                </div><!-- Fim da linha -->
	                
	                <div class="row"><!-- Inicio da linha -->
	                    <div class="col-md-4">
	                        <div class="form-group">
	                            <label for="area_evento"><font class="danger">*</font> Área:</label><br /> <select class="form-control"
						name="area_evento" id="area_evento" required>
						<option value="<?php echo $dados_evento[0]->area_evento; ?>"><?php echo $dados_evento[0]->area_evento; ?></option>
					  			<?php echo $area; ?>
							</select>
					<div class="error"><?php echo form_error('area_evento'); ?></div>
	                        </div>
	                    </div>
	                    <div class="col-md-8">
	                        <div class="form-group">
	                            <label for="link_evento">Link:</label><br /> <input type="text"
						class="form-control" name="link_evento" id="link_evento"
						value="<?php echo $dados_evento[0]->link_evento; ?>"
						placeholder="Link">
					<div class="error"><?php echo form_error('link_evento'); ?></div>
	                        </div>
	                    </div>
	                </div><!-- Fim da linha -->
	                
	                <div class="row"><!-- Inicio da linha -->
	                    <div class="col-md-4">
	                        <div class="form-group">
	                            <label for="cnpj_evento"><font class="danger">*</font> Cnpj:</label><br /> <input type="text"
						class="form-control" name="cnpj_evento" id="cnpj_evento"
						value="<?php echo $dados_evento[0]->cnpj_evento; ?>"
						placeholder="Imagem" required>
					<div class="error"><?php echo form_error('cnpj_evento'); ?></div>
	                        </div>
	                    </div>
	                    <div class="col-md-5">
	                        <div class="form-group">
	                            <label for="img_evento"><font class="danger">*</font> Imagem:</label><br /><input type="text"
						class="form-control" name="img_evento" id="img_evento"
						value="<?php echo $dados_evento[0]->img_evento; ?>"
						placeholder="Imagem" required>
					<div class="error"><?php echo form_error('img_evento'); ?></div>
	                        </div>
	                    </div>
	                    <div class="col-md-3">
	                        <div class="form-group">
	                            <label for="status_evento"><font class="danger">*</font> Status:</label><br />
	                            <select class="form-control" name="status_evento" id="tp_evento" required >
	                               <option value="<?php echo $dados_evento[0]->status_evento; ?>"><?php echo $dados_evento[0]->status_evento; ?></option>
					<option value="Pendente">Pendente</option>
					<option value="Ativo">Ativo</option>
					<option value="Cancelado">Cancelado</option>
					<option value="Finalizado">Finalizado</option>
	                            </select>
	                            <div class="error"><?php echo form_error('status_evento'); ?></div>
	                        </div>
	                    </div>
	                </div><!-- Fim da linha -->

	            </div> <!-- ======= FIM PRINCIPAL =========== --> 
								
				<!-- ============ BOTAO NEXT =============== -->
				
				<!-- ========= INICIO TABS SECUNDARIAS ========== -->
				 <?php     
                 if($tipo == "Fórum"){ ?>
                 	<!-- Inicio Tab Forum --> 
		            <div class="tab-pane" id="resp-tab2">
		                
		                <div class="row">
		                    <div class="col-md-4">
		                        <div class="form-group">
		                            <label for="regulamento_forum">Regulamento:</label><br />
		                            <input type="text"
							class="form-control" name="regulamento_forum" id="regulamento_forum"
							value="<?php echo $dados_forum[0]->regulamento_forum; ?>"
							placeholder="regulamento_forum" >
		                            <div class="error"><?php echo form_error('regulamento_forum'); ?></div>
		                            
		                        </div>
		                    </div>
		                    <div class="col-md-8">
		                        <div class="form-group">
		                            <label for="conclusao_forum">Conclusão</label><br />
		                            <input type="text"
							class="form-control" name="conclusao_forum" id="conclusao_forum"
							value="<?php echo $dados_forum[0]->conclusao_forum; ?>"
							placeholder="conclusao_forum" >
		                            <div class="error"><?php echo form_error('conclusao_forum'); ?></div>
		                           
		                        </div>
		                    </div>
		                </div>
		                
		            </div>
                 <?php }
                 if($tipo == "Congresso"){ ?>
                 	<!-- Inicio Tab Congresso --> 
		            <div class="tab-pane" id="resp-tab3">
		                
		                <div class="row">
		                    <div class="col-md-4">
		                        <div class="form-group">
		                            <label for="ata_congresso">Ata:</label><br />
		                            <input type="text"
							class="form-control" name="ata_congresso" id="ata_congresso"
							value="<?php echo $dados_congresso[0]->ata_congresso; ?>"
							placeholder="ata_congresso" >
		                            <div class="error"><?php echo form_error('ata_congresso'); ?></div>
		                        </div>
		                    </div>
		                </div>
		                
		            </div>
                 <?php }                                                                        
                 if($tipo == "Simpósio"){ ?>
	                <!-- Inicio Tab Simposio --> 
		            <div class="tab-pane" id="resp-tab4">
		                
		                <div class="row">
		                    <div class="col-md-4">
		                        <div class="form-group">
		                            <label for="impressao_simposio">Impressão:</label><br />
		                            <input type="text" class="form-control" name="impressao_simposio" id="impressao_simposio" value="<?php echo $dados_simposio[0]->impressao_simposio; ?>" placeholder="impressao_simposio" >
		                            <div class="error"><?php echo form_error('impressao_simposio'); ?></div>
		                            
		                        </div>
		                    </div>
		                </div>
		                
		            </div>
                 <?php }                                                                        
                 if($tipo == "Semana Acadêmica"){ ?>
                 	<!-- Inicio Tab Semana Acadêmica --> 
		            <div class="tab-pane" id="resp-tab5">
		                
		                <div class="row">
		                    <div class="col-md-4">
		                        <div class="form-group">
		                            <label for="categoria">Categoria: </label><br />
		                            <select class="form-control" name="categoria" > 
		                                <option value="<?php echo $dados_semana_academica[0]->categoria; ?>"><?php echo $dados_semana_academica[0]->categoria; ?></option>
	                                        <option value="Técnica">Técnica</option>
	                                        <option value="Científica">Científica</option>
	                                        <option value="Estudantil">Estudantil</option>
		                            </select>
		                        </div>
		                    </div>
		                </div>
		                
	            </div>
                 <?php } ?>	

	        </div>
	         <!-- ============ FIM TABS SECUNDARIAS=============== -->
	         
			 <button type="submit" class="btn btn-success">Enviar</button>
			 <button type="reset" class="btn btn-default">Cancelar</button>
			 <a title="Voltar" href="<?php echo base_url() . 'evento'; ?>" class="btn btn-default">Voltar</a>		
	    <?php
			echo form_close ();
		?>

    </div>
</div>

