<html lang="ru">

<meta charset="utf-8">
<head>
    <title>Регистрация</title>
    </head>
    <body>
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
</p></form>
    </body>
</html>
/*
<?php
  require_once('src/php/login.php');
  $connection = new mysqli($hostname, $username, $password, $database);
  if ($connection->connect_error) die("Connect error!");

  if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']))
  {
    $un_temp = mysql_entities_fix_string($connection, $_SERVER['PHP_AUTH_USER']);
    $pw_temp = mysql_entities_fix_string($connection, $_SERVER['PHP_AUTH_PW']);
    $query   = "SELECT * FROM users WHERE username='$un_temp'";
    $result  = $connection->query($query);
    if(!$result) die("User not found");
    elseif ($result->num_rows)
    {
      $row = $result->fetch_array(MYSQLI_NUM);
      print_r($row);
      echo "<br>$pw_temp<br>$row[3]<br>";

      $result->close();

      if (password_verify($pw_temp, $row[3])) echo
      htmlspecialchars("$row[0] $row[1] : 
      Hi $row[0], you logged in as '$row[2]");
      else die("Неверный логин-пароль!");
    }
    else die("Неверный логин-пароль (2)");
  }
  else 
  {
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unnauthorized');
    die("Please, input Login-Password");
  }

  $connection->close();

  function mysql_entities_fix_string($connection, $string)
  {
    return htmlentities(mysql_fix_string($connection, $string));
  }

  function mysql_fix_string($connection, $string)
  {
    if (get_magic_quotes_gpc())
      $string = stripslashes($string);
    return $connection->real_escape_string($string);
  }
?> */
