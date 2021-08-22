<?php


	class PostController
	{
		public function index($params)
		{
			
			try {
				$dados=Postagem::selecionaPorId($params);// está pegando os dados da classe static sem ser necessário instanciar
    
				$loader = new \Twig\Loader\FilesystemLoader('app/view');//especifica a pasta onde está pagina a ser acessda
				$twig = new \Twig\Environment($loader);//instancia 
				$template = $twig->load('single.html');//carrega a pagina 
			//vem da consulta dento da lista no identificador comentarios
			
$dica='' ;
$ano='';
$mes='';
$teste='';
         
	      $agoraa = new DateTime();
		  $dataa=$agoraa->format("Y/m/d H:i:s");
		 $dtStart = new DateTime($dados->data);
		 $dtDiff =$dtStart->diff($agoraa);
		 $dica= $dtDiff->format("%d");
         $ano=$dtDiff->format("%y");
         $mes=$dtDiff->format("%m");
		 
		 
		 
		 if( $mes > 12 ){$teste= 'Feito há '.$ano.' ano'; }
		 
		 else if($ano > 1 ){$teste= 'Feito há '.$ano.' anos'; }
		 
		 else if($dica > 31 ){$teste= 'Feito há '.$mes.' mês';}

		 else if($mes > 1 and $mes < 12 ){$teste= 'Feito há '.$mes.' meses';}
		 
		 
		 else{
			 
		 if ($dica > 0){
	
	     if($dica > 1 and $dica < 31 ){$teste='Feito há '.$dica.' dias';}
	     else{ $teste= 'Feito há '.$dica.' dia';  }
	
        }else{
	   $teste='Feito há '.$dtDiff->format("%H:%I");
	    }
		 }






		$parametros=array();//array criado para armaxenar a consulta 
				$parametros['titulo']=$dados->titulo;//´´e imprtante nomerar a variável para que o twig possa ler  lá no html .Então faz assim: $x['x']; 
				$parametros['conteudo']=$dados->conteudo;
				$parametros['id']=$dados->id;
				$parametros['data']=$teste;
				$parametros['arquivo']=$dados->arquivo;
				
				$parametros['comentarios']=$dados->comentarios;
			



				$conteudo=$template->render($parametros);//aqui pega os parametros e renderiza junto com pagina html e joga tudo na variavel $conteudo

				echo $conteudo;
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}
public function addComent(){

   

	
	try {
		
Comentario::isert($_POST);

		echo'<script>alert("CADASTRADO COM SUCESSO")</script>';
		echo '<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=post&id='.$_POST['id'].'"</script>';

	} catch (Exception $e) {
		echo'<script>alert("'.$e.'")</script>';
		echo '<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=post&id='.$_POST['id'].'"</script>';
	}
	




}
	

		

	}
