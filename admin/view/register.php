<?php include('header.php') ?>

<h4 class="text-center title-text">Register a New Admin User</h4>
<br>

<p class="text-danger h6 text-center"><?php if(isset($error)) {
    echo implode("\n", $error);
    }?></p>

<div class="row justify-content-md-center">
    <div class="col-lg-6">
    <form action="." method="POST">
        <input type="hidden" name="action" value="register">
        <fieldset >
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" class="form-control" id="username" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="text" name="password" class="form-control" id="password" required>
            </div>

            <div class="mb-3">
                <label for="pwConfirm" class="form-label">Confirm Password:</label>
                <input type="text" name="pwConfirm" class="form-control" id="pwConfirm" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>
    </div>
</div><br><br>
    <h5 class="text-center"><a href=".">Return to Vehicle List</a></h5> 

<?php include('footer.php')?>