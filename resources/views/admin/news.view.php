<?php partials('admin.partials.header') ?>
<script>
    function toggleId(id) {
        document.querySelector('#deleteForm input[name="type"]').setAttribute('value','news');
        document.querySelector('#deleteForm input[name="id"]').setAttribute('value',id);
    }

    function deleteForm(){
        document.getElementById('deleteForm').submit();
    }
</script>
<form action="/delete" id="deleteForm" method="POST">
    <input type="hidden" name="type">
    <input type="hidden" name="id">
</form>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete Modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">...</div>
            <div class="modal-footer">
                <button onclick="deleteForm();" type="button" class="btn btn-danger">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="full-container">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h4 class="c-grey-900 mB-20">Partners</h4>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Link</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($news as $singularNews): ?>
                        <tr>
                            <th scope="row"><?=$singularNews->id?></th>
                            <td><?=$singularNews->title?></td>
                            <td><?=substr($singularNews->content,0,30)?></td>
                            <td><?=$singularNews->link?></td>
                            <td>
                                <button onclick="toggleId(<?=$singularNews->id?>)" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
                                <a href="/create-news?news=<?=$singularNews->id?>" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php partials('admin.partials.footer') ?>
