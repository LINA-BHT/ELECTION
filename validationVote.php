
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
  include 'headerVoter.php';
  ?>
<section class="row">

<?php
  include 'aside.php';
  ?>

 <article class="main" id="m">
 <h1>Validation Vote pour la chambre des represantants du peuple</h1>
 <?php
if($_SESSION["vote"]!="OUI"){
 try{
    $conn=new PDO("mysql:host=localhost;dbname=election","root");
   
  $sql=$conn->prepare("UPDATE electeur SET idPartiElu='" .$_POST["parti"]. "' , dateDerniereElection=CURDATE() WHERE idElecteur='" .$_SESSION["id"]. "'");
  $sql->execute();
  $_SESSION["idpartie"] =$_POST["parti"];
  $_SESSION["vote"]="OUI";
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //recupere les nombre de vois de cette partie dans la gouvernerat de l'electeur
  $sql=$conn->prepare("SELECT * FROM voix  WHERE idGouvernorat='" .$_SESSION["gouvernerat"]. "' AND idParti='" .$_SESSION["idpartie"]. "'");
$sql->execute();
$result= $sql->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $indice=>$value)
{ 
  $nbVoix='' .$value["nombreVoix"]. '';
}
//echo"'" .$nbVoix. "'";
$nbVoix += 1;// incrementer le nombre  des voix par 1 
$sql=$conn->prepare("UPDATE voix SET nombreVoix='" .$nbVoix. "' WHERE idGouvernorat='" .$_SESSION["gouvernerat"]. "' AND idParti='" .$_SESSION["idpartie"]. "'");
$sql->execute();
}catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
    };
 echo '<p>votre vote est bien inséré</p>';
  }
  else{
    echo '<p>'.$_SESSION["pseudo"].' votre vote est deja inserer vous pouvez consulter votre vote 
    et le supprimer pour pouvoir voter de nouveaux  </p>';

  }
 ?>
 
  
   </article>
   </section>



<?php
  include 'footer.php';
  ?>


</body>
</html>