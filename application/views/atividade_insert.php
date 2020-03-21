

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<div class="col-md-12">
		 <?php
			echo form_open ( 'atividade/inserir', 'id="form-atividade"' );
			?>
			
			<!-- ============= TITULO TAB ============= -->
			<ul class="nav nav-tabs">
			  	<div class="col-md-2"><a href="#resp-tab1" data-toggle="tab"> Atividade >> </a></div>
			   	<div class="col-md-8"><div id="box"></div></div>
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
								<input type="text" class="form-control" name="nome_atividade" id="nome_atividade" placeholder="Nome"required>
								<div class="error"><?php echo form_error('nome_atividade'); ?></div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="data_atividade"><font class="danger">*</font> Data</label>
								 <input type="text" class="form-control" name="data_atividade" id="data_atividade" placeholder="Data" required>
								<div class="error"><?php echo form_error('data_atividade'); ?></div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="input-group date" id="datetimepicker3"><!-- class="datepicker" -->
								<label for="hora_atividade"><font class="danger">*</font> Hora</label> 
								<input type="text" class="form-control" name="hora_atividade" id="hora_atividade" placeholder="Hora" required>
								<div class="error"><?php echo form_error('hora_atividade'); ?></div>
							</div>
							
						</div>
					</div><!-- Fim da linha -->

				    <div class="row"><!-- Inicio da linha -->
						<div class="col-md-6">
							<div class="form-group">
								<label for="desc_atividade">Descrição</label> 
								<textarea class="form-control" name="desc_atividade" id="desc_atividade" rows="4" cols="50" placeholder="Descrição"></textarea>
								<div class="error"><?php echo form_error('desc_atividade'); ?></div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label for="tp_atividade"><font class="danger">*</font> Tipo Atividade</label>
								<select class="form-control" name="tp_atividade" id="tp_atividade" required>
									<option value="#">-- Selecione --</option>
									<option value="Deb Aberto">Deb Aberto</option>
									<option value="Deb Fechado">Deb Fechado</option>
									<option value="Curso">Curso</option>
								</select>
								<div class="error"><?php echo form_error('tp_atividade'); ?></div>
							</div>
						</div>
						 
						<div class="col-md-2">
							<div class="form-group">
								<label for="vagas_atividade"><font class="danger">*</font> Vagas</label>
								<input type="text" class="form-control" name="vagas_atividade" id="vagas_atividade" placeholder="Vagas" required>
								<div class="error"><?php echo form_error('vagas_atividade'); ?></div>
							</div>
						</div>
					</div><!-- Fim da linha -->
					
					<div class="row"><!-- Inicio da linha -->
						
						<div class="col-md-8">
							<div class="form-group">
								<label for="link_atividade"><font class="danger">*</font> Link</label> 
								<input type="text" class="form-control" name="link_atividade" id="link_atividade" placeholder="Link" required>
								<div class="error"><?php echo form_error('link_atividade'); ?></div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="status_atividade"><font class="danger">*</font> Status</label>
								<select class="form-control" name="status_atividade" id="status_atividade" required>
									<option value="Ativo">Ativo</option>
									<option value="Pendente">Pendente</option>
									<option value="Cancelado">Cancelado</option>
									<option value="Finalizado">Finalizado</option>
								</select>
								<div class="error"><?php echo form_error('status_atividade'); ?></div>
							</div>
						</div>
						
					</div><!-- Fim da linha -->
					
	            </div>
	        </div>
	        	       
	        	       
	       <div class="tab-content responsive"> 
	             
	        <!-- ============ INICIO TABS SECUNDARIAS =============== -->
	        <!-- Inicio Tab Deb Aberto --> 
	        <div class="tab-pane" id="resp-tab2">
	                
	                <div class="row">
	                    <div class="col-md-4">
	                        <div class="form-group">
	                            <label for="tp_deb_aberto">Modalidade:</label><br />
	                            <select class="form-control" name="tp_deb_aberto" id="tp_deb_aberto">
									<option value="">--Selecione--</option>
									<option value="Palestra">Palestra</option>
									<option value="Painel">Painel</option>
									<option value="Encontro">Encontro</option>
								</select>
	                        </div>
	                    </div>
	                </div>
	                
	         </div>
	            
	         <!-- Inicio Tab Deb Fechado --> 
	         <div class="tab-pane" id="resp-tab3">
	                
	                <div class="row">
	                    <div class="col-md-4">
	                        <div class="form-group">
	                            <label for="tp_deb_fechado">Modalidade:</label><br />
	                           	<select class="form-control" name="tp_deb_fechado" id="tp_deb_fechado">
									<option value="">--Selecione--</option>
									<option value="Mesa Redonda">Mesa Redonda</option>
									<option value="Conferência">Conferência</option>
								</select>
	                        </div>
	                    </div>
	                    <div class="col-md-4">
	                        <div class="form-group">
	                            <label for="id_face">Id Face Usuario</label><br />
	                            <input type="text" name="id_face" class="form-control" />
	                           
	                        </div>
	                    </div>
	                </div>
	                
	         </div>
	            
	         <!-- Inicio Tab Curso --> 
	         <div class="tab-pane" id="resp-tab4">
	                
	                <div class="row">
	                    <div class="col-md-4">
	                        <div class="form-group">
	                            <label for="pre_requisito">Pre Requisito</label><br />
	                            <input type="text" name="pre_requisito" class="form-control" />
	                            
	                        </div>
	                    </div>
	                </div>
	                
	         </div>
			 <!-- ============ FIM TABS SECUNDARIAS=============== -->
			<a class="btn btn-large btn-primary" onclick="buscar($('#tp_atividade').val())" > Avançar >></a> 
			<input type="submit" name="cadastrar" class="btn btn-default" value="Cadastrar" />	
			
		<?php
			echo form_close ();
		?>
		</div><!-- Fim da linha -->
			
	</div>
		</div>
 <script>
            function buscar(tipo)
            {                //disabledTab
            	 //$("p").removeClass("test-class");
            	//ajax.open("POST", "cidades.php", true);
       		 	//ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
       		 	//texto = "<a href='#resp-tab1' data-toggle='tab'> Deb Aberto >> </a>";
                if(tipo == "Deb Aberto"){
                    texto = "<a href='#resp-tab2' data-toggle='tab'> Deb Aberto >> </a>";
                }
                if(tipo == "Deb Fechado"){
                	texto = "<a href='#resp-tab3' data-toggle='tab'> Deb Fechado >> </a>";
                }                                                                        
                if(tipo == "Curso"){
                	texto = "<a href='#resp-tab4' data-toggle='tab'> Curso >> </a>";
                }                                                                        
                                                                                     
                //alert(texto)
                $("#box").html(texto);
            }
            
        </script>