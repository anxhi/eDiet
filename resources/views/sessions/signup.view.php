<?php partials('partials.header'); ?>
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.min.css">-->
<link rel="stylesheet" href="/css/slider.css">
<link rel="stylesheet" href="/css/fileUpload.css">
<style>
    .form-check-label{
        padding-right: 20px
    }
</style>
<?php //dd($_SESSION['error']) ?>
<h1 class="text-center">Sign up</h1>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="/signup" method="post" class="form-group no-validate" novalidate enctype="multipart/form-data">
                <div class="form-group">
                    <img src="/images/default-picture.jpg" class="rounded-circle hover-effect" width="200" height="200" id="upload-picture" />
                </div>
                <input type="file" name="picture" id="picture" style="display:none">
                <label for="name"> Profile Picture (click the avatar to upload a new image)</label>
                <div class="form-group">
                    <?php $name = errors('name')?>
                    <label for="name"> Name </label>
                    <input type="text" class="form-control <?=!!$name ? 'is-invalid': ''?>" name="name" id="name" placeholder="Name">
                    <div class="invalid-feedback"><?=implode('<br>',$name)?></div>
                </div>

                <div class="form-group">
                    <?php $username = errors('username')?>
                    <label for="name"> Username </label>
                    <input type="text" class="form-control <?=!!$username ? 'is-invalid': ''?>" name="username" id="name" placeholder="Username">
                    <div class="invalid-feedback"><?=implode('<br>',$username)?></div>
                </div>

                <div class="form-group">
                    <?php $password = errors('password')?>
                    <label for="password"> Password </label>
                    <input type="password" class="form-control <?=!!$password ? 'is-invalid': ''?>" name="password" id="password" placeholder="**********">
                    <div class="invalid-feedback"><?=implode('<br>',$password)?></div>
                </div>

                <div class="form-group">
                    <?php $password_confirmation = errors('password_confirmation')?>
                    <label for="password"> Password Confirmation </label>
                    <input type="password" class="form-control <?=!!$password_confirmation ? 'is-invalid': ''?>" name="password_confirmation" id="password_confirmation" placeholder="**********">
                    <div class="invalid-feedback"><?=implode('<br>',$password_confirmation)?></div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="preferences">Preferences</label><br>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="glutenfree">Gluten Free</label>
                            <input type="checkbox" class="form-check-input" id="glutenfree" name="glutenfree">
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="dairyfree">Dairy Free</label>
                            <input type="checkbox" class="form-check-input" id="dairyfree" name="dairyfree">
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="vegan">Vegan </label>
                            <input type="checkbox" class="form-check-input" id="vegan" name="vegan">
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <?php $birthday = errors('birthday')?>
                        <label for="password"> Birthday </label>
                        <div class="input-group date">
                            <input type="text" class="form-control <?=!!$birthday ? 'is-invalid': ''?>" value="12-02-2012" name="birthday" id="birthday">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                            <div class="invalid-feedback"><?=implode('<br>',$birthday)?></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php partials('partials.scripts'); ?>
<?php partials('partials.footer'); ?>
<script src="/js/signup.js"></script>
