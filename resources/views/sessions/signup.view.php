<?php partials('partials.header'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="/css/slider.css">
<link rel="stylesheet" href="/css/fileUpload.css">
<style>
    .form-check-label{
        padding-right: 20px
    }
</style>
<h1 class="text-center">Sign up</h1>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="" method="post" class="form-group" enctype="multipart/form-data">
                <div class="form-group">
                    <img src="/images/default-picture.jpg" class="rounded-circle hover-effect" width="200" height="200" id="profile-picture" />
                </div>
                <input type="file" name="picture" id="picture" style="display:none">
                <label for="name"> Profile Picture (click the avatar to upload a new image)</label>
                <div class="form-group">
                    <label for="name"> Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                </div>

                <div class="form-group">
                    <label for="password"> Password </label>
                    <input type="text" class="form-control" name="password" id="password" placeholder="**********">
                </div>

                <div class="form-group">
                    <label for="password"> Password Confirmation </label>
                    <input type="text" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="**********">
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="preferences">Preferences</label><br>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="glutenfree">Gluten Free</label>
                            <input type="checkbox" class="form-check-input" id="glutenfree" name="type">
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
                        <label for="password"> Birthday </label>
                        <div class="input-group date">
                            <input type="text" class="form-control" value="12-02-2012">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-outline-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php partials('partials.scripts'); ?>
<?php partials('partials.footer'); ?>
<script src="/js/signup.js"></script>
