if (isset($_POST['email'])) {
  $email = $_POST['email'];
}
$email = stripslashes($email);
$email = htmlspecialchars($email);
$email = trim($email);