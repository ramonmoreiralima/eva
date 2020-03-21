<?php
$valor="";
 foreach($dados_rel_gasto_evento as $rel): 
    $valor = $valor.'<tr>
		<td>'.$rel->quantidade.'</td>
		<td>'.$rel->nome_material.'</td>
		<td>'.$rel->preco_material.'</td>

    </tr>';
    endforeach;     

$html = "<div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>
	<h3 class='page-header'>".$titulo."</h3>
	<div class='col-md-12'>
		<!-- Lista as Eventos Cadastradas -->
		<div class='col-md-12'>
			<table class='table table-hover'>
				<tr>
				
				<tr class='active'>

					<th>Quantidade</th>
					<th>Material</th>
					<th>Preço</th>
				</tr>
                                $valor
				
			  </table>
		</div>
	</div>
	
</div>";

//Carregando a biblioteca mPDF
include('mpdf.php');
//Inicia o buffer, qualquer HTML que for sair agora sera capturado para o buffer
date_default_timezone_set('America/Sao_Paulo');
ob_start();

$mpdf=new mPDF();
$mpdf->WriteHTML($html);
//Colocando o rodape
$mpdf->SetFooter('{DATE j/m/Y H:i}|Página {PAGENO} de {nb}|S-Eva');
$mpdf->Output();
exit;
?>