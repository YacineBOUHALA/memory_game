<?php
session_start();
$_session['message'] = 'hello';
$db = mysqli_connect('localhost', 'root','Yacine199620.,','table_joueur');
$request = $_POST;


    if (isset($request) && !empty($request)) {
        // Récupération des données
         $username =  mysqli_real_escape_string($db,$request['username']);
         $password = mysqli_real_escape_string($db,$request['password']);
         $password = md5($password);//encrypt the password before saving in the database


        $user_check_query = "SELECT * FROM jeux_carte WHERE gamer_username='$username' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
      
 //recuperer les donnée de la table de donnée
  $user = mysqli_fetch_assoc($result);
  if($user){
      if($password !== $user["gamer_passeWord"]){
        $passDontMatch = "le mot de passe ne correspond pas a l'utilisateur";
      } else {
        header('Location: ../choix de déficulté/choix_dificultie.html');
      }
    
    }else{
        $userDontMatch = "ce nom ne correspond a aucun utilisateur";
    }
    }
    

?>

<!DOCTYPE htm>
<html>

<head>
    <title>connxion</title>
    <meta charset="utf8">
    <link rel="stylesheet" href="yacine.css" />
</head>
<body>
    <div class="body-content">
        <div class="module">
        <?php if(isset($_SESSION['success'])) : ?>
        <div style="background: lightgreen;"><b><?=$_SESSION['success'].' '.$_SESSION['username'] ?></b></div>
        <?php endif; ?>
      <h1> votre compte</h1>
        <form class="form" action="../choix de déficulté/choix_dificultie.html" method="post" autocomplete="off">
        <div class="alert alert-error"></div>
        <input class="info" type="text" placeholder="username" name="username" required   ></br>
            <?php if (isset($userDontMatch)) : ?>
        <small style="color:red"><?= $userDontMatch; ?></small> <br>
        <?php endif; ?>
       <input class="info-perso" type="password" placeholder="Password" name="password" autocomplete="ne-passeword" required size="40px"></br>
        <?php if (isset($passDontMatch)) : ?>
        <small style="color:red"><?= $passDontMatch; ?></small> <br>
        <?php endif; ?>
    <input class ="register" type="submit" value="Se connecter" name="register" class="bln bln-block btn-primary"/>
     </form>
        
    
    </div>
  </div>
    <div class="card"><img class="mer" src = "u.gif"></div>
    <div class="card"><img class="palmier" src = "palmier.gif"></div>
</body>
</html>