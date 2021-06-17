<!DOCTYPE html>
<html >
<head>
<title>Page Title</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="style0.css">
<script src="s.js"></script>

</head>
<body>
  <?php
  session_start();
  if(empty($_SESSION["header"])){
 include 'headerNoninscrit.php';
  }
  else{
    include ''.$_SESSION["header"].'';
  }

  ?>

<section class="row">
<?php
  include 'aside.php';

  ?>
  <article class="main" id="m">
  <h1>Resultat des Election par Gouvernerats</h1>

  <?php
   $totalvoix = array();
   $quotients = array();
   $total=0;
   $con=new PDO("mysql:host=localhost;dbname=election","root");
   $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql=$con->prepare("select * from gouvernorat");
   $sql->execute();
   $result0= $sql->fetchAll(PDO::FETCH_ASSOC);
   foreach($result0 as $indice0=>$value0)
   { 
   $sql=$con->prepare("SELECT * from voix WHERE idGouvernorat= ".$value0["idGouvernorat"]."");
   $sql->execute();
   $result= $sql->fetchAll(PDO::FETCH_ASSOC);
   foreach($result as $indice=>$value)
   { 
       $total= ($total + $value["nombreVoix"]);
   }
   $totalvoix["" . $value0["idGouvernorat"] . ""]=$total;
}

foreach($result0 as $indice0=>$value0)
{
    $quotients["" . $value0["idGouvernorat"] . ""]=(int)($totalvoix["" . $value0["idGouvernorat"] . ""] /  $value0["nombreSieges"]);
}
$sql=$con->prepare("SELECT * from voix");
$sql->execute();
$result= $sql->fetchAll(PDO::FETCH_ASSOC);
   foreach($result as $indice=>$value)
   { 
    $SIEGE["" . $value["idGouvernorat"] . ""]["" . $value["idParti"] . ""]=(int)($value["nombreVoix"]/$quotients["" . $value["idGouvernorat"] . ""]);
    $reste["" . $value["idGouvernorat"] . ""]["" . $value["idParti"] . ""]=(int)($value["nombreVoix"]%$quotients["" . $value["idGouvernorat"] . ""]);
   
   }

   foreach($result0 as $indice0=>$value0)
   {
  $max=max($reste["" . $value0["idGouvernorat"] . ""]);
  $index = array_search($max, $reste["" . $value0["idGouvernorat"] . ""]);
 // echo''.$index.'';
  while(array_sum($SIEGE["" . $value0["idGouvernorat"] . ""]) < $value0["nombreSieges"]){
      $SIEGE["" . $value0["idGouvernorat"] . ""][$index]+=1;
      unset($reste["" . $value0["idGouvernorat"] . ""][$index]);
      if(empty($reste["" . $value0["idGouvernorat"] . ""])==false){
      $max=max($reste["" . $value0["idGouvernorat"] . ""]);
      //echo''.$max.'';
      $index = array_search($max, $reste["" . $value0["idGouvernorat"] . ""]);
    
      }

  }
}
$sql=$con->prepare("SELECT * from partipolitique");
$sql->execute();
$result2= $sql->fetchAll(PDO::FETCH_ASSOC);
$str = "";
$str = $str . "<table class='tableStyle' border=1>";
$str = $str . "<caption><h2>Nombre de siéges remportés par chaque parti dans chaque Gouvernerat</h2> <caption/>";
$str = $str . "<thead>";
foreach($result2 as $indice2=>$value2) {
    if ($indice2== 0) {
        $str = $str . "<td></td>";
    }
    $str = $str . "<td><b>" . $value2["nomParti"] . "</b></td>";
    if ($indice2== 6) {
        $str = $str . "<td><b>Total des Sieges</b> </td>";
    }
}
$str = $str . "</thead><tbody>";
foreach($result0 as $indice0=>$value0) {
    $str = $str . "<tr>";
    $str = $str . "<td><b>" . $value0["nomGouvernorat"] . "</b></td>";
    foreach($result2 as $indice2=>$value2) {
        $str = $str . "<td>" . $SIEGE["" . $value0["idGouvernorat"] . ""]["" . $value2["idParti"] . ""]. "</td>";
        if ($value2["idParti"]== 7) {
          $str = $str . "<td><b>" . array_sum($SIEGE["" . $value0["idGouvernorat"] . ""]) . "</b></td>";
     
    }
    
    }
    $str = $str .  "</tr>";
}


$str = $str . "</tbody></table><br><br>";
echo $str;

$str = "";
$str = $str . "<table class='styled-table' border=1>";
$str = $str . "<caption><h2>Nombre de siéges remportés aux niveaux national par parti politique</h2> <caption/>";
$str = $str . "<tr>";
$s = 0;
foreach($result2 as $indice2=>$value2) {
    $str = $str . "<td><b>" . $value2["nomParti"] . "</b></td>";
}
$str = $str . "</tr>";
$str = $str . "<tr>";

foreach($result2 as $indice2=>$value2) {
    foreach($result0 as $indice0=>$value0) {
        $s += $SIEGE["" . $value0["idGouvernorat"] . ""]["" . $value2["idParti"] . ""];
    }
    $str = $str . "<td>" . $s . "</td>";
    $s = 0;
}
$str = $str . "</tr>";
$str = $str . "</table>";
echo'<h1>Resultat des Election par Parti politique </h1>';
echo $str;
  
 

/*foreach($result0 as $indice0=>$value0)
{
echo'  '.array_sum($SIEGE["" . $value0["idGouvernorat"] . ""]). ' ';
}*/
?>
  </article>
</section>
<?php
  include 'footer.php';
  ?>
</body>
</html>