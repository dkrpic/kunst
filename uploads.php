<?php require_once "header.php" ?>
<?php
      if($_SERVER["REQUEST_METHOD"] == "POST")
    {

    require 'dbverbindung.php';
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname']; 
	$text = $_POST['text'];	
       
    $dir = "htdocs/";
   $file = $dir.basename($_FILES["file"]["name"]);
      move_uploaded_file($_FILES["file"]["tmp_name"], $file);       
          
    $bildpath = "sigurica";
    $stmt = $cxn -> prepare("INSERT INTO `kuenstler` (`Artist_ID`, `Vorname`, `Nachname`, `beschreibung`, `Image`) VALUES (NULL, ? , ? , ? , ?);");
    $stmt -> bind_param('ssss',$vorname,$nachname,$text,$file);
    
    $stmt -> execute();
          
    echo 'poslao si podatke';
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



<div class="container-fluid">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page"><a href="index.php"> Home > </a> <b>Uploads</b></li>
    
  </ol>
</nav>
</div>
<div class="container-fluid">
<div class="content">

      <h1>Kuenstler</h1>
      <p>Bitte felder ausfuellen</p>

     <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                     <label for="vorname">Vorname</label>
					<input class="form-control username"  type="text" align="center" name="vorname" placeholder="Vorname" required> 
					   <label for="nachname">Nachname</label>
					<input class="form-control username"  type="text" align="center" name="nachname" placeholder="Nachname" required> 
                    <label for="text">Beschreibung</label>
                     <textarea required class="form-control" rows="7"  name=text></textarea>
                    <br>
                    <label for="file">Bild</label>
                    <input type="file" name="file" id="file" required>
                     <hr>
					<input class="submit" type="submit" align="center" name="anmelden" value-="Speichern">  
                    
       
					</form>
      
       
        </div>
      </div>

        

<?php require_once "footer.php" ?>

  </body>
  

</html>

