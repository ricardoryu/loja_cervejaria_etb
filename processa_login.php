<?php
	session_start();
	
	$conectar = mysqli_connect ("localhost", "root", "", "cervejaria");
	
	$login = $_POST["login"];
	$senha = $_POST["senha"];	
		
	$sql_consulta = "SELECT idFuncionario, nomeFuncionario, login, senha, funcao FROM funcionario
					 WHERE 
					       login = '$login' 
					 AND 
					       senha = '$senha'";
					 
	$resultado_consulta = mysqli_query ($conectar, $sql_consulta);
	
	$linhas = mysqli_num_rows ($resultado_consulta);
	
	
	if ($linhas == 1) {	
		$registro = mysqli_fetch_row($resultado_consulta);
		$_SESSION["idFuncionario"] = $registro[0];
		$_SESSION["nomeFuncionario"] = $registro[1];
		$_SESSION["login"] = $registro[2];
		$_SESSION["funcao"] = $registro[4];		
		
		echo "<script> 
					location.href = ('menu.php') 
			  </script>";
	}
	else {
		echo "<script> 
				  alert ('Login ou Senha Incorretos! Digite Novamente!!') 
			  </script>";
		echo "<script> location.href = ('index.php') </script>";
	}
?>