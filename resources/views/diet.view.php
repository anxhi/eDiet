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
    <form action="<?=$diet ? '/update-diet' : '/add-diet' ?>" method="post" class="form-group" enctype="multipart/form-data">
        <?php if($diet):?>
            <input type="hidden" name="id" value="<?=$diet->id?>">
        <?php endif;?>

        <div class="form-group">
            <?php $name = errors('name')?>
            <label for="name"> Name</label>
            <input type="text" class="form-control <?=!!$name ? 'is-invalid': ''?>" name="name" id="name" placeholder="Name" value="<?=($diet ? $diet->name: "")?>">
            <div class="invalid-feedback"><?=implode('<br>',$name)?></div>
        </div>

        <div class="form-group">
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="isGlutenIntolerant">Gluten Free</label>
                <input type="checkbox" class="form-check-input" id="isGlutenIntolerant" name="isGlutenIntolerant"  <?=($diet && $diet->isGlutenFree) ? 'checked':''?> >
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="isDairyIntolerant">Dairy Free</label>
                <input type="checkbox" class="form-check-input" id="isDairyIntolerant" name="isDairyIntolerant" <?=($diet && $diet->isDiaryFree) ? 'checked':''?> >
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="isVegan">Vegan </label>
                <input type="checkbox" class="form-check-input" id="isVegan" name="isVegan" <?=($diet && $diet->isVegan) ? 'checked':''?> >
            </div>
        </div>

        <div class="form-group">
            <label for="post_image"> Foto </label><br>
            <?php partials('partials.uploader'); ?>
        </div>
        <div class="row">
            <?php foreach($meals as $meal): ?>
                <div class="card col-sm-4" style="cursor:pointer">
                    <div class="card-body text-center" style="color:black">
                        <?=ucfirst($meal->name)?>
                        <div class="form">
                            <select name="<?=$meal->name?>[]" class="selectpicker" multiple data-live-search="true">
                                <?php foreach($foods as $food):?>
                                    <option value="<?=$food->id?>" data-tokens="<?=$meal->id?>-<?=$food->name?>" <?= in_array($food->id,$selected_foods[$meal->id]) ? 'selected': '' ?> >
                                        <?=$food->name?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


        <div class="slidecontainer">
            <label for="duration" id="days">Duration (days: <?=($diet ? $diet->duration : '1')?>)</label><br>
            <input id="duration" name="duration" type="range" min="1" max="31" value="<?=($diet ? $diet->duration : '1')?>" class="slider">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary">SUBMIT</button>
        </div>
    </form>
</div>
<?php partials('partials.scripts'); ?>
<?php partials('partials.footer'); ?>
<script>
    $('.selectpicker').selectpicker();
</script>
