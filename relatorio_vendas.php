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
                <h1> RELATORIO DE VENDAS </h1>
                <?php
						$conectar = mysqli_connect ("localhost", "root", "", "cervejaria");			
						
						$data = date ('d/m/Y');
						
						$sql_consulta_vendas = "SELECT
													funcionario.nomeFuncionario,
													venda.dataVenda ,
													venda.idVenda
												FROM
													funcionario
												INNER JOIN venda ON funcionario.idFuncionario = venda.idFuncionario_FK";
						
						$resultado_consulta = mysqli_query ($conectar, $sql_consulta_vendas);		
						?>
                <table class="centralizar">
                    <tr>
                        <td class="esquerda">
                            <p> Funcionário </p>
                        </td>
                        <td>
                            <p> Data da Venda </p>
                        </td>
                        <td class="direita">
                            <p> Ação </p>
                        </td>
                    </tr>
                    <?php
						while ($registro = mysqli_fetch_row ($resultado_consulta))
						{
					?>
                    <tr>
                        <td class="esquerda">
                            <p>
                                <?php echo $registro[0]; ?>
                                </a>
                            </p>
                        </td>
                        <td>
                            <p>
                                <?php echo $registro[1];?>

                            </p>
                        </td>
                        <td class="direita">
                            <p>
                                <a href="detalha_venda.php?codigo=<?php echo $registro[2]?>">
                                    Detalhar
                                </a>
                            </p>
                        </td>
                    </tr>

                    <?php
						}
					?>
                </table>
                <p> <a href="menu.php"> Voltar </a> </p>
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