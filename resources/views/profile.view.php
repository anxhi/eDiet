<?php partials('partials.header'); ?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="/css/profile.css">

<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <div class="profile-userpic">
                    <img src="images/default-picture.jpg" class="img-responsive" alt="">
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        Marcus Doe
                    </div>
                    <div class="profile-usertitle-job">
                        Developer
                    </div>
                </div>
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#"> Vegan </a>
                        </li>
                        <li>
                            <a href="#"> Gluten Free </a>
                        </li>
                        <li>
                            <a href="#"> 2 Diets </a>
                        </li>
                        <li>
                            <a href="#"> IBM 31 </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                Some user related content goes here...
            </div>
        </div>
    </div>
</div>
<br>
<br>
<?php partials('partials.scripts'); ?>
<?php partials('partials.footer'); ?>
