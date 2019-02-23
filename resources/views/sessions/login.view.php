<?php $errors = $_SESSION['errors'] ?>
<?php var_dump($_SESSION['errors']);?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
<div class="wrapper">
    <div class="container">
        <h1>Welcome</h1>
        <form class="form" method="post" action="/login">
            <input type="text" placeholder="Username">
            <small style="color:red; text-align: left"><?=implode("<br>",$errors['email'])?></small>
            <input type="password" placeholder="Password">
            <small style="color:red; text-align: left"><?=implode(",",$errors['password'])?></small>

            <button type="submit" id="login-button">Login</button>
            <small style="color:red"><?=implode("<br>",$errors['login'])?></small>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="/js/main.js"></script>
</body>
</html>
