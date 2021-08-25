<?php class Categoria {
	

	public static  function selecionarCategorias(){
		
		$list=array();
	 $dica;
	 $ano="";
	 $mes;
	 $con = Connection::getCon();
	

 $sqll="SELECT * FROM  categoria ORDER BY id DESC";
 $sqll=$con->prepare($sqll);
 $sqll->execute();
 if($sqll){
	 
	  while ($roww = $sqll->fetch(PDO::FETCH_ASSOC)) {
	
$list[]=$roww;
	 }
	 
 }else{echo "Algo deu errado!";}
	
	 return $list;
		
}



		
	
		public static function cadastrarCategoria ($item){
		
		
	
	$list=array();
	 $dica;
	 $ano;
	 $mes;
	 $con = Connection::getCon();
	

 $sql=$con->prepare('INSERT INTO categoria(descricao) values(:descricao)');
 $sql->bindValue(':descricao',$item);
 $res=$sql->execute();

if($res==0){
   return $res='Não cadastrado';
	//return $res;
}else{
	return $res;
}
 
}
	
	
}
 
	
	

?>