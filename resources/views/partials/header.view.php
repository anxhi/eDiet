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
    Menu
    </div>
    <div class="menulist">
        <a href="/">Home</a>
        <?php if(auth()):?>
            <div class="menulistel">
              <a href="/profile">Profile</a>
            </div>
        <?php endif; ?>
        <?php if(!auth()):?>
          <div class="menulistel">
            <a href="/login">Login</a></li>
          </div>
          <div class="menulistel">
            <a href="/signup">Signup</a></li>
          </div>            
        <?php else: ?>
            <form action="/logout" method="post" id="logoutForm" style="display: none;"></form>
            <div class="menulistel">
              <a href="#" onclick="document.getElementById('logoutForm').submit()">Logout</a></li>
            </div>
        <?php endif; ?>
    </div>
</div>
<div id="content">
<div class="page">
