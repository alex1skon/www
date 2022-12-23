<?php
if (isset($_POST['login'])) {
  $login = $_POST['login'];
  if ($login == '') {
    unset($login);
  }
} //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) {
  $password = $_POST['password'];
  if ($password == '') {
    unset($password);
  }
}
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
  exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);
// подключаемся к базе
include("connect.php"); // файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
// проверка на существование пользователя с таким же логином
$result = $connection->query("SELECT id FROM users1 WHERE login='$login'");
$myrow = $result->fetch_array(MYSQLI_NUM);
if (!empty($myrow['id'])) {
  exit("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
}
// если такого нет, то сохраняем данные
$result2 = $connection->query("INSERT INTO users1 (login,password) VALUES('$login','$password')");
// Проверяем, есть ли ошибки
if ($result2 == 'TRUE') {
  echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
} else {
  echo "Ошибка! Вы не зарегистрированы.";
}