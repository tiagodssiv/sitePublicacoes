
<?php

 
 /*  if(isset($_POST['nome'])){
	   require_once('AdminController.php');
	require_once('app/Modelo/Categoria.php');
	require_once('app/lib/Connection.php');
	$core = new AdminController();
	 $core->  SelecionarAssuntos();
   }*/
 
   
  if(isset($_POST['assunto'])){
	
	require_once('AdminController.php');
	require_once('../Modelo/Categoria.php');
	require_once('../lib/Connection.php');
	  //entra na chamada do ajax da página cadastrar publicação , no botão-imagem 
		
	        $core = new AdminController();
	        $teste="";
            $teste=$_POST['assunto'];
			$fraseSemEspaco = str_replace(' ', '', $teste);//tira o espaço no texto
            $fraseSemEspaco=ucfirst($fraseSemEspaco);//primeira palavra em maiúscula
			 $core->cadastrarAssuntos($fraseSemEspaco);
		
			//ucfirst é uma função nativa que coloca maiúsculo a primeira letra  . a variável vem do get e recebe a palavra Controller, que vai resultar em nome de uma class

           
			
			
			//fim entra na chamada do ajax da página cadastrar publicação , no botão-imagem 
		
}

			
			
//require_once('app/Controller/AdminController.php');
	class AdminController
	{
			//   bloco ajax campo select pagina create
		/*public function SelecionarAssuntos(){
			
			$retorno=array();
			$retorno['assunto']=Categoria::selecionarCategorias();
			 return $retorno;
		}*/
		public function cadastrarAssuntos($params){
			$retorno="";
			echo $retorno=Categoria::cadastrarCategoria($params);
		}
		//  fim bloco ajax campo select
		public function comenPost($idPost)
		{
			session_start();
						
			
if(isset($_SESSION['adm']) AND ($_SESSION['id_adm'])){

			try {
				$listaComRespost=Comentario::selecionarComentariosRespostas();
				
				$objPostagens=Postagem::selecionaPorId($idPost);
			    $loader = new \Twig\Loader\FilesystemLoader('app/view');//especifica a pasta onde está pagina a ser acessda
				$twig = new \Twig\Environment($loader);//instancia 
				$template = $twig->load('adminPublicacao.html');//carrega a pagina 
				$parametros=array();//array criado para armaxenar a consulta 
			    $parametros['postagens']=$objPostagens;
				$originalDate =$parametros['postagens']->data;
                $newDate = date("d-m-Y h:m", strtotime($originalDate));   
				$parametros['dataBrasil']=$newDate;
				$parametros['comerespostas']=$listaComRespost;
				
				
		     if(isset($_SESSION['adm']) AND $_SESSION['id_adm']){
				$parametros['id_user']=$_SESSION['id_adm'];
				$parametros['nome_user']=$_SESSION['adm'];
				
			}
			/* if(isset($_SESSION['nome_user']) AND $_SESSION['id_user']){
				$parametros['nome_user']=$_SESSION['nome_user'];
				$parametros['id_user']=$_SESSION['id_user'];
				
			}
				*/
			
			  $conteudo=$template->render($parametros);//aqui pega os parametros e renderiza junto com pagina html e joga tudo na variavel $conteudo
              echo  html_entity_decode($conteudo);

			 
			} catch (Exception $e) {
				
			}
}else{
	
	echo '<script> alert("Usuário inválido!") </script>';
		  echo '<script>location.href="http://localhost/php mvc com PDO TESTE/"</script>';
		
	
}
	}
		
		
		
		
		public function index($params)
		{
			session_start();
			
	if(isset($_SESSION['adm'])){ 
		if(isset($_SESSION['id_user'])){
		session_unset();
		session_destroy();
		$_SESSION['id_user'];
		$_SESSION['nome_user'];
}
		
	}
			
if(isset($_SESSION['adm']) AND ($_SESSION['id_adm'])){
	
	


			try {
				// está pegando os dados da classe static sem ser necessário instanciar
                $objPostagens=Postagem::selecionarTodas();//Postagem::postagens();
				$loader = new \Twig\Loader\FilesystemLoader('app/view');//especifica a pasta onde está pagina a ser acessda
				$twig = new \Twig\Environment($loader);//instancia 
				$template = $twig->load('admin.html');//carrega a pagina 
				$parametros=array();//array criado para armaxenar a consulta 
			    $parametros['postagens']=$objPostagens;
				//selecionarComentarios($idPost)
				//$parametros['comentarios']=$teste;
			   // echo  $contador=count($teste);
			   
   		        $conteudo=$template->render($parametros);//aqui pega os parametros e renderiza junto com pagina html e joga tudo na variavel $conteudo



				
		  echo $conteudo;




		} catch (Exception $e) {
				$loader = new \Twig\Loader\FilesystemLoader('app/view');//especifica a pasta onde está pagina a ser acessda
				$twig = new \Twig\Environment($loader);//instancia 
				$template = $twig->load('admin2.html');//carrega a pagina 
				$parametros=array();//array criado para armaxenar a consulta 
			
               

				echo $conteudo=$template->render();//aqui pega os parametros e renderiza junto com pagina html e joga tudo na variavel $conteudo

			}
}else{
	
	echo '<script> alert("Usuário inválido!") </script>';
		  echo '<script>location.href="http://localhost/php mvc com PDO TESTE/"</script>';
		
}
       


	   }
        
		
		
		
		
        public function create(){
session_start();
						
			
if(isset($_SESSION['adm']) AND ($_SESSION['id_adm'])){
            try {
					require_once('app/Modelo/Categoria.php');
				// está pegando os dados da classe static sem ser necessário instanciar
    
				$loader = new \Twig\Loader\FilesystemLoader('app/view');//especifica a pasta onde está pagina a ser acessda
				$twig = new \Twig\Environment($loader);//instancia 
				$template = $twig->load('create.html');//carrega a pagina 
				$parametros=array();//array criado para armaxenar a consulta 
			    $dados=Categoria::selecionarCategorias();
				
				$parametros['lista']=$dados;
				

				$conteudo=$template->render($parametros);//aqui pega os parametros e renderiza junto com pagina html e joga tudo na variavel $conteudo

				echo $conteudo;
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}else{
			
			echo '<script> alert("Usuário inválido!") </script>';
		  echo '<script>location.href="http://localhost/php mvc com PDO TESTE/"</script>';
		
			
		}
       
	   }

        public function insert(){
		
//a variável $imagens vai estar com os dados organizados , sendo necessário pegar o nome com ['name'] ou ['size'] ou ['mtp_name']

			//$diretorio = 'app/postagens/';
			//	if ($_FILES['imagem']['size'] == 0)
		if(!$_FILES["imagem"]["error"] == 4){
		
		
//means there is no file uploaded

				
$arquivo   = $_FILES['imagem']['name'];
$nome_final = md5($arquivo).'.jpg';
$tamanho=1024 * 1024 * 5;
$ext = pathinfo($arquivo, PATHINFO_EXTENSION);
$dir = 'app/imagemPostagens/';
$irBanco=$dir.$nome_final;
//cria uma pasta caso não exista

if(!is_dir($dir)){
	mkdir($dir, 0777, true);
}
if ($ext == 'jpg' OR $ext == 'png' OR $ext == 'png' OR $ext == 'jpeg' ) {
	
	if($tamanho > $_FILES['imagem']['size']){
		
		

  if (move_uploaded_file($_FILES['imagem']['tmp_name'], $dir . $nome_final)) {
  // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
  	   if(isset($_POST['destaque'])){
			   
			   $dados=array('conteudo'=>$_POST['conteudo'],'titulo'=>$_POST['titulo'],'arquivo'=>$irBanco,'id_categoria'=>$_POST['select'],'destaque'=>$_POST['destaque'],'stv'=>$_POST['stv']);
         
		   }
	   else{
		   			   $dados=array('conteudo'=>$_POST['conteudo'],'titulo'=>$_POST['titulo'],'arquivo'=>$irBanco,'id_categoria'=>$_POST['select'],'stv'=>$_POST['stv']);
         
	   }
	   try{
		   
		   Postagem::insert($dados);
            echo"<script>alert('Publicação cadastrada!');</script>";
            echo '<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=admin&metodo=index"</script>';
			
            }catch(Exception $e){
            echo'<script>alert("'.$e->getMessage() .'")</script>';
            echo '<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=admin&metodo=create"</script>';
			

            }
 
  

} else {
  // Não foi possível fazer o upload, provavelmente a pasta está incorreta
  echo "Não foi possível enviar o arquivo, tente novamente";
}

	
	}else{
		//  echo "<script>alert('Arquivo grande.É permitido até 2M !')</script>";
		  
		echo "<script>alert('Arquivo muito grande!é permitido até '"+$tamanho+"')</script>";
	}

}else{
	echo "<script>alert('Permitido imagens do tipo : jpg,jpeg,png e gif');</script>";
	
}

			}elseif($_FILES["imagem"]["error"] == 4) {
			
			
			
				
				   try{
					   $dados=array('conteudo'=>$_POST['conteudo'],'titulo'=>$_POST['titulo'],'arquivo'=>'','id_categoria'=>$_POST['select'],'stv'=>$_POST['stv']);/*envia a lista com os dados do post*/
          Postagem::insert($dados);
             echo"<script>alert('Publicação cadastrada!');</script>";
          echo '<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=admin&metodo=index"</script>';
			
            }catch(Exception $e){
            echo'<script>alert("'.$e->getMessage() .'")</script>';
            echo '<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=admin&metodo=create"</script>';
			

            }
				
				
						
			}


		
        
        }

		public function delete($params)
		{
			if(!$params==null){

				try {
	 Postagem::delete($params);
	 echo'<script>alert("Dados excluídos com sucesso !")</script>';
					echo '<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=admin&metodo=index"</script>';
				} catch (Exception $e) {
					echo'<script>alert("'.$e->getMessage().'")</script>';
					echo '<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=admin&metodo=index"</script>';
				}

			}
 

		}
		

		public function change($params)
		{
			




             $dados= Postagem::selecionaPorId($params);
			$loader = new \Twig\Loader\FilesystemLoader('app/view');//especifica a pasta onde está pagina a ser acessda
			$twig = new \Twig\Environment($loader);//instancia 
			$template = $twig->load('update.html');//carrega a pagina 
			$parametros=array();//array criado para armaxenar a consulta 
		
			$parametros['id']=$dados->id;
			$parametros['conteudo']=$dados->conteudo;
			$parametros['titulo']= $dados->titulo;
			$conteudo=$template->render($parametros);//aqui pega os parametros e renderiza junto com pagina html e joga tudo na variavel $conteudo

			echo $conteudo;




		}
		
		public function update()
		{
			try {
				Postagem::atualizarPostagem($_POST);	
				echo'<script>alert("Dados atualizados  com sucesso !")</script>';
				echo '<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=admin&metodo=index"</script>';
		
			} catch (Exception $e) {
				echo'<script>alert("Erro ao atualizar : '.$e->getMessage() .'")</script>';
				echo '<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=admin&metodo=index"</script>';
		
			}
		

 



           
		



        }
public function mudarDestaque($dados){
	
	
	try {
		Postagem::mudarDestaque($dados);
	         echo '<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=admin&metodo=index"</script>';
		
		
		
	} catch (Exception $e) {
				  echo '<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=admin&metodo=index"</script>';
		
			}
	
}


    }

    
	
?>