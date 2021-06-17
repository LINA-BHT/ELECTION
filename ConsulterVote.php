
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
  include 'headerVoter.php';
  }
  else{
    include 'headerInscrit.php';
  }
  ?>
<section class="row">

<?php
  include 'aside.php';
  ?>

 <article class="main" id="m">
 <?php
 if(!empty($_SESSION["introuvable"])){
  session_destroy();
  echo"<p>vous n'etes pas ni  inscrit ni authentifier pour Consulter votre vote </p>"; 
}
 else if($_SESSION["vote"]=="OUI"){
 $conn=new PDO("mysql:host=localhost;dbname=election","root");
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $sql=$conn->prepare("SELECT * from partipolitique where idParti= '" .$_SESSION["idpartie"]. "'");
 $sql->execute();
 $result= $sql->fetchAll(PDO::FETCH_ASSOC);
 foreach($result as $indice=>$value)
 { 
    $parti= $value["nomParti"];
 
 }
 $sql=$conn->prepare("select * from gouvernorat where idGouvernorat= '" .$_SESSION["gouvernerat"]. "'");
 $sql->execute();
 $result= $sql->fetchAll(PDO::FETCH_ASSOC);
 foreach($result as $indice=>$value)
 { 
    $Gouv= $value["nomGouvernorat"];
 }

 echo '<p>'.$_SESSION["pseudo"].' Vous avez voté pour le partie '.$parti.' dans la gouvernera de '.$Gouv.'  </p>';
 echo '  <form method="POST" action="SupprimerVote.php"><p>Pour supprimer votre vote apuyez sur ce bouton : <br><input type="submit" value="Annuler mon vote" ></p></form> ';
}
else{
  echo '<p>'.$_SESSION["pseudo"].'  Vous n avez pas encore voté  </p>';
}
 ?>
 
   </article>
   </section>



<?php
  include 'footer.php';
  ?>


</body>
</html>
