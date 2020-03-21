<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Mpdf extends CI_Controller {

	public function __construct() { 
            parent::__construct();  
            //$this->load->library('mpdf/mpdf');
            include('mpdf/mpdf.php');
                $mpdf = new mPDF();
                $mpdf->WriteHTML('<p>Hello World</p>');
                $mpdf->Output();
                exit;
        }
        function gerar_rel($id) {
		
		/* Aqui vamos definir o tï¿½tulo da pï¿½gina de ediï¿½ï¿½o */
		$data ['titulo'] = "Consulta todos Participantes do Evento";
		
		/* Busca os dados do usuario que serï¿½ editada */
		$data ['dados_rel_ev'] = $this->model->get_rel_part_ev ( $id );
		
		/* Carrega a pï¿½gina de ediï¿½ï¿½o com os dados do usuario */
		$this->load->view ( 'includes/header_view' );
		$this->load->view ( 'includes/menu_view' );
		$this->load->view ( 'relatorio/conteudo', $data );
		$this->load->view ( 'includes/footer_view' );
	}
	public function gerar_rel() {
                /*$this->load->view('conteudo.php');
                $html = ob_get_clean();
                $mpdf=new mPDF();
                $mpdf->WriteHTML($html);
                //Colocando o rodape
                $mpdf->SetFooter('{DATE j/m/Y H:i}|Página {PAGENO} de {nb}|S-Eva');
                $mpdf->Output();
                exit;*/    
	}
}