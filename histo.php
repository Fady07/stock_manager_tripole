<?php 
session_start();
include 'connect.php';
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
$connect = new pdo ('mysql:host=localhost;dbname=stock_manager', 'root', '');
if (isset($_POST['search'])) {
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $sql1 = $connect->prepare('SELECT * FROM BVH WHERE date=?');
    $sql1->execute(array($date1));
    $count1 = $sql1->rowCount();
    if($count1 > 0){
    $results1 = $sql1->fetchAll(PDO::FETCH_ASSOC);
    $first_id = $results1[0]['id'];
    $first_id = $first_id - 1;
    //echo $first_id;
    $sql2 = $connect->prepare('SELECT * FROM BVH WHERE date=?');
    $sql2->execute(array($date2));
    $count2 = $sql2->rowCount();
    if($count2 > 0){
    $results2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
    $last = end($results2);
    $last_id = $last['id'];
    $deference = $last_id - $first_id;
    $sql3 = $connect->prepare("SELECT * FROM BVH LIMIT $first_id, $deference");
    $sql3->execute();
    $results3 = $sql3->fetchAll(PDO::FETCH_ASSOC);
    //print_r($results3);

    //print_r($results1);
    //echo array_search($date1, $results1);
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
   foreach( $results3 as $row ){
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
   }else{
  echo 'You have to select an existing date 2!';
  }

   }else{
  echo 'You have to select an existing date 1!';
 }
 }


  ?>