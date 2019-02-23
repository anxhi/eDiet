<?php partials('admin.partials.header') ?>
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="full-container">
            <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900">Add new news</h6>
                <div class="mT-30">
                    <form class="container " id="needs-validation" novalidate="">
                        <div class="col-md-8 mb-3">
                            <label for="validationCustom01">Name</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="First name" name="name" value="Mark" required>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="validationCustom02">Description</label>
                            <textarea class="form-control" id="validationCustom02" placeholder="Content"  name="description" required></textarea>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="validationCustom03">Image</label><br>
                            <input type="file" name="file" id="validationCustom03" placeholder="City" required="">
                            <div class="invalid-feedback">Please provide a valid city.</div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit form</button></form>
                    <script>
                        !function(){"use strict";window.addEventListener("load",function(){var e=document.getElementById("needs-validation");e.addEventListener("submit",function(t){!1===e.checkValidity()&&(t.preventDefault(),t.stopPropagation()),e.classList.add("was-validated")},!1)},!1)}()
                    </script>
                </div>
            </div>
        </div>
    </div>
</main>
<?php partials('admin.partials.footer') ?>
