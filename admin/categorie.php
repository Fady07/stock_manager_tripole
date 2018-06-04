<?php

$connect = new PDO ("mysql:local=localhost;dbname=stock_manager","root","");
include 'includes/head.php';
include 'includes/navbar.php';
?>


<?php
if (isset($_GET['action']) && $_GET['action'] == 'ajouter'){
	
?>
<form action="" method="POST">
	<div class="col-md-3"></div>
		<div class="col-md-6 col-xs-12" style="margin:100px auto">
			<div class="panel-group">
				<div class="panel panel-primary">
					<div class="panel-heading" style="text-align: center"><h2>Ajouter Categorie</h2></div>
            			<div class="panel-body">
            				<div class="form-group">
            					<label for="name_categorie">Nom de categorie</label>
									<input class="form-control" type="text" name="name_categorie" id="name_categorie">
			          		</div>

			          		<div align="right" class="form-group">
            						<input type="submit" class="btn btn-success" name="submit" value="Ajouter">
            						<a class="btn btn-danger" href="dashboard.php">Retour</a>
          					</div>

			          	</div>
			    </div>
            </div>
		</div>	

</form>

<?php 
}
?>

<?php
if (isset($_POST['submit'])) {
	$categorie = $_POST['name_categorie'];
  
  $sql = $connect->Prepare("INSERT INTO categorie VALUES('','$categorie')");
  $sql->execute();
}

?>

<?php
if (isset($_GET['action']) && $_GET['action'] == 'consulter'){

$sql = $connect->Prepare("SELECT * FROM categorie");
$sql->execute(array());
$row =$sql->rowCount();
$results = $sql->fetchAll();


  ?>
  <form method="POST">
	<div class="col-lg-6">
  <?php
    foreach ($results as $key => $value) {
    	
  ?>  
        <table>
        <div class="col-sm-3" style="float: left;margin:10px">
  		 		
		<tr>
			<input style="margin: 5px;" type="text" name="<?php echo 'name_categorie'.$value['id_categorie'];?>" value="<?php echo $value['name_categorie'];?>">
		<input style="margin: 5px;" class="btn btn-default" type="submit" name="<?php echo 'modify'.$value['id_categorie'];?>" value="modifier">
		<input class="btn" type="submit" name="<?php echo 'delete'.$value['id_categorie'];?>" value="supprimer">
		</tr>
		
      </div>
      <table>
     </form>
   <?php
   //echo $value['id_categorie'];
    
    
    if (isset($_POST['modify'.$value['id_categorie']])) {

     	
     $new_categorie = $_POST['name_categorie'.$value['id_categorie']];

     //echo $new_categorie;
     $sql = $connect->Prepare('UPDATE categorie SET name_categorie=? WHERE name_categorie=?');
     $sql->execute(array($new_categorie,$value['name_categorie']));
     header("Refresh:0; url=categorie.php?action=consulter");

     }

     if (isset($_POST['delete'.$value['id_categorie']])) {

     	
     $deleted_categorie = $_POST['name_categorie'.$value['id_categorie']];
     //echo $deleted_categorie;
     $sql = $connect->Prepare("DELETE FROM categorie WHERE name_categorie=?");
     $sql->execute(array($deleted_categorie));
     header("Refresh:0; url=categorie.php?action=consulter");
     
     }
   

?>


    
  


<?php
 }
}

?>

	
<?php 
include 'includes/footer.php';
?>