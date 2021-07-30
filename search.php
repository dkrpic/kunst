<?php
require 'dbverbindung.php';
   if(isset($_POST["suche"]))
   {
       
   
   $search = $_POST["suche"];
    $param = "%{$_POST['suche']}%";
}
   else {
        header("location: header.php");
        exit;
   }
   $sql = "SELECT kuenstler.Artist_ID as AID,Stilrichtung,Vorname,Nachname,Werk,kgID,ID FROM `stilrichtung` LEFT join kunstgemaelde on stilrichtung.id = kunstgemaelde.Epoche left join kuenstler on kuenstler.Artist_ID = kunstgemaelde.Artist_ID WHERE Stilrichtung COLLATE 'utf8_bin'  LIKE ? OR Vorname COLLATE 'utf8_bin' LIKE ? OR Nachname COLLATE 'utf8_bin' LIKE ? OR Werk COLLATE 'utf8_bin' LIKE ?";
   $stmt3 = $cxn -> prepare($sql);
   $stmt3 -> bind_param('ssss',$param,$param,$param,$param);
   $stmt3 -> execute();
   $result3 = $stmt3->get_result();
   $stmt3->close();


   $sql1 = "SELECT kgID,Werk,Masse,Material,Geschaffen,kunstgemaelde.Image as Bild,kunstgemaelde.beschreibung as werkbeschreibung,Stilrichtung,Vorname,Nachname,stilrichtung.ID as epocheID FROM `kunstgemaelde`LEFT JOIN kuenstler on kunstgemaelde.Artist_ID = kuenstler.Artist_ID LEFT JOIN stilrichtung on Epoche = stilrichtung.id WHERE Stilrichtung COLLATE 'utf8_bin'  LIKE  ? OR Masse COLLATE 'utf8_bin'  LIKE  ? OR Material COLLATE 'utf8_bin'  LIKE  ? OR Geschaffen COLLATE 'utf8_bin'  LIKE ? OR Vorname COLLATE 'utf8_bin'  LIKE  ? OR Nachname COLLATE 'utf8_bin'  LIKE  ? OR kunstgemaelde.beschreibung COLLATE 'utf8_bin'  LIKE  ?";
     $stmt4 = $cxn -> prepare($sql1);
    $stmt4 -> bind_param('sssssss',$param,$param,$param,$param,$param,$param,$param);

   
   $stmt4 -> execute();
   $result4 = $stmt4->get_result();
   $stmt4->close();
    
   $sql2 = "SELECT Artist_ID,Vorname,Nachname,beschreibung FROM kuenstler WHERE Vorname COLLATE 'utf8_bin'  LIKE ? OR Nachname COLLATE 'utf8_bin'  LIKE  ? OR  kuenstler.beschreibung COLLATE 'utf8_bin'  LIKE  ?";
$stmt6 = $cxn -> prepare($sql2);
    $stmt6 -> bind_param('sss',$param,$param,$param);

     

   
   $stmt6 -> execute();
   $result6 = $stmt6->get_result();

   $stmt6->close();
  


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
      <li class="breadcrumb-item active" aria-current="page"><a href="index.php"> Home > </a> <a href="stile.php">Kunststile ></a> <b></b></li>
    
  </ol>
</nav>
</div>

<div class="container-fluid">

<div class="content">
<h1></h1>
<ul>
   <?php  while ($row = $result3 -> fetch_assoc()) { ?>
               
               <li><a style="display:inline-block;"><?php  
$p = " ".$row["Stilrichtung"]." ".$row["Vorname"]." ".$row["Nachname"].' "'.$row["Werk"].'"';
$p = str_replace($search,"<b>".$search."</b>",$p);   
   
echo $p;
?></a><span>in</span><i><a style="display:inline-block;" href="kunststil.php?id=<?php echo $row['ID'];?>"><?=$row["Stilrichtung"] ?></a></i></li>
              
         <?php } $j=0; ?>
      
         
            
               <?php  while ($row1 = $result4 -> fetch_assoc()){ 
 
    $p = " ".$row1["werkbeschreibung"];
    if(strpos($row1["werkbeschreibung"],$search)==true){
      $p = str_replace($search,"<b>".$search."</b>",$p); ?>
    <li> <div style="display:inline-block;" href="werkdar.php?id=<?php echo $row1['kgID'];?>" data-target="<?='#demo'.$j ?>"  data-toggle="collapse"><b><?=$search ?></b><?=" mehr..." ?></div>
    <a style="border:1px solid grey;" href="werkdar.php?id=<?php echo $row1['kgID'];?>"><?=" in ".$row1["Werk"] ?></a></li> 
  <div id="<?='demo'.$j; ?>" class="collapse">
  <?=$p ?>
    </div>
      
      
   
     
            
<?php
}
$j++;
$p1 = " ".$row1["Masse"]." ".$row1["Material"]." ".$row1["Geschaffen"];
 if(strpos($p1,$search)==true){
      $p1 = str_replace($search,"<b>".$search."</b>",$p1); ?>
   <li><?=$p1; ?>
    <a style="border:1px solid grey;" href="werkdar.php?id=<?php echo $row1['kgID'];?>"><?=" in ".$row1["Werk"] ?></a></li> 
 <?php 
}
   



}   ?>   
       
       
       
        <?php  while ($row2 = $result6 -> fetch_assoc()){ 
    
    $p = " ".$row2["beschreibung"];
    
  
    if(strpos($p,$search)==true){

      $p = str_replace($search,"<b>".$search."</b>",$p); ?>
    <li> <div style="display:inline-block;"  data-target="<?='#demo'.$j ?>"  data-toggle="collapse"><b><?=$search ?></b><?=" mehr..." ?></div>
    <a style="border:1px solid grey;" href="kuenstler.php?id=<?= $row2['Artist_ID'];?>"><?=" in ".$row2["Vorname"]." ".$row2["Nachname"] ?></a></li> 
  <div id="<?='demo'.$j; ?>" class="collapse">
  <?=$p ?>
    </div>
      
      
   
     
            
<?php
}
$j++;
   $p1 = " ".$row2["Vorname"]." ".$row2["Nachname"];
 if(strpos($p1,$search)==true){
      $p1 = str_replace($search,"<b>".$search."</b>",$p1); ?>
 
  <li><?=$p1; ?>
    <a style="border:1px solid grey;" href="kuenstler.php?id=<?= $row2['Artist_ID'];?>"><?=" in ".$row2["Vorname"]." ".$row2["Nachname"]."Biografie"; ?></a></li> 
 <?php 
}
 
    

   



}   ?>   
         
         
         
         
         
         </ul>
</div>
</div>



<?php require_once "footer.php" ?>
  </body>
  

</html>
