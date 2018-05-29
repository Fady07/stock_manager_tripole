<?php
    session_start();
    $connect = new pdo ('mysql:host=localhost;dbname=stock_manager', 'root', '');
    $user=$connect->prepare('SELECT * FROM users WHERE username=?');
    $user->execute(array($_SESSION['username1']));
    $data = $user->fetch();
    if(isset($_POST['modifier']))
	{
		$uname=htmlspecialchars(mysql_real_escape_string($_POST['uname']));
		$apsw=htmlspecialchars(mysql_real_escape_string($_POST['apsw']));
		$psw=htmlspecialchars(mysql_real_escape_string($_POST['psw']));

		if($uname && $apsw && $psw)
		{
			if ($apsw == $data['password']) {
				$sql = "UPDATE users SET username='$uname' WHERE username=?";
				$stmt = $connect->prepare($sql);		
				$stmt->execute(array($_SESSION['username1']));
				$sql1 = "UPDATE users SET password='$psw' WHERE username=?";
				$stmt1 = $connect->prepare($sql1);		
				$stmt1->execute(array($_SESSION['username1']));
				$_SESSION['username1'] = $uname;
				header('location: dashboard.php');
			}else{
				echo 'le mot de passe est faux !';
			}
		}else{
			echo 'vous voullez tous les champs !';
		}
	}

	




  ?>

<?php
	$page = "Profile";
	include 'includes/head.php';
?>

	<div class="col-md-12" style="margin-top: 50px; padding:20px" align="center">
    	<img src="img_avatar2.png" alt="Avatar" style="width: 10%;
    		border-radius: 50%;">
	</div>
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			<div class="panel panel-primary">
				<div class="panel-heading" align="center"><h2>Modifier votre compte</h2></div>
				<div class="panel-body">
					<div class="form-group">
						<label for="username">Nom d'utilisateur</label>
						<input type="text" name="uname" id="username" class="form-control" required value="<?php echo $data['username']; ?>">
					</div>
					<div class="form-group">
						<label for="apassword">Ancien Mot de passe</label>
						<input type="text" name="apsw" id="apassword" class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="password">Nouveau Mot de passe</label>
						<input type="text" name="psw" id="password" class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group" align="right">
						<input type="submit" name="modifier" class="btn btn-primary" value="Modifier le profile ">
					</div>
					<div class="col-md-6" align="right">
						<label><a href="dashboard.php">Page precednte</a></label>
					</div>					
				</div>
			</div>
		</form>
	</div>


<?php
	include 'includes/footer.php';
?>



