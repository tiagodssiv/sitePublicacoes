<?php

	class SobreController
	{
		public function index()
		{
			
		
				$loader = new \Twig\Loader\FilesystemLoader('app/view');//especifica a pasta onde está pagina a ser acessda
				$twig = new \Twig\Environment($loader);//instancia 
				$template = $twig->load('sobre.html');//carrega a pagina 
				$parametros=array();//array criado para armaxenar a consulta 
			

				$conteudo=$template->render($parametros);//aqui pega os parametros e renderiza junto com pagina html e joga tudo na variavel $conteudo

				echo $conteudo;
			
		}

	
	}
