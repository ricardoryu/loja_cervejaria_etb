<?php	
	$conectar = mysqli_connect ("localhost", "root", "", "cervejaria");
				
	
	$cod = $_GET["codigo"];	
	
	$sql_verifica = "select idCerveja_FK from carrinho
					where idCerveja_FK = '$cod'";
	$sql_resultado_verifica = mysqli_query ($conectar, $sql_verifica);
	$registro = mysqli_fetch_row($sql_resultado_verifica);
	echo "$registro";
	
	if ($registro == null ){
		$sql_insere = "Insert into carrinho (idCerveja_FK, quantidade) 
				   values ('$cod' , 1)";
	   $sql_resultado_insere = mysqli_query ($conectar, $sql_insere);

	  if ($sql_resultado_insere == true)
	{
		echo "<script>
				alert ('Cerveja colocado no carrinho com sucesso') 
			  </script>";
		echo "<script> 
				 location.href = ('vendas.php') 
			  </script>";
		exit();
	}
	else {
		echo "<script> 
				alert ('Ocorreu um erro no servidor. A cerveja não foi colocado no carrinho. Tente de novo') 
			</script>";
		echo "<script> 
				location.href ('vendas.php') 
			 </script>";
	}	
	}
	if ($registro != null ){
		$sql_altera = " update carrinho 
						set quantidade= quantidade +1
						where idCerveja_FK = '$cod'";
		$sql_resultado_altera = mysqli_query ($conectar, $sql_altera);
		if ($sql_resultado_altera == true)
	{
		echo "<script>
				alert ('Cerveja colocado no carrinho com sucesso') 
			  </script>";
		echo "<script> 
				 location.href = ('vendas.php') 
			  </script>";
		exit();
	}
	else {
		echo "<script> 
				alert ('Ocorreu um erro no servidor. A cerveja n�o foi colocado no carrinho. Tente de novo') 
			</script>";
		echo "<script> 
				location.href ('vendas.php') 
			 </script>";
	}	
	
	}
		
		
	
?>