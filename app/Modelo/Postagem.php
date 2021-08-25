<?php
  date_default_timezone_set('America/Sao_Paulo');
  //classe criada para pegar a seleção dos arquivos com destaques marcados
  class Destaque{
	  
	 
 public static function destaques(){
	 
	  $conn =new  PDO('mysql:host=127.0.0.1:3312; dbname=serie-criando-site;','root','');

     $list=array();
	 $dica;
	 $ano;
	 $mes;
	 $con = Connection::getCon();
	

 $sqll="SELECT * FROM postagem  WHERE ex ='0' AND destaque = 'Destacado' ORDER BY id DESC LIMIT 10";
$sqll=$conn->prepare($sqll);
$sqll->execute();
	 while ($roww = $sqll->/*fetch(PDO::FETCH_ASSOC)*/fetchObject('destaque')) {
		 $list []=$roww;
		 
	 }


 return $list;
	  
  }
  }
class Postagem {

 
	




 public static function mudarDestaque($dados){
     $id=$dados['id'];
      $destaque=$dados['destaque'];
	  if($destaque=='remover'){
		  $destaque='Sem destaque';
 }else{$destaque='Destacado';}
		  
		  $con=Connection::getCon();
 
$SQL = 'UPDATE postagem SET destaque = ? WHERE id = ?';
$sql=$con->prepare($SQL);

$res=$sql->execute(array($destaque,$id));
if($res==0){
    throw new Exception("Erro ao atualizar !");
    return false;
}

return true;
 
}

public static function selecionarTodas(){
	
	$list=array();
	 $dica;
	 $ano;
	 $mes;
	 $con = Connection::getCon();
	

$sql="SELECT quantidade,id,arquivo,conteudo,destaque , titulo,date_format( data,'%d/%m/%Y às %h:%m' ) AS data FROM postagem WHERE ex ='0' ORDER BY id DESC";
$sql=$con->prepare($sql);
$sql->execute();
	 while ($roww = $sql->/*fetch(PDO::FETCH_ASSOC))*/  fetchObject('Postagem')){
		 $list []=$roww;
		 
	 }
$des=array();
//$des=Destaque::destaques();
return $list;
}



public static function postagens(){
	
	$list=array();
	 $dica;
	 $ano;
	 $mes;
	 $con = Connection::getCon();
	

$sql="SELECT quantidade,id,arquivo,conteudo,destaque , titulo,date_format( data,'%d/%m/%Y às %h:%m' ) AS data FROM postagem WHERE month( data ) = month( now( ) )
AND year( data ) = year( now( ) )AND ex ='0' ORDER BY id DESC";
$sql=$con->prepare($sql);
$sql->execute();
	 while ($roww = $sql->/*fetch(PDO::FETCH_ASSOC))*/  fetchObject('Postagem')){
		 $list []=$roww;
		 
	 }
$des=array();
//$des=Destaque::destaques();
return $list;
}





