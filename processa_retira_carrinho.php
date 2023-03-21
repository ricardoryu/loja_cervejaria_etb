<?php	
	$conectar = mysqli_connect ("localhost", "root", "", "cervejaria");
				
	
	$cod = $_GET["codigo"];	
	
	$sql_altera = "DELETE from carrinho 		
				   WHERE 	idCerveja_FK = '$cod'";
	$sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);

	if ($sql_resultado_alteracao == true)
	{
		echo "<script>
				alert ('Cerveja retirado do carrinho com sucesso') 
			  </script>";
		echo "<script> 
				 location.href = ('vendas.php') 
			  </script>";
		exit();
	}  
	else
	{    
		echo "<script> 
				alert ('Ocorreu um erro no servidor. A cerveja n�o foi retirado do carrinho. Tente de novo') 
			</script>";
		echo "<script> 
				location.href ('vendas.php') 
			 </script>";
	}
?>