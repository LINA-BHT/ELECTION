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
  if(empty($_SESSION["header"])){
 include 'headerNoninscrit.php';
  }
  else{
    echo''.$_SESSION["header"].'';
    include ''.$_SESSION["header"].'';
  }

  ?>

<section class="row">
<?php
  include 'aside.php';
  ?>
  

  <article class="main" id="m">
    <h1>Description</h1>
    <h2>Ceci est un site d'election fictive en ligne, permettant a des electeurs anonymes d'élire les membres du paarlement.Un électeur pourra a tout moment retirer son vote ou le modifier.</h2>
    <h1>Bienvenue</h1>
    <div class="fakeimg" ><img src="images/img.png" alt="Instance"></div><br>
    
    <p>L'Instance Supérieure Indépendante pour les Élections
       est une instance publique indépendante dotée de la personnalité 
       morale et de l’autonomie financière et administrative ayant son
        siège à Tunis et dont la mission principale consiste à assurer 
        des élections et des référendums démocratiques libres,
         pluralistes, honnêtes et transparentesL’instance supérieure indépendante pour les élections a été créée en vertu de la loi organique N° 2012-23 du 20 décembre 2012. L’Instance Supérieure Indépendante pour les Élections se compose du conseil de l’instance ayant pouvoir décisionnel ";
    <p>L’Instance Supérieure Indépendante pour les Élections est 
      chargée de toutes les opérations liées à l’organisation,
       l’administration et la supervision des élections et référendums 
       conformément à la loi et à la législation électorale
        dans ce cadre elle est chargée notamment de ce qui suit 
        :Tenir le registre des électeurs et le mettre à jour de 
        manière permanente.<br>Arrêter les listes électorales 
        pour chaque élection ou référendum, les réviser le cas échéant
         et les publier notamment sur le site électronique officiel 
         de l’instance, et ce, dans les délais fixés par la loi
          électorale.<br>Veiller à garantir le droit de scrutin pour 
          tout électeur.
          <br>Garantir l’égalité de traitement entre tous les électeurs,
           candidats et intervenants durant les opérations électorales et référendaires.<br>Arrêter, publier et mettre en exécution le calendrier des élections et des référendums, et ce, en conformité avec les mandats prévus par la constitution et la loi électorale.<br>Recevoir et statuer sur les dossiers de candidature pour les élections conformément à la législation électorale.<br>Mettre en place les mécanismes d’organisation, d’administration et de contrôle garantissant la sincérité et la transparence des élections et référendums.</p>
  
  </article>
</section>
<?php
  include 'footer.php';
  ?>


</body>
</html>