 public static function datas(){
	  $conn =new  PDO('mysql:host=127.0.0.1:3312; dbname=serie-criando-site;','root','');

	$list=array();
	 $dica;
	 $ano;
	 $mes;
	 $con = Connection::getCon();
	

$sql="SELECT quantidade,id,arquivo,conteudo,destaque , titulo,date_format( data,'%d/%m/%Y às %h:%m' ) AS data FROM postagem WHERE month( data ) = month( now( ) )
AND year( data ) = year( now( ) )AND ex ='0' ORDER BY id DESC";
$sql=$conn->prepare($sql);
$sql->execute();
	 while ($roww = $sql->/*fetch(PDO::FETCH_ASSOC))*/  fetchObject('Postagem')){
		 $list []=$roww;
		 
	 }
$des=array();
//$des=Destaque::destaques();
return $list;
}



public static function selecionaPorId($idPost){
$dica;
$ano;
$mes;
$con=   new  PDO('mysql:host=127.0.0.1:3312; dbname=serie-criando-site;','root','');
//Connection::getCon();
$sql="SELECT * FROM postagem WHERE id = ?";
$sql=$con->prepare($sql);
$sql->execute(array($idPost));
$resultado= $sql->fetchObject('Postagem');





if(!$resultado){
throw new Exception("Não foi possível encontrar nenhum registro");
}else{

$resultado->comentarios=Comentario::selecionarComentarios($resultado->id);//aqui pegamos os dados da tabela comentario baseando-se no id da postagem e armazenamos na lista $resultados->comentario(que é o nome dado ao identificador dos comentários, que só vai ser exibido se houver lista)


if(!$resultado->comentarios){
$resultado->comentarios='Não tem comentário para esta postagem !';


}
}

return $resultado;


}



public static function insert($dadosPost){
	   $agora = new DateTime(); 
   $arquivo;
   $arquivo=$dadosPost['arquivo'];
   $destaque="";
   if($arquivo==""){
	   $arquivo="Sem imagem";
   }
	//$data=$agora->format("Y/m/d H:i:s");//cadastra no banco data e hora em padrão americano
	$data=$agora->format("Y/m/d H:i:s");//cadastra no banco data e hora em padrão brasileiro
    if(empty($dadosPost['titulo'])OR empty( $dadosPost['conteudo']))//verifica se campos estão vazios
    {
throw new Exception('Preencha todos os campos');
return false;//para a execução do método insert 
 }
 // se o campo check box for preenchido recebe esse valor
if (isset($_POST['destaque'])) {
$destaque='Destacado';
}
// se o campo check box não for preenchido recebe esse valor
else{
	$destaque='Sem destaque';
}


 $con=Connection::getCon();
 $sql=$con->prepare('INSERT INTO postagem (titulo,conteudo,data,arquivo,id_categoria,destaque) values(:tit,:cont,:dat,:arq,:id_cat,:dest)');
 $sql->bindValue(':tit',$dadosPost['titulo']);
 $sql->bindValue(':cont',$dadosPost['conteudo']);
 $sql->bindValue(':dat',$data);
 
 $sql->bindValue(':arq',$arquivo);
 $sql->bindValue(':id_cat',$dadosPost['id_categoria']);
  $sql->bindValue(':dest',$destaque);
 $res=$sql->execute();
if($res==0){
    throw new Exception('Erro ao cadastrar !');
    return false;
}
return true;
}


	

public static function delete($idPost){

    $con= Connection::getCon();
    
    $sql=$con->prepare("DELETE  FROM postagem WHERE id = ? AND ex='0'");
    
    $resultado=$sql->execute(array($idPost));
    if($resultado==0){
    throw new Exception("Não foi possível encontrar nenhum registro");
    return false;
    }
    
    return $resultado;
    
    
    }

    
  public static function atualizarQuantidade($dados){
      $id=$dados['id'];
      $quantidade=$dados['quantidade'];
      
$con= new  PDO('mysql:host=127.0.0.1:3312; dbname=serie-criando-site;','root','');
//Connection::getCon();
$SQL = 'UPDATE postagem SET quantidade = ?  WHERE id = ?';
$sql=$con->prepare($SQL);
$res=$sql->execute(array($quantidade,$id));

if($res==0){
    throw new Exception("Erro ao atualizar !");
    return false;
}return true;

   
  }

  public static function atualizarPostagem($dados){
      $id=$dados['id'];
      $titulo=$dados['titulo'];
      $conteudo=$dados['conteudo'];

$con=Connection::getCon();
$SQL = 'UPDATE postagem SET titulo = ?, conteudo = ? WHERE id = ?';
$sql=$con->prepare($SQL);
$res=$sql->execute(array($titulo,$conteudo,$id));
if($res==0){
    throw new Exception("Erro ao atualizar !");
    return false;
}return true;

   
  }
//#######função para inserir quantidade de comentários na postagem .Esse método é acionado assim que é inserido um comentário
  public static function atualizarPostagemQuantComent($dados){
  

      $id=$dados['id'];
	  $quant=$dados['quant'];
	  
    
  $conex=new  PDO('mysql:host=127.0.0.1:3312; dbname=serie-criando-site;','root','');


$SQL = 'UPDATE postagem SET quantidade = ? WHERE id = ?';
$sql=$conex->prepare($SQL);
$res=$sql->execute(array($quant,$id));

if($res==0){
   echo "Erro ao atualizar !";
    return false;
}return true;

   
  }
    
    


}



			
							


?>