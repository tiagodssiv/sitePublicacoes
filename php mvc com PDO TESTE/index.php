<?php

//Definindo valores na sessão:

//Apagando todos os dados da sessão:
//session_unset();
//Destruindo a sessão:
//session_destroy();
//Mostrando os dados da sessão destruida:
//print_r($_SESSION);
/*tem que realizar os importes  no index para o core reconhecer or aruivos controlleres a serem acessados   */
require_once('app/Core/Core.php');
require_once('app/Controller/HomeController.php');
require_once('app/Controller/LoginController.php');
require_once('app/Modelo/Categoria.php');
require_once('app/Modelo/Login.php');
require_once('app/Controller/ErroController.php');
require_once('app/Controller/ComentarioController.php');
require_once('app/Modelo/Postagem.php');
require_once('app/Modelo/Comentario.php');
require_once('app/Modelo/RespostaComentario.php');
require_once('app/lib/Connection.php');
require_once('vendor/autoload.php');

require_once('app/Controller/PostController.php');

require_once('app/Controller/SobreController.php');
require_once('app/Controller/AdminController.php');
//$template = file_get_contents('app/Template/estrutura.html');
$template = file_get_contents('app/Template/news-magazine/index.html');
ob_start();//inicia o bloco
$core = new Core();
$core -> start($_GET);



$saida= ob_get_contents(); //armazena toda os dados vindos do core
ob_clean();//finaliza o bloco ob_start

/*TUDO QUE ESTIVER DENTRE  ob_start E ob_clean serão armazenados na variável saída*/

// depois de já ter pegado a saida temos que substituir o conteudo que esta dentro do conteudo {{area_dinamica}} com uma função str_replace('{{area_dinamica}}',$saida,$template);
$template_processado="";//vai receber todo o conteudo da função str_replace()
$template_processado = str_replace('{{area_dinamica}}',$saida,$template);
echo $template_processado;// mostra a página principal do projeto , que é uma página html


?>

