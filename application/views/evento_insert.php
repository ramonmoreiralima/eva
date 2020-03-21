
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-md-15">
        
	    <?php
			echo form_open ( 'evento/inserir', 'id="form-evento"' );
		?>
	        <!-- Titulo das Abas da TABs-->	
		
			<!-- =============== TIULO TABS ================ 
		 	<div class=" table table-hover " id="myTab"> 
		        <div class="row">
		        	<div class="col-md-2 ">
		            	<a href="#resp-tab1" data-toggle="tab"> Evento >> </a>
		            </div>
		            <div class="col-md-4">
		                <div id="box"></div>
		            </div>
		                    
		    	</div>
		    </div> -->
		    <!-- ============= TITULO TAB ============= -->
		     <ul class="nav nav-tabs">
			  	<div class="col-md-2"><a href="#resp-tab1" data-toggle="tab"> Evento >> </a></div>
			   	<div class="col-md-8"><div id="box"></div></div>
			</ul> 
		    
		   <!--  
		   <ul class="nav nav-tabs">
			  <li class="active"><a href="#resp-tab1" data-toggle="tab"> Evento >> </a></li>
			  <li><a href='#resp-tab3' data-toggle='tab'><span class='glyphicon' ></span> Congresso >> </a></li>
			  <li><a href='#resp-tab4' data-toggle='tab'><span class='glyphicon' ></span> Simpósio >> </a></li>
			  <li><a href='#resp-tab5' data-toggle='tab'><span class='glyphicon' ></span> Semana Acadêmica >> </a></li>
			</ul>  -->

		    <!-- <ul class="nav nav-tabs" id="myTab">
		  		<li class="active"><a href="#resp-tab1" data-toggle="tab"> Evento >> </a></li>
		  		<li><a href='#resp-tab2' data-toggle='tab'><span class='glyphicon' ></span> Forum >> </a></li>
		  		<li><a href='#resp-tab3' data-toggle='tab'><span class='glyphicon' ></span> Congresso >> </a></li>
		  		<li><a href='#resp-tab4' data-toggle='tab'><span class='glyphicon' ></span> Simpósio >> </a></li>
		  		<li><a href='#resp-tab5' data-toggle='tab'><span class='glyphicon' ></span> Semana Acadêmica >> </a></li>
			</ul> -->
	        <!-- ============= TAB PRINCIPAL ============= --><br>
	      	<div class="tab-content responsive"> 
	            <!-- Inicio Tab 01 -->
	            <div class="tab-pane fade in active" id="resp-tab1">
	            
	                <div class="row"><!-- Inicio da linha -->
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <label for="nome_evento"><font class="danger">*</font> Nome:</label><br /> <input type="text" name="nome_evento" class="form-control" />
	                            <div class="error"><?php echo form_error('nome_evento'); ?></div>
	                        </div>
	                    </div>
	                    <div class="col-md-3">
	                        <div class="form-group">
	                            <label for="edicao_evento"><font class="danger">*</font> Edição:</label><br /> <input type="text" name="edicao_evento" class="form-control" />
	                            <div class="error"><?php echo form_error('edicao_evento'); ?></div>
	                        </div>
	                    </div>
	                    <div class="col-md-3">
	                        <div class="form-group">
	                            <label for="tp_evento"><font class="danger">*</font> Tipo:</label><br />
	                            <select class="form-control" name="tp_evento" id="tp_evento" required >
	                                <option value="#">--Selecione--</option>
									<option value="Fórum">Fórum</option>
									<option value="Congresso">Congresso</option>
									<option value="Simpósio">Simpósio</option>
									<option value="Semana Acadêmica">Semana Acadêmica</option>
	                            </select>
	                            <div class="error"><?php echo form_error('tp_evento'); ?></div>
	                        </div>
	                    </div>
	                </div><!-- Fim da linha -->
	                
	                <div class="row"><!-- Inicio da linha -->
	                    <div class="col-md-3">
	                        <div class="form-group">
	                            <label for="inicio_evento"><font class="danger">*</font> Inicio:</label><br /> <input type="text" name="inicio_evento" id="inicio_evento" class="form-control" />
	                            <div class="error"><?php echo form_error('inicio_evento'); ?></div>
	                        </div>
	                    </div>
	                    <div class="col-md-3">
	                        <div class="form-group">
	                            <label for="fim_evento"><font class="danger">*</font> Fim:</label><br /> <input type="text" name="fim_evento" id="fim_evento" class="form-control" />
	                            <div class="error"><?php echo form_error('fim_evento'); ?></div>
	                        </div>
	                    </div>
	                    <div class="col-md-3">
	                        <div class="form-group">
	                            <label for="dia_up_mat_evento"><font class="danger">*</font> Dia Upload:</label><br /> <input type="text" name="dia_up_mat_evento" id="dia_up_mat_evento" class="form-control" />
	                            <div class="error"><?php echo form_error('dia_up_mat_evento'); ?></div>
	                        </div>
	                    </div>
	                    <div class="col-md-3">
	                        <div class="form-group">
	                            <label for="ambito_evento"><font class="danger">*</font> Âmbito:</label><br />
	                            <select class="form-control" name="ambito_evento" id="ambito_evento" required >
	                                <option value="">--Selecione--</option>
									<option value="Internacional">Internacional</option>
									<option value="Nacional">Nacional</option>
									<option value="Regional">Regional</option>
									<option value="Local">Local</option>
	                            </select>
	                            <div class="error"><?php echo form_error('ambito_evento'); ?></div>
	                        </div>
	                    </div>
	                </div><!-- Fim da linha -->
	                
	                <div class="row"><!-- Inicio da linha -->
	                    <div class="col-md-4">
	                        <div class="form-group">
	                            <label for="area_evento"><font class="danger">*</font> Área:</label><br /> <input type="text" name="area_evento" class="form-control" />
	                            <div class="error"><?php echo form_error('area_evento'); ?></div>
	                        </div>
	                    </div>
	                    <div class="col-md-8">
	                        <div class="form-group">
	                            <label for="link_evento">Link:</label><br /> <input type="text" name="link_evento" class="form-control" />
	                            <div class="error"><?php echo form_error('link_evento'); ?></div>
	                        </div>
	                    </div>
	                </div><!-- Fim da linha -->
	                
	                <div class="row"><!-- Inicio da linha -->
	                    <div class="col-md-4">
	                        <div class="form-group">
	                            <label for="cnpj_evento"><font class="danger">*</font> Cnpj:</label><br /> <input type="text" name="cnpj_evento" class="form-control" />
	                            <div class="error"><?php echo form_error('cnpj_evento'); ?></div>
	                        </div>
	                    </div>
	                    <div class="col-md-5">
	                        <div class="form-group">
	                            <label for="img_evento">Imagem:</label><br /> <input type="text" name="img_evento" class="form-control" />
	                            <div class="error"><?php echo form_error('img_evento'); ?></div>
	                        </div>
	                    </div>
	                    <div class="col-md-3">
	                        <div class="form-group">
	                            <label for="status_evento"><font class="danger">*</font> Status:</label><br /> 
	                            <select class="form-control" name="status_evento" id="status_evento" required >
	                                <option value="">--Selecione--</option>
									<option value="Fórum">Pendente</option>
									<option value="Congresso">Ativo</option>
									<option value="Simpósio">Cancelado</option>
									<option value="Semana Acadêmica">Finalizado</option>
	                            </select>
	                            <div class="error"><?php echo form_error('status_evento'); ?></div>
	                        </div>
	                    </div>
	                </div><!-- Fim da linha -->
	                <!-- ============= FIM TAB PRINCIPAL ============= -->
				
	                
	            </div>  
					
					
				<!-- ============ BOTAO NEXT =============== -->
				
				<!-- ============ INICIO TABS SECUNDARIAS =============== -->
	            <!-- Inicio Tab Forum --> 
	            <div class="tab-pane" id="resp-tab2">
	                
	                <div class="row">
	                    <div class="col-md-4">
	                        <div class="form-group">
	                            <label for="regulamento_forum">Regulamento:</label><br />
	                            <input type="text" name="regulamento_forum" class="form-control" />
	                            
	                        </div>
	                    </div>
	                    <div class="col-md-8">
	                        <div class="form-group">
	                            <label for="conclusao_forum">Conclusão</label><br />
	                            <input type="text" name="conclusao_forum" class="form-control" />
	                           
	                        </div>
	                    </div>
	                </div>
	                
	            </div>
	            
	            <!-- Inicio Tab Congresso --> 
	            <div class="tab-pane" id="resp-tab3">
	                
	                <div class="row">
	                    <div class="col-md-4">
	                        <div class="form-group">
	                            <label for="ata_congresso">Ata:</label><br />
	                            <input type="text" name="ata_congresso" class="form-control" />
	                           
	                        </div>
	                    </div>
	                </div>
	                
	            </div>
	            
	            <!-- Inicio Tab Simposio --> 
	            <div class="tab-pane" id="resp-tab4">
	                
	                <div class="row">
	                    <div class="col-md-4">
	                        <div class="form-group">
	                            <label for="impressao_simposio">Impressão:</label><br />
	                            <input type="text" name="impressao_simposio" class="form-control" />
	                            
	                        </div>
	                    </div>
	                </div>
	                
	            </div>
	           
	            <!-- Inicio Tab Semana Acadêmica --> 
	            <div class="tab-pane" id="resp-tab5">
	                
	                <div class="row">
	                    <div class="col-md-4">
	                        <div class="form-group">
	                            <label for="categoria">Categoria: </label><br />
	                            <select class="form-control" name="categoria" > 
	                                <option value="">--Selecione--</option>
									<option value="Técnica">Técnica</option>
									<option value="Científica">Científica</option>
									<option value="Estudantil">Estudantil</option>
	                            </select>
	                            
	                        </div>
	                    </div>
	                </div>
	                
	            </div>
	            
	        </div>
	         <!-- ============ FIM TABS SECUNDARIAS=============== -->
	         <a class="btn btn-large btn-primary" onclick="buscar($('#tp_evento').val())" > Avançar >></a> 
			<input type="submit" name="cadastrar" class="btn btn-default" value="Cadastrar" />
					
	    <?php
			echo form_close ();
		?>

    </div>
</div>

 <script>
            function buscar(tipo)
            {                //disabledTab
            	 //$("p").removeClass("test-class");
            	//ajax.open("POST", "cidades.php", true);
       		 	//ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
       		 	//texto = "<a href='#resp-tab1' data-toggle='tab'> Evento >> </a>";
                if(tipo == "Fórum"){
                    texto = "<a href='#resp-tab2' data-toggle='tab'><span class='glyphicon' ></span> Forum >> </a>";
                }
                if(tipo == "Congresso"){
                	texto = "<a href='#resp-tab3' data-toggle='tab'><span class='glyphicon' ></span> Congresso >> </a>";
                }                                                                        
                if(tipo == "Simpósio"){
                	texto = "<a href='#resp-tab4' data-toggle='tab'><span class='glyphicon' ></span> Simpósio >> </a>";
                }                                                                        
                if(tipo == "Semana Acadêmica"){
                	texto = "<a href='#resp-tab5' data-toggle='tab'><span class='glyphicon' ></span> Semana Acadêmica >> </a>";
                }                                                                        
                //alert(texto)
                $("#box").html(texto);
            }
            
        </script>