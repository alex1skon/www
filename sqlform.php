<html lang="ru">

<meta charset="utf-8">
<?php
require_once 'src/php/login.php';

$conn = new mysqli($hostname, $username, $password, $database);
if ($conn->connect_error) die("Connection Error!");

if (isset($_POST['delete']) && isset($_POST['isbn'])) {
  $isbn_delete = get_post($conn, 'isbn');
  $query = "DELETE FROM classics WHERE isbn = '$isbn_delete'";

  $result = $conn->query($query);
  if (!$result) echo "Сбой при удалении данных!<br><br>";
}

if (
  isset($_POST['author']) && isset($_POST['title']) &&
  isset($_POST['type']) &&
  isset($_POST['year']) && isset($_POST['isbn'])
) {
  $author = get_post($conn, 'author');
  $title  = get_post($conn, 'title');
  $type   = get_post($conn, 'type');
  $year   = get_post($conn, 'year');
  $isbn   = get_post($conn, 'isbn');
  $query  = "INSERT INTO classics(author, title, year, type isbn) VALUES ('$author', '$title', '$year', '$type', '$isbn')";
  $result = $conn->query($query);
  if (!$result) echo "Сбой при вставке данных";
}

echo <<<_END
    <form action="sqlform.php" method="post"><pre>
    Author <input type="text" name="author" placeholder="ФИО Автора">
    Title  <input type="text" name="title" placeholder="Название произведения">
    Type   <input type="text" name="type" placeholder="Жанр произведения">
    Year   <input type="text" name="year" placeholder="Год публикации">
    ISBN   <input text="text" name="isbn">
                  <input type="submit" value="ADD RECORD">
      </pre><form>
    _END;

$query = "SELECT * FROM classics";
$result = $conn->query($query);
if (!$result) die("Сбой при доступе к базе данных!");

$rows = $result->num_rows;

for ($i = 0; $i < $rows; ++$i) {
  $row = $result->fetch_array(MYSQLI_NUM);

  $r0 = htmlspecialchars($row[0]);
  $r1 = htmlspecialchars($row[1]);
  $r2 = htmlspecialchars($row[2]);
  $r3 = htmlspecialchars($row[3]);
  $r4 = htmlspecialchars($row[4]);

  echo <<<_END
      <pre>
      Author $r0
      Title  $r1
      Type   $r2
      Year   $r3
      ISBN   $r4
      </pre>
      <form action = "index.php' method= 'post'>
      <input type= 'hidden' name = 'delete' value= 'yes'>
      <input type= 'hidden' name = 'isbn' value= '$r4'>
      <input type= 'submit' value= 'DEL RECORD'> // Кнопка УДАЛИТЬ ЗАПИСЬ</form>
      _END;
}

$result->close();
$conn->close();

function get_post($conn, $var)
{
  return $conn->real_escape_string($_POST[$var]);
}
?>

</html>