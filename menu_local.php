<?php
	if ($_SESSION["funcao"] == "administrador") {
?>
<ul>
    <li><a href="menu.php" class="active">Administração</a></li>
    <li><a href="lista_fun.php" class="active">Funcionários</a></li>
    <li><a href="lista_cerveja.php">Cervejas</a></li>
    <li><a href="vendas.php">Vendas</a></li>
    <li><a href="relatorio_vendas.php">Relatorios de Vendas</a></li>
</ul>

<?php
	}
	elseif ($_SESSION["funcao"] == "estoquista") {
?>
<ul>
    <li><a href="menu.php" class="active">Administração</a></li>
    <li><a href="lista_cerveja.php">Cervejas</a></li>
</ul>
<?php		
	}
	elseif ($_SESSION["funcao"] == "vendedor") {
?>
<ul>
    <li><a href="menu.php" class="active">Administração</a></li>
    <li><a href="vendas.php">Vendas</a></li>
    <li><a href="relatorio_vendas.php">Relatorios de Vendas</a></li>
</ul>
<?php		
	}
?>