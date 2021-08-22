
<?php 
   date_default_timezone_set('America/Sao_Paulo');//pega a data atual e hora 
class Comentario 
{
    
   public static function selecionarTodosComentarios()
    {

     
      // $conn = Connection::getCon();
      $conn =new  PDO('mysql:host=127.0.0.1:3312; dbname=serie-criando-site;','root','');

        $sql = "SELECT * FROM  comentarios INNER JOIN postagem ON id_postagem=id ORDER BY id DESC";
        $sql =  $conn ->prepare($sql);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Comentario')) {
            $resultado[] = $row;
        }
        
        return $resultado;
    }
	
	
	/*esta função acima ,tem pega as tabelas necesárias para identificar
	os dados das tabelas respostascomentario , comentarios e postagem.É 
	necessário para mostrar na tela de gerenciamento de comentários (adminPublicacao) e admin*/
	
	   public static function selecionarComentariosRespostas()
    {
		

     
      // $conn = Connection::getCon();
      $conn =new  PDO('mysql:host=127.0.0.1:3312; dbname=serie-criando-site;','root','');

        $sql = "SELECT * FROM  respostasComentario LEFT JOIN comentarios  ON id_comentarios=id_comentario INNER JOIN postagem ON id_postagem=id ORDER BY id_resposta DESC";
        $sql =  $conn ->prepare($sql);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Comentario')) {
            $resultado[] = $row;
        }
        
        return $resultado;
    }
	
	/*FIM esta função acima ,tem pega as tabelas necesárias para identificar
	os dados das tabelas respostascomentario , comentarios e postagem.É 
	necessário para mostrar na tela de gerenciamento de comentários (adminPublicacao) e admin*/
	
	
    public static function selecionarComentarios($idPost)
    {

     
      // $conn = Connection::getCon();
      $conn =new  PDO('mysql:host=127.0.0.1:3312; dbname=serie-criando-site;','root','');

        $sql = "SELECT * FROM comentarios WHERE id_postagem = :id ORDER BY id_comentario DESC";
        $sql =  $conn ->prepare($sql);
        $sql->bindValue(':id', $idPost);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Comentario')) {
            $resultado[] = $row;
        }
        
        return $resultado;
    }

public static function isert($dados){
    //pega a tada atual com DateTime e coloca num avariável e com format podemos manipular como mostra a baixo
    $agora = new DateTime(); 
    $data ='Feito em : '.$agora->format("m/d/Y").' às  '.$agora->format("H:i");  
  
   
$con=Connection::getCon();
$sql="INSERT INTO comentarios (nome , mensagem , id_postagem , data_hora )VALUES(:nome,:mensagem,:id_postagem,:data_hora)";

$sql=$con->prepare($sql);
$sql->bindValue(':nome',$dados['nome']);
$sql->bindValue(':mensagem',$dados['msg']);
$sql->bindValue(':id_postagem',$dados['id']);
$sql->bindValue(':data_hora',$data);
$res=$sql->execute();

       /* $sqll = "SELECT COUNT(*) FROM comentarios WHERE id_postagem = :id";
        $sqll =  $conn ->prepare($sqll);
        $sqll->bindValue(':id', $dados['id']);
        echo $sqll->execute();*/
		$array=array();
 $count=count(Comentario::selecionarComentarios($dados['id']));// no método acima que seleciona comentarios por id da postagem é acionado assim que cadastram um comentários.É feito um consulta em todos os comentários com o id da postagem e esse valor vai para uma cariável count para ir para o array que chega no médo que  faz update na quantidade na classe Postagem
 
 $array['quant']=$count;
 $array['id']=$dados['id'];
 
 Postagem::atualizarPostagemQuantComent($array);//o método  updade na classe postagem tem a função de  pegar a lista contendo a o id da postagem com a quantidade de comentários
if(!$res){

    throw new Exception("Comentário não cadastrado !");
    return false;
}
 return true;
}


}

?>
