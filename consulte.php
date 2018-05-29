<?php 
session_start();
include 'connect.php';
include 'includes/head.php';
include 'includes/navbar.php';

$sql = $connect->prepare('SELECT * FROM product');
$sql->execute();
$results = $sql->fetchAll(PDO::FETCH_ASSOC);
$s = 0; 
       

?>
<div class="row"> 
  <div class="col-md-3"></div>
  <div class="col-md-6" style="margin-top:30px">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 align="center">Tableau d'inventaire</h3>
        </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="col-md-2"></div> 
    <div class="col-md-8">
      <table class="table table-striped">
          <thead>
              <tr>
                   <th>ID</th>
                   <th>Code produit</th>
                   <th>Nom produit</th>
                   <th>Quantite</th>
                   <th>Prix achat</th>
                   <th>Prix vente</th>
               </tr>
          </thead>
          <tbody>
              <?php foreach( $results as $row ){
                   echo "<tr><td class='id1'>";
                   echo $row['id_product'];
                   echo "</td><td class='id3'>";
                   echo $row['code_product'];
                   echo "</td><td class='id3'>";
                   echo $row['name_product'];
                   echo "</td><td class='id1'>";
                   echo $row['qte_product'];
                   echo "</td><td class='id2'>";
                   echo $row['price_buy_product'];
                   $s = $s + ($row['price_buy_product'] * $row['qte_product']);
                   echo "</td><td class='id2'>";
                   echo $row['price_sell_product'];
                   echo "</td>";
                 echo "</tr>";

                 }
               ?>
            
          </tbody>
      </table>
    </div> 
</div>


 <center><?php echo "chiffre d'affaire total est : ".$s.' DA'; ?></center>
