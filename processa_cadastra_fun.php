<?php
	$conectar = mysqli_connect ("localhost", "root", "", "cervejaria");
		
	$nome = $_POST["nome"];
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	$funcao = $_POST["funcao"];
	$dataNas = $_POST["dataNas"];
	$telefone = $_POST["telefone"];

	$sql_consulta = "SELECT login FROM funcionario
					 WHERE login = '$login'";
							 
	$resultado_consulta = mysqli_query ($conectar, $sql_consulta);
		
	$linhas = mysqli_num_rows ($resultado_consulta);		
		
	if ($linhas == 1) {
	
		echo "<script> 
					alert ('Login ja cadastrado. Tente outro!') 
		      </script>";
			  
		echo "<script> 
					location.href = ('cadastra_fun.php') 
			  </script>";			
	}
	else {

		$sql_cadastrar = "INSERT INTO funcionario
				(nomeFuncionario, funcao, login, senha, telefone, dataNascimento) 
						  VALUES 
				('$nome' , '$funcao', '$login' , '$senha' ,'$telefone' , '$dataNas')";
		$resultado_cadastrar = mysqli_query ($conectar, $sql_cadastrar);
		
		if ($resultado_cadastrar == true) { 		
			echo "<script> 
					alert ('$nome cadastrado com sucesso') 
				  </script>";
			
			echo "<script> 
					location.href = ('cadastra_fun.php') 
				  </script>";	
		}
		else { 		
			echo "<script> 
					alert ('ocorreu um erro no servidor. Tente de novo') 
			     </script>";
		
			echo "<script> 
					location.href = ('cadastra_fun.php') 
				  </script>";		
		}	
	}
?>