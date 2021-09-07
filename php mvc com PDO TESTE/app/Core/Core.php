<?php

/*ESSA CLASSE CORE É O CÉREBRO DO SITE .NELE , RECEBE A REQUISIÇÃO DO INDEX, QUE É VIA LINK .O CORE PEGA A VARIÁVEL NO LINK ESCRITO
PÁGINA, QUE É ALTOMATICAMENTE INDENTIFICADA COMO UMA CLASSE DO CONTROLER , QUE O CONTROLLER FAZ OS PROCESSOS DE BANCO DE DADOS E  VIEW, TUDO ISSO FEITO PELO 
MÉTODO DA CLASSE CONTROLER .DEPOIS , ESSE MÉTODO DO CONTROLLER É ACIONADO PELO CORE, QUE INFORMA NA INDEX */
require_once('app/Controller/HomeController.php');


	class Core
	{
		public function start($urlGet)//vem o link da página index que recebe o método start da class Core.Esse método recebe uma variável global $_GET, que armazena os dados do link após o ?
		{
//caso o ussuario clique em admin vai levar o metedo create , ams senao vai seguir o padrao do metodo index
			if(isset($urlGet['metodo'])){

				$acao = $urlGet['metodo'];
				//echo $acao;

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
		//$destaque=$urlGet['destaque'];
		
	} else {
		$id = null;
/*
		if($controller=="AdminController"){
			$acao = 'index';


		}
	*/
	
	}
	if(isset($urlGet['destaque'])){
		
		$array=array();
		$array=$urlGet;
			call_user_func_array(array(new $controller,$acao),array($array));

	
	}
	if(isset($urlGet['tipo'])){
		
		$array=array();
		$array=$urlGet;
			call_user_func_array(array(new $controller,$acao),array($array));

	
	}
	 	call_user_func_array(array(new $controller,$acao),array('id'=>$id));   

}else{
	
	//se não existir página mostra o conteudo da página de erro
	$controller = 'ErroController';
	call_user_func_array(array(new $controller,$acao),array());
}





		}
	}