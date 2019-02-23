<?php partials('admin.partials.header') ?>
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="full-container">
            <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900"><?= $position ? 'Edit' : 'Add' ?> news</h6>
                <div class="mT-30">
                    <form class="container" id="needs-validation" novalidate action="<?= $position ? '/update-position' : '/create-position'?>" method="POST" enctype="multipart/form-data">
                        <?php if($position): ?>
                            <input type="hidden" name="id" value="<?=$position->id?>">
                        <?php endif;?>
                        <div class="col-md-8 mb-3">
                            <label for="validationCustom01">Title</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Name" name="name" required
                                <?php if($position):?>
                                    value="<?=$position->name?>"
                                <?php endif;?>
                            >
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="validationCustom04">Reports</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Reports" name="reports" required
                                <?php if($position):?>
                                    value="<?=$position->reports?>"
                                <?php endif;?>
                            >
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="validationCustom04">Type</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Type" name="type" required
                                <?php if($position):?>
                                    value="<?=$position->type?>"
                                <?php endif;?>
                            >
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="validationCustom04">Overview</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Overview" name="overview" required
                                <?php if($position):?>
                                    value="<?=$position->overview?>"
                                <?php endif;?>
                            >
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="validationCustom04">Skills</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Skills" name="skills" required
                                <?php if($position):?>
                                    value="<?=$position->skills?>"
                                <?php endif;?>
                            >
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="validationCustom04">Requirements</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Requirements" name="requirements" required
                                <?php if($position):?>
                                    value="<?=$position->requirements?>"
                                <?php endif;?>
                            >
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="validationCustom02">Responsibilities</label>
                            <textarea class="form-control" id="validationCustom02" placeholder="Responsibilities"  name="responsibilities" required><?php if($position):?><?=$position->responsibilities?><?php endif;?></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php partials('admin.partials.footer') ?>
