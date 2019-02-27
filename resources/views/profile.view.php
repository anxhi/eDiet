<?php partials('partials.header'); ?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="/css/profile.css">
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete Modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">...</div>
            <div class="modal-footer">
                <button onclick="deleteForm();" type="button" class="btn btn-danger">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

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
                <button class="toggleFavourites btn btn-outline-info">Favourites</button>
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
                <form action="/delete" method="post">
                    <input type="hidden" name="type" value="users">
                    <input type="hidden" name="logout" value="true">
                    <input type="hidden" name="id" value="<?=$user->id?>">
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-danger">Deactivate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row profile">
        <?php foreach($favs as $result):?>
                <div class="card" style="margin: 20px">
                    <div class="card-header">
                        <?='Spans '.$result->duration.' days'?>
                    </div>
                    <div style="padding-left: 20px">
                        <img src="<?=$result->photo?>" style="border-radius:50%;" alt="" height="100" width="100">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" style="margin-bottom: 0"><?=ucfirst($result->name)?></h5>
                        <?php if($result->isVegan):?>
                            <span class="card-text"> ⋅ Vegan</span>
                        <?php endif;?>
                        <?php if($result->isGlutenFree):?>
                            <span class="card-text"> ⋅ Gluten Free</span>
                        <?php endif;?>
                        <?php if($result->isDiaryFree):?>
                            <span class="card-text"> ⋅ Dairy Free</span>
                        <?php endif;?>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Breakfast</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Lunch</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Dinner</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <?php foreach($result->data['breakfast'][0] as $breakfast): ?>
                                    <p class="card-text"><?=$breakfast->name?></p>
                                <?php endforeach;?>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <?php foreach($result->data['lunch'][0] as $breakfast): ?>
                                    <p class="card-text"><?=$breakfast->name?></p>
                                <?php endforeach;?>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <?php foreach($result->data['dinner'][0] as $breakfast): ?>
                                    <p class="card-text"><?=$breakfast->name?></p>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <?php if(!!auth_user()): ?>
                            <button id="<?=$result->id?>" class="btn btn-primary toggle-fav"><?= in_array($result->id, $favs) ? 'unfavourite' : 'favourite' ?></button>
                        <?php endif;?>
                    </div>
                </div>
            <?php endforeach;?>
    </div>
</div>
<?php partials('partials.scripts'); ?>
<?php partials('partials.footer'); ?>
<script>
    // $('.toggleFavourites').on('click',function(){
    //     $("#favourites").modal("show")
    // })
</script>
