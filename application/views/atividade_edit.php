<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<div class="col-md-12">
		  <!-- ======= TITILO TABS =========== -->    
	    <?php
			echo form_open ( 'atividade/atualizar', 'id="form-atividade"' );
						$id_evento = $this->session->userdata('id_eve');
						$texto ="";
                        $tipo = $dados_atividade[0]->tp_atividade;
                        
                        if($tipo == "Deb Aberto"){
                            $texto = "<a href='#resp-tab2' data-toggle='tab'><span class='glyphicon' ></span> Deb Aberto >> </a>";
                        }
                        if($tipo == "Deb Fechado"){
                            $texto = "<a href='#resp-tab3' data-toggle='tab'><span class='glyphicon' ></span> Deb Fechado >> </a>";
                        }                                                                        
                        if($tipo == "Curso"){
                            $texto = "<a href='#resp-tab4' data-toggle='tab'><span class='glyphicon' ></span> Curso >> </a>";
                        }                                                                        
                        ?>	  
			<!-- ============= TITULO TAB ============= -->
			<ul class="nav nav-tabs">
                            <div class="col-md-2"><a href='#resp-tab1' data-toggle='tab'> Atividade >> </a></div>
                            <div class="col-md-2"><?php echo $texto;?></div>
			</ul> 
			<!-- ============= TAB PRINCIPAL ============= --><br>
	      <div class="tab-content responsive"> 
	            <!-- Inicio Tab 01 -->
	            <div class="tab-pane fade in active" id="resp-tab1">
	            
					<div class="row"><!-- Inicio da linha -->
						<!-- Inicio da linha -->
						<div class="col-md-6">
							<div class="form-group">
								<label for="nome_atividade"><font class="danger">*</font> Nome</label> 
								<input type="text" class="form-control" name="nome_atividade" id="nome_atividade" value="<?php echo $dados_atividade[0]->nome_atividade; ?>" placeholder="nome_atividade" required>
					<div class="error"><?php echo form_error('nome_atividade'); ?></div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="data_atividade"><font class="danger">*</font> Data</label>
								<input type="text" class="form-control" name="data_atividade" id="data_atividade" value="<?php echo $dados_atividade[0]->data_atividade; ?>" placeholder="data_atividade" required>			
								<div class="error"><?php echo form_error('data_atividade'); ?></div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="input-group date" id="datetimepicker3"><!-- class="datepicker" -->
								<label for="hora_atividade"><font class="danger">*</font> Hora</label> 
								<input type="text" class="form-control" name="hora_atividade" id="hora_atividade" value="<?php echo $dados_atividade[0]->hora_atividade; ?>" placeholder="hora_atividade" required>
								<div class="error"><?php echo form_error('hora_atividade'); ?></div>
							</div>
							
						</div>
					</div><!-- Fim da linha -->

				    <div class="row"><!-- Inicio da linha -->
						<div class="col-md-6">
							<div class="form-group">
								<label for="desc_atividade">Descrição</label> 
								<textarea class="form-control" name="desc_atividade" id="desc_atividade" rows="4" cols="50" placeholder="Descrição"><?php echo $dados_atividade[0]->desc_atividade; ?></textarea>
								<div class="error"><?php echo form_error('desc_atividade'); ?></div>
							</div>
						</div>
						
						<div class="col-md-4">
	                        <div class="form-group">
	                            <label for="tp_evento"><font class="danger">*</font> Tipo:</label><br />
	                            <input type="text"
						class="form-control" name="tp_atividade" id="tp_atividade"
						value="<?php echo $dados_atividade[0]->tp_atividade; ?>"
						placeholder="tp_evento" required readonly="readonly" >
	                            <div class="error"><?php echo form_error('tp_atividade'); ?></div>
	                        </div>
	                    </div>
						 
						<div class="col-md-2">
							<div class="form-group">
								<label for="vagas_atividade"><font class="danger">*</font> Vagas</label>
								<input type="text" class="form-control" name="vagas_atividade" id="vagas_atividade" value="<?php echo $dados_atividade[0]->vagas_atividade; ?>" placeholder="vagas_atividade" required>
								<div class="error"><?php echo form_error('vagas_atividade'); ?></div>
							</div>
						</div>
					</div><!-- Fim da linha -->
					
					<div class="row"><!-- Inicio da linha -->
						
						<div class="col-md-8">
							<div class="form-group">
								<label for="link_atividade"><font class="danger">*</font> Link</label> 
								<input type="text" class="form-control" name="link_atividade" id="link_atividade" value="<?php echo $dados_atividade[0]->link_atividade; ?>" placeholder="link_atividade" required>							
								<div class="error"><?php echo form_error('link_atividade'); ?></div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="status_atividade"><font class="danger">*</font> Status</label>
								<select class="form-control" name="status_atividade" id="status_atividade" required>
									<option value="<?php echo $dados_atividade[0]->status_atividade; ?>"><?php echo $dados_atividade[0]->status_atividade; ?></option>
									<option value="Ativa">Ativa</option>
									<option value="Cancelada">Cancelada</option>
								</select>
								<div class="error"><?php echo form_error('status_atividade'); ?></div>
							</div>
						</div>
						
					</div><!-- Fim da linha -->
					
	            </div>
	        </div>
	        	       
	        	       
	       <div class="tab-content responsive"> 
	             
	        <!-- ============ INICIO TABS SECUNDARIAS =============== -->
	        <?php     
            if($tipo == "Deb Aberto"){ ?>
		        <!-- Inicio Tab Deb Aberto --> 
		        <div class="tab-pane" id="resp-tab2">
		                
		                <div class="row">
		                    <div class="col-md-4">
		                        <div class="form-group">
		                            <label for="tp_deb_aberto">Deb Aberto:</label><br />
		                            <input type="text" class="form-control" name="tp_deb_aberto" id="tp_deb_aberto" value="<?php echo $dados_deb_aberto[0]->tp_deb_aberto; ?>" placeholder="tp_deb_aberto" >
		                        	<div class="error"><?php echo form_error('tp_deb_aberto'); ?></div>
		                        </div>
		                    </div>
		                </div>
		                
		         </div>
		         <?php }
                 if($tipo == "Deb Fechado"){ ?>   
		         <!-- Inicio Tab Deb Fechado --> 
		         <div class="tab-pane" id="resp-tab3">
		                
		                <div class="row">
		                    <div class="col-md-4">
		                        <div class="form-group">
		                            <label for="tp_deb_fechado">Tipo:</label><br />
		                            <input type="text" class="form-control" name="tp_deb_fechado" id="tp_deb_fechado" value="<?php echo $dados_deb_fechado[0]->tp_deb_fechado; ?>" placeholder="tp_deb_fechado" >
		                            <div class="error"><?php echo form_error('tp_deb_fechado'); ?></div>
		                        </div>
		                    </div>
		                    <div class="col-md-4">
		                        <div class="form-group">
		                            <label for="id_face">Id Face Usuario</label><br />
		                            <input type="text" class="form-control" name="id_face" id="id_face" value="<?php echo $dados_deb_fechado[0]->id_face; ?>" placeholder="id_face" >
		                            <div class="error"><?php echo form_error('id_face'); ?></div>
		                           
		                        </div>
		                    </div>
		                </div>
		                
		         </div>
		         <?php }
                 if($tipo == "Curso"){ ?>   
		         <!-- Inicio Tab Curso --> 
		         <div class="tab-pane" id="resp-tab4">
		                
		                <div class="row">
		                    <div class="col-md-4">
		                        <div class="form-group">
		                            <label for="pre_requisito">Pre Requisito</label><br />
		                            <input type="text" class="form-control" name="pre_requisito" id="pre_requisito" value="<?php echo $dados_curso[0]->pre_requisito; ?>" placeholder="pre_requisito">
		                        </div>
		                    </div>
		                </div>
		                
		         </div>
		        <?php } ?>
			 <!-- ============ FIM TABS SECUNDARIAS=============== -->
			<button type="submit" class="btn btn-success">Enviar</button>
			<button type="reset" class="btn btn-default">Cancelar</button>
			<a title="Deletar" href="<?php echo base_url() . 'atividade/listar/' . $id_evento; ?>" class="btn btn-default">Voltar</a>
			
		<?php
			echo form_close ();
		?>
		</div><!-- Fim da linha -->
			
	</div>
</div>
 