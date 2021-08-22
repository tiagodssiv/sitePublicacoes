<?php
class HomeController {
	public function dropboxCategoria(){
		echo'
		 <li><a href="#">Assunto</a>
          <ul>
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 3</a></li>
          </ul>
        </li>';
		
		
	}
    public function index (){

        try { 

           
  
         // $dados=Postagem::selecionaTodos();
	// está pegando os dados da classe static sem ser necessário instanciar
        //  $datas=Postagem::selecionarDatas();
		   $tategorias=Categoria::selecionarCategorias();
           $destaque=array();
           $myArray=Postagem::datas();//dados de postagens  com destaques e sem destaques
		   $destaque=Destaque::destaques();//dados de postagens  com destaques 
		  //$destaque['itens']=$myArray;
          //var_dump($destaque);
           $loader = new \Twig\Loader\FilesystemLoader('app/view');//especifica a pasta onde está pagina a ser acessda
           $twig = new \Twig\Environment($loader);//instancia 
           $template = $twig->load('home.html');//carrega a pagina 
		   
           $parametros=array();
		   $teste=array();
		   $parametros['postagens']=$myArray;/*a lista parametros recebe todos os dados Destacados e Sem destaque*/
		   $parametros['itens']= $destaque;
		   $parametros['categorias']=$tategorias;/* a lista parametros  recebe uma outra lista de dados somente com estatus Destacados
			 mas com o seletor itens .Ou seja , um seletor tem ['postagens'] que vai receber todos os dados e o outro ['itens '] que vai receber
			 somente dados com o status Descatado.Desta maneira a view vai receber as duas listas , bastando indicar qual seletor usar para definir quais dados 
			 mostrar: se somente dados com status Destacados ou todos os registros*/
		  // $conteudo=$template->render( $parametros);//aqui pega os parametros e renderiza junto com pagina html e joga tudo na variavel $conteudo

           $conteudo=$template->render($parametros);
           echo $conteudo;//depois de renderizar tudo na  variavel $conteudo ,faz um cho da variavel $conteudo
            


      
        } catch (Exception $e) {
            echo $e->getMessage();//pega a mensagem de erro vinda da class postagem caso não haja nenhum dado na tabela pstagem
        }
       // echo 'HOME';
     
    
    }
    
    
    
    
    }
    
    
    




?>