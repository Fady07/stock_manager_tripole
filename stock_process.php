<?php
$conn = new pdo ('mysql:host=localhost;dbname=stock_manager','root','');
if (isset($_POST['submit'])) {
	$code = htmlspecialchars($_POST['code_produit']);
	$name = htmlspecialchars($_POST['name_product']);
	$amount = htmlspecialchars($_POST['amount_product']);
	$P_buy = htmlspecialchars($_POST['price_buy_p']);
	$P_sell = htmlspecialchars($_POST['price_sell_p']);
	if ($code && $name && $amount && $P_buy) {
		$sql = $conn->prepare('SELECT * FROM product WHERE code_product=?');
        $sql->execute(array($code));
        $count1 = $sql->rowCount();
        if ($count1 == 0) {
        	$sql1 = "INSERT INTO product VALUES ('', '$code', '$name', '$amount', '$P_buy', '$P_sell')";
		$conn->exec($sql1);
		echo 'Le produit a ete enregistree!<br> ';
        }else{
        	$error1 = 'product exists already!';
        	echo $error1;
        }
	
	}else{
		$error = 'You have to fill all fields!';
		echo $error;
	}
}
?>
