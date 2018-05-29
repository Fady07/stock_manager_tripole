
<?php
	$page = "Ajouter une categorie";
	include 'includes/footer.php';
	include 'includes/navbar.php';
	include 'includes/head.php';

?>



<form action="depot_process.php" method="POST">

	<div class="col-md-3"></div>
	<div class="col-md-6 col-xs-12" style="margin:100px auto">	
		<div class="panel-group">
			<div class="panel panel-primary">

		      	<div class="panel-heading" style="text-align: center"><h2>Ajouter un depot</h2></div>
		       	<div class="panel-body">

			       	<div class="form-group">
			       		<label for="depot">Nom de depot:</label>
						<input class="form-control" type="text" name="depot" id="depot">
					</div>

					<div class="col-md-6">
				<a href="dashboard.php">Page precedente</a>
			</div>


					<div  align="right" class="form-group">
						<input type="submit" class="btn btn-primary" name="submit" value="Ajouter">
					</div>

			
				</div>
			</div>
		</div>
	</div>

</form>




<?php
	include 'includes/footer.php';
?>