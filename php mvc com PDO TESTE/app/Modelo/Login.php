<?php



class Login{
	
	
	public static function cadastarUsuario($dados){
	
	$email=$dados['email'];	
	$nome=$dados['nome'];	
	$nome=$fraseSemEspaco=ucfirst($nome);//primeira palavra em maiúscula
			
	
    $agora = new DateTime(); 
    $data  = $agora->format("Y/m/d H:i:s");  
	if(!Login::pegarUsuario($email)){
		
	$con= new  PDO('mysql:host=127.0.0.1:3312; dbname=serie-criando-site;','root','');
	$sql=$con->prepare('INSERT INTO usuario (nome, email, data) values(:nome,:email,:data)');
    $sql->bindValue(':nome',$nome);
    $sql->bindValue(':email',$email);
    $sql->bindValue(':data',$data);
    $res=$sql->execute();
	 
	if($res==0){
    throw new Exception("Erro ao cadastrar !");
    return false;
   }   
   
   return true;
	 
		
	exit;	
		
	}
	
	return false;

     }
	
	
	
	
	public function pegarUsuario($email){
		$con=Connection::getCon();
		$sql='SELECT email FROM usuario WHERE  email = ?';
		$sql=$con->prepare($sql);
		$res=$sql->execute(array($email));
        $res = $sql->fetch(PDO::FETCH_ASSOC);
		 
		 
	 if($res > 0){
		 return true; 
		 }else
		 {
		return false;
	 }
  }
	
	
	public static function pegarUser($senha){
		
		if(isset($senha['senha'])){
		
		
		$con=Connection::getCon();
		$sql="SELECT * FROM usuario WHERE senha =?";
		$sql=$con->prepare($sql);
		$res=$sql->execute(array($senha['senha']));
		 $res = $sql->fetch(PDO::FETCH_ASSOC);
		$usuario=array('nome'=>$res['nome'],'id_user'=>$res['id_user']);
		 
		if($res > 0){
		 return $usuario; 
		 }else
		 {
		return $usuario;
	 }
		
		}
		
		else{
			
			
		$con=Connection::getCon();
		$sql="SELECT * FROM usuario WHERE nome =? AND email= ?";
		$sql=$con->prepare($sql);
		$res=$sql->execute(array($senha['nome'],$senha['email']));
		 $res = $sql->fetch(PDO::FETCH_ASSOC);
		$usuario=array('nome'=>$res['nome'],'id_user'=>$res['id_user']);
		 
		if($res > 0){
		 return $usuario; 
		 }else
		 {
		return $usuario;
	 }
			
			
		}
		
	}
	
	
	public function logarUsuario($dados){
		$con=Connection::getCon();
		$sql='SELECT nome , email FROM usuarios WHERE nome = ? AND email = ?';
		$sql=$con->prepare($sql);
		$res=$sql->execute(array($nome,$email));
  
		if($rs ==0){
			 
			throw new Exception('Usuário cadastrado já!');
			return false;
			
		}
		
		return true;
		
		
		
	}
	
}


?>