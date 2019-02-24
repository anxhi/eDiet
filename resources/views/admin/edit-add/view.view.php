<?php partials('admin.partials.header') ?>
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="full-container">
            <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900"><?= $dataContent ? 'Edit ' : 'Add ' ?><?=$slug?></h6>
                <div class="mT-30">
                    <form class="container" id="needs-validation" novalidate action="<?= $dataContent ? '/update-'.$slug : '/create-'.$slug?>" method="POST" enctype="multipart/form-data">
                        <?php if($dataContent): ?>
                            <input type="hidden" name="id" value="<?=$dataContent->id?>">
                        <?php endif;?>

                        <?php foreach(array_keys($fields) as $field): ?>
                            <div class="col-md-8 mb-3">
                                <label for="validationCustom01"><?=$field?></label>
                                <input type="<?=$fields[$field]?>" class="form-control" id="validationCustom01" placeholder="<?=$field?>" name="<?=$field?>" required
                                    <?php if($dataContent):?>
                                        value="<?=$dataContent->{$field}?>"
                                    <?php endif;?>
                                >
                            </div>
                        <?php endforeach; ?>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php partials('admin.partials.footer') ?>
