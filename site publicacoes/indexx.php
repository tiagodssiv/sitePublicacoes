<?php
date_default_timezone_set('America/Sao_Paulo');
/* $data = new DateTime();
           $dataCerta= $data->format('Y-m-d H:i:s');
$envio = strtotime($dataCerta);
$datamensagem = date("d/m/Y", $envio);
 'teste'.$horamensagem = date("H:i", $envio);

//'soma'. $soma =1440*60;echo'<br>'.$envio;
$start_date = new DateTime('2010-10-01');
$end_date = new DateTime('2010-10-05');
*/

/*

$dtStart = new DateTime('2021-08-01 17:17:00'); //data vinda do banco
//$dataInicio=$dtStart->format('2021-08-04 00:00:00');
$dtEnd   = new  DateTime("2021-08-04 22:47:00"); // data atual  



$dtDiff =$dtStart->diff($dtEnd);
$dica= $dtDiff->format("%d");//("%d:%H:%I:%S");//mostrar dia ,hora, minutos e segundos.Fazer do mesmo jeto que está
if ($dica > 0){
	if($dica> 1 ){echo 'Feito há '.$dica.' dias';}
	else{echo 'Feito há '.$dica.' dia';}
	
}else{
	echo 'feito às '.$dtDiff->format("%H:%I");
	
}
$dtStart = new DateTime('1986-10-18 17:17:00'); 

$dtEnd   = new  DateTime("2021-08-05 00:47:00");  



$dtDiff =$dtStart->diff($dtEnd);*/    
$teste=array();
$array = array(
    'stack' => 'Overflow',
    'linguagem' => 'Português',
    'tags' => 'matemática'
);

array_walk($array, function ($value, $key){
	$teste[]=array($key->$value);
  //  var_dump($key, $value);
  
 // echo $value.'<br>';
});
echo 'tamanho'.$size = count($teste);

?>