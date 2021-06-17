
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
  include 'headerInscrit.php';
  $_SESSION["pseudo"]=$_POST["pseudo"];
$_SESSION["mdp"]=$_POST["mdp"];
$_SESSION["gouvernerat"]=$_POST["gouvernerat"]  ;
$_SESSION["idpartie"]="n'est pas encore voter";


  ?>
<section class="row">

<?php
  include 'aside.php';
  ?>

 <article class="main" id="m">
 <?php
 
 $pseudo = $_POST["pseudo"];
 $mdp = $_POST["mdp"];
 $idGouvernorat = $_POST["gouvernerat"];

 $age = $_POST["age"];


 try{
    $conn=new PDO("mysql:host=localhost;dbname=election","root");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $sql=$conn->prepare("INSERT INTO electeur(pseudo,motPasse,age,dateInscription,idGouvernorat) VALUES ('" . $pseudo. "','". $mdp."','". $age ."',CURDATE(),'". $idGouvernorat ."') ");
  $sql->execute();
  $_SESSION["connection"]="OUI";
  $_SESSION["vote"]="non";
 $id = $conn->lastInsertId();
 $_SESSION["id"]=$id;


  
}catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
    };
echo '<h1>Inscription Valider</h1>';
echo '<h2>Bienvenue '.$_POST["pseudo"].'</h2>';
echo '<p> vous pouver maintenant :<br>-Voter<br>-Consulter votre vote<br>-Supprimmer votre vote et voter du nouveau <br>-Deconnecter</p>';
 ?>
 
  
   </article>
   </section>



<?php
  include 'footer.php';
  ?>


</body>
</html>