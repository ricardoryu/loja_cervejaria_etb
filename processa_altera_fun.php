<?php	
	$conectar = mysqli_connect ("localhost", "root", "", "cervejaria");
				
	$cod = $_POST["codigo"];
	$funcao = $_POST["funcao"];
	if ($funcao == "administrador") {
		$senha = $_POST["senha"];
		$sql_altera = "UPDATE funcionario 		
						   SET 		
									senha = '$senha'
									
						   WHERE 	idFuncionario = '$cod'";
			$sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);
		
			if ($sql_resultado_alteracao == true)
			{
				echo "<script>
						alert ('Senha do administrador alterada com sucesso') 
					  </script>";
				echo "<script> 
						 location.href = ('lista_fun.php') 
					  </script>";
				exit();
			}  
			else
			{    
				echo "<script> 
						alert ('Ocorreu um erro no servidor. A senha do administrador n�o foi alterada. Volte e tente de novo') 
					</script>";
				echo "<script> 
						location.href ('lista_fun.php') 
					 </script>";
				exit();
			}
	}	
	else {
		$nome = $_POST["nome"];
		$login = $_POST["login"];
		$senha = $_POST["senha"];
		$funcao = $_POST["funcao"];
		$dataNas = $_POST["dataNas"];
		$telefone = $_POST["telefone"];
		$status = $_POST["status"];
		
		$sql_pesquisa = "SELECT login FROM funcionario	
								  WHERE login = '$login' 							  
								  AND   idFuncionario <> '$cod'";							  
		$sql_resultado = mysqli_query ($conectar, $sql_pesquisa);
								  
		$linhas = mysqli_num_rows ($sql_resultado);		
		if ($linhas == 1)
		{
			echo "<script> alert ('Login do funcion�rio j� existente. Tente de novo.')  </script>";
			echo "<script> 
				location.href = ('lista_fun.php?codigo=$cod')
				  </script>";
			exit;	  
		}
		else
		{							
						
			$sql_altera = "UPDATE funcionario 		
						   SET 		nomeFuncionario='$nome', 
									funcao = '$funcao',
									login ='$login', 
									senha = '$senha',
									status = '$status',
									telefone = '$telefone',
									dataNascimento = '$dataNas'
						   WHERE 	idFuncionario = '$cod'";
			$sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);
		
			if ($sql_resultado_alteracao == true)
			{
				echo "<script>
						alert ('$nome alterado com sucesso') 
					  </script>";
				echo "<script> 
						 location.href = ('lista_fun.php') 
					  </script>";
				exit();
			}  
			else
			{    
				echo "<script> 
						alert ('Ocorreu um erro no servidor. Dados do funcion�rio n�o foram alterados. Tente de novo') 
					</script>";
				echo "<script> 
						location.href ('lista_fun.php') 
					 </script>";
			}
		
		}
	}
?>