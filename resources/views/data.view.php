<?php partials('partials.header'); ?>
<link rel="stylesheet" href="/css/slider.css">
<link rel="stylesheet" href="/css/fileUpload.css">
<style>
    .form-check-label{
        padding-right: 20px
    }
</style>
<h1 class="text-center title">Vendosni te dhenat tuaja</h1>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="/user-data" method="post" class="form-group" enctype="multipart/form-data">
                <div class="slidecontainer col-sm-12">
                    <label for="bmi" id="bmi"> BMI </label><br>
                    <input id="bmi" type="number" name="BMI" class="form-control" min="15" max="45">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="slidercontainer col-sm-12">
                            <label for="Weight" id="Weight"> Weight </label><br>
                            <input id="Weight" name="Weight" type="range" min="150" max="220" value="150" class="slider">
                        </div>
                    </div>

                    <div class="row">
                        <div class="slidercontainer col-sm-6">
                            <label for="Height" id="Height"> Height </label><br>
                            <input id="Height" name="Height" type="range" min="150" max="220" value="150" class="slider">
                        </div>
                        <div class="slidercontainer col-sm-6">
                            <label for="Chest" id="Chest"> Chest </label><br>
                            <input id="Chest" name="Chest" type="range" min="20" max="40" value="20" class="slider">
                        </div>
                    </div>
                    <div class="row">
                        <div class="slidercontainer col-sm-6">
                            <label for="Leg" id="Leg"> Leg </label><br>
                            <input id="Leg" name="Leg" type="range" min="20" max="40" value="20" class="slider">
                        </div>
                        <div class="slidercontainer col-sm-6">
                            <label for="Calf" id="Calf"> Calf </label><br>
                            <input id="Calf" name="Calf"  type="range" min="20" max="40" value="20" class="slider">
                        </div>
                    </div>
                    <div class="row">
                        <div class="slidercontainer col-sm-6">
                            <label for="Waist" id="Waist"> Waist </label><br>
                            <input id="Waist" name="Waist" type="range" min="20" max="40" value="20" class="slider">
                        </div>
                        <div class="slidercontainer col-sm-6">
                            <label for="Hip" id="Hip"> Hip </label><br>
                            <input id="Hip" name="Hip" type="range" min="20" max="40" value="20" class="slider">
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
