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
$results = $sql->fetchAll();

  ?>
  <?php
    foreach ($results as $key => $value) {
    	
  ?>  
     <form method="POST">
      <div class="col-md-12">
  		<table>		
		<input class="form-group" type="text" name="name_categorie" value="<?php echo $value['name_categorie'];?>">
		<input class="btn btn-success" type="submit" name="modify" value="modifier">
		<input class="btn btn-primary" type="submit" name="delete" value="supprimer">
		</table>
      </div>
     </form>
   <?php
    
    if (isset($_POST['modify'])) {

     	
     $new_categorie = $_POST['name_categorie'];
     echo $new_categorie;
     $sql = $connect->Prepare('UPDATE categorie SET name_categorie=? WHERE name_categorie=?');
     //$sql->execute(array($new_categorie,$value['name_categorie']));



    }



    }
    
   ?>



<?php 
}
?>
	
