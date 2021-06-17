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
if(!empty($_SESSION["introuvable"])){
  include 'headerNoninscrit.php';

}
  else if($_SESSION["vote"]=="OUI"){
    echo''.$_SESSION["vote"].'';
    include 'headerVoter.php';
    

  }
  else{
    echo''.$_SESSION["vote"].'';
    include 'headerInscrit.php';
   
    
  }
  ?>
<section class="row">


<?php
  include 'aside.php';
  ?>

 <article class="main" id="m">
    <h1>Vote pour la chambre des represantants du peuple</h1>
<?php
if(!empty($_SESSION["introuvable"])){
  session_destroy();
  echo"<p>vous n'etes pas ni  inscrit ni authentifier pour voter </p>"; 
}
else if($_SESSION["vote"]=="OUI"){
  echo'<p>'.$_SESSION["pseudo"].' vous avez deja voter , pour pouvoir voter de nouveaux allez a consulter vote et cliquer sur supprimer</p>';
}
else{
$conn=new PDO("mysql:host=localhost;dbname=election","root");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql=$conn->prepare("select * from partipolitique");
$sql->execute();
$result= $sql->fetchAll(PDO::FETCH_ASSOC);
echo'<p>Bienvenue '.$_SESSION["pseudo"].' merci de se concentrer et choisisez bien le parti qui vous présente</p>';
echo'<form id="myform" method="post" action="validationVote.php" >';
echo'<div class="input_field"> <h2>   Voter </h2>';
echo '<br>Choisissez un parti:';
echo '<select name="parti" id="parti">';
    foreach($result as $indice=>$value)
    { 
        echo "<option value=". $value["idParti"] . ">" . $value["nomParti"] . "</option>";
    }
echo'</select>';
echo '<br><div class="btn"><input type="submit" value="Valider votre vote"> </div>';
echo '<br><div class="btn"><input type="reset" value="Annuler">' ;
echo '</div> ';
echo '</form>';
  }

?>
   </article>
   </section>



<?php
  include 'footer.php';
  ?>


</body>
</html>