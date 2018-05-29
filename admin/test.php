<?php


$connect = new pdo ('mysql:host=localhost;dbname=stock_manager', 'root', '');
$i = false;
$code = $_POST['id'];
$sql = $connect->prepare('SELECT * FROM product WHERE code_product=?');
$sql->execute(array($code));
$count = $sql->rowCount();
$results = $sql->fetchAll(PDO::FETCH_ASSOC);
//print_r($results);
if ($count == 1) {
$id = $results[0]['id_product'];
$cod = $results[0]['code_product'];
$name = $results[0]['name_product'];
$amount = $results[0]['qte_product'];
$pa = $results[0]['price_buy_product'];
$pv = $results[0]['price_sell_product'];
}else{$i = true; $error = 'Sorry! product not found!'; echo $error;}


  ?>
  <tr id="tr">
  		<td>
			<label><?php if($i==false){echo($id);} ?></label>
		</td>
		<td>
			<input type="text" name="code_produit" id="info"  value="<?php if($i==false){echo($cod);} ?>">
		</td>
		<td>
			<input type="text" name="name" id="info" value="<?php if($i==false){echo($name);} ?>">
		</td>
		<td>
			<input type="text" name="amount" id="info" value="<?php if($i==false){echo($amount);} ?>">
		</td>
		<td>
			<input type="text" name="pv" id="info" value="<?php if($i==false){echo($pv);} ?>">
		</td>
		<td>
			<?php  if($i==false){$p = (int)$amount * (int)$pv; echo $p;}?>
				
		</td>
		<td>
			<input type="submit" name="show1" value="Ajouter">
		</td>
		<td>
			<input type="submit" name="submit" value="valider">
		</td>
</tr>