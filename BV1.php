<?php
	session_start();
	$page='B Livraison';
	include 'includes/head.php';
	include 'includes/navbar.php';
	include_once("fonctions.php");



$i = true;
$connect = new pdo ('mysql:host=localhost;dbname=stock_manager', 'root', '');
if (isset($_POST['show'])) {
$i = false;
$code = $_POST['code_product'];
$sql = $connect->prepare('SELECT * FROM product WHERE code_product=?');
$sql->execute(array($code));
$count = $sql->rowCount();
$results = $sql->fetchAll(PDO::FETCH_ASSOC);
//print_r($results);
if ($count == 1) {
creationPanier();
$id = $results[0]['id_product'];
$cod = $results[0]['code_product'];
$name = $results[0]['name_product'];
$amount = $results[0]['qte_product'];
$pa = $results[0]['price_buy_product'];
$pv = $results[0]['price_sell_product'];
}else{$i = true; $error = 'Sorry! product not found!'; echo $error;}
}
if (isset($_POST['Ajouter'])) {
$code = $_POST['code_produit'];
$qt1 = $_POST['amount'];
$pv1 = $_POST['pv'];
$sql = $connect->prepare('SELECT * FROM product WHERE code_product=?');
$sql->execute(array($code));
$count = $sql->rowCount();
$results = $sql->fetchAll(PDO::FETCH_ASSOC);
if ($count == 1) {
$id = $results[0]['id_product'];
$cod = $results[0]['code_product'];
$name = $results[0]['name_product'];
$amount = $results[0]['qte_product'];
$pa = $results[0]['price_buy_product'];
$reste = (int)$amount - (int)$qt1;
$sql1 = "UPDATE product SET qte_product='$reste' WHERE id_product=$id";
$stmt = $connect->prepare($sql1);
$stmt->execute();
$p1 = (int)$qt1 * (int)$pv1;
$date = date("Y/m/d");
ajouterArticle($cod,$name,$qt1,$pv1,$p1);
//print_r($_SESSION['panier']);
$sql2 = "INSERT INTO BV VALUES ('', '$id', '$cod', '$name', '$qt1', '$pv1', '$p1', '$date' )";
$sql3 = "INSERT INTO BVH VALUES ('', '$cod', '$name', '$qt1', '$pv1', '$p1', '$date' )";
$connect->exec($sql2);
$connect->exec($sql3);
//ajouterArticle($cod,$name,$qt1,$pv1,$p1);
//print_r($_SESSION['panier']);
}	
}
if (isset($_POST['submit'])) {
	header("location: BV2.php");
	
	
}
//$_SESSION['panier'] = $tmp;
//unset($tmp);
  ?>





 <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6" style="margin-top:60px">
	<div class="panel panel-primary">
		<div class="panel-heading" align="center">
			<h2>Bon de livraison</h2>
		</div>
		<div class="panel-body">
				<div class="form-group">
					<label>Code produit</label>
					<input type="text" name="code_product" class="form-control"><br>
					<div align="right">
						<input type="submit" name="show" value="afficher" class="btn btn-primary" ><br>
						
					</div>
					<a href="dashboard.php">page precedente </a>
				</div>
		</div>
	</div>
</div>
</div>

<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8" style="margin-top:60px">
<table class="table table-striped">
	<thead>
		<th>ID</th>
		<th>Code produit</th>
		<th>Nom</th>
		<th>Quantite</th>
		<th>Prix de vente</th>
		<th>chiffre d'affaire </th>
	</thead>
	<tbody>
		<?php if (isset($_SESSION['panier'])){
			$ide = 0;
			foreach ($_SESSION['panier']['CodeProduit'] as $key => $value) {
			$ide = $ide + 1 ;
		 ?>
		<tr>
		<td>
			<label><?php echo($ide); ?></label>
		</td>
		<td>
			<input type="text" name="code_produit" value="<?php echo $_SESSION['panier']['CodeProduit'][$key];?>">
		</td>
		<td>
			<input type="text" name="name" value="<?php echo $_SESSION['panier']['NomProduit'][$key]; ?>">
		</td>
		<td>
			<input type="text" name="amount" value="<?php echo $_SESSION['panier']['QuantiteProduit'][$key]; ?>">
		</td>
		<td>
			<input type="text" name="pv" value="<?php echo $_SESSION['panier']['PrixProduit'][$key]; ?>">
		</td>
		<td>
			<?php  echo $_SESSION['panier']['chiffreDaffaire'][$key]; ?>
				
		</td>
		<td>
			<input type="submit" name="Ajouter" value="MODIFIER">
		</td>
		
	</tr>

	<?php 	}} ?>


		<tr>
		<td>
			<label><?php if($i==false){echo($id);} ?></label>
		</td>
		<td>
			<input type="text" name="code_produit" value="<?php if($i==false){echo($cod);} ?>">
		</td>
		<td>
			<input type="text" name="name" value="<?php if($i==false){echo($name);} ?>">
		</td>
		<td>
			<input type="text" name="amount" value="<?php if($i==false){echo($amount);} ?>">
		</td>
		<td>
			<input type="text" name="pv" value="<?php if($i==false){echo($pv);} ?>">
		</td>
		<td>
			<?php  if($i==false){$p = (int)$amount * (int)$pv; echo $p;}?>
				
		</td>
		<td>
			<input type="submit" name="Ajouter" value="Ajouter">
		</td>
		<td>
			<input type="submit" name="submit" value="valider">
		</td>
		</tr>

            
    </tbody>

</table>
</div>
</div>
</form>



	

<?php
	include 'includes/footer.php';
?>