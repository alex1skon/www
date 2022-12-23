<html lang="ru">

<meta charset="utf-8">

<head>
  <title>Регистрация</title>
  <link rel="stylesheet" href="index.css" />
</head>

<body>
  <button id="myBtn">Открыть модальный</button>

  <!-- Модальный -->
  <div id="myModal" class="modal">

    <!-- Модальное содержание -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <p>Некоторый текст в модальном..</p>
    </div>

  </div>
  <h2>Регистрация</h2>
  <form action="save_user.php" method="post">
    <!--**** save_user.php - это адрес обработчика.  То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей  отправятся на страничку save_user.php методом "post" ***** -->
    <p>
      <label>Ваш логин:<br></label>
      <input name="login" type="text" size="15" maxlength="15">
    </p>
    <!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
    <p>
      <label>Ваш пароль:<br></label>
      <input name="password" type="password" size="15" maxlength="15">
    </p>
    <!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** -->
    <p>
      <input type="submit" name="submit" value="Зарегистрироваться">
      <!--**** Кнопочка (type="submit") отправляет данные на страничку save_user.php ***** -->
    </p>
  </form>
</body>

</html>