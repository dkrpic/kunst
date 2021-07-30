<?php
    // initialize the session
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    
    // include config folder
   require 'dbverbindung.php';

 // get all artist
    $sql = "SELECT Artist_ID,Vorname,Nachname FROM `kuenstler`";
    $stmt = $cxn -> prepare($sql);
    $stmt -> execute();

    $result = $stmt->get_result(); 
 
     
    $stmt -> close();
// get all stils
    $sql1 = "SELECT * FROM `stilrichtung`";
    $stmt1 = $cxn -> prepare($sql1);
    $stmt1 -> execute();

   $reskunst = $stmt1->get_result(); 
    $stmt1 -> close();

    $cxn -> close();


 

                    
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   

    <!-- Bootstrap -->
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel=stylesheet href="style.css">

   


  </head>
  <body>

<header><a  href="index.php"><div><img src="htdocs/Logoneu.png"  alt="Cinque Terre" width="121" height="144">  </div></a></header>
         
          <nav class="navbar navbar-default">
              <div class="container-fluid">
                
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Navigation ein-/ausblenden</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  
                </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                		 
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="stile.php">Kunststile
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
               <?php  while ($row =$reskunst -> fetch_assoc()) { ?>
               <li><a href="kunststil.php?id=<?php echo $row['ID'];?>"><?php echo $row["Stilrichtung"]; ?></a></li>
             
         <?php }  ?>
     
          </ul>
        </li>

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="Künstler.php">Künstler
           <span class="caret"></span></a>
           <ul class="dropdown-menu">
           <?php  while ($row = $result -> fetch_assoc()) { ?>
               <li><a href="kuenstler.php?id=<?php echo $row['Artist_ID'];?>"><?php echo $row["Vorname"]." ".$row["Nachname"]; ?></a></li>
              
         <?php }  ?>
     
             
          
           </ul>
        </li>
          
                <li><a href="uebermich.php">Über mich</a></li>
                <li><a href="projekte.php">Meine Projekte</a></li>
                
               <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
        echo  '<li><a href="uploads.php">Uploads</a></li>';    ?>
               
             
                  </ul>
                 
                  <ul class="nav navbar-nav navbar-right">
                  <?php if(!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true))
        echo'<li><a href="Login.php">
    <span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                else {echo '  <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href=""> ';
                      echo $_SESSION["id"];
                    echo '
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="logout.php">abmelden</a></li>
        
          </ul>
        </li>'; }     
                     
                      
                      ?>
            
                  </ul>
            

              <ul class="nav navbar-nav navbar-right">

                  <form class="navbar-form navbar-left" role="search" method="post" action="search.php">
                   <div class="form-group">
                   <input name="suche" type="text" class="form-control" placeholder="Suchen">
                   </div>
                   <button type="submit" class="btn btn-default">Los</button>
                 </form>

                 
              </ul>
    </div>
  </div>
</nav>



   
    </body>
</html>