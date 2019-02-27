<?php partials('admin.partials.header') ?>
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="full-container">
            <div class="row pt-3">
                <div class="col-sm-4">
                    <div class="card text-center">
                        <div class="card-body" style="height: 400">
                            <h5 class="card-title">Users</h5>
                            <p class="card-text"><?=$users?> users register in this platform</p>
                            <a href="/browse-users" class="btn btn-primary">Users dashboard</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Foods</h5>
                            <p class="card-text"><?=$foods?> foods entered in our database</p>
                            <a href="/browse-users" class="btn btn-primary">Foods dashboard</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Diets</h5>
                            <p class="card-text"><?=$diets?> diets created in our admin panel</p>
                            <a href="/browse-diets" class="btn btn-primary">Diets dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php partials('admin.partials.footer') ?>
