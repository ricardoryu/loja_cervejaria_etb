<?php	
	$conectar = mysqli_connect ("localhost", "root", "", "cervejaria");
				
	
	
	$sql_apaga = "DELETE From carrinho";
	$sql_resultado_apaga = mysqli_query ($conectar, $sql_apaga);

	if ($sql_resultado_apaga == true)
	{
		echo "<script>
				alert ('Venda Cadastrada com Sucesso') 
			  </script>";
		echo "<script> 
				 location.href = ('vendas.php') 
			  </script>";
		exit();
	}  
	else
	{    
		echo "<script> 
				alert ('Ocorreu um erro no servidor. A Venda não foi Cadastrada. Tente de novo') 
			</script>";
		echo "<script> 
				location.href ('vendas.php') 
			 </script>";
	}
?>