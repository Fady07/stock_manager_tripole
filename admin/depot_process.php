<?php
include 'connect.php';

if (isset($_POST['submit'])) {
	$depot = $_POST['depot'];
	$db = $connect->prepare("INSERT INTO depot VALUES ('','$depot')");
	$db->execute(array($depot));
	echo "Ajoute depot avec succes!";
}

?>
<br><br>
<a href="dashboard.php">Retour</a>