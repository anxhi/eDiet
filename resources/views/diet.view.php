<?php partials('partials.header'); ?>
<link rel="stylesheet" href="/css/slider.css">
<link rel="stylesheet" href="/css/fileUpload.css">
<style>
    .form-check-label{
        padding-right: 20px
    }
</style>
<h1 class="text-center">Vaktet</h1>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="" method="post" class="form-group" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name"> Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                </div>

                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="isGlutenIntolerant">Gluten Free</label>
                        <input type="checkbox" class="form-check-input" id="isGlutenIntolerant" name="isGlutenIntolerant">
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="isDairyIntolerant">Dairy Free</label>
                        <input type="checkbox" class="form-check-input" id="isDairyIntolerant" name="isDairyIntolerant">
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="isVegan">Vegan </label>
                        <input type="checkbox" class="form-check-input" id="isVegan" name="isVegan">
                    </div>
                </div>

                <div class="form-group">
                    <label for="post_image"> Foto </label><br>
                    <?php partials('partials.uploader'); ?>
                </div>

                <div class="slidecontainer">
                    <label for="duration" id="days">Duration (days: 1)</label><br>
                    <input id="duration" type="range" min="1" max="100" value="1" class="slider">
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-outline-primary">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php partials('partials.scripts'); ?>
<?php partials('partials.footer'); ?>
