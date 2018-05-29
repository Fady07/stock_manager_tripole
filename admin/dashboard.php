<?php
	session_start();
	$page = 'dashboard';
	include 'includes/footer.php';
	include 'includes/head.php';
	include 'includes/navbar.php';
?>

	<h1><i><center>WELCOME <?php echo $_SESSION['username']; ?></center></i></h1>
	

<?php
	include 'includes/footer.php';
?>