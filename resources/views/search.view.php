<?php partials('partials.header'); ?>
<style>
    .card-text{
        font-size: 12px;
    }
</style>
<div class="container">
    <div class="row profile">
        <div class="container">
            <h1>Search results</h1>
            <?php foreach($results as $result):?>
                <div class="card" style="margin: 20px">
                    <div class="card-header">
                        <?='Spans '.$result->duration.' days'?>
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

                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
<!--                                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>


<?php partials('partials.scripts'); ?>
<?php partials('partials.footer'); ?>
