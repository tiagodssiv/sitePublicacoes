<?php
/*edita comentario chama as classes de comentario e RespostaComentario . Se vier o  tipo como editaResposta , envia para  a classe de RespostaComentario, para o método  selecionarRespostas

e se for editarPrincipal envia para a class comentario selecionarComentario(*/
  if(isset($_POST['tipoo'])){
	

	require_once('../Modelo/Comentario.php');
	require_once('../Modelo/RespostaComentario.php');
	require_once('../lib/Connection.php');
	  //entra na chamada do ajax da página cadastrar publicação , no botão-imagem 
		
	        $core = new ComentarioController();
	     echo $core->preencherCampoEditar($_POST);
		
			//ucfirst é uma função nativa que coloca maiúsculo a primeira letra  . a variável vem do get e recebe a palavra Controller, que vai resultar em nome de uma class

           
			
			
			//fim entra na chamada do ajax da página cadastrar publicação , no botão-imagem 
		
}


class ComentarioController{
	public function preencherCampoEditar($post){
		$tipo="";
		$tipo=$post['tipoo'];
		if($tipo=='editarResposta')
		{
		
		return RespostaComentario::selecionarRespostas($post);
		}
		if($tipo=='editarPrincipal')
		{	
	 return Comentario::selecionarComentario($post);
	//return array('id'=>$post['id'],'tipo'=>$post['tipo']);
	    }
		
		
	}
	public function removeComentario($dados){

	$id=$dados['postagem'];

	   
   try{
	   if(Comentario::removerComentario($dados)){

		echo '<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=admin&metodo=comenPost&id='.$id.'"</script>';



	   }
		  
   
	   
   }catch (Exception $e) {
	   echo "<script>alert('Erro'".$e.");</script>";
	   
	   
   }	

	   
	   
   }public function insertComentarioAdmin(){
	   
	   
	   
	   			
		$tipo=$_POST['tipo'];
		
    $post=$_POST['id_postagem'];
	
		
	try{
		
			
		if($tipo=='editarPrincipal')
		{
			
			if(Comentario::editarComentario($_POST)){
				
				echo '<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=admin&metodo=comenPost&id='.$post.'"</script>';
			}
		}
		elseif($tipo=='editarResposta')
		{
	
                if(RespostaComentario::editarResposta($_POST)){
				
				echo '<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=admin&metodo=comenPost&id='.$post.'"</script>';
			    }
		
		}
		
		else{
			
		 $_POST['msg'].'<br>';
		 $_POST['id_comentario'].'<br>';
		 $_POST['id_postagem'].'<br>';
		$_POST['user'].'<br>';
		$id=$_POST['id_postagem'];
	
		$id_comentario=$_POST['id_comentario'];	
	        if(RespostaComentario::inserirResposta($_POST)){
			

				echo '<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=admin&metodo=comenPost&id='.$id.'"</script>';
            }
	
	    }
    }
    catch (Exception $e) {
		echo $e;
    }	


	
	   
	   
	   
	   
   }



	
	

	public function insertComentario(){
		 

		 $post=$_POST['id_postagem'];
		 $admin="";
		  $tipo=$_POST['tipo'];
			try{
		
			
		if($tipo=='editarPrincipal')
		{
			
			if(Comentario::editarComentario($_POST)){
				
						echo '<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=post&metodo=index&id='.$post.'"</script>';
		
				
			
			
			}
		}
		elseif($tipo=='editarResposta')
		{

                if(RespostaComentario::editarResposta($_POST)){
				
				
						echo '<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=post&metodo=index&id='.$post.'"</script>';
		
				
			

			   }
		
		}
		
		else{
			
		 $_POST['msg'].'<br>';
		 $_POST['id_comentario'].'<br>';
		 $_POST['id_postagem'].'<br>';
		$_POST['user'].'<br>';
		$id=$_POST['id_postagem'];
	
		$id_comentario=$_POST['id_comentario'];	
	        if(RespostaComentario::inserirResposta($_POST)){
			

				echo '<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=post&metodo=index&id='.$id.'"</script>';
            }
	
	    }
    }
    catch (Exception $e) {
		echo $e;
    }	



		
		
		
	
			
	
		
		
		
		


	
}


}
?>