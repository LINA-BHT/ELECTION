
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
  include 'headerSupprimer.php';
  ?>
<section class="row">

<?php
  include 'aside.php';
  ?>

 <article class="main" id="m">
 <?php
 if ($_SESSION["idpartie"] =="n'est pas voter"){
    echo "<p>Vous n'avez pas encore voter</p>";
     


 }

 if($_SESSION["vote"] !="supprimer"){
 try{
    $conn=new PDO("mysql:host=localhost;dbname=election","root");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql=$conn->prepare("UPDATE electeur SET idPartiElu='NULL' WHERE idElecteur='" .$_SESSION["id"]. "'");
  $sql->execute();
  $_SESSION["vote"] ="supprimer";
  $sql=$conn->prepare("SELECT * FROM voix  WHERE idGouvernorat='" .$_SESSION["gouvernerat"]. "' AND idParti='" .$_SESSION["idpartie"]. "'");
  $sql->execute();
  $result= $sql->fetchAll(PDO::FETCH_ASSOC);
  foreach($result as $indice=>$value)
  { 
    $nbVoix='' .$value["nombreVoix"]. '';
  }
  $nbVoix -= 1;// incrementer le nombre  des voix par 1 
$sql=$conn->prepare("UPDATE voix SET nombreVoix='" .$nbVoix."'  WHERE idGouvernorat='" .$_SESSION["gouvernerat"]. "' AND idParti='" .$_SESSION["idpartie"]. "'");
$sql->execute();
}catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
    };
 
 echo '<p>vote supprimé avec succés, vous pouvez maintenat voter de nouveaux</p>';
  }
  else{
    echo '<p>'.$_SESSION["pseudo"].' vous avez deja supprimer votre vote , vous pouvez maintenant votez de nouveaux </p>';

  }
 ?>
 
  
   </article>
   </section>



<?php
  include 'footer.php';
  ?>


</body>
</html>
