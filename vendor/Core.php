<?php


	class Core
	{
		public function start($urlGet)
		{


 
		    
//caso o ussuario clique em admin vai levar o metedo create , ams senao vai seguir o padrao do metodo index
			if(isset($urlGet['metodo'])){

				$acao = $urlGet['metodo'];

			}else{

				$acao = 'index';

			}
		//nome do médodo
//A fução isset dentro do if abaixo , vai servir para tratar o erro  se caso não houver parâmetro pagina.Caso não tenha , vai abrir no else a pagina home
			if(isset( $urlGet['pagina'])){
				$controller= ucfirst($urlGet['pagina'].'Controller');//ucfirst é uma função nativa que coloca maiúsculo a primeira letra  . a variável vem do get e recebe a palavra Controller, que vai resultar em nome de uma class

			}
		
		else{	$controller='HomeController';}
			


if(class_exists ($controller)){




	if (isset($urlGet['id']) && $urlGet['id'] != null) {//pega o paramentro id da url através de $urlGet['id']
		$id = $urlGet['id'];
call_user_func_array(array(new $controller,$acao),array('id'=>$id));
	} else {
		$id = null;
		
		if($controller=="AdminController"){
			$acao = 'create';


		}
	call_user_func_array(array(new $controller,$acao),array());
	
	}
	
	/* verifica se existe class */
// se não existir class

/*se tiver a classe informada pelo get, temos que chamar o controler referente ao nome pego pelo get e abrir o método dessa classe

Então temos que acessar a classe e seu método ,literalmente instanciando e acessando através de uma função nativa : call_user_func_array(array(new $controller,$acao),array());
A função call_user_func_array(array(new $controller,$acao),array()); pede 3 parametros , instanciar , o metodo existente e algum dado que deseja trazer da index , pode ser um id
Ou seja essa função call_user_func_array(array(new $controller,$acao),array()); execulta o método da classe informada
*/




}else{
	
	//se não existir página mostra o conteudo da página de erro
	$controller = 'ErroController';
	call_user_func_array(array(new $controller,$acao),array());
}





		}
	}