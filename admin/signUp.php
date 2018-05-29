<?php
$connect = new pdo ('mysql:host=localhost;dbname=stock_manager','root','');
if (isset($_POST['signup']))
 {
    $name = htmlspecialchars($_POST['pseudo']);
    $psw = htmlspecialchars($_POST['psw']);
    $psw_repeat = htmlspecialchars($_POST['psw_repeat']);
    if ($name && $psw && $psw_repeat) {
      if ($psw == $psw_repeat) {
        $sql = $connect->prepare('SELECT * FROM users WHERE username=?');
        $sql->execute(array($name));
        $count = $sql->rowCount();
        if ($count == 0)
        {
          $sql2 = "INSERT INTO users VALUES ('', '$name', '$psw')";
          $connect->exec($sql2);
          echo "Welcome! you have signed up successfully!<br>"; 
          echo '<button type="button" class="cancelbtn" style="width:20%;"><a href="index.php">login </a></button>';   
        }else
        {
          $error = 'this email is already used !';
          echo $error;
        }
       }else{
        $error = 'The passwords do not match ';
        echo $error; 
       }
    }else{
      $error = 'You have to fill all fields! ';
      echo $error;
    }
    
}

?>



<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password], input[type=email] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus, input[type=email]:focus {
    background-color: #ddd;
    outline: none;
}

hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

button:hover {
    opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>
<body>

<form class="modal-content animate" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  <div class="container">
    <h1>Creer un compte</h1>
    <p>Veuillez remplir les champs suivants :</p>
    <hr>

      <label for="pseudo"><b>Nom d'utilisateur</b></label>
      <input type="text" placeholder="pseudo" name="pseudo" required>
      

      

      <label for="psw"><b>Mot de passe</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label for="psw-repeat"><b>Confirmer le mot de passe</b></label>
      <input type="password" placeholder="Repeat Password" name="psw_repeat" required>
    
    
    <p>Vous acceptez les conditions  <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn"><a href="index.php">Cancel</a></button>
      <button type="submit" class="signupbtn" name="signup">Sign Up</button>
    </div>
  </div>
</form>
</body>
</html>