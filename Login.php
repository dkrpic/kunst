<?php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
    {
        header("location: index.php");
        exit;
    }
    
  if($_SERVER["REQUEST_METHOD"] == "POST")
    {
 
 require 'dbverbindung.php';
    $username = $_POST['username'];
    $passwort = $_POST['passwort']; 
		
    $stmt = $cxn -> prepare("SELECT * FROM nutzer WHERE username=?");

    $stmt -> bind_param('s', $username);
    $stmt -> execute();
    $result = $stmt->get_result(); 
    
   
    if($result -> num_rows > 0)
    {
      $row = $result->fetch_assoc();
   
   
        if($passwort == $row["Passwort"])  
        {
		session_start();
        $_SESSION['loggedin'] = true;
		$_SESSION['id'] = $_POST['username'];
       header("location: index.php");
        exit;
        }
		$f="Password falsch";
    }
    else
    {
    $f= "Eingaben Fehlerhaft. Versuche es erneut";

    }

    $stmt -> close();
   $cxn -> close();
   
  }
 ?>

<!DOCTYPE html>
<html lang="de">
  <head>
  <title>login</title>
   <link rel=stylesheet href="style.css">
  <style>


      </style> 

 </head>
<body>
<?php require_once "header.php" ?>


<div class="container-fluid">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page"><a href="index.php"> Home > </a> <b>login</b></li>
    
  </ol>
</nav>
</div>
<div class="container-fluid">
<div class="content">
      
      <h1>Login</h1>
      <p>Bitte melde dich mit deinen Usernamen und Passwort an:</p>
       <p class="alert-danger"><?php if(isset($f)) echo $f; ?></p>
     <form action= "<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                       <label>Username</label>
					<input class="form-control username" type="text" align="center" name="username" placeholder="Username"> 
					   <label>Password</label>
					<input class="form-control passwort"  type="passwort" align="center" name="passwort" placeholder="passwort"> 
                    <br>
					<input class="submit" type="submit" align="center" name="anmelden" value="Anmelden">  <input type="checkbox" checked="checked" name="remember"> Remember me

       
					</form>
       
        </div>
      </div>

        


<?php require_once "footer.php" ?>
  </body>
  

</html>

