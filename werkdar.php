

<?php
require 'dbverbindung.php';
   if(isset($_GET["id"]))
   $id=$_GET["id"];
   else {
        header("location: header.php");
        exit;
   }
   $sql = "SELECT Werk,Masse,Material,Geschaffen,kunstgemaelde.Image as Bild,kunstgemaelde.beschreibung as werkbeschreibung,Stilrichtung,Vorname,Nachname,stilrichtung.ID as epocheID FROM `kunstgemaelde`LEFT JOIN kuenstler on kunstgemaelde.Artist_ID = kuenstler.Artist_ID LEFT JOIN stilrichtung on Epoche = stilrichtung.id WHERE kgID = ? ";
   $stmt = $cxn -> prepare($sql);
   $stmt -> bind_param('i', $id);
   $stmt -> execute();
   $result = $stmt->get_result(); 
   $werk = $result->fetch_assoc();



  


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
      <li class="breadcrumb-item active" aria-current="page"><a href="index.php"> Home > </a> <a href="stile.php">Kunststile ></a><a href="kunststil.php?id=<?=$werk['epocheID']?>"> <?php echo $werk['Stilrichtung']; ?> </a> > <b><?=$werk['Vorname']." ".$werk['Nachname']." '".$werk['Werk']."'" ?></b></li>
    
  </ol>
</nav>
</div>

<div class="container-fluid">
<div class="content">
<h1> <?=$werk['Vorname']." ".$werk['Nachname']." '".$werk['Werk']."'" ?></h1>
<table class="table">
    <thead>
      <tr>
        <th>Werk</th>
        <th>Masse</th>
        <th>Material</th>
        <th>Epoche</th>
        <th>Geschaffen</th>
      </tr>
    </thead>
    <tbody>
   <tr>
        <td><?php echo $werk['Werk'];  ?></td>
        <td><?php echo $werk['Masse'];  ?> </td>
        <td> <?php echo $werk['Material'];  ?>   </td>
        <td> <?php echo $werk['Stilrichtung'];  ?>  </td>
        <td> <?php echo $werk['Geschaffen'];  ?>  </td>
      </tr>
    </tbody>
  </table>
 <img class="imgkunst" src="<?php echo $werk['Bild'] ?>" width="300" height="300" >

<h3><b>-Beschreibung-</b></h3>
<p>
    <?php   echo $werk['werkbeschreibung'];    ?>

    </p>
</div>

</div>
   
   <?php require_once "footer.php" ?>
   
  </body>
  

</html>
