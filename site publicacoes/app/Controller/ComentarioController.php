<?php

class ComentarioController{
	
	
	public function insertComentario(){
		
		echo $_POST['msg'].'<br>';
		echo $_POST['id_comentario'].'<br>';
		echo $_POST['id_postagem'].'<br>';
		echo $_POST['user'].'<br>';
		$id_postagem=$_POST['id_postagem'];
		$id_comentario=$_POST['id_comentario'];
		
	try{
	
			if(RespostaComentario::inserirResposta($_POST)){
			echo'<script'location.href="http://localhost/php mvc com PDO TESTE/?pagina=admin&metodo=comenPost&id='.$_POST['id_postagem'].'#'.$id_comentario.'"</script>'
		//eader("http://localhost/php mvc com PDO TESTE/?pagina=admin&metodo=comenPost&id=$id_postagem#id_comentario");
			}
		
	}catch (Exception $e) {
		echo $e;
		
		
	}	

		
		
	}
	
	
	
	
}







?>