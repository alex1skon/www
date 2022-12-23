<meta charset="utf-8" />
<?php

class user
{
  public $name;
  private $pswrd;

  public function __construct($name, $pswrd)
  {
    $this->name = $name;
    $this->pswrd = $pswrd;
  }

  function save_user()
  {
    echo "<br>Saving user data ...<br>";
  }

  public function display_info()
  {
    echo "Name :" . $this->name . "<br>";
    echo "Pass :" . $this->pswrd . "<br>";
  }
}

class subs extends user
{
  public $phone, $email;

  public function __construct($name, $pswrd, $phone, $email)
  {
    parent::__construct($name, $pswrd);
    $this->phone = $phone;
    $this->email = $email;
  }

  public function display_info()
  {
    parent::display_info();
    echo "Phone :" . $this->phone . "<br>";
    echo "Email :" . $this->email . "<br>";
  }
}

$object = new user("Alex", "12345");
$object->save_user();
$tmp = new subs("Bro", "4321", "12312312312", "paiwjdpi@wapdnpa.awi");
$object->display_info();
$tmp->display_info();
?>