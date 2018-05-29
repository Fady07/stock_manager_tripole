<?php
    session_start();
    $connect = new pdo ('mysql:host=localhost;dbname=stock_manager', 'root', '');
    if(isset($_POST['login']))
	{
		$uname=htmlspecialchars(mysql_real_escape_string($_POST['uname']));
		$psw=htmlspecialchars(mysql_real_escape_string($_POST['psw']));

		if($uname && $psw)
		{
			$sql=$connect->prepare('SELECT * FROM users WHERE username=? AND password=?');
			$sql->execute(array($uname,$psw));

			$row=$sql->rowCount();

			if($row > 0)
			{
				$data = $sql->fetch();
				
				if($data['rank'] == 1 )
				{	
					header('location:admin/dashboard.php');
					$_SESSION['username'] = $data['username'];

				}else
				{
					
						header('location:dashboard.php');
					}
				}else
				{
					echo 'Nom dutilisateur ou le mot de passe est faux!, Ou <a href="signUp.php">Register here</a>';
			}
			}else
			{
				echo 'Il faux remplir tous les champs!';
			}

		}

	




  ?>

<?php
	$page = "Login";
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
				<div class="panel-heading" align="center"><h2>Login</h2></div>
				<div class="panel-body">
					<div class="form-group">
						<label for="username">Nom d'utilisateur</label>
						<input type="text" name="uname" id="username" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="password">Mot de passe</label>
						<input type="password" name="psw" id="password" class="form-control" required>
					</div>
					<div class="form-group" align="right">
						<input type="submit" name="login" class="btn btn-primary" value="Login">
					</div>
					<div class="col-md-6" align="right">
						<label><a href="#">Mot de passe oubliee</a></label>
					</div>
					<div class="col-md-6" align="right">
						<label><a href="signUp.php">Creer un compte</a></label>
					</div>					
				</div>
			</div>
		</form>
	</div>


<?php
	include 'includes/footer.php';
?>



