

<?php
require 'dbverbindung.php';
   if(isset($_GET["id"]))
   $id=$_GET["id"];
   else {
        header("location: header.php");
        exit;
   }
   $sql = "SELECT kuenstler.Artist_ID as AID,Stilrichtung,Vorname,Nachname,Werk,kgID FROM `stilrichtung` LEFT join kunstgemaelde on stilrichtung.id = kunstgemaelde.Epoche left join kuenstler on kuenstler.Artist_ID = kunstgemaelde.Artist_ID WHERE stilrichtung.ID = ?";
   $stmt3 = $cxn -> prepare($sql);
   $stmt3 -> bind_param('i', $id);
   $stmt3 -> execute();
   $result3 = $stmt3->get_result(); 
   $k = $result3->fetch_assoc();

mysqli_data_seek($result3,0);

   $stil = $k["Stilrichtung"];

  


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
<body>
<?php require_once "header.php" ?>
<div class="container-fluid">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page"><a href="index.php"> Home > </a> <a href="stile.php">Kunststile ></a> <b><?=$stil ?></b></li>
    
  </ol>
</nav>
</div>

<div class="container-fluid">

<div class="content">
<h1><?=$stil ?></h1>
<ul>
   <?php  while ($row = $result3 -> fetch_assoc()) { ?>
              
    <li><a style="display:inline-block; " href="kuenstler.php?id=<?php echo $row['AID'];?>"><?php echo $row["Vorname"]." ".$row["Nachname"]; ?> </a>
               <a style="display:inline-block;" href="werkdar.php?id=<?php echo $row['kgID'];?>"><?php echo ' "'.$row["Werk"].'"'; ?></a></li>
              
         <?php }  ?>
         </ul>
</div>
</div>



<?php require_once "footer.php" ?>
  </body>
  

</html>
