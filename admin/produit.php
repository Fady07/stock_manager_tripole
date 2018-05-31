<?php
	session_start();
	$page = 'Ajouter un produit';
	include 'includes/head.php';
	include 'includes/navbar.php';
	include 'connect.php';
	
	$sql = $connect->prepare('SELECT * FROM depot');
    $sql->execute();
    $results = $sql->fetchAll(PDO::FETCH_ASSOC);	

?>

<div class="col-md-3"></div>
<div class="col-md-6" style="margin-top:80px">
	<div class="panel panel-primary">
	<div class="panel-heading" align="center"><h3>Ajouter un produit</h3></div>
	<div class="panel-body">
		<form action="Stock_process.php" method="POST">
			<div class="form-group">
				<label>Code produit :</label>
				<input type="text" class="form-control" name="code_produit">
			</div>

			<div class="form-group">
				<label>Nom du produit :</label>
				<input type="text" class="form-control" name="name_product">
			</div>

			<div class="form-group">
				<label>choisir le depot :</label>
		        <select name="depot">';
		       		<?php     	
		       		foreach( $results as $row ){    
		       		echo '<option>';
		       		echo $row['name_repository'];	
		       		echo '</option>';
		       		};
		       		echo '</select>';
		       		 ?>
		       		<a href="depot.php">ajouter un depot</a>
			</div>



			<div class="form-group">
				<label>Quantite :</label>
				<input type="text" class="form-control" name="amount_product">
			</div>

			<div class="form-group">
				<label>Prix d'achat :</label>
				<input type="text" class="form-control" name="price_buy_p">
			</div>

			<div class="form-group">
				<label>Prix de vente :</label>
				<input type="text" class="form-control" name="price_sell_p">
			</div>

			<div class="form-group" align="right">
				<input type="submit" class="btn btn-primary" name="submit" value="Enregistrer">
			</div>

			<div class="col-md-6">
				<a href="dashboard.php">Page precedente</a>
			</div>
		</form>
	</div>
</div>
</div>

<?php
	include 'includes/footer.php';
?>