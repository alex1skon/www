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
      <form method="post">
        <!--**** save_user.php - это адрес обработчика.  То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей  отправятся на страничку save_user.php методом "post" ***** -->
        <div class="item">
          <input class="field" name="login" type="text" size="15" maxlength="15" placeholder="Ваше имя">
        </div>
        <!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
        <div class="item">
          <input class="field" name="email" type="text" size="15" maxlength="30" placeholder="Ваш e-mail">
        </div>
        <div class="item">
          <input class="field" name="password" type="password" size="15" maxlength="15" placeholder="Ваш пароль">
        </div>
        <!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** -->
        <div class="item">
          <input type="submit" name="submit" value="Register" class="but">
          <!--**** Кнопочка (type="submit") отправляет данные на страничку save_user.php ***** -->
        </div>
    </div>
    </form>
  </div>
</body>

</html>