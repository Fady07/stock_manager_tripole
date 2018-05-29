<?php
	session_start();
	$page = 'modifier un produit';
	include 'includes/head.php';
	include 'includes/footer.php';
	include 'includes/navbar.php';	

?>
<div class="col-md-3"></div>
<div class="col-md-6" style="margin-top:80px">
	<div class="panel panel-primary">
	<div class="panel-heading" align="center"><h3>Modifier un produit</h3></div>
	<div class="panel-body">
		<form  method="POST" action="update1.php">
			<div class="form-group">
				<label>Entrer le code de produit et cliquer sur afficher :</label>
				<input type="text" name="code_produit" class="form-control">
			</div>
			<div class="form-group" align="right">
				<input type="submit" name="show" value="afficher" class="btn btn-success">
			</div>
			<div class="col-md-6">
				<a href="dashboard.php">Page precedente</a>
			</div>
		
		</form>

<?php
	include 'includes/footer.php';
?>
