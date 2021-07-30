<?php require_once "header.php" ?>
<?php
require 'dbverbindung.php';
   if(isset($_GET["id"]))
   $id=$_GET["id"];
   else {
        header("location: header.php");
        exit;
   }
   $sql = "SELECT * FROM `kuenstler` WHERE Artist_ID = ?";
   $stmt3 = $cxn -> prepare($sql);
   $stmt3 -> bind_param('i', $id);
   $stmt3 -> execute();
   $result3 = $stmt3->get_result(); 
   $row = $result3->fetch_assoc();  
   $text = $row["beschreibung"];    
   

    $cxn->close();
?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel=stylesheet href="style.css">
    </head>
   <style>
       #edit,#lo{
           
           float:right;
           margin:5px;
       }
    
    
    </style> 
<body>

<div class="container-fluid">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page"><a href="index.php"> Home > </a> <a href="Künstler.php"> Künstler ></a> <b><?php echo $row["Nachname"]." ".$row["Vorname"] ?></b></li>
   
  </ol>
    
</nav>
</div>

<div class="container-fluid">

<div class="content">

 <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
        echo  '<form id="lo" action="bearbeiten.php" method="get">
                  <input type="text" style="display:none" name="ku" value="'.$id.'">
                   <button type="submit" class="btn btn-default">Bearbeiten</button>
                 </form>

                 
    <button id="lo" type="sumbit" class="btn btn-default" data-toggle="modal" data-target="#myModal">Loeschen</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Bestätigen Sie die Löschung </h4>
        </div>
        <div class="modal-body">
           <form style="display:inline" action="delete.php" method="post">
                   <input type="text" style="display:none" name="ku" value="'.$id.'">
                   <button type="submit" class="btn btn-default">ja</button>
                 </form>
                  <button type="submit" class="btn btn-default" data-dismiss="modal">nein</button>
        </div>
       
       
     
      </div>
      
    </div>
  </div>
  
                 ';    ?>


          
                 
<h1><?php echo $row["Nachname"]." ".$row["Vorname"] ?></h1>



 <img class="imgkunst" src="<?php echo $row["Image"] ?>" width="300" height="300" >

<h3><b>-Biografie-</b></h3>
<p>
    <?=  htmlspecialchars($text); ?>
    
</p> 
</div>

</div>



<?php require_once "footer.php" ?>
  </body>
  

</html>

