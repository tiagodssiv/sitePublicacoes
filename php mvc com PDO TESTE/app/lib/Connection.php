<?php
abstract class Connection{ //abstract não permite a classe ser instanciada

    private  static $conn;//vai armazerar uma instancia PDO. essa variáve deve ficar dentro da class e não do método
  
    public static function getCon(){//metodo estático

     if(self::$conn==null){// esse if só deixa criar uma instancia.Foi utilizado sel:: porque a variável é static senão seria this
        self::$conn =new  PDO('mysql:host=127.0.0.1:3312; dbname=serie-criando-site;','root','');
        return self::$conn;//o self:: deve ser usado sempre quando temos que referenciar algum atributo static

     }

        
    }
}





?>