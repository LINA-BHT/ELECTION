
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
 
  include 'headerNoninscrit.php';
  ?>

<section class="row">
<?php
  include 'aside.php';
  ?>
  

  <article class="main" id="m">
   <h1>Inscriptions aux Elections</h1>
   <p>NB :il s'agit d'une inscription anonyme, aucunne information permettant de reconnaitre l'electeur ne doit etre fournit </p>
   <form id="myform" method="post" action="valideInscription.php" onsubmit="return validate();" >
   <?php

 $con=new PDO("mysql:host=localhost;dbname=election","root");
 $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $sql=$con->prepare("select * from gouvernorat");
 $sql->execute();
 $result= $sql->fetchAll(PDO::FETCH_ASSOC);
echo'<div class=input_field> ';
echo'<h2>Formulaire inscription</h2>';
echo '<input class="controle" type="text" placeholder="pseudo adherent" name="pseudo" id="pseudo" pattern="[a-zA-Z-\.]{3,12}" required> <span id="errpseudo" class="resultat"></span>';
echo '</div>';
echo '<div class="input_field">';
echo '<input class="controle" type="password"  placeholder="mot depasse"  name="mdp" id="mdp" pattern="[0-9a-zA-Z-\.]{3,12}" required ><span class="resultat"></span>';
echo '</div> <br>';

echo 'Age :<input class="controle" type="Number" min="18" name="age" id="age" value=18 required > <span class="resultat" ></span> <br>';
echo '<br>Gouvernerat : <select name=gouvernerat  id=gouvernerat >';

    foreach($result as $indice=>$value)
    { 
        echo "<option value=". $value["idGouvernorat"] . ">" . $value["nomGouvernorat"] . "</option>";
    }
echo'</select>';
echo '<br><div class=btn><input type="submit" value="Valider"> </div>';
echo '<br><div class=btn ><input type="reset" value="Annuler" onclick="validate()">' ;
echo '</div> ';
echo '</form>';


?>
   
  </article>
</section>
<?php


session_destroy();


  ?>
</body>
</html>