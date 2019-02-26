<?php partials('partials.header'); ?>
<div class="container">
    <div class="row profile">
        <div class="container">
            <h1>Search results</h1>
            <?php foreach($results as $result):?>
                <div class="card">
                    <div class="card-header">
                        <?='Goes for '.$result->duration.' days'?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?=ucfirst($result->name)?></h5>
                        <?php if($result->isVegan):?>
                            <span class="card-text">Vegan</span><br>
                        <?php endif;?>
                        <?php if($result->isGlutenFree):?>
                            <span class="card-text">Gluten Free</span><br>
                        <?php endif;?>
                        <?php if($result->isDiaryFree):?>
                            <span class="card-text">Dairy Free</span><br>
                        <?php endif;?>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>


<?php partials('partials.scripts'); ?>
<?php partials('partials.footer'); ?>
