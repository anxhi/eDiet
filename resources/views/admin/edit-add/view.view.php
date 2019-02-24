<?php partials('admin.partials.header') ?>
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="full-container">
            <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900"><?= $news ? 'Edit' : 'Add' ?> news</h6>
                <div class="mT-30">
                    <form class="container" id="needs-validation" novalidate action="<?= $news ? '/update-news' : '/create-news'?>" method="POST" enctype="multipart/form-data">
                        <?php if($news): ?>
                            <input type="hidden" name="id" value="<?=$news->id?>">
                        <?php endif;?>
                        <div class="col-md-8 mb-3">
                            <label for="validationCustom01">Title</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Title" name="title" required
                                <?php if($news):?>
                                    value="<?=$news->title?>"
                                <?php endif;?>
                            >
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="validationCustom04">Link</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Link" name="link" required
                                <?php if($news):?>
                                    value="<?=$news->link?>"
                                <?php endif;?>
                            >
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="validationCustom02">Content</label>
                            <textarea class="form-control" id="validationCustom02" placeholder="Content"  name="content" required><?php if($news):?><?=$news->content?><?php endif;?></textarea>
                        </div>
                        <?php if($news):?>
                            <img width="100" height="100" style="border-radius: 50%" src="<?=$news->image?>" alt="News Image">
                        <?php endif;?>
                        <div class="col-md-8 mb-3">
                            <label for="validationCustom03">Image</label>
                            <input type="file" name="image" class="form-control" id="validationCustom03" placeholder="Image" required>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php partials('admin.partials.footer') ?>
