<?php
  session_start();
  $page='B Livraison';
  include 'includes/head.php';
  include 'includes/navbar.php';
  ?>
  <div class="row">
<div class="col-md-3"></div>
<div class="col-md-6" style="margin-top:60px">
  <div class="panel panel-primary">
 <!DOCTYPE html>
 <html>
 <head>
  <title></title>
 </head>
 <body>
  <form method="POST" action="histo.php">
  <label>recherche a partir de :</label>
  <input type="date" name="date1">
  <label>a :</label>
  <input type="date" name="date2">
  <input type="submit" name="search" value="recherche">
  <a href="dashboard.php">Back   </a><br><br>
  </form>
 </body>
 </html>
</div>
</div>
</div>


 <?php 
    //$NBV = $NBV + 1;
  $connect = new pdo ('mysql:host=localhost;dbname=stock_manager', 'root', '');
  //$N = 0;
  $sql = $connect->prepare('SELECT * FROM BVH');
  $sql->execute();
  $results = $sql->fetchAll(PDO::FETCH_ASSOC);
  //print_r($results);
  echo '<h1 align="center">Historique</h1>';
  echo '<div class="row">
    <div class="col-md-2"></div> 
    <div class="col-md-8"><table align="center" style="border: solid;" class="table table-striped">
   <tr>
     <th>ID</th>
     <th>Code produit</th>
     <th>Nom produit</th>
     <th>Quantite</th>
     <th>Prix vente</th>
     <th>chiffre daffaire</th>
     <th>Date</th>
   </tr>';
   foreach( $results as $row ){
   echo "<tr><td>";
     //$N = $N + 1; echo $N;
     //echo "</td><td>";
     echo $row['id'];
     echo "</td><td>";
     echo $row['code'];
     echo "</td><td>";
     echo $row['name'];
     echo "</td><td>";
     echo $row['amount'];
     //$s = $s + ($row['price_buy_product'] * $row['qte_product']);
     echo "</td><td>";
     echo $row['price_sell'];
     echo "</td><td>";
     echo $row['CA'];
     echo "</td><td>";
     echo $row['date'];
     echo "</td>";
   echo "</tr>";
   }
   echo "</table></div></div>";



   
 ?>