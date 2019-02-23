<?php partials('admin.partials.header') ?>
<script>
    function toggleId(id) {
        document.querySelector('#deleteForm input[name="type"]').setAttribute('value','positions');
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
                        <th scope="col">Name</th>
                        <th scope="col">Reports</th>
                        <th scope="col">Type</th>
                        <th scope="col">Overview</th>
                        <th scope="col">Responsibilities</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($positions as $position): ?>
                        <tr>
                            <th scope="row"><?=$position->id?></th>
                            <td><?=$position->name?></td>
                            <td><?=substr($position->reports,0,30)?></td>
                            <td><?=substr($position->type,0,30)?></td>
                            <td><?=substr($position->overview,0,30)?></td>
                            <td><?=substr($position->responsibilities,0,30)?></td>
                            <td>
                                <button onclick="toggleId(<?=$position->id?>)" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
                                <a href="/create-position?position=<?=$position->id?>" class="btn btn-warning">Edit</a>
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
