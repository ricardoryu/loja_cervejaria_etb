<?php
	if ( isset($_SESSION["login"]) ) {
		
		echo $_SESSION["nomeFuncionario"];
		
	}
	else {
	
		echo "<script> 
				alert ('Você não está logado!!!') 
			  </script>";
			
		echo "<script> 
				location.href = ('index.php') 
			  </script>";
	}
?>