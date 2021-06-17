<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$_SESSION["header"]="headerSupprimer.php";
?>
<header >
<h2>BIENVENUE SUR NOTRE SITE</h2> 
<div id="img_accueil" ><img src="images/img.png" alt="instance"></div>
  <h1>République Tunisienne </h1>
  <p>Site Ouvert 24h sur 24h</p>
</header>
<nav>
  <?php
  
    echo' <a href="Accueil.php">Accueil</a>';
    echo'<a href="voter.php">Voter</a>';
    echo"<a  href='Resultatelection.php'>Resultat election</a>";
    echo'<a href="Deconnection.php" class="right">Deconnexion</a>';
    




 
 
  ?>
</nav>