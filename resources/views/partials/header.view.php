<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lovers+Quarrel" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>

<div>
    <img class="logo" src="https://i.imgur.com/DQPbHvu.png">
</div>

    
<!--</head>-->
<!--<body>-->
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
