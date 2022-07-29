<?php
  require_once 'src/php/login.php';

  $connect = new mysqli($hostname, $username, $password, $database, 3306);
  if ($connect->connect_error) die("Connect Error!");
  
  $query = "SELECT * FROM classics;";
  $result = $connect->query($query);
  
  if (!$result) die ("Query Error");

  $rows = $result->num_rows;

  for ($j = 0; $j < $rows; ++$j) { 
    $result->data_seek($j);
    echo 'Author: ' . htmlspecialchars($result->fetch_assoc()['author']) . '<br>';
    $result->data_seek($j);
    echo 'Title: ' . htmlspecialchars($result->fetch_assoc()['title']) . '<br>';
    $result->data_seek($j);
    echo 'type: ' . htmlspecialchars($result->fetch_assoc()['type']) . '<br>';
    $result->data_seek($j);
    echo 'Year: ' . htmlspecialchars($result->fetch_assoc()['year']) . '<br>';
    $result->data_seek($j);
    echo 'isbn: ' . htmlspecialchars($result->fetch_assoc()['isbn']) . '<br>';
  }
  $result->close();
  $connect->close();
?>
