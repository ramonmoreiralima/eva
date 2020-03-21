<?php
//Carregando a biblioteca mPDF
include('mpdf.php');
//Inicia o buffer, qualquer HTML que for sair agora sera capturado para o buffer
ob_start();

//Fazendo o include de um HTML em outro arquivo, ficara retido no buffer
include('conteudo.php');

//Limpa o buffer jogando todo o HTML em uma variavel.
$html = ob_get_clean();
$mpdf=new mPDF();
$mpdf->WriteHTML($html);
//Colocando o rodape
$mpdf->SetFooter('{DATE j/m/Y H:i}|Página {PAGENO} de {nb}|www.gqferreira.com.br');
$mpdf->Output();
exit;
?>