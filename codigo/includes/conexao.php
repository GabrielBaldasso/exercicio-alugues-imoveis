<?php 

	$host 		= "localhost";	
	$user 		= "root";
	$password 	= "";
	$database	= "locacao";

	$conn 		= mysqli_connect($host, $user, $password, $database);
	
	if(!$conn){
		echo "A conexão falhou. Erro: " . mysqli_connect_error();
	}
?>