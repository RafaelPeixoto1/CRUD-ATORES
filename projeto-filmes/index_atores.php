<?php
$con=new mysqli("localhost","root","","atores");
if($con->connect_errno!=0){
	echo "Ocorreu um erro no acesso á base de dados".$con->connect_error;
	exit;
}
else{
?>
<!DOCTYPE html>
	<html>
	<head>
	<meta charset="ISO-8859-1">
	<title>Atores</title>
	</head>
	<body>
		<a href="atores_create.php">Atores Create</a>
		<h1>Lista de Atores</h1>
		<?php
		$stm=$con->prepare('select *from atores');
		$stm->execute();
		$res=$stm->get_result();
		while($resultado = $res->fetch_assoc()){
			echo '<a href="atores_show.php?atores='.$resultado['id_atores'].'">';
			echo '<a href="atores_edit.php?atores='.$resultado['id_atores'].'">';
			echo $resultado["nome"];
			echo "</a>";
			echo "<br>";
		}
		$stm->close();
		?>
		<br>
	</body>
	</html>
	<?php
}
?>


