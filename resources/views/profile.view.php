<?php partials('partials.header'); ?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="/css/profile.css">
<?php //dd($user->picture);?>
<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <div class="profile-userpic">
                    <img src="<?=$user->picture?>" class="img-responsive" alt="">
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                       <?=$user->name?>
                    </div>
                    <div class="profile-usertitle-job">
                        <?=$user->role?>
                    </div>
                </div>
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="<?=$user->vegan ? 'active' :''?>">
                            <a href="#"> Vegan </a>
                        </li>
                        <li class="<?=$user->glutenfree ? 'active' :''?>">
                            <a href="#"> Gluten Free </a>
                        </li>
                        <li class="<?=$user->dairyfree ? 'active' :''?>">
                            <a href="#"> Dairy Free </a>
                        </li>
                        <li>
                            <a href="#"> IBM <?=$user->data->BMI ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                <form action="/edit-profile" method="post" class="form-group no-validate" novalidate enctype="multipart/form-data">
                    <div class="form-group">
                        <img src="/images/default-picture.jpg" class="rounded-circle hover-effect" width="200" height="200" id="upload-picture" />
                    </div>
                    <input type="file" name="file" id="picture" style="display:none">
                    <label for="name"> Profile Picture (click the avatar to upload a new image)</label>
                    <div class="form-group">
                        <?php $name = errors('name')?>
                        <label for="name"> Name </label>
                        <input type="text" class="form-control <?=!!$name ? 'is-invalid': ''?>" name="name" id="name" placeholder="Name" value="<?=$user->name?>">
                        <div class="invalid-feedback"><?=implode('<br>',$name)?></div>
                    </div>

                    <div class="form-group">
                        <?php $username = errors('username')?>
                        <label for="name"> Username </label>
                        <input type="text" class="form-control <?=!!$username ? 'is-invalid': ''?>" name="username" id="name" placeholder="Username" value="<?=$user->username?>">
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
                                <input type="checkbox" class="form-check-input" id="glutenfree" name="glutenfree" <?=$user->glutenfree ? "checked" : ""?>>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="dairyfree">Dairy Free</label>
                                <input type="checkbox" class="form-check-input" id="dairyfree" name="dairyfree" <?=$user->dairyfree ? "checked" : ""?>>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="vegan">Vegan </label>
                                <input type="checkbox" class="form-check-input" id="vegan" name="vegan" <?=$user->vegan ? "checked" : ""?> >
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <?php $birthday = errors('birthday')?>
                            <label for="password"> Birthday </label>
                            <div class="input-group date">
                                <input type="text" class="form-control <?=!!$birthday ? 'is-invalid': ''?>" value="<?=$user->birthday?>" name="birthday" id="birthday">
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
</div>
<br>
<br>
<?php partials('partials.scripts'); ?>
<?php partials('partials.footer'); ?>
