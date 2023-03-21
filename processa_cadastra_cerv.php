<?php
	session_start();

	$conectar = mysqli_connect ("localhost", "root", "", "cervejaria");
	
	$marca = $_POST["marca"];
	$nome = $_POST["nome"];
	$preco = $_POST ["preco"];
	$tipo = $_POST["tipo"];
	$teor = $_POST["teor"];
	$temp = $_POST["temp"];
	$foto = $_FILES["foto"];
	
	$foto_nome = "img/".$foto["name"];
	move_uploaded_file($foto["tmp_name"], $foto_nome);
	
	$sql_cadastrar = "INSERT INTO cerveja ( marca,
											nomeCerveja, 
											teorAlcoolico, 
											preco, 
											tipo, 
											foto,
											temperaturaConsumo) 
					  VALUES 			   ('$marca',
											'$nome',
											'$teor',
											'$preco',
											'$tipo',
											'$foto_nome',
											'$temp')";
											
	$sql_resultado_cadastrar = mysqli_query ($conectar, $sql_cadastrar);
	
	if ($sql_resultado_cadastrar == true) { 	
		echo "<script>
				alert ('$nome cadastrado com sucesso') 
			  </script>";
		echo "<script>
				location.href = ('cadastra_cerveja.php') 
			  </script>";		
	}
	else { 	
		echo "<script> 
				alert ('ocorreu um erro no servidor ao 
											tentar cadastrar') 
			  </script>";
		
		echo "<script> 
				location.href = ('cadastra_cerveja.php') 
			  </script>";
	
	}
?>