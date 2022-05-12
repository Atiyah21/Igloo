<?php require 'login_user.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/igloo/css/form.css" />
    <title>Log in</title>
  </head>

  <body>
    <div class="main">
      <div class="test">
        <div class="content">
          <h1>Content de vous revoir</h1>
          <div class="wrong">Le mot de passet et/ou l'identifiant sont incorrects</div>
          <div class="validate">Votre compte a correctement été crée. Vous pouvez maintenant vous connecter. </div>
          <form method="POST">
            <div class="email">
              <input class="textbox" name="usrLogin" placeholder="E-mail" value="<?php if (isset($_POST['usrLogin'])) {echo $_POST['usrLogin'];} ?>" required />
            </div>
            <div class="password">
              <input type="password" name="usrPwd" minlength="8" class="textbox" placeholder="Mot de passe" required />
            </div>
            <div class="btn">
              <button type="submit" class="submit" name="submit">Se connecter</button>
            </div>
          </form>
          <div class="link"><a href="/igloo/php/pwd_reset.php">Mot de passe oublié ?</a></div>
          <div class="link">Pas de compte ?<a href="/igloo/php/signup.php"> S'inscrire</a>.</div>
        </div>
      </div>
    </div>
  </body>
</html>