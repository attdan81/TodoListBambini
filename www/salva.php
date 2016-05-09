<?php 
$file='data/data.json';
$json = file_get_contents($file);
$dati= json_decode($json,false);
$name=$_GET["name"];
$date=$_GET["date"];
$compiti=$_GET["compiti"];
$colazione=$_GET["colazione"];
$ordine=$_GET["ordine"];
foreach($dati as $d){
	if ($d->name==$name){
		$bResult=false;
		if ($colazione=="true" && $ordine=="true" && $compiti=="true"){
			$bResult=true;
		}
		$days=$d->days;		
		$day=array("date" => $date,
			  "result"=> $bResult,
			  "targets" => array (
			  		array(
			  		"targetName"=> "Colazione,vestiti, denti",
			  		"targetResult"=> $colazione
			  		),
			  		array("targetName"=> "Compiti,cartella",
                          "targetResult"=> $compiti
                    ),
                    array("targetName"=> "Ordine, mettere a posto giochi e vestiti",
                          "targetResult"=> $ordine
                    )
                )               
           );
		array_push($d->days,$day);				
		var_dump($dati);		
	}	
}
//var_dump($dati);
$json_econded=json_encode($dati);
file_put_contents($file, $json_econded);
?>