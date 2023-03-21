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
                <h1> CARRINHO </h1>
            </div>
            <div class="div_esquerda menu_local">
                <?php

						include "menu_local.php";
					
					?>
            </div>
            <div id="funcionalidade" class="div_direita">
                <?php
						$conectar = mysqli_connect ("localhost", "root", "", "cervejaria");			
					
						$sql_consulta = "SELECT 
											cerveja.idCerveja ,
											cerveja.nomeCerveja, 
											carrinho.quantidade , 
											cerveja.preco 
										FROM 
											cerveja 
										INNER JOIN carrinho ON cerveja.idCerveja = carrinho.idCerveja_FK";
						$resultado_consulta = mysqli_query ($conectar, $sql_consulta);
						
							
					?>
                <table class="centralizar">
                    <tr>
                        <td class="esquerda">
                            <p> Nome </p>
                        </td>
                        <td>
                            <p> Quantidade </p>
                        </td>
                        <td>
                            <p> Preço Unitario </p>
                        </td>
                        <td>
                            <p> Preço Total</p>
                        </td>
                        <td class="direita">
                            <p> Ação </p>
                        </td>
                    </tr>
                    <?php	
							$valor_total = 0;
							while ($registro = mysqli_fetch_row($resultado_consulta))
							{
						?>
                    <tr>
                        <td class="esquerda">
                            <p>
                                <a href="exibe_cerveja.php?codigo=<?php echo $registro[0]?>">
                                    <?php echo $registro[1]; ?>
                                </a>
                            </p>
                        </td>
                        <td>
                            <p>
                                <?php echo $registro[2];?>

                            </p>
                        </td>
                        <td class="esquerda">
                            <p>
                                <?php echo $registro[3]; ?>
                            </p>
                        </td>
                        <td class="esquerda">
                            <p>
                                <?php echo $registro[3] * $registro[2] ; 
									$valor_total = $valor_total + ($registro[3] * $registro[2]);?>
                            </p>
                        </td>
                        <td class="direita">
                            <p>
                                <a href="processa_retira_carrinho.php?codigo=<?php echo $registro[0]?>">
                                    Retirar do Carrinho
                                </a>
                            </p>
                        </td>
                    </tr>
                    <?php
							}
						?>
                </table>
                <p> Total da Venda: <?php echo $valor_total; ?> </p>
                <p> <a href="vendas.php"> Voltar a lista de cervejas </a> </p>
                <p> <a href="ver_recibo.php"> Finalizar venda </a> </p>
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