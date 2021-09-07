

<?php 


class LoginController {

public function cadUser(){
	
	try{
		if(Login::cadastarUsuario($_POST)){
			echo'<script>alert("Usuário cadastrado!")</script>';
            echo '<script>location.href="http://localhost/php mvc com PDO TESTE/"</script>';
			
		}
		
		else{
			echo'<script>alert("Usuário  já cadastrado!")</script>';	
			  echo '<script>location.href="http://localhost/php mvc com PDO TESTE/"</script>';
			
		}
		
		
		
	}catch (Exception $e)
	{
		echo '<script> alert("'.$e.'") </script>';
		  echo '<script>location.href="http://localhost/php mvc com PDO TESTE/"</script>';
			
	}

}

 public function logout(){
	
}
 public function logar(){
	 
	 $lista=Login::pegarUser($_POST);
	 $lista['user']=$lista;
	 $nome=$lista['user']['nome'];
	 $id_user=$lista['user']['id_user'];
	 
	 if(  isset($_POST['senha'])){
		 
		 	 $lista['adm']=$lista;
	 $nome=$lista['adm']['nome'];
	  $id_adm=$lista['adm']['id_user'];
	 

	 if( $nome !="" AND $nome =="Administrador" ){
		session_cache_expire(30);
		session_start();
		
		$_SESSION['adm']=$nome;
		$_SESSION['id_adm']=$id_adm;
	
	
		
		 echo '<script>location.href="http://localhost/php mvc com PDO TESTE/?pagina=admin&metodo=index"</script>';
		
	}else{
			echo '<script> alert("Usuário inválido!") </script>';
		  echo '<script>location.href="http://localhost/php mvc com PDO TESTE/"</script>';
		
		
	}
	 
		 
		 
	 }else{

	
	 if( $nome !="" ){
		session_start();
		
		$_SESSION['nome_user']=$nome;
		$_SESSION['id_user']=$id_user;
	
		
			  echo '<script>location.href="http://localhost/php mvc com PDO TESTE/"</script>';
	}
	
	else{
			echo '<script> alert("Usuário inválido!") </script>';
		  echo '<script>location.href="http://localhost/php mvc com PDO TESTE/"</script>';
		
		
	}
	 
 }

}

}


?>