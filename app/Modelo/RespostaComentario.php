<?php

class RespostaComentario{
	
	public static function inserirResposta($dadosPost){
    $id_resp_rep="";
	$agora = new DateTime(); 
    $data =$agora->format("d/m/y h:i");  
  


	$con=Connection::getCon();
$sql="INSERT INTO respostascomentario(id_usuario,resposta ,id_resp_resp , id_comentarios,data,id_post )VALUES(:id_user,:mensagem,:id_resp_resp,:id_comentario,:data,:id_post)";

$sql=$con->prepare($sql);

$sql->bindValue(':id_user',$dadosPost['user']);
$sql->bindValue(':mensagem',$dadosPost['msg']);
$sql->bindValue(':id_resp_resp',$id_resp_rep);
$sql->bindValue(':id_comentario',$dadosPost['id_comentario']);
$sql->bindValue(':data',$data);
$sql->bindValue(':id_post',$dadosPost['id_postagem']);
$res=$sql->execute();
		
		if(!$res){

    throw new Exception("Comentário não cadastrado !");
    return false;
}
 return true;
	}
	
	
	
	
	
}








?>