<?php
$email = ' ';
error_reporting(E_ERROR);
//echo "<br> " . print_r($_POST['email']);
if (empty($_POST['email']) == 0) {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    $email = stripslashes($email);
    $email = htmlspecialchars($email);
    $email = trim($email);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_with_email = false;
    } else {
        $error_with_email = true;
    }
} else {
    $error_with_email = false;
    $email = ' ';
}
?>

<html lang="ru">

<meta charset="utf-8">

<head>
    <title>Регистрация</title>
    <link rel="stylesheet" href="index.css"/>
</head>

<body>
<div class="card">
  <p class="text">
    Регистрация
  </p>
  <div class="content">
        <form
            <?php
            if ($error_with_email) {
                echo "action=\"save_user.php\"";
            } else {
                echo "action=\"index.php\"";
            }
            ?> method="post">
            <!--**** save_user.php - это адрес обработчика.  То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей  отправятся на страничку save_user.php методом "post" ***** -->
            <div class="item">
                <input class="field" name="login" type="text" size="15" maxlength="15" placeholder="Ваше имя">
                <p class="nop" style="color: rgb(204, 0, 0); font-size: 13px; margin: 0px;">Поле заполнено не правильно</p>
            </div>
            <!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
            <div class="item">
                <input class="field" name="email" type="text" <?php
                if (empty($_POST['email'] == 1)) {
                    echo "style=\"border-color: black;\"";
                } else {
                    if (!$error_with_email) {
                        echo "style=\"border-color: red;\"";
                    } else {
                        echo "style=\"border-color: black;\"";
                    }
                }
                ?> size="15" maxlength="30" placeholder="Ваш e-mail">
            </div>
            <p class="nop" style="color: rgb(204, 0, 0); font-size: 13px; margin: 0px;">Поле заполнено не правильно</p>
            <?php
            if (!$error_with_email) {
                echo "Неверный формат Email!";
            }
            ?>
            <div class="item">
                <input class="field" name="password" type="password" size="15" maxlength="15" placeholder="Ваш пароль">
                <p class="nop" style="color: rgb(204, 0, 0); font-size: 13px; margin: 0px;">Поле заполнено не правильно</p>
            </div>
            <!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** -->
            <div class="item">
                <input type="submit" name="submit" value="Зарегистрироваться" class="but">
                <!--**** Кнопочка (type="submit") отправляет данные на страничку save_user.php ***** -->
            </div>
    </div>
    </form>
</div>
<script>
    let but = document.querySelector(".but");
    console.log(but.type)
    but.addEventListener('click', function () {
        let fields = document.querySelectorAll('.field');
        let err = document.querySelectorAll('.nop');
        console.log(fields)
        let tmp = 0;
        for (let i = 0; i < fields.length; i++) {
            if (fields[i].value == '') {
                err[i].style.display = 'flex';
                fields[i].style.border = '2px solid #cc0000'
            } else {
                err[i].style.display = 'none';
                fields[i].style.border = 'none'
                tmp++;
            }
        }
        if (tmp == 3)
            but.type = 'submit';
    })
</script>
</body>

</html>