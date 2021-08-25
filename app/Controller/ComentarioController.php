<?php

class ComentarioController{
	
	public function removeComentario($dados){

	$id=$dados['postagem'];
   
	   
   try{
	   if(Comentario::removerComentario($dados)){

		echo '<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=admin&metodo=comenPost&id='.$id.'"</script>';



	   }
		  
   
	   
   }catch (Exception $e) {
	   echo "<script>alert('Erro'".$e.");</script>";
	   
	   
   }	

	   
	   
   }



	
	public function insertComentario(){
		
		 $_POST['msg'].'<br>';
		 $_POST['id_comentario'].'<br>';
		 $_POST['id_postagem'].'<br>';
		$_POST['user'].'<br>';
		$id=$_POST['id_postagem'];
	
		$id_comentario=$_POST['id_comentario'];
		
	try{
		if(RespostaComentario::inserirResposta($_POST)){
			//	echo'<script>alert("ok");</script>';
			//	echo'<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=admin&metodo=comenPost&id='.$_POST['id_postagem'].'</script>';
			

				echo '<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=admin&metodo=comenPost&id='.$id.'"</script>';
/*echo"<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=admin&metodo=comenPost&id='.$_POST['id_postagem']</script>";
			echo'<script>'.'#'.$id_comentario.'"</script>'
		//eader("http://localhost/php mvc com PDO TESTE/?pagina=admin&metodo=comenPost&id=$id_postagem#id_comentario");*/
		
	}
		
	}catch (Exception $e) {
		echo $e;
		
		
	}	

		
		
	}
	
	
	
	
}







?>