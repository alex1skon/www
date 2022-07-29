<?php
  require_once 'src/php/login.php';
  
  $conn = new mysqli($hosname, $username, $password, $database, 3306);
  if ($conn->connect_error) die ("Connect Error");

  $query = "SELECT * FROM classics";
  
  $result = $conn->query($query);
  if (!$result) die("Query Error");

  $rows = $result->num_rows;

  for ($j = 0; $j < $rows; ++$j) {
    echo 'Author: ' . htmlspecialchars($row['author']) . "<br>";
    echo 'Title: ' . htmlspecialchars($row['title']) . "<br>";
    echo 'Type: ' . htmlspecialchars($row['type']) . "<br>";
    echo 'Year: ' . htmlspecialchars($row['year']) . "<br>";
    echo 'ISBN: ' . htmlspecialchars($row['isbn']) . "<br>";
  }

  $result->close();
  $conn->close();
?>