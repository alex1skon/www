<html lang="ru">

<meta charset="utf-8">
<?php
  require_once('src/php/login.php');
  $conn = new mysqli($hostname, $username, $password, $database);
  if ($conn->connect_error) die("Connect error!");

  $query = "CREATE TABLE users (
    forename varchar(32) not null,
    surname varchar(32) not null,
    username varchar(32) not null unique,
    password varchar(32) not null)";

  $result = $conn->query($query);
  if (!$result) die("Query error!");

  $forename = 'Bill';
  $surname  = 'Smith';
  $username = 'bsmith';
  $password = 'mysecret';
  $hash     = password_hash($password, PASSWORD_DEFAULT);

  add_user($conn, $forename, $surname, $username, $password, $hash);

  $forename = 'Pauline';
  $surname  = 'Jones';
  $username = 'pjones';
  $password = 'acrobat';
  $hash     = password_hash($password, PASSWORD_DEFAULT);

  add_user($conn, $forename, $surname, $username, $password, $hash);

  function add_user($connection, $forename, $surname, $username, $password, $hash) {
    $stmt = $connection->prepare('INSERT INTO  users values (?,?,?,?)');
    $stmt->bind_param('ssss', $forename, $surname, $username, $password);
    $stmt->execute();
    $stmt->close();
  }
?>