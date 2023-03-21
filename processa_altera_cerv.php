<?php	
	$conectar = mysqli_connect ("localhost", "root", "", "cervejaria");
				
	$cod = $_POST["codigo"];
	$marca = $_POST["marca"];
	$nome = $_POST["nome"];
	$preco = $_POST ["preco"];
	$tipo = $_POST["tipo"];
	$teor = $_POST["teor"];
	$temp = $_POST["temp"];
	$foto = $_FILES["foto"];
	
	
	if ($foto["name"] <> "") {
		$foto_nome = "img/".$foto["name"];		
		move_uploaded_file($foto["tmp_name"], $foto_nome);
	}
	
	$sql_altera = "UPDATE cerveja 		
				   SET 		marca='$marca', 
							nomeCerveja = '$nome',
							teorAlcoolico ='$teor', 
							preco = '$preco',
							tipo = '$tipo',
							foto = '$foto',
							temperaturaConsumo = '$temp'
				   WHERE 	idCerveja = '$cod'";
	$sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);

	if ($sql_resultado_alteracao == true)
	{
		echo "<script>
				alert ('$nome alterado com sucesso') 
			  </script>";
		echo "<script> 
				 location.href = ('lista_cerveja.php') 
			  </script>";
		exit();
	}  
	else
	{    
		echo "<script> 
				alert ('Ocorreu um erro no servidor. Dados da cerveja não foram alterados. Tente de novo') 
			</script>";
		echo "<script> 
				location.href ('lista_cerveja.php') 
			 </script>";
	}
?>