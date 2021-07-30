<?php require_once "header.php" ?>
<?php
mysqli_data_seek($reskunst,0);
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

<div class="container-fluid">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page"><a href="index.php"> Home > </a> <a href="stile.php"> Kunststile</a></li>
    
  </ol>
</nav>
</div>

<div class="container-fluid">

<div class="content">
<h1>Kunststile</h1>
<ul>
   <?php  while ($row = $reskunst -> fetch_assoc()) { ?>
              
             
               <li><a href="kunststil.php?id=<?php echo $row['ID'];?>"><?php echo $row["Stilrichtung"]; ?></a></li>
             
         <?php }  ?>
         </ul>
</div>
</div>



<?php require_once "footer.php" ?>
  </body>
  

</html>