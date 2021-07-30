
<?php 
       if(!($_SERVER["REQUEST_METHOD"] == "POST"))
    { 
      require 'dbverbindung.php';  
       $id = $_GET["ku"]; 
    $sql = "SELECT * FROM `kuenstler` WHERE Artist_ID = ?";
   $stmt3 = $cxn -> prepare($sql);
   $stmt3 -> bind_param('i', $id);
   $stmt3 -> execute();
   $result3 = $stmt3->get_result(); 
     $row = $result3->fetch_assoc();   
       
      $stmt3 -> close();

     $vor = $row["Vorname"];
     $nach = $row["Nachname"];
     $tex = $row["beschreibung"];
    $imgfile = $row["Image"];         
    }
    
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
    $stmt = $cxn -> prepare("UPDATE kuenstler
SET Vorname = ?, Nachname= ?, beschreibung =?,Image = ?
WHERE Artist_ID = ?");
    $stmt -> bind_param('ssssi',$vorname,$nachname,$text,$file,$_POST['artistid']);
    
    $stmt -> execute();
          
  
    $stmt -> close();

    $cxn -> close();
          
header("location: kuenstler.php?id=".$_POST['artistid']);
exit;


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
      <li class="breadcrumb-item active" aria-current="page"><a href="index.php"> Home > </a> <b>Uploads</b></li>
    
  </ol>
</nav>
</div>
<div class="container-fluid">
<div class="content">

      <h1>Kuenstler</h1>
      <p>Bearbeitung</p>

     <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                     <label for="vorname">Vorname</label>
					<input class="form-control username"  type="text" align="center" name="vorname" placeholder="Vorname" required value="<?=$vor ?>" > 
					   <label for="nachname">Nachname</label>
					<input class="form-control username"  type="text" align="center" name="nachname" placeholder="Nachname" required value="<?=$nach ?>"> 
                    <label for="text">Beschreibung</label>
                     <textarea required class="form-control" rows="7"  name=text >
                        <?=htmlspecialchars($tex) ?> 
                         
                     </textarea>
                    <br>
                    <label for="file">Bild</label>
                    <input type="file" name="file" id="file" required>
                     <hr>
					<input class="submit" type="submit" align="center" name="anmelden" value-="Speichern">  
                      <input type="text" style="display:none" name="artistid" value="<?=$id ?>">
       
					</form>
      
       
        </div>
      </div>

        



  </body>
  

</html>