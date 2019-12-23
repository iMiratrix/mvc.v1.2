<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
</head>
<body>
<div style="color: red; font-size: 14px; padding: 20px; margin: 0 auto; display: block; width:400px;">
    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li> - <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
<div class="reg">
    <form action="" method="post" style="">
        <input type="text" name="login" placeholder="login" class="form-control">
        <input type="password" name="password" placeholder="password" class="form-control">
        <input type="email" name="email" placeholder="email" class="form-control">
        <button type="submit" name="btn" class="btn btn-lg btn-primary btn-block">Зарегистрироваться</button>
    </form>
    <div align="center">
        <p>template не видит стили, а гит удаляет конфигурацию</p>
        <img src="/images/office-small.jpg" align="center">
    </div>
</div>
</body>
</html>

