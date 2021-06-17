
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
   <h1>Authentification</h1>
   <p>si vous ete deja inscrit entrer votre pseudo et votre mot de passe sinnon faire un inscription aux site</p>
   <form id="myform" method="post" action="ValidationAuthentification.php" onsubmit="return validate()" >
    <div class="input_field"> <h2>   S'authentifier </h2>
    <input type="text" placeholder="pseudo" name="pseudo" id="pseudo" ><span id="err"></span></div>
    <div class="input_field"> <input type="password" placeholder="motdepasse"  name="mdp" id="mdp"pattern="[0-9a-zA-Z-\.]{3,12}" required></div><br>
    <br><div class="btn"><input type="submit" value="Login"> </div>
    <br><div class="btn"><input type="reset" value="Annuler"> </div>
   </form>
    
  </article>
</section>
<?php
  include 'footer.php';
  ?>

<?php
class DBConnect{
  private $dataSource="mysql:host=localhost;dbname=election";
  private $username="root";
  private $DBconn;
  function __construct(){
    try{

    $this->DBconn=new PDO($this->dataSource,$this->username);
    

    }catch(PDOException $e)
    {
      echo $e->getMessage();
      exit();
    }
  }




}
$conn =new DBConnect();
echo '<pre>';
 print_r($_POST);
 echo '</pre>';
?>
</body>
</html>
