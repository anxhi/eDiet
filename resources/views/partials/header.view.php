<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
<div id="main">
<div id="sidemenu" class="menu">
    <div class="menubutton">
        <div id="top" class="buttonelement"></div>
        <div id="bottom" class="buttonelement"></div>
    </div>
    <div class="menutext">
        eDiet Menu
    </div>
    <div class="menulist">
        <ul>
            <li><a href="/">Home</a></li>
            <?php if(auth()):?>
                <li><a href="/profile">Profile</a></li>
            <?php endif; ?>
            <?php if(!auth()):?>
            <li><a href="/login">Login</a></li>
            <li><a href="/signup">Signup</a></li>
            <?php else: ?>
                <form action="/logout" method="post" id="logoutForm" style="display: none;"></form>
                <li><button onclick="document.getElementById('logoutForm').submit()">Logout</button></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<div id="content">
<div class="page">
