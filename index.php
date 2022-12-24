<?php
$email = ' ';
error_reporting(E_ERROR);
//echo "<br> " . print_r($_POST['email']);
if (isset($_POST['email'])) {
  $email = $_POST['email'];
}
$email = stripslashes($email);
$email = htmlspecialchars($email);
$email = trim($email);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $error_with_email = false;
} else {
  $error_with_email = true;
}
?>

<html lang="ru">

<meta charset="utf-8">

<head>
  <title>Регистрация</title>
  <link rel="stylesheet" href="index.css" />
</head>

<body>
  <div class="card">
    <p class="text">
      Регистрация
    </p>
    <div class="content">
      <form <?php
            if ($error_with_email) {
              echo "action=\"save_user.php\"";
            } else {
              //echo "action=\"index.php\"";
            }
            ?> method="post">
        <!--**** save_user.php - это адрес обработчика.  То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей  отправятся на страничку save_user.php методом "post" ***** -->
        <div class="item">
          <input class="field" name="login" type="text" size="15" maxlength="15" placeholder="Ваше имя">
        </div>
        <!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
        <div class="item">
          <input class="field" name="email" type="text"
          <?php
            if ($error_with_email) {
              echo "style=\"border: 1px solid black;\"";
            } else {
              echo "style=\"border: 1px solid red;\"";
            }
            ?> size="15" maxlength="30" placeholder="Ваш e-mail">
        </div>
        <?php
        if (!$error_with_email) {
          echo "<div style=\"color: #cc0000\">Неверный формат Email!</div>";
        }
        ?>
        <div class="item">
          <input class="field" name="password" type="password" size="15" maxlength="15" placeholder="Ваш пароль">
        </div>
        <!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** -->
        <div class="item">
          <input type="submit" name="submit" value="Зарегистрироваться" class="but">
          <!--**** Кнопочка (type="submit") отправляет данные на страничку save_user.php ***** -->
        </div>
    </div>
    </form>
  </div>
</body>

</html>