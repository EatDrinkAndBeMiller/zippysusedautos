<?php include('header.php') ?>

<?php if(!isset($_SESSION['userid'])){ ?>
    <div class="row  justify-content-md-center">
        <div class="col-lg-6">
            <form action="." method="get">
            <input type="hidden" name="action" value="register">

            <label for="firstName" class="form-label">Please enter your first name: </label>
            <input type="text" name="firstName" class="form-control">
            <br>
            <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>

<?php } else { ?>
    <div class="row  justify-content-md-center">
        <div class="col-lg-6">
            <h2>Thank you for registering, <?=$_SESSION['userid']?>! </h2>
            <br>
            <p><a href=".">Return to Vehicle List</a></p>
        </div>
    </div>

<?php } ?> 


<?php include('footer.php')?>