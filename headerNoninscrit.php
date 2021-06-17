<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$_SESSION["header"]="headerNoninscrit.php";


?>
<header >
<h2>BIENVENUE SUR NOTRE SITE</h2> 
<div id="img_accueil" ><img src="images/img.png" alt="instance"></div>
  <h1>République Tunisienne </h1>
  <p>Site Ouvert 24h sur 24h</p>
</header>
<nav>
  <?php
  $_SESSION["connection"]="non";

    echo' <a href="Accueil.php">Accueil</a>';
    echo"<a href='Inscription.php'>S'inscrire</a>";
    echo"<a  href='Authentification.php'>S'authentifier</a>";
    echo"<a  href='Resultatelection.php'>Resultat election</a>";
    
    
 
  ?>
</nav>