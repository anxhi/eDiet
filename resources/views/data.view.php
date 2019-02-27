<?php partials('partials.header'); ?>
<link rel="stylesheet" href="/css/slider.css">
<link rel="stylesheet" href="/css/fileUpload.css">
<style>
    .form-check-label{
        padding-right: 20px
    }
    .text-center.title{
        color: black
    }
</style>

<h1 class="text-center title">Vendosni te dhenat tuaja</h1>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="/user-data" method="post" class="form-group" enctype="multipart/form-data">
                <div class="container">
                    <div class="row">
                        <div class="slidercontainer col-sm-12">
                            <label for="Weight" id="Weight"> Weight (<?=$user_data->weight ?? 40 ?>) </label><br>
                            <input id="Weight" name="Weight" type="range" min="40" max="200" value="<?=$user_data->weight ?? 150 ?>" class="slider">
                        </div>
                    </div>

                    <div class="row">
                        <div class="slidercontainer col-sm-6">
                            <label for="Height" id="Height"> Height (<?=$user_data->height ?? 150 ?>) </label><br>
                            <input id="Height" name="Height" type="range" min="150" max="220" class="slider" value="<?=$user_data->height ?? 150 ?>" >
                        </div>
                        <div class="slidercontainer col-sm-6">
                            <label for="Chest" id="Chest"> Chest (<?=$user_data->chest ?? 20 ?>)</label><br>
                            <input id="Chest" name="Chest" type="range" min="20" max="40" value="<?=$user_data->chest ?? 20 ?>" class="slider">
                        </div>
                    </div>
                    <div class="row">
                        <div class="slidercontainer col-sm-6">
                            <label for="Leg" id="Leg"> Leg (<?=$user_data->leg ?? 20 ?>)</label><br>
                            <input id="Leg" name="Leg" type="range" min="20" max="40" value="<?=$user_data->leg ?? 20 ?>" class="slider">
                        </div>
                        <div class="slidercontainer col-sm-6">
                            <label for="Calf" id="Calf"> Calf (<?=$user_data->calf ?? 20 ?>)</label><br>
                            <input id="Calf" name="Calf"  type="range" min="20" max="40" value="<?=$user_data->calf ?? 20 ?>" class="slider">
                        </div>
                    </div>
                    <div class="row">
                        <div class="slidercontainer col-sm-6">
                            <label for="Waist" id="Waist"> Waist (<?=$user_data->waist ?? 20 ?>)</label><br>
                            <input id="Waist" name="Waist" type="range" min="20" max="40" value="<?=$user_data->waist ?? 20 ?>" class="slider">
                        </div>
                        <div class="slidercontainer col-sm-6">
                            <label for="Hip" id="Hip"> Hip (<?=$user_data->hip ?? 20 ?>)</label><br>
                            <input id="Hip" name="Hip" type="range" min="20" max="40" value="<?=$user_data->hip ?? 20 ?>" class="slider">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="form-group pt-3">
                        <button type="submit" class="btn btn-outline-primary">SUBMIT</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php partials('partials.scripts'); ?>
<?php partials('partials.footer'); ?>
<script>
    $('.slider').on('change',function(){
        var el = $(this).parent().find('label')
        var id = el.attr('id');
        el.html(id+" ("+$(this).val()+")")
    })
</script>
