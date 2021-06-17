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
  $_SESSION["pseudo"]=$_POST["pseudo"];
  $_SESSION["mdp"]=$_POST["mdp"];
   include 'headerAuthentification.php';
 
  ?>
<section class="row">

<?php
  include 'aside.php';
  ?>

 <article class="main" id="m">
 <?php
 
 $pseudo = $_POST["pseudo"];
 $mdp = $_POST["mdp"];
 

 try{
    $conn=new PDO("mysql:host=localhost;dbname=election","root");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $sql=$conn->prepare("SELECT * FROM electeur WHERE pseudo='" . $pseudo. "' and motPasse='" . $mdp. "'");
  $sql->execute();
  $result= $sql->fetchAll(PDO::FETCH_ASSOC);
  if (count($result) == 0) {
    echo '<h2>electeur introuvable</h2>';
echo "<p> ce compte n'existe pas , faire une inscription , si vous avez deja inscrit verifier que le login et le mot de passe sont correctent  </p>";
$_SESSION["introuvable"]="oui";

  }
else{
  foreach($result as $indice=>$value)
    { 
        $_SESSION["gouvernerat"]="" . $value["idGouvernorat"] . "";
        $_SESSION["idpartie"]="" . $value["idPartiElu"] . "";
        $_SESSION["id"]="" . $value["idElecteur"] . "";
    }

   
  $_SESSION["connection"]="OUI";
  if(empty($_SESSION["idpartie"])|| $_SESSION["idpartie"]=="0" ){

  $_SESSION["vote"]="non";
  }
  else{
  $_SESSION["vote"]="OUI";

  }


echo '<h1>Authentfication Valider</h1>';

echo '<h2>Bienvenue '.$_POST["pseudo"].'</h2>';
echo '<p> vous pouver maintenant :<br>-Voter<br>-Consulter votre vote<br>-Supprimmer votre vote et voter du nouveau <br>-Deconnecter</p>';
  }
}catch(PDOException $e){
  echo "Erreur : " . $e->getMessage();
  };
 ?>
 
  
   </article>
   </section>



<?php
  include 'footer.php';
  ?>


</body>
</html>