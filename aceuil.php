<?php
session_start();
$_session['message'] = 'hello';
$db = mysqli_connect('localhost', 'root','Yacine199620.,','table_joueur');
$request = $_POST;
$errors = [];

    if (isset($request) && !empty($request)) {
        // Récupération des données
        $password = mysqli_real_escape_string($db,$request['password']);
        $email =  mysqli_real_escape_string($db,$request['email']);
        $confirm =  mysqli_real_escape_string($db,$request['confirmpassword']);
        $username =  mysqli_real_escape_string($db,$request['username']);
    
        // Vérification validité email
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        $mail = (preg_match($regex, $email))?$email:"invalid email";
        
        $parts = explode('@',$email);
        $alias = explode(".", $parts[1]);
        if ($alias[0] !== "gmail" && $alias[0] !== "outlook" && $alias[0] !== "hotmail" && $alias[0] !== "yahoo") {
            $error = true;
            $emailError = "Adresse email invalide";
            $errors["email"] = $emailError;
        } else {
            if (verifierPassword($password, $confirm)) {
                if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
                    $confirmPassWorsmatchs='the password does not meet the requirements!';
                    $errors["password"] = $confirmPassWorsmatchs;
                }
            } else {
                $confirmPassWordError='les deux mot de passe ne sont pas identique!!!';
                $errors["confirmpasseword"]= $confirmPassWordError;
            }
        }
        
        // first check the database to make sure 
  // a user does not already exist with the same username and/or email
        if (empty($errors)) {
             $user_check_query = "SELECT * FROM jeux_carte WHERE gamer_username='$username' OR gamrt_email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
 //recuperer les donnée de la table de donnée
  $user = mysqli_fetch_assoc($result);
  if ($user) { // if user exists
    if ($user['gamer_username'] === $username) {
      $usernameExistError="Username already exists";
    }

    if ($user['gamrt_email'] === $email) {
      $emailExistError = "email already exists";
    }
  } else {
    $password = md5($password);//encrypt the password before saving in the database
    $query = "INSERT INTO jeux_carte (gamer_username, gamrt_email, gamer_passeWord) 
              VALUES('$username', '$email', '$password')";
      if(mysqli_query($db, $query)){
    echo 'inseré avec succes';
    
    }
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
      header('Location: connexion/connexion.php');
        } 
 
  } else {
            $_SESSION["errors"] = $errors;
        }
    }
    
function verifierPassword($pass, $confirm) {
    return $pass === $confirm;
}

?>

<!DOCTYPE htm>
<html>

<head>
    <title>jeux de carte</title>
    <meta charset="utf8">
    <link rel="stylesheet" href="cssAceuil/yacine.css" />
</head>
<body>
    <div class="body-content">
        <div class="module">
        <?php if(isset($_SESSION['success'])) : ?>
        <div style="background: lightgreen;"><b><?=$_SESSION['success'].' '.$_SESSION['username'] ?></b></div>
        <?php endif; ?>
      <h1> votre compte</h1>
        <form class="form" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="alert alert-error"></div>
        <input class="info" type="text" placeholder="username" name="username" required   ></br>
            <?php if (isset($usernameExistError)) : ?>
        <small style="color:red"><?= $usernameExistError; ?></small> <br>
        <?php endif; ?>
        <input class="info-perso" value="<?=isset($email)? $email: ""?>" type="email" placeholder="Email" name="email" required size="40px" ></br>
        <?php if (isset($errors["email"])) : ?>
        <small style="color:red"><?= $errors["email"]; ?></small> <br>
        <?php endif; ?>
        <?php if (isset($emailExistError)) : ?>
        <small style="color:red"><?= $emailExistError; ?></small> <br>
        <?php endif; ?>
        <input class="info-perso" type="password" placeholder="Password(doit avoir [Maj et ./$@..]   exp(Azerty1$)])" name="password" autocomplete="ne-passeword" required size="40px"></br>
        <?php if (isset($errors["password"])) : ?>
        <small style="color:red"><?= $errors["password"]; ?></small> <br>
        <?php endif; ?>
        <input class="info-perso" type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="ne-passeword" required size="40px" ></br>
         <?php if (isset($confirmPassWordError)) : ?>
        <small style="color:red"><?= $confirmPassWordError; ?></small> <br>
        <?php endif; ?>
        <input class ="register" type="submit" value="Register" name="register" class="bln bln-block btn-primary"/>
        </form>

         <p class="form">déja membre ? :</p>
    <input class ="register" action="connexion/connexion.php" type="submit" value="se connecter" name="register" class="bln bln-block btn-primary" onclick="redirectToConnection()"/>
   
    </div>
  </div> 
<div class="card"><img class="mer" src = "u.gif"></div>
<div class="card"><img class="palmier" src = "palmier.gif"></div>
</body>
</html>
<script>
    function redirectToConnection() {
        window.location.href = 'connexion/connexion.php';
    }
</script>