<?php
$email = ' ';
$password = ' ';
//error_reporting(E_ERROR);
if (isset($_POST['email'])) {
  $email = $_POST['email'];
}
if (isset($_POST['password'])) {
  $password = $_POST['password'];
}
$password = stripslashes($password);
$password = htmlspecialchars($password);
$password = trim($password);
$password = hash('md5', $password);
$email = stripslashes($email);
$email = htmlspecialchars($email);
$email = trim($email);

include("src/php/connect.php");
$result = $connection->query("SELECT id FROM users1 WHERE email='$email' and password='$password'");
$myrow = $result->fetch_array(MYSQLI_NUM);
if ($email == '') {
  $flag = true;
}
else {
  if ($result->num_rows == 0 && $email == ' ') {
    //exit("Такого пользователя не зарегистриовано!");
    echo "<script> alert(\"Такого вользователя не существует!\"); window.location.replace(\"registation.php\");</script>";
    $flag = false;
  }
  else if ($result->num_rows == 1) {
    // exit("Вы успешно вошли!");
    echo "<script> alert(\"Вы успешно вошли!\"); window.location.replace(\"index.php\"); </script>";
    $flag = true;
    header("index.php");
  }
  else {
    // exit("Error!");
    echo "<script> alert(\"Error!\"); window.location.replace(\"index.php\"); </script>";
    $flag = false;
  }
}
?>

<html lang="ru">

<head>
  <title>Logining</title>
  <link rel="stylesheet" href="src/index.css" />
</head>

<body>
  <div class="card">
    <p class="text">
      Вход на сайт
    </p>
    <div class="content">
      <form method="POST">
        <div class="item">
          <input class="field" name="email" type="text" size="15" maxlength="30" placeholder="Ваш e-mail">
        </div>
        <div class="item">
          <input class="field" name="password" type="password" size="15" maxlength="15" placeholder="Ваш пароль">
        </div>
        <div class="item">
          <input type=<?php if ($flag) echo "submit"; else echo " "; ?> name="submit" value="Login" class="but">
        </div>
      </form>
    </div>
  </div>
</body>

</html>