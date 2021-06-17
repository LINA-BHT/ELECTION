<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$_SESSION["header"]="headerVoter.php";

?>
<header >

<h2>BIENVENUE SUR NOTRE SITE</h2> 
<div id="img_accueil" ><img src="images/img.png" alt="instance"></div>
  <h1>République Tunisienne </h1>
  <p>Site Ouvert 24h sur 24h</p>
</header>
<nav>
  
    <a href="Accueil.php">Accueil</a>
    <a href="Deconnection.php" class="right">Deconnexion</a>
    <a href="ConsulterVote.php">Consulter votre vote</a>
    <a  href='Resultatelection.php'>Resultat election</a>

</nav>