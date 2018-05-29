<?php
	session_start();
	$page='B Livraison';
	include 'includes/head.php';
	include 'includes/navbar.php';



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
$id = $results[0]['id_product'];
$cod = $results[0]['code_product'];
$name = $results[0]['name_product'];
$amount = $results[0]['qte_product'];
$pa = $results[0]['price_buy_product'];
$pv = $results[0]['price_sell_product'];
}else{$i = true; $error = 'Sorry! product not found!'; echo $error;}
}
if (isset($_POST['show1'])) {
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
$sql2 = "INSERT INTO BV VALUES ('', '$id', '$cod', '$name', '$qt1', '$pv1', '$p1', '$date' )";
$sql3 = "INSERT INTO BVH VALUES ('', '$cod', '$name', '$qt1', '$pv1', '$p1', '$date' )";
$connect->exec($sql2);
$connect->exec($sql3);
}	
}
if (isset($_POST['submit'])) {
	header("location: BV2.php");
	
	
}


  ?>

<!--
<script>  
$(document).ready(function(){  
    $(document).on('click', '#btn_add', function(){  
        var id = $('#id').val();    
        if(id == '')  
        {  
            alert("enter id");  
            return false;  
        }else{   
        $.ajax({  
            url:"test.php",  
            method:"POST",  
            data:{id:id},  
            dataType:"text",  
            success:function(data)  
            {  
                //alert(data);
                $('#result').append(data);   
            }  
        })
        }  
    });
    $(document).on('click', '#btn_submit', function(){
    	var table = $('#info').val();     
        $.ajax({  
            url:"valider_BL.php",  
            method:"POST",  
            data:{table:table},  
            dataType:"text",  
            success:function(data)  
            {  
                //alert(data);
                $('#array').append(data);   
            }  
        })  
    });
     
    });  
</script>

-->

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
					<input type="text" name="code_product" class="form-control" id="id"><br>
					<div align="right">
						<input type="submit" name="show" value="afficher" class="btn btn-primary" ><br>
					
						
					</div>
					<a href="dashboard.php">page precedente </a>
				</div>
		</div>
	</div>
</div>
</div>
<!--
<input type="button" name="" id="btn_add" value="add">
<input type="button" name="" id="btn_submit" value="submit">
<div id="array">hona</div>
-->
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
    <tbody id="result">
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
            <input type="submit" name="show1" value="Ajouter">
        </td>
        <td>
            <input type="submit" name="submit" value="valider">
        </td>
            
    </tbody>

</table>
</div>
</div>
</form>



	

<?php
	include 'includes/footer.php';
?>