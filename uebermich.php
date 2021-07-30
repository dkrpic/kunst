<?php require_once "header.php" ?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel=stylesheet href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
      
      .timeline {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
  border-left:1px solid grey;
}


.timeline::after {
  content: '';
  position: absolute;
  width: 6px;
  background-color: white;
  top: 0;
  bottom: 0;
  left: 50%;
  margin-left: -3px;
}

.main:nth-child(odd) {
  padding: 10px 40px 10px 10px;

  position: relative;
  background-color: inherit;
  width: 50%;
}
.main:nth-child(even) {
  padding: 10px 10px 10px 40px;

  position: relative;
  background-color: inherit;
  width: 50%;
}

.main::after {
  content: '';
  position: absolute;
  width: 25px;
  height: 25px;
  right: -12px;
  background-color: white;
  border: 4px solid peachpuff;
  top: 15px;
  border-radius: 50%;
  z-index: 1;
}


.leftt {
  left: 0;
}


.rightt {
  left: 50%;
}


.leftt::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  right: 30px;
  border: medium solid white;
  border-width: 10px 0 10px 10px;
  border-color: transparent transparent transparent white;
}


.rightt::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  left: 30px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
}


.rightt::after {
  left: -13px;
}


.sektion {
  padding: 20px 30px;
  background-color: white;
  position: relative;
  border-radius: 6px;
   overflow-wrap: break-word;  
}

@media screen and (max-width: 800px) {
    .sektion:first-child {
   
  color:green;
  padding: 2px 10px;
        
    }
    .main:first-child{
        padding-left:5px;
    }
    .timeline{
        border-left:none;
    }
      }
@media screen and (max-width: 500px) {
  
  .timeline::after {
  left: 11px;
  }
    
  .sektion {
  
  padding: 2px 10px;
    }
  
  .main {
  width: 100%;

  }
  
  
  .main::before {
  left: 60px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
  }

  
  .leftt::after, .rightt::after {
  left: 215px;
  }
  
  
  .rightt {
  left: 0%;
  }
}
      tr>td{
      padding:8px;
      }
      
      
      </style>
    </head>
<body>

<div class="container-fluid">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page"><a href="index.php">Home ></a><b> Über mich</b></li>
    
  </ol>
</nav>
</div>

<div class="container-fluid">

<div class="content">
   
     
      <h1>Über mich</h1>
    
       <p>Wir von Kunstleben wollen den Nutzern einen Einblick in verschiede Kunststile geben und 
        zeigen euch verschieden Künstler, ihre Werke und ihre jeweiligen Eigenschaften.   
        Die Seite soll für jeden Kunst und Kunstgeschichte interessenten eine Informationsquelle sein.
        Hier findet ihr Bilder zu den Werken, ihren Eigenschaften und die Hintergründe zum jeweiligen Werk.
        Zusätzlich findet ihr hier auch Biorafien zu den jeweiligen Künstler.</p>
        <hr>
        <div class="row">
        <div class="col-md-4 col-sm-4" >
        <h4><b>PERSÖNLICHES</b></h4> 
        <hr>
        <table>
            <tr>
                <td><i class="fa fa-home"></i></td>
                <td>Geb 15.06.1988 in Pakrac</td>
                
            </tr>
             <tr>
                <td><i class="fa fa-home"></i></td>
                <td>Stevana Sremca 1b 11224 Belgrad</td>
                
            </tr>
             <tr>
                   <td><i class="fa fa-home"></i></td>
                <td>kdanijela88@yahoo.com</td>
                
            </tr>
             <tr>
                  <td><i class="fa fa-home"></i></td>
                <td>+381628348116</td>
                
            </tr>
             <tr>
                <td><i class="fa fa-home"></i></td>
                <td><a href="https://danikrpic.com/">danikrpic.com</a></td>
                
            </tr>
            
            
        </table>    
           <hr>
            <h4><b>BILDUNGSWEG</b></h4>  
           <p>BACHELOR OF ENGINEERING</p>

            <p><u>Mikrosystemtechnik</u></p>
<p>Abschlussnote: 2,8</p>
<p>Universität Freiburg 2009-2019</p>
<hr>
<p><u>Physikalische Chemie</u></p>
<p>Universität Belgrad 2007-2008</p>
<p>Abschlussnote für ein Jahr: 1.3</p>
<hr>
<p>3.Gymnasium-Belgrad</p>
<p>2003-2007</p>

    <hr>
           
             <h4><b>KENNTNISSE</b></h4>  
            <p>JAVA</p>
            <p>Javascript</p>
            <p>PHP</p>
            <p>MySQL</p>
            <p>Excel</p>
            <p>Solidworks</p>
             
            
            
        </div>
<div class="timeline col-md-8 col-sm-8" >
  <div class="main leftt">
    <div class="sektion">
      <h4>2017-2020</h4> 
      <h4>JP Srbijasume Krusevac - <b>Buchhalterin</b></h4> 
      <p>Erstellung von Umsatzstatistiken, Analysen</p>
    </div>
  </div>
  <div class="main rightt">
    <div class="sektion">
      <h4>2015-2016</h4> 
        <h4>Universität Freiburg – <b>Studierendensekretariat</b></h4> 
      <p></p>
    </div>
  </div>
  <div class="main leftt">
    <div class="sektion">
      <h4>2013-2014</h4> 
      <h4>Fraunhofer für Physikalische Messtechnik IPM -<b>Hiwi</b></h4> 
      <p>Hiwi: Im Rahmen der Arbeit sollen Fluoreszenz-Anregungs-und EmissionsSpektren von Gewebe, Harnsteinen und relevanten Endoskop-Materialien
und klassifiert werden. Weiter sollen Lumineszenz-Spektren kommerzieller
Glasfasern
Während der Nutzung als Lithotripsie-Faser untersucht werden. Meine
Aufgaben: Selbständige Durchführung von Messungen und
Auswertungen, Entwuft von Formularen und Berichten.</p>
    </div>
  </div>
  <div class="main rightt">
    <div class="sektion">
      <h4>2012-2013</h4> 
      <h4>Karlstadt - <b>Verkäuferin</b></h4> 
      <p> </p>
    </div>
  </div>
  <div class="main leftt">
    <div class="sektion">
      <h4>2011-2012</h4> 
      <h4>Mcdonald‘s Restaurant- <b>Kassiererin</b></h4> 
      <p></p>
    </div>
  </div>
 
</div>

</div>



            
              
              
              


    </div>
    </div>



<?php require_once "footer.php" ?>
  </body>
  

</html>