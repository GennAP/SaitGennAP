<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reg</title>
</head>
<body>
	<?php
        require('connection.php');
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($connection, $query);
        if($result) {
            $smsq = "Регистрация прошла успешно";
        } else {
            $fsmsq = "Ошибка - недопустимое имя или почта";
        }
    }
?>

<?php if(isset($smsq)) { ?><div class="alert-true" role="alert"> <?php echo $smsq; ?> </div><?php } ?>
<?php if(isset($fsmsq)) { ?><div class="alert-false" role="alert"> <?php echo $fsmsq; ?> </div><?php } ?>

<h1>
    <a href="index.php">From Tomsk with LOVE</a>
</h1>
<form class="form-reg" method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="password" name="password" placeholder="Password" required>

    <button type="submit" id="reg">Зарегистрироваться</button>
</form>

    <p>Все поля обязательны!</p>
</body>
</html>