<?php 
	session_start ();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
</head>

<body>
    <div id="principal">
        <div id="topo">
            <div id="logo">
                <img src="img/logo-cana-brava-rum.jpg" width="600" height="150">
            </div>
            <div class="menu_global">
                <ul>
                    <li> Olá <?php include "valida_login.php";?></li>
                    <li><a href="logout.php" class="active">Sair</a></li>
                </ul>
            </div>
        </div>
        <div id="conteudo_especifico">
            <div class="div_central centralizar">
                <h1> EXIBIÇÃO DE CERVEJAS </h1>
            </div>
            <div class="div_esquerda menu_local">
                <?php

						include "menu_local.php";
					
					?>
            </div>
            <div id="funcionalidade" class="div_direita">
                <?php		
						$conectar = mysqli_connect ("localhost", "root", "", "cervejaria");
					$codigo_cerv = $_GET["codigo"];
					$sql_pesquisa_cerv = "SELECT nomeCerveja, tipo, marca , teorAlcoolico, temperaturaConsumo , preco, foto
											  FROM cerveja
											  WHERE idCerveja = '$codigo_cerv'";
					$resultado_pesquisa_cerv = mysqli_query ($conectar, $sql_pesquisa_cerv);

					$registro_cerv = mysqli_fetch_row($resultado_pesquisa_cerv);
					?>
                <table class="esquerda">
                    <tr>
                        <td colspan="2">
                            <img src="<?php echo "$registro_cerv[6]"; ?>" width="580" height="650">
                        </td>
                    <tr>
                    <tr>
                        <td>
                            <?php
									echo "<p> Nome: $registro_cerv[0] </p>";
									echo "<p> Marca: $registro_cerv[2]</p>";
									echo "<p> Teor Alcoolico: $registro_cerv[3]</p>";
								?>

                        </td>
                        <td>
                            <?php
									echo "<p> Tipo: $registro_cerv[1] </p>";
									echo "<p> Preço: $registro_cerv[5]</p>";
									echo "<p> Temperatura de Consumo: $registro_cerv[4]</p>";
								?>
                            <button onclick="history.back()">Voltar</button>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
        <div id="rodape">
            <div id="texto_institucional">
                <div id="texto_institucional">
                    <h6> Cana Brava Ltda </h6>
                    <h6> Rua das Bebidas, loja 42 -- E-mail: contato@cana-brava.com.br -- Fone: (61) 98542 - 5894</h6>
                </div>
            </div>
        </div>
</body>

</html>