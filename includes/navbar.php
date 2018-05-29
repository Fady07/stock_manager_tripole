<div class="container">
    
    <nav class="navbar navbar-inverse" style="margin-top: 40px">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Stock CEM</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="BV1.php">BL</a></li>
          <li><a href="BV2.php">Historique</a></li>

        </ul>
        <?php if (isset($_SESSION['username1'])){ ?>
            <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['username1']; ?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="profile.php">Prifile</a></li>
          <li><a href="logout.php">Log out</a></li>
        </ul>
      </li>

    </ul>

        
        <?php  } ?>
      </div>
    </nav>  
</div>
<?php include 'footer.php'; ?>
 
