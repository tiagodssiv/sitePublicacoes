<?php

class RespostaComentario{
	
	
	
	public static function selecionarRespostas($post){
		$conex=Connection::getCon();
		$sql='SELECT * FROM respostascomentario WHERE id_resposta = ?';
		$sql=$conex->prepare($sql);
		$sql->execute(array($post['id']));
		$resultado="";
		   while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $resultado = $row['resposta'];
        }
        return $resultado;
	
	}

	
	
	
	
	public static function inserirResposta($dadosPost){
    $id_resp_rep="";
	$agora = new DateTime(); 
    $data =$agora->format("d/m/Y h:i");  
  
$rand= rand(1,100);

	$con=Connection::getCon();
$sql="INSERT INTO respostascomentario(id_usuario,resposta ,id_resp_resp , id_comentarios,dat,id_post,dinam )VALUES(:id_user,:mensagem,:id_resp_resp,:id_comentario,:data,:id_post,:dinam)";

$sql=$con->prepare($sql);

$sql->bindValue(':id_user',$dadosPost['user']);
$sql->bindValue(':mensagem',$dadosPost['msg']);
$sql->bindValue(':id_resp_resp',$id_resp_rep);
$sql->bindValue(':id_comentario',$dadosPost['id_comentario']);
$sql->bindValue(':data',$data);
$sql->bindValue(':id_post',$dadosPost['id_postagem']);
$sql->bindValue(':dinam',$rand);
$res=$sql->execute();
		
		if(!$res){

    throw new Exception("Comentário não cadastrado !");
    return false;
}
 return true;
	}
	
	
	
	
		public static function  editarResposta($dadosPost){
     $id=$dadosPost['id_resposta'];
	  $msg=$dadosPost['msg'];
	  $ditado='Editado';
	

      
$con= new  PDO('mysql:host=127.0.0.1:3312; dbname=serie-criando-site;','root','');
//Connection::getCon();
$SQL = 'UPDATE respostascomentario SET resposta = ? , edita = ? WHERE id_resposta = ?';
$sql=$con->prepare($SQL);
$res=$sql->execute(array($msg,$ditado,$id));

if($res==0){
    throw new Exception("Erro ao atualizar !");
    return false;
}
return true;

	}
	
	
	
	
	
}








?>