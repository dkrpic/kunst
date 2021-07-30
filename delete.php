<?php 

session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
    $id = $_POST["ku"];
    require 'dbverbindung.php';
     $stmt = $cxn -> prepare("DELETE FROM kuenstler WHERE Artist_ID = ? ;");
    
    $stmt -> bind_param('i',$id);
    
    $stmt -> execute();
 
    
    $stmt -> close();

    $cxn -> close();
    
        
    header("location: Künstler.php");
    exit;
    
    
    
}
else{
header("location: Login.php");
exit;
}


?>