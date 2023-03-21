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
                <h1> ALTERAÇÃO DE CERVEJAS </h1>
            </div>
            <div class="div_esquerda menu_local">
                <?php

						include "menu_local.php";
					
					?>
            </div>
            <div id="funcionalidade" class="div_direita">
                <?php
						$conectar = mysqli_connect ("localhost", "root", "", "cervejaria");
						
						$cod = $_GET["codigo"];
										
						$sql_pesquisa = "SELECT  idCerveja, nomeCerveja, tipo, marca , teorAlcoolico, temperaturaConsumo , preco, foto
										FROM cerveja
										 WHERE  idCerveja = '$cod'";
						$resultado_pesquisa = mysqli_query ($conectar, $sql_pesquisa);	
						
						$registro = mysqli_fetch_row($resultado_pesquisa);
					?>
                <form method="post" action="processa_altera_cerv.php">
                    <input type="hidden" name="codigo" value="<?php echo "$cod"; ?>">
                    <table class="centralizar">
                        <tr>
                            <td>
                                <p> Nome: </p>
                            </td>
                            <td>
                                <p> <input type="text" name="nome" required value="<?php echo "$registro[1]"; ?>"> </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p> Marca: </p>
                            </td>
                            <td>
                                <p> <input type="text" name="marca" required value="<?php echo "$registro[3]"; ?>"> </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p> Teor Alcoolico: </p>
                            </td>
                            <td>
                                <p> <input type="text" name="teor" required value="<?php echo "$registro[4]"; ?>"> </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p> Temperatura de consumo: </p>
                            </td>
                            <td>
                                <p> <input type="text" name="temp" required value="<?php echo "$registro[5]"; ?>"> </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p> Preço: </p>
                            </td>
                            <td>
                                <p> <input type="text" name="preco" required value="<?php echo "$registro[6]"; ?>"> </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p> Foto: </p>
                            </td>
                            <td>
                                <p> <input type="file" name="foto"> </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p> Tipo: </p>
                            </td>
                            <td>
                                <p>
                                    <select name="tipo">
                                        <option value="Trigo" <?php
														if ($registro[2] == "Trigo") {
															echo "selected";
														}
													?>> Trigo </option>
                                        <option value="ALE" <?php
														if ($registro[3] == "ALE") {
															echo "selected";
														}
													?>> ALE </option>
                                        <option value="IPA" <?php
														if ($registro[3] == "IPA") {
															echo "selected";
														}
													?>> IPA </option>
                                    </select>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p> <input type="submit" value="Alterar Cerveja"> </p>
                            </td>
                        </tr>
                    </table>
                </form>
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