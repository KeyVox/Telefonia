<?php
function valida($ruta,$frase,$TOKEN){
	$curl=curl_init("https://api.wit.ai/speech?v=$frase&n=5");
	curl_setopt_array($curl,array(
		CURLOPT_HTTPHEADER=>array("Content-Type: audio/wav","Authorization: Bearer $TOKEN"),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_POST=>true,
		CURLOPT_FOLLOWLOCATION=>true,
		CURLOPT_POSTFIELDS=>file_get_contents($ruta)
	));
	 
	if($result=curl_exec($curl))
	{
		curl_close($curl);
		$cantidad;
		$resultados=json_decode($result,true);
		if($resultados){
			return true;
		}else{
			return false;
		}
	}
}
?>
