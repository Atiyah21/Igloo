<?php require 'register_user.php'; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/igloo/css/form.css" />
  <title>Sign Up</title>
</head>

<body>
  <div class="main">
    <div class="test">
      <div class="content">
        <h1>Bienvenue chez Igloo</h1>
        <div class="wrong">Cet email est déjà utilisé</div>
        <form method="POST" enctype="multipart/form-data">
        <div class="email">
              <input class="textbox" name="usrLogin" placeholder="E-mail" value="<?php if (isset($_POST['usrLogin'])) {echo $_POST['usrLogin'];} ?>" required />
            </div>
            <div class="pseudo">
              <input class="textbox" name="usrPseudo" placeholder="Pseudo" value="<?php if (isset($_POST['usrPseudo'])) {echo $_POST['usrPseudo'];} ?>" required />
            </div>
            <div class="password">
              <input type="password" name="usrPwd" minlength="8" class="textbox" placeholder="Mot de passe" required />
            </div>
            
          <div class="btn">
            <button type="submit" class="submit" name="submit">Créer</button>
          </div>
        </form>
        <div class="link">Déja inscrit ? <a href="login.php"> Se connecter</a>.</div>
      </div>
    </div>
  </div>
</body>

</html>