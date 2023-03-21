<?php	
	$conectar = mysqli_connect ("localhost", "root", "", "cervejaria");
				
	$cod = $_POST["codigo"];
	
	$sql_excluir = "DELETE FROM 
					cerveja 		
				   WHERE 	idCerveja = '$cod'";
	$sql_resultado_exclui = mysqli_query ($conectar, $sql_excluir);

if ($sql_resultado_exclui == true)
	{
		echo "<script>
				alert ('Cerveja Excluida com sucesso') 
			  </script>";
		echo "<script> 
				 location.href = ('lista_cerveja.php') 
			  </script>";
		exit();
	}  
	else
	{    
		echo "<script> 
				alert ('Ocorreu um erro no servidor. Cerveja não foi excluida. Tente de novo') 
			</script>";
		echo "<script> 
				location.href ('lista_cerveja.php') 
			 </script>";
	}
?>