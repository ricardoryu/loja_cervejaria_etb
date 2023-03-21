<?php	
	$conectar = mysqli_connect ("localhost", "root", "", "cervejaria");
				
	$cod = $_POST["codigo"];
	
	$sql_excluir = "DELETE FROM 
					funcionario 		
				   WHERE 	idFuncionario = '$cod'";
	$sql_resultado_exclui = mysqli_query ($conectar, $sql_excluir);

if ($sql_resultado_exclui == true)
	{
		echo "<script>
				alert ('Funcionario Excluido com sucesso') 
			  </script>";
		echo "<script> 
				 location.href = ('lista_fun.php') 
			  </script>";
		exit();
	}  
	else
	{    
		echo "<script> 
				alert ('Ocorreu um erro no servidor. Funcionario não foi excluido. Tente de novo') 
			</script>";
		echo "<script> 
				location.href ('lista_fun.php') 
			 </script>";
	}
?>