<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BlaBlaCar 2.0</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <div id="main">
    <h1>rejoignez nous</h1>
    <div id="login">
      <h2>Inscription</h2>
      <hr/>
      <form action="" method="post">
        <label>Email :</label>
        <input type="email" name="email" id="email" required="required" placeholder="john123@gmail.com"/><br/><br />
        <label>Nom :</label>
        <input type="text" name="nom" id="nom" required="required" placeholder="Entrez votre nom"/><br /><br />
        <label>Prenom :</label>
        <input type="text" name="prenom" id="prenom" required="required" placeholder="Entrez votre prenom"/><br/><br />
        <label>Password :</label>
        <input type="password" name="password" id="password" required="required" placeholder="Entrez votre mot de passe"/><br/><br />
        <label>Tel :</label>
        <input type="text" name="tel" id="tel" required="required" placeholder="Entrez votre numero"/><br/><br />
        <label>Age :</label>
        <div>
          <select class="age" name="Age">
            <option value="" selected="selected"></option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
          </select>
        </div>
        <input type="submit" value=" Submit " name="submit"/><br />
      </form>
    </div>
    <!-- Right side div -->
    <!-- <div id="formget">
    <a href=https://www.formget.com/app><img src="formget.jpg" alt="Online Form Builder"/></a>
  </div> -->

</div>
<?php
if(isset($_POST["submit"])){
   $hostname='localhost';
    $username='root';
    $password='';
      try {
        $dbh = new PDO("mysql:host=$hostname;dbname=hmellouki",$username,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
    $sql = "INSERT INTO membre (AdrMail, Nom, Prenom, MotDP, Telephone, Age, Administrateur)
    VALUES ('".$_POST["email"]."','".$_POST["nom"]."','".$_POST["prenom"]."','".$_POST["password"]."','".$_POST["tel"]."','".$_POST["Age"]."',0)";
    if ($dbh->query($sql)) {
      echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
    }
    else{
      echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
    }

    $dbh = null;
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }

}
?>
</body>
</html>
